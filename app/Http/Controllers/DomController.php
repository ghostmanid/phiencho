<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Goutte\Client;
use App\job;
use Carbon\Carbon;

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
            
             $data_vitri= $crawler->eq($i)->filter('tr>td');
             $data_vitri= $data_vitri->filter('b')->extract('_text');
             $arr_vitri[$j] = $data_vitri;
            $j++;
             
        }
        

        $data_thongtin = array();
        for ($i=0; $i < count($data_link); $i++) { 
            
                
            if($this->checkURL($site.$data_link[$i]))
            {
                $data_thongtin[$i] = array(
                'url' => $site.$data_link[$i],
                'tencty'=> $arr_vitri[$i][0],
                'diachi'=> ' ',    
                'vitri' =>  'update',
                'hannop'=> Carbon::now()->addDay(30),
                'noidung'=> $this->domNoiDung($site.$data_link[$i]),
            );   
            }
            

        }

         // $job = new Job();
         // $job->insert($data_thongtin);

        
        
       
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
        $day = Carbon::now();
        $job = new Job;
        $job = $job::where('url','=',$url);
       
        if(isset($job->url))
        {
              return false;
            
        }
        else
        {
            return true; // insert
            

        }
        
    }

    /**
    * get noi dung
    *
    */
    function domNoiDung($url)
    {

        if(!is_numeric(strpos($url, 'http://',8)))
        {
        echo $url;
        $client = new Client();
        $crawler = $client->request('GET', $url);
         $crawler = $crawler->filter('table > tr > td > table');
        $crawler= $crawler->filter('tr>td>table');         
         $crawler = $crawler->eq(3)->html();
         return $crawler;
        }
        else
        {
            return  "rong";
        }


       
            

    }
   
}
