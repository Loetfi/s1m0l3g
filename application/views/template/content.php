<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo site_url(); ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="http://jdih.awanesia.com/logo-esdm-kuning.png"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SIMOLEG</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <form class="navbar-form navbar-left" role="search" action="<?php echo site_url('search') ?>" method="GET">
    <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
        <div class="form-group">
          <input type="text" class="form-control" id="navbar-search-input" placeholder="Cari kegiatan disini" name="query">
        </div>
      </form>
      <!-- Sidebar toggle button-->
     <!--  <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a> -->

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">   
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="http://jdih.awanesia.com/logo-esdm-kuning.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo @$this->session->userdata('name') ? $this->session->userdata('name') : 'Undefined'; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="http://jdih.awanesia.com/logo-esdm-kuning.png" class="img-circle" alt="User Image">

                <p>
                  <?php echo @$this->session->userdata('name');?>
                  <small>Bagian : <?php echo @$this->session->userdata('sub_sector');?></small>
                </p>
              </li>
              <!-- Menu Body --> 
              <!-- Menu Footer-->
              <li class="user-footer"> 
                <div class="pull-right">
                  <a href="<?php echo site_url('auth/logout/') ?>" class="btn btn-default btn-flat">Keluar</a>
                </div>
              </li>
            </ul>
          </li> 
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  
  <?php $this->load->view('template/sidebar'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <?php
  // echo @$page ? $this->load->view($page) : ''; 
    if (@$page) {
      $this->load->view($page);
    }
    ?>
  </div>
  <!-- /.content-wrapper -->
  
