
<section class="content-header">
	<h1>
		<?php echo @$title; ?>
	</h1>
</section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-success">
				<div class="box-header"> 
					
				</div>
				<!-- /.box-header -->
				<div class="box-body"> 
					<!-- form start -->
					<form role="form" action="<?php echo site_url('pengguna/add_proses/') ?>" method="POST">
						<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
						<div class="box-body">
							<div class="form-group">
								<label for="exampleInputEmail1">Nama</label>
								<input type="text" class="form-control" id="text" placeholder="Masukan Nama Lengkap" name="nama" required="">
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Email </label>
								<input type="email" class="form-control" id="email" placeholder="Masukan Email" name="email" required="">
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Password</label>
								<input type="password" class="form-control" id="password" placeholder="Masukan Kata Sandi" name="password" required="">
							</div>
							<div class="form-group">
								<label for="exampleInputFile">Grup Akses</label>
								<select class="form-control" name="grup_akses" required="">
									<option value="1">Admin Utama</option>
									<option value="2">Admin Unit</option>
									<option value="3">User Unit</option>
									
								</select>
							</div>

							<div class="form-group">
								<label for="exampleInputFile">Unit </label>
								<select class="form-control" name="unit" required="">
									<?php foreach ($unit as $units) { ?>
										<option value="<?php echo $units->id_unit;?>"><?php echo $units->nama_unit;?></option>
									<?php } ?>
									
								</select> 
							</div> 
						</div>
						<!-- /.box-body -->

						<div class="box-footer">
							<button type="submit" class="btn btn-success btn-sm">Buat Pengguna</button>
						</div>
					</form> 
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box --> 
		</div>
		<!-- /.col -->
	</div>
</section>
<?php $this->load->view('master/kegiatan_script'); ?>
