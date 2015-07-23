@extends('home')
@section('title')
 Cần Thơ  tuyển {!!$job->vitri!!} || Tuyen Dung Can Tho || statusCanTho.com
@stop

@section('metaKey')
tuyển dụng cần thơ, việc làm cần thơ, it cần thơ, kế toán,  nhân viên kinh doanh,  trình dược viên
@stop

@section('canonical')
{{url()}}/viec/{{$job->id}}
@stop

@section ('description')
Cần Thơ  tuyển {!!$job->vitri!!}
@stop
@section('content')

<div class="card-panel">

    @if(!is_array($job))
      
     {!! str_replace('src="logo','src="http://canthoinfo.com/logo/',$job->noidung) !!}

    @else
        
        <h2>Opps! URL False </h2>
        <p><a href="{{ url('/') }}">Clikc here Go to Home</a> </p>
     
    @endif


 </div>
 <div class="fixed-action-btn" style='bottom:200px; right:0px'>

  <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.4&appId=439310842920635";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>
  <div class="fb-share-button" data-href="{{url('/')}}/viec/{{$job->id}}" data-layout="box_count"></div>  
  <div class="fb-like" data-href="{{url('/')}}" data-layout="box_count" data-action="like" data-show-faces="false" data-share="false"></div>

 </div>
 <div class="fixed-action-btn" style="bottom: 120px; right:25px;">
 	
    <button class="btn-floating btn-large green " onClick='window.history.back();'>Back</button>
@if(Auth::check())
   <a  class='btn-floating ' href="{{url('/')}}/job/{{$job->id}}/edit"><i class='material-icons'>edit</i></a>
   <a  class='btn-floating ' href="{{url('/')}}/job/{{$job->id}}/delete"><i class='material-icons'>delete</i></a>
@endif
    
</div>

@stop