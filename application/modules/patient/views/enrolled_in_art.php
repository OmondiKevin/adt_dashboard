<script type="text/javascript">

$(document).ready(function(){
    $.get('<?= @base_url('patient/dashboard/getData'); ?>', function(data){
        Highcharts.chart('enrolled_in_art', {
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
                text: 'PATIENTS ENROLLED IN ART'
            },
            xAxis: {
                type: 'category'
            },
            yAxis: {
                title: {
                    text: 'No. of Patients'
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
                name: 'Sources',
                colorByPoint: true,
                data: data.main
            }],

            drilldown: {
                series: data.drilldown
            }
        });
    });
});
</script>
