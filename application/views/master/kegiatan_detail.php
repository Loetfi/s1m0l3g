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
					<h3 class="box-title">Detail</h3>
					<div class="box-tools pull-right">
						<a href="<?php echo site_url($backUrl); ?>" class="btn btn-box-tool"><i class="fa fa-arrow-left"></i></a>
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
						<?php if ($this->session->userdata('username')){ ?>
						<tr>
							<th></th>
							<td>
								<a href="<?php echo site_url('kegiatan/edit/'.$detail['id_unit'].'/'.$detail['id_keg']); ?>" class="btn btn-warning" title="Edit"><i class="fa fa-pencil"></i> Edit</a>
								<a href="<?php echo site_url('kegiatan/addlog/'.$detail['id_unit'].'/'.$detail['id_keg']); ?>" class="btn btn-success" title="Tambah Log"><i class="fa fa-plus"></i> Tambah Kegiatan</a>
							</td>
						</tr>
						<?php } ?>
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
							<td><?php echo @$dataLogTarget['cdate'] == '' ? '-' : date('d F Y H:i:s', $dataLogTarget['cdate']); ?></td>
							<td><?php echo @$dataLogTarget['mdate'] == '' ? '-' : date('d F Y H:i:s', $dataLogTarget['mdate']); ?></td>
						</tr>
						<?php } ?>
					</table>
				</div>
				<!-- /.box-body -->
				
			</div>
			<!-- /.box --> 
		</div>
	</div>
	
	<!-- row -->
	<div class="row">
		<div class="col-md-12">
			<!-- The time line -->
			<ul class="timeline">
				<?php foreach($allLogKegiatan as $row){ ?>
				<li class="time-label">
					<span class="bg-red">
						<i class="fa fa-calendar"></i> <?php echo $row['tanggal']; ?><br>
					</span>
				</li>
				<li>
					<i class="fa fa-envelope bg-blue"></i>
					<div class="timeline-item">
						<span class="time"><i class="fa fa-clock-o"></i> <?php echo $row['waktu']; ?></span>
						<span class="time"><i class="fa fa-map-marker"></i> <?php echo $row['lokasi']; ?></span>

						<h3 class="timeline-header"><a href="#"><?php echo $row['judul_kegiatan']; ?></a></h3>

						<div class="timeline-body"><?php echo $row['hasil_kegiatan']; ?></div>
						<div class="timeline-footer">
							<?php if ($row['file']) foreach($row['file'] as $rowFile){ ?>
							<a href="<?php echo site_url('kegiatan/downloadFile/'.@$detail['id_keg'].'/'.$row['id_log'].'/'.$rowFile['namaFile']); ?>" class="btn btn-info btn-xs">
								<i class="fa fa-cloud-download"></i> <?php echo $rowFile['namaFileAsli']; ?>
							</a>
							<?php } ?>
						</div>
					</div>
				</li>
				<li>
					<i class="fa fa-user bg-aqua"></i>
					<div class="timeline-item">
						<h3 class="timeline-header no-border">
							<?php foreach($allLogAnggota[$row['id_log']] as $anggota){ ?>
							<?php echo $anggota['jabatan']; ?>: <a href="#"><?php echo $anggota['nama_peserta']; ?></a><br>
							<?php } ?>
						</h3>
					</div>
				</li>
				<?php } ?>
				
			</ul>
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->
</section>
<?php $this->load->view('master/kegiatan_script'); ?>