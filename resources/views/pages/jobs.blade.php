@extends('home')
@section('title')
 Cần Thơ  tuyển dung|| Tuyen Dung Can Tho || statusCanTho.com
@stop

@section('canonical')
{{url()}}
@stop

@section('metaKey')
tuyển dụng cần thơ, việc làm cần thơ, it cần thơ, kế toán,  nhân viên kinh doanh,  trình dược viên
@stop

@section ('description')
Cần Thơ  tuyển dung, tuyen dung can tho, viec lam can tho, can tho viec lam, viec lam, can tho
@stop
@section('content')
<div class="row">
        <div class="col s9 m9">
           
            @foreach($job as $job)
            <div class="card hoverable small "  >
                <div class="card-title valign-wrapper grey lighten-3 " style='border-bottom: 2px solid <?php 
              $color = array ( "#2196f3","#f44336","#ffc107","#8bc34a","#9c27b0");
             echo $color[rand(0,4)];?> ' >
                  <div class='col m10  black-text truncate'> <strong > {{$job->ten_cty}} </strong> </div>
                    <div class='col m2 right-align truncate'> 
                      @if(Auth::check())
                        <a href="{{url('/')}}/job/{{$job->id}}/edit"><i class='material-icons'>edit</i></a>
                        <a href="{{url('/')}}/job/{{$job->id}}/destroy"><i class='material-icons'>delete</i></a>
                      @endif
                     
                    </div>
                </div>   
              <div class="card-content truncate">
               
                    <strong> Tuyển dụng: </strong>
                  <dl>
                   
                     @for($i=0; $i < count($c = explode(',',$job->vitri));$i++)

                      <li class='blue-text'> {{$c[$i]}} </li>

                     @endfor


                  
                  </dl>
               
              
              </div>
              <div class="card-action">
                <div class="col m9 s6 "> 
                  <div>
                    <strong> Hạn nộp : <span class='red-text'> {{date('d/m/Y',strtotime($job->han_nop))}} </span>  </strong> <br>
                    <i style='font-size:12px' class='hide-on-small-only'>{{$job->diachi}} </i> 
                  </div>
                 </div>
                
                <a href="viec/{{$job->id}}" class='btn grey lighten-5 waves-effect waves-light red-text tooltipped'  data-delay="50" data-tooltip="Xem chi tiết " >    
                    chi tiết
                  </a>
              </div>        
            </div> <!-- End card -->
            @endforeach
            
                            

          
            <!-- Phan trang --> 
          <!-- <ul class="pagination right">
            <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
            <li class="active green"><a href="#!">1</a></li>
            <li class="waves-effect"><a href="#!">2</a></li>
            <li class="waves-effect"><a href="#!">3</a></li>
            <li class="waves-effect"><a href="#!">4</a></li>
            <li class="waves-effect"><a href="#!">5</a></li>
            <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
          </ul> -->
          <!-- End Phan trang --> 
        </div> <!-- End Collum s9 -->
        <div class="col m3 hide-on-small-only">
          <div class="card z-depth-0  ">
            <div class="card-title  red-text text-darken center">
               <strong> <h5> Việc ở đâu?</h5>  </strong>
            </div>
            <div class="card-content">
                
                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <!-- statusCanTho -->
                <ins class="adsbygoogle"
                     style="display:block"
                     data-ad-client="ca-pub-8343667052257229"
                     data-ad-slot="7818425991"
                     data-ad-format="auto"></ins>
                <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
                </script>



            </div>
          </div>

          <div class="card z-depth-0">
            <div class="card-title  red-text center">
               <strong> <h5>Bạn là ?</h5> </strong>
            </div>
            <div class="card-content">
               <a href="#" class=''> Kế  toán, Lập trình viên</a>, <a href="#">, hướng dẫn viên </a>, <a href="#"> kỹ sư xây dựng,.. </a>
            </div>
          </div>
        </div>

    </div> <!-- End Roq -->

  @stop  