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
					<a href="<?php echo site_url('pengguna/add/') ?>" class="btn btn-success "><i class="fa fa-plus"></i> Tambah Pengguna</a>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<table id="thisDataTable" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>ID User</th>
								<th>Nama</th>
								<th>Role</th>
								<th>Unit</th>
								<th>Status</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php for ($i=0; $i < 10; $i++) {  ?>
							<tr>
								 <td></td>
								 <td></td>
								 <td></td>
								 <td></td>
								 <td></td>
								 <td>
								 	<div class="btn-group">
								 		<a href="" class="btn btn-default btn-sm">Aksi</a>
								 		<a href="" class="btn btn-default btn-sm">Aksi</a>
								 		<a href="" class="btn btn-danger btn-sm">Aksi</a>
								 	</div>
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
