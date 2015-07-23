<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Goutte\Client;
use App\job;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $site ='http://www1.canthoinfo.com/';
        $client = new Client();
        $crawler = $client->request('GET', $site);
        $crawler = $crawler->filter('table > tr > td > table');
        $crawler = $crawler->filter('tr')->eq(4);
        $crawler = $crawler->filter('td>table>tr>td>table')->eq(3);
        $crawler = $crawler->filter('tr>td>table');

        // link 
        $data_link = $crawler->filter('tr>td>a')->extract('href');
        
        
        $data_link = $this->xoaPhanTu($data_link);
                
        //vitrituyendung
        $arr_vitri = array();
        $j=0;
        for ($i=1; $i < count($crawler) ; $i=$i+3) { 
            if(count($crawler->eq($i))!=0)
            {
                if(count($crawler->eq($i)->filter('tr> td.text')->eq(3))!=0)
            {
                $arr_vitri[$j]['vitri'] = $crawler->eq($i)->filter('tr> td.text')->eq(3)->text();
                if (count($crawler->eq($i)->filter('tr> td.text')->eq(4))!=0) {
                 $arr_vitri[$j]['vitri'] = $arr_vitri[$j]['vitri'].$crawler->eq($i)->filter('tr> td.text')->eq(4)->text();    
                }
                
            }
            else
            {
                $arr_vitri[$j]['vitri']= " ";
            }
            $j++;    
            }           
             
        }
       
       
        $data_thongtin = array();
        for ($i=0; $i < count($data_link); $i++) { 
            
            if(strpos($data_link[$i], 'http://')===false)

            {

                    if($this->checkURL($site.$data_link[$i]))
                    {  
                        $domNoidung = $this->domNoiDung($data_link[$i]);
                        
                        $data_thongtin[$i] = array(
                        'url' => $site.$data_link[$i],
                        'tencty'=>  $this->DondepString($domNoidung['tencty']),
                        'diachi'=> $this->DondepString($domNoidung['diachi']),     // aly vi tri thong qua noi dung chinh
                        'vitri' =>  $this->DondepString($arr_vitri[$i]['vitri']),
                        'hannop'=> $domNoidung['hannop'],
                        'noidung'=> $domNoidung['noidung'],
                    );   
                        
                        
                    }      
                    
         
            }
             
                    }
             $job = new Job();
            $job->insert($data_thongtin);                         
       
    }

/**
* xoa phan tu trung nhau trong mang
*/
    private function xoaPhanTu($array)
    {   
        $data = array_unique($array);
        foreach ($data as $key => $value) 
        {
                
          if ('' == trim($value)) 
          {
            unset($data[$key]);
          }

        } //loai bo phan tu trung nhau 

        // chay la key trong phan tu
        $i=0;
        $kq = array();
        foreach ($data as $key => $value) {
           $kq[$i] = $value;
           $i++;
        }
        return $kq;
    }

    /**
    * xoa phan tu du thua, xoa  khoang trang du thua
    */
    private function DondepString($str)
    {

        $str = preg_replace('/\s+/', ' ',$str); // xoa khoang trang du thua
        $str =  trim($str);
        return $str;
    }

    private function  checkURL($url)
    {
        
          $job = new Job;

            $job = $job::where('url','=',$url)->first();

            if(count($job)>0)
            {
                return false;    
            }
            else
            {
                return true;
            }

       
       
        
    }

    /**
    * get noi dung
    *
    */
    function domNoiDung($url)
    {
        
            $data =" ";
         $url ='http://www1.canthoinfo.com/'.$url;
            $data = array();
            $client = new Client();
            $crawler = $client->request('GET', $url);
            $crawler = $crawler->filter('table > tr > td > table');
            $crawler= $crawler->filter('tr>td>table');
            
            if(count($crawler->eq(3)->extract('_text'))!=0) // kiem tra ton tai 
            {
             $crawler = $crawler->eq(3);
             $data['noidung'] = $crawler->html();        
             
            }
            else // khong ton tai menu ben trai'
            {
               
                    $data['noidung'] =  $crawler->html();
                              
            }
            
            // lay du lieu  ten cong ty,  dia chi ( nhut cmn dau )
            
            if(count($crawler->filter('table'))>=3)
            {
                $data['tencty'] =$crawler->filter('table')->eq(1)->filter('tr')->first()->text();
             // lay dia chi
                if(count($crawler->filter('table')->eq(1)->filter('tr')->eq(1))==1)
                {
                $data['diachi'] =$crawler->filter('table')->eq(1)->filter('tr')->eq(1)->filter('td')->first()->text();
                     
                }
                else
                {
                    $data['diachi'] ="Update";
                }
                                   
                
            }
            else
            {
                $data['tencty'] =$crawler->filter('tr')->first()->text();
             // lay dia chi
             $data['diachi'] =$crawler->filter('tr')->eq(1)->filter('td')->first()->text();
            }
            
            $string =$crawler->text(); // lay han nop 
            $date=array();
             preg_match('#(\d{2})/(\d{2})/(\d{4})#',$string,$date);
             if(count($date)==0)
             {
                $date[0]= date('d/m/y',strtotime(Carbon::now()->addDay(15)));
             }
        
           $t = explode('/', $date[0]);
           $t[2] = substr($t[2],-2);

           $date[0] = $t[1].'/'.$t[0].'/'.$t[2];
                       
            $data['hannop'] = date('Y-m-d', strtotime($date[0]));
           
        
        return $data;         


    }
    function  autoXoa()
    {
        try
        {
            $job = Job::where('han_nop',"<",Carbon::now()->addDay(1))->get();    
            
        }
        catch(ModelNotFoundException $e)
        {

        }
        


    }
   
}
