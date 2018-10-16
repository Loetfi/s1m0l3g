<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		<?php echo @$title; ?>
	</h1>
</section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-6">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Detail Kegiatan</h3>
					<div class="box-tools pull-right">
						<a href="<?php echo site_url( $this->uri->segment(1)); ?>" class="btn btn-box-tool"><i class="fa fa-arrow-left"></i></a>
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
					</div>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<table class="table table-bordered">
						<tr>
							<th width="200px">nama_keg</th>
							<td><?php echo @$detail['nama_keg']; ?></td>
						</tr>
						<tr>
							<th>tahun</th>
							<td><?php echo @$detail['tahun']; ?></td>
						</tr>
						<tr>
							<th>status</th>
							<td><?php echo @$detail['status']; ?></td>
						</tr>
						<tr>
							<th>cdate</th>
							<td><?php echo date('d F Y h:i:s',@$detail['cdate']); ?></td>
						</tr>
						<tr>
							<th>mdate</th>
							<td><?php echo date('d F Y h:i:s',@$detail['mdate']); ?></td>
						</tr>
					</table>
				</div>
				<!-- /.box-body -->
				
			</div>
			<!-- /.box --> 
		</div>
		
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Form Tambah Log Kegiatan</h3>
					<div class="box-tools pull-right">
						<a href="<?php echo site_url( $this->uri->segment(1)); ?>" class="btn btn-box-tool"><i class="fa fa-arrow-left"></i></a>
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
					</div>
				</div>
				<!-- /.box-header -->
				
				<form action="#" method="POST" id="addLogKegiatanForm" class="form-horizontal">
					<input type="hidden" id="id_keg" value="<?php echo @$detail['id_keg']; ?>">
					<div class="box-body">
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="judul_kegiatan" class="col-sm-4 control-label">judul_kegiatan</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="judul_kegiatan" placeholder="judul_kegiatan" required>
									</div>
								</div>
								<div class="form-group">
									<label for="hasil_kegiatan" class="col-sm-4 control-label">hasil_kegiatan</label>
									<div class="col-sm-8">
										<textarea class="form-control" id="hasil_kegiatan" placeholder="hasil_kegiatan" required></textarea>
									</div>
								</div>
								<div class="form-group">
									<label for="tanggal" class="col-sm-4 control-label">tanggal</label>
									<div class="col-sm-8">
										<input type="date" class="form-control" id="tanggal" placeholder="tanggal" required>
									</div>
								</div>
								<div class="form-group">
									<label for="lokasi" class="col-sm-4 control-label">lokasi</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="lokasi" placeholder="lokasi" required>
									</div>
								</div>
								<div class="form-group">
									<label for="file_pendukung" class="col-sm-4 control-label">file_pendukung</label>
									<div class="col-sm-8">
										<input type="file" name="uploadfile[]" class="form-control" id="file_pendukung" placeholder="file_pendukung">
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<table class="table">
									<tr>
										<th>Jabatan</th>
										<th>Nama Peserta</th>
									</tr>
									<tr>
										<td><input type="text" name="nama_peserta[]" class="form-control" placeholder="nama jabatan"></td>
										<td><input type="text" name="jabatan[]" class="form-control" placeholder="nama pserta"></td>
									</tr>
									<tr>
										<td><input type="text" name="nama_peserta[]" class="form-control" placeholder="nama jabatan"></td>
										<td><input type="text" name="jabatan[]" class="form-control" placeholder="nama pserta"></td>
									</tr>
									<tr>
										<td><input type="text" name="nama_peserta[]" class="form-control" placeholder="nama jabatan"></td>
										<td><input type="text" name="jabatan[]" class="form-control" placeholder="nama pserta"></td>
									</tr>
								</table>
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