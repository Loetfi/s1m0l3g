<section class="content">

  <!-- row -->
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-success">
        <!-- The time line -->  




        <div class="box-body">
          <p>Hasil pencarian dari : <b><?php echo @$_GET['query'];?></b></p>
          <?php for ($i=0; $i < 10; $i++) { ?>
           <div class="box box-default">
            <div class="box-body">
              <h5><b>Judul Kegiatan</b></h5>
              <p>Tanggal  : <?php echo date('d F Y ') ?> , Unit : Migas , Target Realisasi : <span class="label label-info">B6 2019</span> </p>
              <p>Abstraksi : <i>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
              consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
              proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</i></p>
            </div>
          </div>
        <?php  } ?>
        <ul class="pagination">
          <li><a href="#">&laquo;</a></li>
          <li><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">4</a></li>
          <li><a href="#">5</a></li>
          <li><a href="#">&raquo;</a></li>
        </ul>
      </div>
    </div>
    <!-- /.col -->
  </div>
</div>
<!-- /.row --> 
