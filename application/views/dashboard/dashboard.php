<section class="content-header">
	<h1>
		<?php echo @$title; ?>
	</h1>
</section>

<script type="text/javascript" src="http://code.highcharts.com/highcharts.js"></script>


<!-- Main content -->
<section class="content">
  <div class="row">

    <div class="col-md-12">
    <!-- BAR CHART -->
    <div class="box box-success">
      <div class="box-header with-border">
        <h3 class="box-title">Bagan Total Kegiatan Pertahun</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="box-body">
        <div class="chart">
          <div id="pencapaian_kegiatan" style="height: 300px"></div>
        </div>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
 



    </div>
    <!-- /.col (RIGHT) -->
  </div>
  <!-- /.row -->

</section>
<!-- /.content -->
<!-- </div> -->






<script type="text/javascript">
  
Highcharts.chart('pencapaian_kegiatan', {
  credits: { enabled: false },
  colors: ['#008d4c','#e08e0b','#8bbc21','#1aadce'],
  chart: {
        type: 'column'
    },
    title: {
        text: 'Pencapaian Pemrakarsa'
    },
    xAxis: {
        categories: [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun',
            'Jul',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec'
        ]
    },
  yAxis: [{
        title: {
            text: 'Total'
        }
    }],
  legend: {
        shadow: true
    },
  tooltip: {
        shared: true
    },
  series: [{
    type: 'column',
        name: 'Selesai',
        data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, null, null]

    }, {
    type: 'column',
        name: 'Belum Selesai',
        data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, null, null]

    }]
});
</script>

 
