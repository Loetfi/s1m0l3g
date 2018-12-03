<!--
<pre><?php print_r($tahun); ?></pre>
-->
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
			<div class="box box-success">
				<div class="box-header">
					


					<?php if ($access_edit){ ?>
					<a href="<?php echo site_url('kegiatan/add/'.$idUnit); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Regulasi</a>
					<?php } ?>
					
					<div class="box-tools pull-right">
						<a href="<?php echo site_url($backUrl); ?>" class="btn btn-box-tool"><i class="fa fa-arrow-left"></i></a>
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
					</div>
					
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<?php echo @$message; ?>
					
					<table id="thisDataTable" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>No</th>
								<th>Tahun</th>
								<th>Nama Kegiatan</th>
								<th>Target</th>
								<th>Wkt Input</th>
								<th>Wkt Update</th>
								<th>Wkt Target</th>
								<th>Status</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $no=0; foreach($getAllKegiatan as $row){ ?>
							<tr>
								<td><?php echo ++$no; ?></td>
								<td><?php echo @$row['tahun']; ?></td>
								<td><?php echo @$row['nama_keg']; ?></td>
								<td><?php echo @$row['tahun_pengajuan'].' B'.str_pad($row['id_target'],2,'0',STR_PAD_LEFT); ?></td>
								<td><?php echo @$row['cdate']==''?'':date('Y-m-d H:i',@$row['cdate']); ?></td>
								<td><?php echo @$row['mdate']==''?'':date('Y-m-d H:i',@$row['mdate']); ?></td>
								<td><?php echo @$row['t_cdate']==''?'':date('Y-m-d H:i',@$row['t_cdate']); ?></td>
								<td><?php echo @$row['status']; ?></td>
								<td>
									<a href="<?php echo site_url('kegiatan/detail/'.$row['id_unit'].'/'.$row['id_keg']); ?>" class="btn btn-xs btn-info" title="Detail"><i class="fa fa-eye"></i></a>
									<!-- <?php if ($this->session->userdata('username')){ ?>
									<a href="<?php echo site_url('kegiatan/edit/'.$row['id_unit'].'/'.$row['id_keg']); ?>" class="btn btn-xs btn-warning" title="Edit"><i class="fa fa-pencil"></i></a>
									<a href="<?php echo site_url('kegiatan/addlog/'.$row['id_unit'].'/'.$row['id_keg']); ?>" class="btn btn-xs btn-success" title="Tambah Log"><i class="fa fa-plus"></i></a>
									<?php } ?> -->
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box --> 
		</div>
		<!-- /.col -->
	</div>
</section>
<?php $this->load->view('master/kegiatan_script'); ?>
