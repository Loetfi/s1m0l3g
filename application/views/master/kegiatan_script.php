<script src="<?php echo base_url('assets'); ?>/bower_components/fastclick/lib/fastclick.js"></script>
<script>
$(function(){
	$('#thisDataTable').DataTable({
		'paging'      : true,
		'lengthChange': false,
		'searching'   : false,
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
		tahun_target = $('#tahun_target').val();
		bulan_target = $('#bulan_target').val();
		
		$.ajax({
			dataType: "json",
			type: "POST",
			url: "<?php echo site_url('kegiatan/editProcess'); ?>",
			data : {
				id_keg: id_keg,
				nama_keg: nama_keg,
				status: status,
			},
			success: function(data){
				if (data.status){
					window.location.href = "<?php echo site_url( $this->uri->segment(1)); ?>";
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
	$('#editKegiatanForm').submit(function(){
		id_keg = $('#id_keg').val();
		tahun_target = $('#nama_keg').val();
		status = $('#status').val();
		tahun_target = $('#tahun_target').val();
		bulan_target = $('#bulan_target').val();
		
		$.ajax({
			dataType: "json",
			type: "POST",
			url: "<?php echo site_url('kegiatan/editProcess'); ?>",
			data : {
				id_keg: id_keg,
				nama_keg: nama_keg,
				status: status,
			},
			success: function(data){
				if (data.status){
					window.location.href = "<?php echo site_url( $this->uri->segment(1)); ?>";
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
	
});
</script>