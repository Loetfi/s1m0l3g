<?php //print_r($data->result()); die(); ?>
<section class="content">

  <!-- row -->
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-success">
        <!-- The time line -->   
        <div class="box-body"> 
          <p class="text-muted">Hasil pencarian : <?php echo @$_GET['query'];?></p>
          <?php foreach ($data->result() as $row) :?>
            <div class="box box-default">
              <div class="box-body">
                <h5><a href="<?php echo site_url('kegiatan/detail/'.@$row->id_unit.'/'.@$row->id_keg) ?>"><b><?php echo @$row->nama_keg; ?></b></a></h5>
                <p>Awal tahun target terbuat  :<b> <?php echo @$row->tahun; ?> </b>, Unit : <b><?php echo @$row->nama_unit; ?></b> </p>
                <!-- , Target Realisasi : <span class="label label-info">B6 2019</span>  -->
                <p>Abstraksi : <i><?php echo @$row->abstraksi; ?>.</i></p>
              </div>
            </div>
          <?php endforeach; ?>

          <div class="row">
            <div class="col">
              <!--Tampilkan pagination-->
              <?php echo $pagination; ?>
            </div>
          </div>

          <p>Hasil pencarian dari : <b><?php echo @$_GET['query'];?></b></p>
          <?php for ($i=0; $i < 10; $i++) { ?>

          <?php  } ?>
          
        </div>
      </div>
      <!-- /.col -->
    </div>
  </div>
  <!-- /.row --> 
