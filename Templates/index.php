 <?php
      // include_once '..\Consultas\container_pie.php';
        include_once '..\Consultas\grafico_1.php';

    //
    // session_start();
    //
    // if ( !isset($_SESSION['estado']) || $_SESSION['estado'] != "ok")
    // {
    // 	header ("Location: ../../login.php");
    // }
    //
    //
    // menu();
?>
<html lang="es" dir="ltr">
  <head>
    <meta name="theme-color" content="#317EFB"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../js/buttons.dataTables.min.css">
    <link rel="stylesheet" href="../js/semantic.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script type="text/javascript" src="../js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>
    <script type="text/javascript"src="../js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="../js/buttons.flash.min.js"></script>
    <script type="text/javascript"src="../js/jszip.min.js"></script>
    <script type="text/javascript" src="../js/vfs_fonts.js"></script>
    <script type="text/javascript" src="../js/buttons.html5.min.js"></script>
    <script  type="text/javascript" src="../js/highcharts.js"></script>
    <script type="text/javascript" src="../js/series-label.js"></script>
    <script type="text/javascript" src="../js/exporting.js"></script>
    <script type="text/javascript" src="../js/export-data.js"></script>
    <script type="text/javascript" src="../js/drilldown.js"></script>
    <script type="text/javascript" src="../js/popper.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/funnel.js"></script>
    <script type="text/javascript" src="../js/data.js"></script>
    <script type="text/javascript" src="../js/no-data-to-display.js"></script>
    <script type="text/javascript" src="../js/highcharts-3d.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/plug-ins/1.10.19/sorting/numeric-comma.js"></script>
    <link rel="stylesheet" href="../css/miestilo.css">
  </head>
   <style media="screen">
   .bordermen{
     border: 1px solid #ccc;
     border-radius: 15px;
   }

   .highcharts-drilldown-data-label text{
     text-decoration:none !important;
     color:black;
   }
      </style>
