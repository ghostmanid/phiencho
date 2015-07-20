<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table='congviec';
    protected $fillable= array('ten_cty','diachi','han_nop','vitri','noilamviec','noidung','url');

     function insert($data)
     {
     	$tam = array(); 

     	
     	for($i=0; $i<count($data);$i++) 
     	{
	     	$tam[$i]	= array(
	     	'ten_cty' => $data[$i]['tencty'],
	     	'diachi' => $data[$i]['diachi'],
	     	'han_nop' => $data[$i]['hannop'],
	     	'vitri'=> $data[$i]['vitri'],
	     	'noilamviec'=>'CT',
	     	'noidung'=> $data[$i]['noidung'],
	     	'url'	=>$data[$i]['url'],
	     	);
	    	Job::create($tam[$i]); 				
           
     	} 
     	
     	

     }
     function updateJob($data)
     {
        $data['hannop'] ;
         $t = explode('/', $data['hannop']);
           $t[2] = substr($t[2],-2);

           $data['hannop'] = $t[1].'/'.$t[0].'/'.$t[2];
                       
            $data['hannop'] = date('Y-m-d', strtotime($data['hannop']));
        $job = Job::find($data['id']);
        $job->ten_cty  = $data['tencty'];
        $job->diachi = $data['diachi'];
        $job->han_nop = $data['hannop'];
        $job->vitri= $data['vitri'];
        $job->noilamviec=$data['noilamviec'];
        $job->noidung= $data['noidung'];
        $job->save();
     }

     function deleteJob($id)
     {
        $job = Job::find($id);
        echo count($job);
        //$job->delete();
     }
}
