<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar"> 
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">NAVIGASI</li>
      <li class="<?php echo $this->uri->segment(1) === 'dashboard' ? 'active' : '' ; ?>">
        <a href="<?php echo site_url('dashboard') ?>">

          <i class="fa fa-dashboard"></i> <span>Dashboard</span> 
        </a>
      </li>   

      <li class="<?php echo $this->uri->segment(1) === 'database' || $this->uri->segment(1) === 'kegiatan' ? 'active' : '' ; ?>">
        <a href="<?php echo site_url('database')?>">
          <i class="fa fa-th"></i> <span>Database</span>
        </a>
      </li>  

      <?php if (@$this->session->userdata('id_flow') == 1) { ?>
        <li class="header">Admin Menu</li>
        <li class="<?php echo $this->uri->segment(1) === 'pengguna' ? 'active' : '' ; ?>">
          <a href="<?php echo site_url('pengguna') ?>">
            <i class="fa fa-th"></i> <span>Master Pengguna</span>
          </a>
        </li> 

      <?php } ?>

    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
