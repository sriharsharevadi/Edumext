<?php
 $redis = new Redis(); 
   $redis->connect('127.0.0.1', 6379); 
//echo "Connected successfully";
/*
$someArray= $redis->sort ('Ecofr_1', array(
    'by' => 'Ecofr_1:*->Time_stamp',
    'limit' => array("64560", "100"),
    'get' =>'Ecofr_1:*->A01'));
$someJSON = json_encode($someArray);
*/
 $machine_number=$_GET['machine_number'];
 //echo $machine_number;
 $day=$_GET['day'];
 //echo $day;
 $hour=$_GET['hour'];
 //echo $hour;
?>

<html>
 <head>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

<!-- Additional files for the Highslide popup effect -->
<script src="https://www.highcharts.com/media/com_demo/js/highslide-full.min.js"></script>
<script src="https://www.highcharts.com/media/com_demo/js/highslide.config.js" charset="utf-8"></script>
<link rel="stylesheet" type="text/css" href="https://www.highcharts.com/media/com_demo/css/highslide.css" />
 </head>
 <script type="text/javascript">
 // Get the CSV and create the chart
 var tablename =<?php echo $machine_number?>;
 var day_1 =<?php echo $day?>;
 var hour_1 =<?php echo $hour?>;
 var hour_2= hour_1+1;
$.getJSON('database.php?name='+tablename+'&day='+day_1+'&hour='+hour_1, function (csv) {

    Highcharts.chart('container', {

     //   data: {
      //      csv: csv.data
      //  },

        title: {
            text: 'Ecozen Solutions'
        },

        subtitle: {
            text: 'Machine_id:'+tablename+'  Time:'+hour_1+':00-'+hour_2+':00'
        },

        xAxis: {
            type: 'datetime',
        dateTimeLabelFormats: { // don't display the dummy year
            month: '%e. %b',
            year: '%b'
        },

             pointStart: Date.UTC(2013, 0, 1),
        
            tickInterval: 1000*10, // one week
            tickWidth: 1,
            gridLineWidth: 1,
            labels: {
                align: 'left',
                x: 3,
                y: -3,
                //format: '{value:.,0f}'
            }
        },

        yAxis: [{ // left y axis
            title: {
                text: null
            },
            labels: {
                align: 'left',
                x: 3,
                y: 16,
                format: '{value:.,0f}'
            },
            showFirstLabel: false
        }, { // right y axis
            linkedTo: 0,
            gridLineWidth: 0,
            opposite: true,
            title: {
                text: null
            },
            labels: {
                align: 'right',
                x: -3,
                y: 16,
                format: '{value:.,0f}'
            },
            showFirstLabel: false
        }],

        legend: {
            align: 'left',
            verticalAlign: 'top',
            borderWidth: 0
        },

        tooltip: {
            shared: true,
            crosshairs: true
        },

        plotOptions: {
            series: {
                pointInterval:  1000,
                cursor: 'pointer',
                point: {
                    events: {
                        click: function (e) {
                            hs.htmlExpand(null, {
                                pageOrigin: {
                                    x: e.pageX || e.clientX,
                                    y: e.pageY || e.clientY
                                },
                                headingText: this.series.name,
                                maincontentText: Highcharts.dateFormat('%A, %b %e, %Y', this.x) + ':<br/> ' +
                                    this.y + ' visits',
                                width: 200
                            });
                        }
                    }
                },
                marker: {
                    lineWidth: 1
                }
            }
        },


        series: [{
            name: 'Temperature',
            data: csv.data_1,
            lineWidth: 4,
            marker: {
                radius: 4
            }
        }, {
            name: 'Set Point',
            

            data: csv.data_2
        },
        {
            name: 'Humidity' ,
            visible:false,
            data: csv.data_3
        },
        {
            name: 'TES1',
            data: csv.data_4
        },
        {
            name: 'TES2',
            data: csv.data_5
        },
        {
            name: 'Power',
            data: csv.data_6,
            visible:false,
        },
        {
            name: 'Battery',
            visible:false,
            data: csv.data_7
        },


      ]
    });
});
</script>

 <body>


</script>

 <body>
 



<div id="container" style="min-width: 310px; height: 600px; margin: 0 auto"></div>



 
</body>
</html>