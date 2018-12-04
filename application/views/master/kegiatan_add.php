<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		<?php echo @$title; ?>
	</h1>
	<?php echo $this->breadcrumbs->show(); ?>
</section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">&nbsp;</h3>
					<div class="box-tools pull-right">
						<a href="<?php echo site_url($backUrl); ?>" class="btn btn-box-tool"><i class="fa fa-arrow-left"></i></a>
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
					</div>
				</div>
				<!-- /.box-header -->
				
				<form action="#" method="POST" id="addKegiatanForm" class="form-horizontal">
					<div class="box-body">
						<div class="form-group">
							<label for="nama_keg" class="col-sm-2 control-label">Nama Regulasi</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="nama_keg" required>
							</div>
						</div>
						
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Target</label>
							<div class="col-sm-2">
								<select name="tahun_target" class="form-control" id="tahun_target" required>
									<?php for($i=date('Y')+5; $i>=date('Y'); $i--){ ?>
									<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="col-sm-2">
								<select name="bulan_target" class="form-control" id="bulan_target" required>
									<?php for($i=1; $i<=12; $i++){ ?>
									<option value="<?php echo $i; ?>"><?php echo 'B'.str_pad($i,2,'0',STR_PAD_LEFT); ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="abstraksi" class="col-sm-2 control-label">Abstraksi</label>
							<div class="col-sm-10">
								<textarea class="form-control" id="abstraksi" required></textarea>
							</div>
						</div>
						
					</div>
					<!-- /.box-body -->
					<div class="box-footer">
						<button type="reset" class="btn btn-default">Cancel</button>
						<button type="submit" class="btn btn-info pull-right">Simpan</button>
					</div>
					<!-- /.box-footer -->
				</form>
				
			</div>
			<!-- /.box --> 
		</div>
		<!-- /.col -->
	</div>
</section>
<?php $this->load->view('master/kegiatan_script'); ?>
<script>
$(function(){
	CKEDITOR.replace('abstraksi');
});
</script>