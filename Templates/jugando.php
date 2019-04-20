<?php

      include_once '..\Consultas\grafico2.3.php';

?>
<html lang="es" dir="ltr">
  <head>
    <meta name="theme-color" content="#317EFB"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title>Create Good Titles</title>
    <script language="JavaScript" type="text/javascript" src="../js/jquery-3.1.1.min.js"></script>
    <script src="../js/highcharts.js"></script>
    <script src="../js/series-label.js"></script>
    <script src="../js/exporting.js"></script>
    <script src="../js/export-data.js"></script>
    <script src="../js/drilldown.js"></script>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  <script src="https://code.highcharts.com/modules/funnel.js"></script>
  <script src="https://code.highcharts.com/modules/data.js"></script>
    <link rel="stylesheet" href="../css/jquery.dataTables.min.css">
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/no-data-to-display.js"></script>
    <link rel="stylesheet" href="../css/miestilo.css">
  </head>
  <style media="screen">
    .cssmenu{
      margin-top: -30px;

    }

  </style>

    <!-- body esta en el menu  -->
        <!-- tabla donde utilizo la api DataTable -->
        <body>
          <main>
            <div class="container-fluid">
              <!-- Control the column width, and how they should appear on different devices -->
              <p>Sitios por red(1)</p>
              <div class="row">
                <div class="col-sm-12"  style="background-color:yellow;">
                  <div id="container" ></div>
                </div>

              </div>
            </div>
            <script type="text/javascript">
              var chart;
              document.addEventListener('DOMContentLoaded', function() {
                chart = Highcharts.chart('container', {
                  chart: {
                    type: 'spline',
                    events: {
                      load: requestData
                    }
                  },
                  title: {
                    text: 'Live random data'
                  },
                  xAxis: {
                    type: 'datetime',
                    tickPixelInterval: 150,
                    maxZoom: 20 * 1000
                  },
                  yAxis: {
                    minPadding: 0.2,
                    maxPadding: 0.2,
                    title: {
                      text: 'Value',
                      margin: 80
                    }
                  },
                  series: [{
                    name: 'Random data',
                    data: []
                  }]
                });
              });

              function requestData() {
                $.ajax({
                  url: '../Consultas/live-server-data.php',
                  success: function(point) {
                    var series = chart.series[0],
                    shift = series.data.length > 20; // shift if the series is
                    // longer than 20

                    // add the point
                    chart.series[0].addPoint(point, true, shift);

                    // call it again after one second
                    setTimeout(requestData, 1000);
                  },
                  cache: false
                });
              }
            </script>


      </main>
    </body>
</html>
<!-- termino de la conexiones  -->
<?php
  $dbcon =null;
  $grafico1=null;
  $totalidad=null;
  $grafico_drilldown=null;
  $grafico_moviles=null;
  $grafico_sininfo=null;
  $drildowntotal= null;

 ?>
