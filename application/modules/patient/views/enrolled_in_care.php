<script type="text/javascript">

$(document).ready(function(){
	$.get('<?= @base_url('patient/dashboard/getData'); ?>', function(data){
		Highcharts.chart('enrolled_in_care', {
		    chart: {
		        type: 'column',
		        events: {
		            drilldown: function (e) {
		                if (!e.seriesOptions) {

		                    var chart = this,
		                        drilldowns = data.drilldown,
		                        series = drilldowns[e.point.name];

		                    // Show the loading label
		                    chart.showLoading('loading...');

		                    setTimeout(function () {
		                        chart.hideLoading();
		                        chart.addSeriesAsDrilldown(e.point, series);
		                    }, 1000);
		                }

		            }
		        }
		    },
		    title: {
		        text: 'PATIENTS ENROLLED IN CARE'
		    },
		    xAxis: {
		        type: 'category'
		    },

		    legend: {
		        enabled: false
		    },

		    plotOptions: {
		        series: {
		            borderWidth: 0,
		            dataLabels: {
		                enabled: true
		            }
		        }
		    },

		    series: [{
		        name: 'Things',
		        colorByPoint: true,
		        data: data.main
		    }],

		    drilldown: {
		        series: []
		    }
		});
	});
});
</script>
