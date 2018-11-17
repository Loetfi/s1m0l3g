<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo @$title; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css');?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/font-awesome/css/font-awesome.min.css');?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/Ionicons/css/ionicons.min.css');?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/AdminLTE.min.css');?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
   folder instead of downloading all of them to reduce the load. -->
   <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/skins/_all-skins.min.css');?>">

   <!-- HTML5 Shim and Respond.js');?> IE8 support of HTML5 elements and media queries -->
   <!-- WARNING: Respond.js');?> doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js');?>"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js');?>"></script>
<![endif]-->

<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-green layout-top-nav">
  <div class="wrapper">

    <header class="main-header">
      <nav class="navbar navbar-static-top">
        <div class="container">
          <div class="navbar-header">
            <a href="<?php echo base_url('assets/index2.html');?>" class="navbar-brand"><b>SIMOLEG KESDM</b></a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
              <i class="fa fa-bars"></i>
            </button>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse pull-left" id="navbar-collapse">

          <!-- <form class="navbar-form navbar-left" role="search">
            <div class="form-group">
              <input type="text" class="form-control" id="navbar-search-input" placeholder="Pencarian Kegiatan">
            </div>
          </form> -->
          <ul class="nav navbar-nav">
            <li class=""><a href="#">Peraturan Undang - Undang <span class="sr-only">(current)</span></a></li> 
            <li class=""><a href="#">Tentang <span class="sr-only">(current)</span></a></li> 
            <li class=""><a href="#">Hubungi Kami <span class="sr-only">(current)</span></a></li> 
          </ul>
        </div>
        <!-- /.navbar-collapse -->   
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header"> 
      </section>

      <!-- Main content -->
      <section class="content">  
        <div class="col-sm-8">
          <h1>Tentang Simoleg</h1>
          <p class="text-muted text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
        <div class="col-sm-4">
          <form action="<?php echo site_url('auth/proses') ?>" method="post">
            <legend>Masuk</legend>

            <?php 
            echo $message;
            echo form_error('username', '<div class="alert alert-danger">', '</div>');
            echo form_error('password', '<div class="alert alert-danger">', '</div>');
            ?>

            <div class="form-group">
              <label for="">Email</label>
              <input type="text" class="form-control" id="" placeholder="Email" name="username" required="email">
            </div>
            <div class="form-group">
              <label for="">Password</label>
              <input type="password" class="form-control" id="" placeholder="Password" name="password" required="">
            </div>

            

            <button type="submit" class="btn btn-success btn-block">Masuk</button>
          </form>
          
        </div>
        <hr>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->

    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header"> 
      </section>

      <!-- Main content -->
      <section class="content">  
        <div class="col-sm-12 text-center">
          <h1>Menjadi bagian dari kegiatan</h1>
          <br>
          <div class="row">

            <?php foreach ($unit as $units) { ?>
              <div class="col-sm-2">
                <div class="panel panel-success">
                  <div class="panel-heading">
                    <a href="#"><img src="<?php echo $units->url_img; ?>"></a>
                    <br><br>
                    <h3 class="panel-title"><?php echo $units->nama_unit; ?></h3>
                    <?php if ($units->id_unit == 5) { echo '';  } else { echo '<br>'; } ?>
                  </div> 
                </div>
              </div>
            <?php } ?> 

          </div>
        </div> 
        <hr>
      </section>
      <!-- /.content -->
    </div>

  </div> 
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js');?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js');?>"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url('assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js');?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url('assets/bower_components/fastclick/lib/fastclick.js');?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/dist/js/adminlte.min.js');?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/dist/js/demo.js');?>"></script>
</body>
</html>
