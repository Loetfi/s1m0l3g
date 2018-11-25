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
					
				</div>
				<!-- /.box-header -->
				<div class="box-body"> 
						<form action="" method="POST" class="form-horizontal" role="form">
								<div class="form-group">
									<legend>Form title</legend>
								</div>
								username 
							<input type="text" name="">
							password
							<input type="text" name="">
							role
							<select>
								<option>Admin Utama</option>
								<option>Admin Unit</option>
								<option>User Unit</option>
							</select>
								
						
								<div class="form-group">
									<div class="col-sm-10 col-sm-offset-2">
										<button type="submit" class="btn btn-success btn-sm">Submit</button>
									</div>
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
