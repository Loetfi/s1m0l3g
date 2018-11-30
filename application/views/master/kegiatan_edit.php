<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		<?php echo @$title; ?>
	</h1>
	
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Database</a></li>
		<li><a href="#">Daftar</a></li>
		<li><a href="#">Detail</a></li>
		<li class="active">Edit Regulasi</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-6">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Detail</h3>
					<div class="box-tools pull-right">
						<a href="<?php echo site_url($backUrl); ?>" class="btn btn-box-tool"><i class="fa fa-arrow-left"></i></a>
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
					</div>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<input type="hidden" name="id_keg" id="id_keg" value="<?php echo @$detail['id_keg']; ?>">
					<table class="table table-bordered">
						<tr>
							<th width="200px">Nama</th>
							<td><?php echo @$detail['nama_keg']; ?></td>
						</tr>
						<tr>
							<th>Tahun Awal</th>
							<td><?php echo @$detail['tahun']; ?></td>
						</tr>
						<tr>
							<th>Abstraksi</th>
							<td><p><?php echo @$detail['abstraksi']; ?></p></td>
						</tr>
						<tr>
							<th>Status</th>
							<td><?php echo @$detail['status']; ?></td>
						</tr>
						<tr>
							<th>Tgl Input</th>
							<td><?php echo date('d F Y H:i:s',@$detail['cdate']); ?></td>
						</tr>
						<tr>
							<th>Update Terakhir</th>
							<td><?php echo ((int)$detail['mdate'] > 0 ? date('d F Y H:i:s',@$detail['mdate']) : ''); ?></td>
						</tr>
					</table>
				</div>
				<!-- /.box-body -->
				
			</div>
			<!-- /.box --> 
		</div>
		<div class="col-md-6">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Log Target</h3>
					<div class="box-tools pull-right">
						<a href="<?php echo site_url($backUrl); ?>" class="btn btn-box-tool"><i class="fa fa-arrow-left"></i></a>
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
					</div>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<table class="table table-bordered">
						<tr>
							<th>Tahun Target</th>
							<th>Bulan Target</th>
							<th>Status</th>
							<th>Tgl Create</th>
							<th>Edit Create</th>
						</tr>
						<?php foreach($logTarget as $dataLogTarget){ ?>
						<tr>
							<td><?php echo @$dataLogTarget['tahun']; ?></td>
							<td><?php echo 'B'.str_pad(@$dataLogTarget['id_target'], 2, '0', STR_PAD_LEFT); ?></td>
							<td><?php echo @$dataLogTarget['status']; ?></td>
							<td><?php echo @$dataLogTarget['cdate'] == '' ? '-' : date('d M Y H:i:s', $dataLogTarget['cdate']); ?></td>
							<td><?php echo @$dataLogTarget['mdate'] == '' ? '-' : date('d M Y H:i:s', $dataLogTarget['mdate']); ?></td>
						</tr>
						<?php } ?>
					</table>
				</div>
				<!-- /.box-body -->
				
			</div>
			<!-- /.box --> 
		</div>
	</div>
	<div class="row">
		<div class="col-xs-6">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Form Edit</h3>
					<div class="box-tools pull-right">
						<a href="<?php echo site_url($backUrl); ?>" class="btn btn-box-tool"><i class="fa fa-arrow-left"></i></a>
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
					</div>
				</div>
				<!-- /.box-header -->
				
				<form action="#<?php echo site_url('kegiatan/editProcess'); ?>" method="POST" id="editKegiatanForm" class="form-horizontal" enctype="multipart/form-data" target="_blank">
					<div class="box-body">
						<div class="form-group">
							<label for="nama_keg" class="col-sm-4 control-label">Nama</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="nama_keg" placeholder="Nama" value="<?php echo @$detail['nama_keg']; ?>" required>
							</div>
						</div>
						
						<div class="form-group">
							<label for="abstraksi" class="col-sm-4 control-label">Abstraksi</label>
							<div class="col-sm-8">
								<textarea class="form-control" id="abstraksi" placeholder="abstraksi" required><?php echo @$detail['abstraksi']; ?></textarea>
							</div>
						</div>
						
						<div class="form-group">
							<label for="status" class="col-sm-4 control-label">Status</label>
							<div class="col-sm-8">
								<select name="status" class="form-control" id="status" placeholder="status" required>
									<option value="">-Pilih-</option>
									<option value="Aktif" <?php echo @$detail['status'] == 'Aktif' ? 'Selected' : ''; ?>>Aktif</option>
									<option value="Pasif" <?php echo @$detail['status'] == 'Pasif' ? 'Selected' : ''; ?>>Pasif</option>
									<option value="Selesai" <?php echo @$detail['status'] == 'Selesai' ? 'Selected' : ''; ?>>Selesai</option>
								</select>
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
		<div class="col-xs-6">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Form Log Target</h3>
					<div class="box-tools pull-right">
						<a href="<?php echo site_url($backUrl); ?>" class="btn btn-box-tool"><i class="fa fa-arrow-left"></i></a>
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
					</div>
				</div>
				<!-- /.box-header -->
				
				<form action="#<?php echo site_url('kegiatan/addTarget'); ?>" method="POST" id="addLogTargetForm" class="form-horizontal" enctype="multipart/form-data" target="_blank">
					<div class="box-body">
						<div class="form-group">
							<label for="status" class="col-sm-4 control-label">Status Target</label>
							<div class="col-sm-8">
								<select name="status" class="form-control" id="statusTarget" placeholder="status" required>
									<option value="Aktif">Aktif</option>
									<option value="Pasif">Pasif</option>
									<option value="Selesai">Selesai</option>
									<option value="Luncuran">Luncuran</option>
								</select>
							</div>
						</div>
						
						<div class="form-group">
							<label for="" class="col-sm-4 control-label">Target</label>
							<div class="col-sm-4">
								<select name="tahun_target" class="form-control" id="tahun_target" required>
									<?php for($i=date('Y')+5; $i>=date('Y'); $i--){ ?>
									<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="col-sm-4">
								<select name="bulan_target" class="form-control" id="bulan_target" required>
									<?php for($i=1; $i<=12; $i++){ ?>
									<option value="<?php echo $i; ?>"><?php echo 'B'.str_pad($i,2,'0',STR_PAD_LEFT); ?></option>
									<?php } ?>
								</select>
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
	</div>
</section>
<?php $this->load->view('master/kegiatan_script'); ?>