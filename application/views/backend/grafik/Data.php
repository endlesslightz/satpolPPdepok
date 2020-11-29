<!DOCTYPE HTML>
<html>
    <head>
        <title>Grafik</title>
        <script src="<?php echo base_url(); ?>assets/backend/js/jquery.js"></script>
        <script type="text/javascript">
            var chart;
            $(document).ready(function () {
                chart = new Highcharts.Chart({
                    chart: {
                        renderTo: 'container',
                        type: 'column',
                        zoomType: 'x',
                        events: {
                            load: requestData
                        }
                    },
                    title: {
                        text: 'Grafik Jumlah Hari Kerja Tahun <?php echo $tahun ?>'
                    },
                    subtitle: {
                        text: document.ontouchstart === undefined ?
                                'Klik dan tarik area grafik untuk memperbesar' :
                                'Pinch the chart to zoom in'
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
                        ],
                        crosshair: true
                    },
                    yAxis: {
                        title: {
                            text: 'Jumlah Hari'
                        },
                        lineWidth: 2,
                        min: 0
                    },
                    legend: {
                        enabled: true
                    },
                    credits: {
                        enabled: false
                    },
                    plotOptions: {
                        area: {

                            marker: {
                                radius: 2
                            },
                            lineWidth: 1,
                            states: {
                                hover: {
                                    lineWidth: 1
                                }
                            },
                            threshold: null
                        }
                    },
                    series: [{
       name: 'Jumlah Hari',
       data: [0,0,0,0,0,0,0,0,0,0,0,0]
   }]
                });
            });
            function requestData() {
                $.ajax({
                    url: '<?php echo site_url()."backend/grafik/data_pres?id=".$id."&tahun=".$tahun; ?>',
                    dataType: 'text',
                    success: function (data) {
                        chart.series[0].setData(JSON.parse(data));
                        setTimeout(requestData, 600000);
                    },
                    cache: false
                });
            }
        </script>
    </head>
    <body>
        <script src="<?php echo base_url(); ?>assets/highchart/js/highcharts.js"></script>
        <script src="<?php echo base_url(); ?>assets/highchart/js/modules/exporting.js"></script>
        <div id="container" style="min-width: 310px; height: 310px; margin: 0 auto;" ></div>
    </body>
</html>