<!-- body esta en el menu  -->
   <script type="text/javascript">
   $(document).ready(function() {
         $('#grafico1_tabla').DataTable( {

           "footerCallback": function ( row, data, start, end, display ) {
             var api = this.api(), data;
             // Remove the formatting to get integer data for summation
             var intVal = function ( i ) {
               return typeof i === 'string' ?
               i.replace(/[\$,]/g, '')*1 :
               typeof i === 'number' ?
               i : 0;
             };
             // Total over all pages
             total = api
             .column(2)
             .data()
             .reduce( function (a, b) {
               return intVal(a) + intVal(b);
             }, 0 );
             // Total over this page
             pageTotal = api
             .column( 2, { page: 'current'} )
             .data()
             .reduce( function (a, b) {
               return intVal(a) + intVal(b);
             }, 0 );
             // Update footer
             $( api.column( 2 ).footer() ).html(
               'Total =  '+ pageTotal +' de ('+ total +' total)'
             );
           },

           "pageLength": 7,
           "order": [[ 2, "desc" ]],
           "language": {
             "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json",

           },

           dom: 'Bfrtip',
           buttons: [
           {
             extend:'excel',
             text: 'Descargar Excel',
             className: 'btn btn-info',
           }
         ],

         });
      });
    </script>
    <!-- tabla donde utilizo la api DataTable -->
    <body>


      <div class="row bordermen "style="margin:5px; padding:4px;">
      
                  <div class="col-sm-5" >
                    <table  id="grafico1_tabla" class="table table-bordered" >
                      <thead>
                        <tr>
                          <th>Tipo de Red</th>
                          <th>Tipo de Sitio</th>
                            <th>Cantidad</th>
                        </tr>
                      </thead>
                      <tbody>
                        <!-- recorro y imprimo  -->
                        <?php
                        $drildowntotal->execute();
                        while ($row=$drildowntotal->fetch(PDO::FETCH_ASSOC)):
                          extract($row);
                          //$json[]= [(int)$id];

                        $x1 = $tipo_red;
                        $x2 = $Categorias_red;
                          $x3 = $totalidad;
                          ?>
                          <tr >
                            <td><?php echo $x1; ?></td>
                            <td><?php echo $x2; ?></td>
                              <td style="text-align:center;"><?php echo $x3; ?></td>
                          </tr>
                        <?php endwhile; ?>

                      </tbody>
                      <tfoot>
                        <th colspan="3" style="text-align:center;" >
                        </th>
                      </tfoot>
                    </table>
                  </div>
                  <div class="col-sm-7 "  style="">
                    <div id="primergrafico"  ></div>
                      <p style="text-align:right;">&copy; Derechos reservados Patricio zapata.</p>
                  </div>
                </div>



                <script type="text/javascript">
                        // primer grafico
                        var patox =    Highcharts.chart('primergrafico', {

                          chart: {
                            type: 'column',
                            options3d: {
                                enabled: true,
                                depth: 20,
                                viewDistance: 25
                            },
                            events: {
                              drilldown: function (e) {
                                if (!e.seriesOptions) {
                                  // e.point.name is info which bar was clicked
                                  patox.showLoading('Loading ');
                                  /***
                                  where data is this format:  ***/
                                  var name = e.point.name;
                                  //  alert(name);
                                  function obtener_datos(){
                                    var result="";
                                    $.ajax({
                                      url: '../Consultas/grafico_1_drilldwon.php',
                                      method: 'post',
                                      data:{'name':name},
                                      dataType: 'JSON',
                                      success: function datos(data)
                                      {
                                        result = data;

                                        data = {
                                          colorByPoint: true,
                                          name: e.point.name,
                                          data:result
                                        }
                                        setTimeout(function () {
                                          patox.hideLoading();
                                          patox.addSeriesAsDrilldown(e.point, data);
                                        }, 1000);
                                      }
                                      ,
                                      error: function(error){
                                        console.log("Error:");
                                        console.log(error);
                                      }
                                    })
                                    return result;

                                  }
                                  obtener_datos();

                                }

                              }

                            },


                          },
                              title: {
                                  text: 'Sitios por Tipo de Red'
                              },
                              // subtitle: {
                              //     text: 'Click the columns to view versions. Source: <a href="http://statcounter.com" target="_blank">statcounter.com</a>'
                              // },
                              xAxis: {
                                  type: 'category'
                              },
                              yAxis: {
                                title: {
                                  text: 'Cantidad '
                                }

                              },
                              legend: {
                                  layout: 'vertical',
                                  align: 'right',
                                  verticalAlign: 'top',
                                  x: -40,
                                  y: 80,
                                  floating: true,
                                  borderWidth: 1,
                                  backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
                                  shadow: true
                              },
                              plotOptions: {
                                  series: {
                                      dataLabels: {
                                          stacking:'normal',
                                          enabled: true,
                                          format: '{point.y}'
                                      },
                                      point: {
                                          events: {
                                            click: function(e) {
                                              if ( e.point.name === 'RED MOVIL' || e.point.name === 'RED FIJA' || e.point.name === 'RED MOVIL Y FIJA' ) {
                                                console.log('No hago nada xd');
                                              }else {
                                                var fecha = e.point.series.name;
                                                // alert(fecha); // recibe fecha
                                                var name = this.name;
                                                // alert(name);// recibe name
                                                $.ajax({
                                                  url: '../Consultas/tabla/tabla_uno.php',
                                                  method: 'post',
                                                  data:{'name':name,'fecha':fecha},
                                                  success: function(respuesta){
                                                     // la funcion success se ejecuta cuando AJAX ha sido cargado correctamente y la respuesta del archivo es 200 (Correcto)...


                                                    

                                                  },
                                                  error: function(respuesta){ //la funcion error
                                                    // Si algo falla con AJAX o la respuesta del servidor es error aquí defines qué se debe hacer.
                                                  }


                                                  // envia la data
                                                });
                                                  window.open("tablauno1.php", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=0,left=0,width=1000,height=600");

                                              }
                                            }

                                          }
                                      }

                                  }
                              },

                              tooltip: {
                                  headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                                  pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b><br/>'
                              },

                              series:
                              [

                                <?php
                                $grafico1->execute();
                                $total_sitios=[];
                                $tipo_red=[];
                                while ($row=$grafico1->fetch(PDO::FETCH_ASSOC)):
                                  extract($row);
                                  //$json[]= [(int)$id];

                                  $tipo_red = $tipo_red;
                                  $total_sitios = $Tot_sitios;
                                  ?>
                                  {

                                    name: <?php echo json_encode($tipo_red); ?>,
                                    data: [{
                                      name: <?php echo  json_encode($tipo_red);   ?>,
                                      y:   <?php echo $total_sitios ?>,
                                      drilldown: <?php echo json_encode($tipo_red); ?>,

                                    }],

                                  },
                                  <?php endwhile; ?>


                              ],
                              drilldown: {
                                series: [


                                   ]

                                 },


                          });
                      </script>
  </body>
</html>
<!-- termino de la conexiones  -->
<?php
  $dbcon =null;
  $stmt=null;
  $stmtx=null;
  $stmtxp=null;
  $consulta=null;
 ?>
