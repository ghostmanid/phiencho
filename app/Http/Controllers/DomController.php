<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Goutte\Client;

class DomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $site ='http://canthoinfo.com';
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
             $data_vitri= $data_vitri->filter('font')->extract('_text');
             $arr_vitri[$j] = $data_vitri;
            $j++;
             
        }
        

        $data_thongtin = array();
        for ($i=0; $i < count($data_link); $i++) { 
            
            $data_vt = '';
                      
            for ($j=2; $j <count($arr_vitri[$i])-2; $j++) { 
                     $data_vt = trim($data_vt.$arr_vitri[$i][$j].',');
                }
            $data_thongtin[$i] = array(
                'url' => $site.$data_link[$i],
                'TenCty'=> $arr_vitri[$i][0],
                'diachi'=> '',    
                'vitri' =>   $data_vt,
                'hanop'=> '???',

            );

        }
        echo "<pre>";
             print_r($data_thongtin) ;
                echo "</pre>";
            
           
        
            
                 
        
       
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
   
}
