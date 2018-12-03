<script src="<?php echo base_url('assets'); ?>/bower_components/fastclick/lib/fastclick.js"></script>
<script>
$(function(){
	$('#thisDataTable').DataTable({
		'paging'      : true,
		// 'lengthChange': false,
		// 'searching'   : false,
		'ordering'    : true,
		'info'        : true,
		'autoWidth'   : false,
		'serverSide'  : false,
	});
	
	$('#addKegiatanForm').submit(function(){
		nama_keg = $('#nama_keg').val();
		tahun_target = $('#tahun_target').val();
		bulan_target = $('#bulan_target').val();
		abstraksi = $('#abstraksi').val();
		
		$.ajax({
			dataType: "json",
			type: "POST",
			url: "<?php echo site_url('kegiatan/addProcess/'.@$idUnit); ?>",
			data : {
				nama_keg: nama_keg,
				tahun_target: tahun_target,
				bulan_target: bulan_target,
				abstraksi: abstraksi,
				'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
			},
			success: function(data){
				if (data.status){
					window.location.href = "<?php echo site_url(@$backUrl); ?>";
				}
			},
			error: function (jqXHR, textStatus, errorThrown) {
				console.log(jqXHR);
				console.log(textStatus);
				console.log(errorThrown);
			}
		});
		
		return false;
	});
	
	$('#datepicker').datepicker({
		autoclose: true
	});
	$('#timepicker').timepicker({
		timeFormat: 'HH:mm:ss',
		interval: 15,
		showInputs: false,
	});
	
	$('#editKegiatanForm').submit(function(){
		id_keg = $('#id_keg').val();
		nama_keg = $('#nama_keg').val();
		status = $('#status').val();
		abstraksi = $('#abstraksi').val();
		url_ranah = $('#url_ranah').val();
		if(status == 'Selesai'){
			if(url_ranah == ''){
				alert('Masukan Url JDIH');
				$('#url_ranah').focus();
				return false;
			}
		}
		$.ajax({
			dataType: "json",
			type: "POST",
			url: "<?php echo site_url('kegiatan/editProcess'); ?>",
			data : {
				id_keg: id_keg,
				nama_keg: nama_keg,
				status: status,
				abstraksi: abstraksi,
				url_ranah: url_ranah,
				'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
			},
			success: function(data){
				if (data.status){
					window.location.href = "<?php echo site_url($backUrl); ?>";
				}
			},
			error: function (jqXHR, textStatus, errorThrown) {
				console.log(jqXHR);
				console.log(textStatus);
				console.log(errorThrown);
			}
		});
		
		return false;
	});
	
	$('#addLogTargetForm').submit(function(){
		id_keg = $('#id_keg').val();
		tahun_target = $('#tahun_target').val();
		bulan_target = $('#bulan_target').val();
		status = $('#statusTarget').val();
		
		$.ajax({
			dataType: "json",
			type: "POST",
			url: "<?php echo site_url('kegiatan/addTarget'); ?>",
			data : {
				id_keg: id_keg,
				tahun_target: tahun_target,
				bulan_target: bulan_target,
				status: status,
				'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
			},
			success: function(data){
				if (data.status){
					window.location.href = "<?php echo site_url($backUrl); ?>";
				}
			},
			error: function (jqXHR, textStatus, errorThrown) {
				console.log(jqXHR);
				console.log(textStatus);
				console.log(errorThrown);
			}
		});
		
		return false;
	});
	
	$('#addDaftarHadir').click(function(){
		html = '<tr>';
		html += '<td><input type="text" name="jabatan[]" class="form-control" placeholder="nama jabatan"></td>';
		html += '<td><input type="text" name="nama_peserta[]" class="form-control" placeholder="nama peserta"></td>';
		html += '</tr>';
		$('#tblDaftarHadir tbody tr:last').after(html);
	});
	
	$('#addFilePendukung').click(function(){
		html = '<input type="file" name="uploadfile[]" class="form-control" placeholder="file_pendukung">';
		$('#formBerkasPendukung').append(html);
	});
	
	$('#status').change(function(){
		thisVal = $(this).val();
		if (thisVal == 'Selesai'){
			$('#txtRanah').css('display','block');
			$('#url_ranah').attr('required');
		} else {
			$('#txtRanah').css('display','none');
			$('#url_ranah').removeAttr('required');
		}
	});
});
</script>