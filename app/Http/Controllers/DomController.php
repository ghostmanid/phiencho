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
        $data=  array();
        $j=0;
        $crawler = $crawler->filter('table > tr > td > table');
        $crawler= $crawler->filter('tr')->eq(4);
        $crawler = $crawler->filter('td>table>tr>td>table')->eq(3);
        $crawler = $crawler->filter('tr>td>table');
        $tongsorecord =  (round(count($crawler)/3)); 
       // for ($i=0; $i < 92 ; $i=$i+3) { 
            print $crawler->eq()->filter('a')->attr('href');
       // }
        // $data1 = array();
        // $j =0;
        // for ($i=37; $i < count($crawler_link)-5 ; $i++) { 
              
        //       $data1[$j] = $crawler_link[$i];
        //       $j++;
        // }
        // $data = array_unique($data1);
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";

        // $crawler_vitri = $crawler->filter('body table   table   table  table   table table  tr  td b font')->extract('_text');
        // echo "<pre>";
        // print_r($crawler_vitri);
        // echo "</pre>";
    }   

   
}
