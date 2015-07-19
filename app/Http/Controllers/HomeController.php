<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\job;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data['job'] = Job::all();
        
       return view('pages.jobs',$data);

    }

    /**
    * Load trang  the hien  noi dung chi tiet 
    * @return  1 mang du lieu
    */
    public function chitiet ($param)
    {
        $data= array();
        if(isset($param))
        {
            try
            {
                 $data['job'] =  Job::findOrFail($param);
            }
            catch(ModelNotFoundException $e)
            {
                 redirect('/');
            }
        }
        return view('pages.details',$data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function dangtin()
    {
        return view('pages.frm_dangtin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
