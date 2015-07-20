<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\job;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class HomeController extends Controller
{
    protected $redirectPath = '/';
    function  __construct()
    {
        $this->middleware('auth', ['only' =>array('update','edit','destroy')]);
    }
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
                 $data['job'] = Job::findOrFail($param);
                 return view('pages.details',$data);
            }
            catch(ModelNotFoundException $e)
            {
                return redirect('/');
            }
            
        }
        
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
        $data= array();
        try
        {
          $data['job'] = Job::findOrFail($id);  
        }
        catch(ModelNotFoundException $e)
        {
            redirect('/');
        }
        
       return view('pages/edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request)
    {
        if($request->isMethod('post'))
        {
            $data =  $request->all();
            $job = new Job;
            $job->updateJob($data);
            $success['url']= url('/');
            $success['title']= 'Update Success - Redirect to index';
            return view('success',$success);
        }
        else
        {
            redirect('/');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {   
        try
        {
            $job = Job::findOrFail($id);
            $job->deletejob($id);    
        }
        catch (ModelNotFoundException $e)
        {
            return redirect('/');
        }
        
        
        
    }
}
