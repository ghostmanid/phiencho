@extends('home')
@section('title', 'Can Tho tuyen dung ..')
@section('content')

<div class="row">

    @if($job->noidung!=null)
      
     {!! str_replace('src="logo','src="http://canthoinfo.com/logo/',$job->noidung) !!}

    @else
        
        <h2>Opps! URL False </h2>
        <p><a href="{{ url('/') }}">Clikc here Go to Home</a> </p>
     

    @endif


 </div>
 <div class="fixed-action-btn" style="bottom: 120px; right:25px;">
    <button class="btn-floating btn-large green " onClick='window.history.back();'>Back</button>
    
</div>

@stop