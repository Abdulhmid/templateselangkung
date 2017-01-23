<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Anterin | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{!!url('')!!}/plugins/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{!!url('')!!}/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{!!url('/assets/dists/be')!!}/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{!!url('/assets/dists/be')!!}/css/skins/_all-skins.min.css">

  <link rel="stylesheet" href="{!!url('')!!}/plugins/toastr/toastr.min.css">
  @yield('style')
</head>
<body class="sidebar-mini wysihtml5-supported skin-blue-light" style="height: auto;">
<div class="wrapper">

  @include('partials.header')
  <!-- Left side column. contains the logo and sidebar -->

  <!-- Sidebar -->
  @include('partials.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{$title}}
        <small>{{$subTitle}}</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        {!! Breadcrumb::render([''.$breadcrumb.'']) !!} 
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      @yield('content')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Footer -->
  @include('partials.footer')

</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="{!!url('')!!}/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{!!url('')!!}/plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="{!!url('')!!}/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="{!!url('/assets/dists/be')!!}/js/app.min.js"></script>
<!-- Sparkline -->
<script src="{!!url('')!!}/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="{!!url('')!!}/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="{!!url('')!!}/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="{!!url('')!!}/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="{!!url('')!!}/plugins/chartjs/Chart.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- AdminLTE for demo purposes -->
<script src="{!!url('/assets/dists/be')!!}/js/demo.js"></script>
<script src="{!!url('')!!}/plugins/toastr/toastr.min.js"></script>

<script src="{!!url('')!!}/js/default.js"></script>

<script type="text/javascript">
  $(document).ready(function(){
    @if(Session::has('error'))
        toastr["success"]("Anterin", "{!! Session::get('error') !!}");
    @endif

    @if(Session::has('message'))
        toastr["success"]("Anterin", "{!! Session::get('message') !!}");
    @endif

    @if(Session::has('info'))
        toastr["success"]("Anterin", "{!! Session::get('info') !!}");
    @endif

    @if(Session::has('warning'))
        toastr["success"]("Anterin", "{!! Session::get('warning') !!}");
    @endif
  });
</script>
@yield('scripts')
</body>
</html>
