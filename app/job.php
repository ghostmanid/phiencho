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
}
