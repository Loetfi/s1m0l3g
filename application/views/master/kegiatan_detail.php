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
		<div class="col-md-6">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Log Target Kegiatan</h3>
					<div class="box-tools pull-right">
						<a href="<?php echo site_url( $this->uri->segment(1)); ?>" class="btn btn-box-tool"><i class="fa fa-arrow-left"></i></a>
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
				<li class="time-label">
							<span class="bg-red">
								10 Oct. 2018
							</span>
				</li>
				<li>
					<i class="fa fa-envelope bg-blue"></i>

					<div class="timeline-item">
						<span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

						<h3 class="timeline-header"><a href="#">Judul Kegiatan</a>, lokasi: jakarta</h3>

						<div class="timeline-body">
							Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
							weebly ning heekya handango imeem plugg dopplr jibjab, movity
							jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
							quora plaxo ideeli hulu weebly balihoo...
						</div>
						<div class="timeline-footer">
							<a class="btn btn-success btn-xs">file pertama</a>
							<a class="btn btn-success btn-xs">file pertama</a>
							<a class="btn btn-success btn-xs">file pertama</a>
							<a class="btn btn-success btn-xs">file pertama</a>
							<a class="btn btn-success btn-xs">file pertama</a>
						</div>
					</div>
				</li>
				<li>
					<i class="fa fa-user bg-aqua"></i>

					<div class="timeline-item">
						<h3 class="timeline-header no-border">
							Jabatan: <a href="#">Sarah Young</a><br>
							Jabatan: <a href="#">Sarah Young</a><br>
							Jabatan: <a href="#">Sarah Young</a><br>
						</h3>
					</div>
				</li>
				
				<li class="time-label">
							<span class="bg-red">
								10 Feb. 2018
							</span>
				</li>
				<li>
					<i class="fa fa-envelope bg-blue"></i>

					<div class="timeline-item">
						<span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

						<h3 class="timeline-header"><a href="#">Judul Kegiatan</a>, lokasi: jakarta</h3>

						<div class="timeline-body">
							Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
							weebly ning heekya handango imeem plugg dopplr jibjab, movity
							jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
							quora plaxo ideeli hulu weebly balihoo...
						</div>
						<div class="timeline-footer">
							<a class="btn btn-success btn-xs">file pertama</a>
							<a class="btn btn-success btn-xs">file pertama</a>
							<a class="btn btn-success btn-xs">file pertama</a>
							<a class="btn btn-success btn-xs">file pertama</a>
							<a class="btn btn-success btn-xs">file pertama</a>
						</div>
					</div>
				</li>
				<li>
					<i class="fa fa-user bg-aqua"></i>

					<div class="timeline-item">
						<h3 class="timeline-header no-border">
							Jabatan: <a href="#">Sarah Young</a><br>
							Jabatan: <a href="#">Sarah Young</a><br>
							Jabatan: <a href="#">Sarah Young</a><br>
						</h3>
					</div>
				</li>
				
			</ul>
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->
</section>
<?php $this->load->view('master/kegiatan_script'); ?>