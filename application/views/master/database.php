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
			<div class="box">
				<div class="box-header"> 
					
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
					</div>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<?php for ($i=0; $i < 11 ; $i++) {  ?>
					<div class="col-sm-4">
						<div class="panel panel-info">
					  	<div class="panel-heading">
					  		<h3 class="panel-title">Bidang</h3>
					  	</div>
					  	<div class="panel-body">
					  		<a href="<?php echo site_url('kegiatan') ?>" class="btn btn-lg btn-success btn-block">MINERBA</a>
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
	</div>
</section>
<?php $this->load->view('master/kegiatan_script'); ?>
