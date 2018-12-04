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
		<div class="col-md-6">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Detail</h3>
					<div class="box-tools pull-right">
						<a href="<?php echo site_url(@$backUrl); ?>" class="btn btn-box-tool"><i class="fa fa-arrow-left"></i></a>
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
					</div>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
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
		
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Form Tambah Log Kegiatan</h3>
					<div class="box-tools pull-right">
						<a href="<?php echo site_url(@$backUrl); ?>" class="btn btn-box-tool"><i class="fa fa-arrow-left"></i></a>
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
					</div>
				</div>
				<!-- /.box-header -->
				
				<form action="<?php echo site_url('kegiatan/addLogProcess/'.@$idUnit); ?>" method="POST" id="addLogKegiatanForm" enctype="multipart/form-data">
					<input type="hidden" name="id_keg" id="id_keg" value="<?php echo @$detail['id_keg']; ?>">
					<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
					<div class="box-body">
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="judul_kegiatan" class="control-label">Judul Kegiatan</label>
										<textarea name="judul_kegiatan" class="form-control" id="judul_kegiatan" placeholder="Judul Kegiatan" required></textarea>
									<div class="col-sm-8">
									</div>
								</div>
								<div class="form-group">
									<label for="hasil_kegiatan" class="control-label">Hasil Kegiatan</label>
										<textarea name="hasil_kegiatan" class="form-control" id="hasil_kegiatan" placeholder="Hasil Kegiatan" required></textarea>
									<div class="col-sm-8">
									</div>
								</div>
								<div class="form-group">
									<label for="tanggal" class="control-label">Tanggal</label>
										<div class="input-group date">
											<div class="input-group-addon">
												<i class="fa fa-calendar"></i>
											</div>
											<input type="text" name="tanggal" class="form-control pull-right" id="datepicker">
										</div>
									<div class="col-sm-8">
									</div>
								</div>
								<div class="form-group">
									<label for="tanggal" class="control-label">Waktu</label>
										<div class="input-group date">
											<div class="input-group-addon">
												<i class="fa fa-clock-o"></i>
											</div>
											<input type="text" name="waktu" class="form-control" id="timepicker">
										</div>
									<div class="col-sm-8">
									</div>
								</div>
								<div class="form-group">
									<label for="lokasi" class="control-label">Lokasi</label>
										<input type="text" name="lokasi" class="form-control" id="lokasi" placeholder="lokasi" required>
									<div class="col-sm-8">
									</div>
								</div>
								<div class="form-group">
									<label for="status" class="control-label">Status Kegiatan</label>
										<select name="status" class="form-control" id="status" placeholder="status" required>
											<option value="Aktif">Aktif</option>
											<option value="Selesai">Selesai</option>
										</select>
									<div class="col-sm-8">
									</div>
								</div>
								<div class="form-group">
									<label for="file_pendukung" class="control-label">File Pendukung</label>
										<div id="formBerkasPendukung">
										<input type="file" name="uploadfile[]" class="form-control" placeholder="file_pendukung" required>
										</div>
										<div>
											<button type="button" class="btn btn-default btn-sm pull-right" id="addFilePendukung"><i class="fa fa-plus"></i> Tambah File Pendukung</button>
										</div>
									<div class="col-sm-8">
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<table class="table" id="tblDaftarHadir">
									<thead>
									<tr>
										<th colspan="2" style="text-align: center;">Daftar Hadir</th>
									</tr>
									<tr>
										<th>Posisi/Sebagai</th>
										<th>Nama Peserta</th>
									</tr>
									</thead>
									<tbody>
									<tr>
										<td><input type="text" name="jabatan[]" class="form-control" placeholder="nama posisi" required></td>
										<td><input type="text" name="nama_peserta[]" class="form-control" placeholder="nama peserta" required></td>
									</tr>
									<tr>
										<td><input type="text" name="jabatan[]" class="form-control" placeholder="nama posisi" required></td>
										<td><input type="text" name="nama_peserta[]" class="form-control" placeholder="nama peserta" required></td>
									</tr>
									</tbody>
									<tfoot>
									<tr>
										<td></td>
										<td><button type="button" class="btn btn-default btn-sm pull-right" id="addDaftarHadir"><i class="fa fa-plus"></i> Tambah Daftar Hadir</button></td>
									</tr>
									</tfoot>
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
<script>
$(function(){
	CKEDITOR.replace('hasil_kegiatan');
});
</script>