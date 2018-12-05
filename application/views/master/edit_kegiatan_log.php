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
				
				<form action="<?php echo site_url('kegiatan/editLogProcess/'.@$idUnit.'/'.@$idKeg.'/'.@$idLog); ?>" method="POST" id="editLogKegiatanForm" class="form-horizontal" enctype="multipart/form-data" target="_blank">
					<input type="hidden" name="id_keg" id="id_keg" value="<?php echo @$detail['id_keg']; ?>">
					<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
					<div class="box-body">
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="judul_kegiatan" class="col-sm-4 control-label">Judul Kegiatan</label>
									<div class="col-sm-8">
										<textarea name="judul_kegiatan" class="form-control" id="judul_kegiatan" placeholder="Judul Kegiatan" required><?php echo @$editdata['judul_kegiatan']; ?></textarea>
									</div>
								</div>
								<div class="form-group">
									<label for="hasil_kegiatan" class="col-sm-4 control-label">Hasil Kegiatan</label>
									<div class="col-sm-8">
										<textarea name="hasil_kegiatan" class="form-control" id="hasil_kegiatan" placeholder="Hasil Kegiatan" required><?php echo @$editdata['hasil_kegiatan']; ?></textarea>
									</div>
								</div>
								<div class="form-group">
									<label for="tanggal" class="col-sm-4 control-label">Tanggal</label>
									<div class="col-sm-8">
										<div class="input-group date">
											<div class="input-group-addon">
												<i class="fa fa-calendar"></i>
											</div>
											<input type="text" name="tanggal" class="form-control pull-right" id="datepicker" value="<?php echo date('d/m/Y',strtotime($editdata['tanggal'])); ?>">
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="tanggal" class="col-sm-4 control-label">Waktu</label>
									<div class="col-sm-8">
										<div class="input-group date">
											<div class="input-group-addon">
												<i class="fa fa-clock-o"></i>
											</div>
											<input type="text" name="waktu" class="form-control" id="timepicker" value="<?php echo date('h:i',strtotime($editdata['tanggal'])); ?>">
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="lokasi" class="col-sm-4 control-label">Lokasi</label>
									<div class="col-sm-8">
										<input type="text" name="lokasi" class="form-control" id="lokasi" placeholder="lokasi" required value="<?php echo $editdata['lokasi']; ?>">
									</div>
								</div>
								<div class="form-group">
									<label for="status" class="col-sm-4 control-label">Status Kegiatan</label>
									<div class="col-sm-8">
										<select name="status" class="form-control" id="status" placeholder="status" required>
											<option value="Aktif" <?php if ($editdata['status']=='Aktif') { echo "selected=''"; } ?>>Aktif</option>
											<option value="Selesai" <?php if ($editdata['status']=='Selesai') { echo "selected=''"; } ?>>Selesai</option>
										</select>
									</div>
								</div>
								<div class="alert alert-info">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
									<strong>File Pendukung saat ini belum bisa diubah</strong>
								</div>
								<!-- <?php 
								$filependukung = explode(';', $editdata['file_pendukung']);
								if (isset($filependukung)) {
									
								foreach ($filependukung as $fp) { ?>
									<div class="form-group">
										<label for="file_pendukung" class="col-sm-4 control-label">File Pendukung</label>
										<div class="col-sm-8">
											<div id="formBerkasPendukung">
												<input type="file" name="uploadfile[]" class="form-control" placeholder="file_pendukung" required>
											</div> 
										</div>
									</div>
								<?php } }?> -->
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

										<?php foreach ($getanggotalog as $get) { ?>
											<tr>
												<td><input value="<?php echo $get['jabatan'];?>" type="text" name="jabatan[]" class="form-control" placeholder="nama posisi" required></td>
												<td><input value="<?php echo $get['nama_peserta'];?>" type="text" name="nama_peserta[]" class="form-control" placeholder="nama peserta" required></td>
											</tr>
										<?php } ?>
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
