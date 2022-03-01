@extends('layouts.admin.inner')
@section('content')

	<!-- start content area here -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<div class="content_area">
			<div class="top3_area">
				<div class="row">
					<aside class="col-lg-3">
					<div class="white_three">
							<span style="background:#ff3300;"><i class="fa fa-user" aria-hidden="true"></i></span>
							<h3 style="color:#ff3300;">{{@$personal_user}}</h3>
							<p class="text-uppercase">Personal Users</p>
						</div>
					</aside>
					<aside class="col-lg-3">
						<div class="white_three">
							<span style="background:#62c23b;"><i class="fa fa-user" aria-hidden="true"></i></span>
							<h3 style="color:#62c23b;">{{@$business_user}}</h3>
							<p class="text-uppercase">Business Users</p>
						</div>
					</aside>
					<aside class="col-lg-3">
						<div class="white_three">
							<span style="background:#dd3cc7;"><i class="fa fa-user" aria-hidden="true"></i></span>
							<h3 style="color:#dd3cc7;">{{@$coach_count}}</h3>
							<p class="text-uppercase">Total Coaches</p>
						</div>
					</aside>
					<aside class="col-lg-3">
						<div class="white_three">
							<span style="background:#1ad1ff;"><i class="fa fa-window-close-o" aria-hidden="true"></i></span>
							<h3 style="color:#1ad1ff;">{{@$verified_user}}</h3>
							<p class="text-uppercase">Certified Coaches</p>
						</div>
					</aside>
				</div>
				<div class="row">
					<aside class="col-lg-3">
						<div class="white_three">
							<span style="background:#f4740b;"><i class="fa fa-window-close-o" aria-hidden="true"></i></span>
							<h3 style="color:#f4740b;">{{@$suspend_user}}</h3>
							<p class="text-uppercase">Suspended Users</p>
						</div>
					</aside>
					<aside class="col-lg-3">
						<div class="white_three">
							<span style="background:#5252e0;"><i class="fa fa-window-close-o" aria-hidden="true"></i></span>
							<h3 style="color:#5252e0;">{{ @$class_count}}</h3>
							<p class="text-uppercase">Total Classes</p>
						</div>
					</aside>
					<aside class="col-lg-3">
						<div class="white_three">
							<span style="background:#0cc2aa;"><i class="fa fa-file" aria-hidden="true"></i></span>
							<h3 style="color:#0cc2aa;">{{ @$program_count}}</h3>
							<p class="text-uppercase">TOTAL Programs</p>
						</div>
					</aside>
					<aside class="col-lg-3">
						<div class="white_three">
							<span style="background:#ffaa00;"><i class="fa fa-file" aria-hidden="true"></i></span>
							<h3 style="color:#ffaa00;">{{@$category_count}}</h3>
							<p class="text-uppercase">Total Category</p>
						</div>
					</aside>
				</div>
			</div>
			 <!-- highchart for user daily report-->
		<div class="row panel-body">
			<div class="col-md-6">
				<div id="userChart"></div>
			</div>
			<div class="col-md-6">
                <div id="pie-chart"></div>
			</div>
    	</div>

	<script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script type="text/javascript">
    var userData = <?php echo json_encode($users_data)?>;
    var monthList = <?php echo json_encode($monthList)?>;


    Highcharts.chart('userChart', {
        title: {
            text: 'Users'
        },
        subtitle: {
            text: 'Daily Users Records'
        },
        xAxis: {
            categories: monthList
        },
        yAxis: {
            title: {
                text: 'Number of New Users'
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
            series: {
                allowPointSelect: true
            }
        },
        series: [{
            name: 'New Users',
            data: userData
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
    });

</script>
    <script>
    Highcharts.chart('pie-chart', {
	  chart: {
	    plotBackgroundColor: null,
	    plotBorderWidth: null,
	    plotShadow: false,
	    type: 'pie'
	  },
	  title: {
	    text: 'Users [in percent (%)]'
	  },
	  tooltip: {
	    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
	  },
	  accessibility: {
	    point: {
	      valueSuffix: '%'
	    }
	  },
	  plotOptions: {
	    pie: {
	      allowPointSelect: true,
	      cursor: 'pointer',
	      dataLabels: {
	        enabled: false,
	        format: '<b>{point.name}</b>: {point.percentage:.1f} %'
	      },
	    showInLegend: true
	    }
	  },
	  series: [{
	        name: 'Users',
	        colorByPoint: true,
	        data: <?= @$pieChart ?>
	    }]
	});

    </script>
@endsection
