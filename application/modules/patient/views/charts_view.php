<script type="text/javascript">
    $(document).ready(function(){
    	var base_url = '<?php echo base_url(); ?>';
	    var text = "<?php echo $chart_text; ?>";
	    var chart_name = "<?php echo $chart_name;?>";
	    var chart_type = "<?php echo $chart_type;?>";
	    var yAxistext ="<?php echo $chart_metric_title;?>";
	    var metric_title_prefix ="<?php echo $chart_metric_prefix;?>";

    	function loadChart(type,text){    
	    var url = base_url+'patient/dashboard/get_chart/' + type;   
	    $.get(url,function(data){
	        Highcharts.chart(type, {
	            chart: {
	                type: chart_type,
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
	                text: text
	            },
	            credits: false,
	            xAxis: {
	                type: 'category'
	            },
	            yAxis: {
	                title: {
	                    text: yAxistext + metric_title_prefix
	                }
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
	                name: 'Regimen',
	                colorByPoint: true,
	                data: data.main
	            }],

	            drilldown: {
	                series: data.drilldown
	            }
	        });
	    });
	}              
    loadChart(chart_name,text);
    });
</script>

