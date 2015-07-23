<!DOCTYPE html>
<html lang="vi">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title> @yield('title') </title>
  <meta name='revisit-after' content='1 days' />
  <meta name="description" content="@yield('description')"/>
  <meta name="keywords" content="@yield('metaKey')" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="robots" content="noodp,index,follow" />
  <link rel="canonical" href="@yield('canonical')" />

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  {!! Html::style('public/css/materialize.css', array('media'=> 'screen,projection')) !!}
  {!! Html::style('public/css/style.css', array('media'=>'screen,projection'))!!}
  <script src="//cdn.ckeditor.com/4.5.1/full/ckeditor.js"></script>
</head>
<body style='background:url("<?php echo url(); ?>/public/images/greyzz.png");'>
 <nav class="grey lighten-5" role="navigation">
    <div class="nav-fixed container">
       <ul class='nav-wrapper right'>
       <li> <a href="{{ url('/')}}" class='green'> <i class='material-icons'>work</i> </a> </li>
        <li> <a  href="#" class="btn-flat  green-text disabled"  onclick="Materialize.toast('Xin lỗi Bạn ! chức năng  đang trong giai đoạn hoàn thiện!', 4000)">  <strong> Đăng tuyển dụng   </strong></a></li>
        <li>   <a href="#" class='btn-flat'> <strong> Liên hệ  </strong> </a></li>
      </ul>
      <ul id="nav-mobile" class="side-nav">
        <li><a href="#">Đăng tuyển dụng </a></li>
        <li> <a href="#">Liên hệ </a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="green-text material-icons">menu</i></a>
    </div>
</nav>
      
<div class="section no-pad-bot" id="index-banner">
   <div class="container">

      @yield('content')
  </div>
</div>


 <footer class="page-footer green">
    
      <div class="container white-text">
      Design by Ghostmanid
      </div>
  
  </footer>
    <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
    <a class="btn-floating btn-large red darken-4 tooltipped modal-trigger " data-tooltip="Tìm việc" data-position="left" href="#modal1">
      <i class="large material-icons">search</i>
    </a>
    
  </div>


   <!-- Modal Structure -->
  <div id="modal1" class="modal bottom-sheet">
    <div class="modal-content">
      <h4>Bạn tìm gì cho mình ?</h4>
      <p>Hãy nhập công việc bạn tìm vào khung dưới - Chúng tôi sẽ trả về kết quả những công ty tuyển dụng vị trí mà bạn đang cần.</p>
    </div>
    <div class="modal-footer">
      <form method="post" action="">
          <div class="input-field ">
          <i class="material-icons prefix">search</i>
          <input placeholder="Nhập  vào đây" id="first_name" type="text" class="validate">
          <label for="first_name">Cho tôi  biết việc bạn  muốn tìm </label>
          </div>
          <div class="input-field">
            <button class="btn waves-effect waves-light" type="submit" name="action"> Tìm giúp tôi  </button>           
          </div>
      </form>
      <p>StatusCanTho -Cảm ơn bạn đã  truy cập và sử dụng  công cụ tìm kiếm.</p>
    </div>
  </div>
       

  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="{{URL::asset('public/js/materialize.js') }}"></script>
  <script type="text/javascript" src="{{URL::asset('public/js/init.js') }}"></script>
 
  <script type="text/javascript">
     $(document).ready(function (){

        var options = [
      {selector: '.pagination', offset: 700, callback: 'Materialize.toast("Nếu có trang kế  bạn  hãy thử xem có việc nào phù hợp  với mình không?", 3000 )' },
      
    ];
    Materialize.scrollFire(options);
      $('.modal-trigger').leanModal({

       // dismissible: true, // Modal can be dismissed by clicking outside of the modal
        opacity: 0.05, // Opacity of modal background
        in_duration: 300, // Transition in duration
        out_duration: 200, // Transition out duration
      //  ready: function() { alert('Ready'); }, // Callback for Modal open
       // complete: function() { alert('Closed'); } // Callback for Modal close
    
      });


     });
    
    </script>


<!-- google -->
    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-48556623-2', 'auto');
  ga('send', 'pageview');

</script>

  </body>
</html>
