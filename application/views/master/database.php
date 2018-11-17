<!--
<pre><?php print_r($tahun); ?></pre>
-->
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		<?php echo @$title; ?>
	</h1>
</section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-success">
				<div class="box-header"> 
					
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
					</div>
				</div>
				<!-- /.box-header -->
				<div class="box-body text-center">

					<!-- <div class="panel box box-success"> -->
                 <!--  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="" class="btn btn-success">
                        Collapsible Group Success
                      </a>
                    </h4>
                  </div>
                  <div id="collapseThree" class="panel-collapse collapse">
                    <div class="box-body">
                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3
                      wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                      eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
                      assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred
                      nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer
                      farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus
                      labore sustainable VHS.
                    </div>
                </div> -->
                <!-- </div> -->


                <?php foreach ($unit as $units) { ?>
                	<div class="col-sm-2">
                		<div class="panel panel-success">
                			<div class="panel-heading">
                				<?php if ($units->id_unit == 5) {
                					?>
                					<a data-toggle="modal" href='#modal-id'><img src="<?php echo $units->url_img; ?>"></a>
                					<?php 
                				} else {?>
                					<a href="<?php echo site_url('database_kegiatan/'.$units->id_unit) ?>"><img src="<?php echo $units->url_img; ?>"></a>
                				<?php } ?>
                				<br><br>
                				<h3 class="panel-title"><?php echo $units->nama_unit; ?></h3>
                				<?php if ($units->id_unit == 5) { echo '';  } else { echo '<br>'; } ?>
                			</div> 
                		</div>
                	</div>
                <?php } ?> 



            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box --> 
    </div>
    <!-- /.col -->


    <div class="modal  fade" id="modal-id">
    	<div class="modal-dialog modal-lg">
    		<div class="modal-content">
    			<div class="modal-header">
    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    				<h4 class="modal-title">Inspektorat Jendral</h4>
    			</div>
    			<div class="modal-body">
    				<!-- <div class="col-sm-6"> -->

    					<div class="panel panel-success">
    						<div class="panel-heading">
    							<a data-toggle="modal" href='#modal-id'><img src="https://www.esdm.go.id/assets/imagecache/mediaList/xItjen.png.pagespeed.ic.Q8VtQCEB1S.png"></a>
    							<br><br>
    							<h3 class="panel-title">Inspektorat Jendral</h3>
    						</div> 
    					</div>

    					<div class="panel panel-success">
    						<div class="panel-heading">
    							<a data-toggle="modal" href='#modal-id'><img src="https://www.esdm.go.id/assets/imagecache/mediaList/xItjen.png.pagespeed.ic.Q8VtQCEB1S.png"></a>
    							<br><br>
    							<h3 class="panel-title">Inspektorat Jendral</h3>
    						</div> 
    					</div>

    					<div class="panel panel-success">
    						<div class="panel-heading">
    							<a data-toggle="modal" href='#modal-id'><img src="https://www.esdm.go.id/assets/imagecache/mediaList/xItjen.png.pagespeed.ic.Q8VtQCEB1S.png"></a>
    							<br><br>
    							<h3 class="panel-title">Inspektorat Jendral</h3>
    						</div> 
    					</div>
    				<!-- </div> -->

    			</div>
    			<div class="modal-footer">
    				<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
    			</div>
    		</div>
    	</div>
    </div>
</div>
</section>
<?php $this->load->view('master/kegiatan_script'); ?>
