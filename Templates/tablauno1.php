
<html lang="es" dir="ltr">
<head>
  <meta name="theme-color" content="#317EFB"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">
  <title>Create Good Titles</title>
  <link rel="stylesheet" href="../css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="../js/buttons.dataTables.min.css">
  <link rel="stylesheet" href="../js/semantic.min.css">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/miestilo.css">
  <script src="../js/jquery-3.1.1.min.js"></script>
  <script src="../js/jquery.dataTables.min.js"></script>
  <script type="text/javascript"src="../js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" src="../js/buttons.flash.min.js"></script>
  <script type="text/javascript"src="../js/jszip.min.js"></script>
  <script type="text/javascript" src="../js/vfs_fonts.js"></script>
  <script type="text/javascript" src="../js/buttons.html5.min.js"></script>
  <script src="../js/highcharts.js"></script>
  <script src="../js/series-label.js"></script>
  <script src="../js/exporting.js"></script>
  <script src="../js/export-data.js"></script>
  <script src="../js/drilldown.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/funnel.js"></script>
  <script src="../js/data.js"></script>
  <script src="../js/no-data-to-display.js"></script>
    <script src="../js/bootbox.js"></script>
    <script src="../js/	bootbox.min.js"></script>
    <script src="../js/bootbox.locales.min.js"></script>
</head>
  <style media="screen">
    .cssmenu{
      margin-top: 0px;

    }
    .dt-buttons{
            margin-bottom: 30px;
    }
    .bordermen{
      border: 1px solid #ccc;
      border-radius: 15px;
    }


  </style>
  <script type="text/javascript">


  $(document).ready(function() {

    $('#tablax').DataTable( {
      responsive: true,

      "ajax": {
        url: "../Consultas/tabla/xxxxx.php",
        error: function (jqXHR, textStatus, errorThrown) {
          var mensaje = confirm("No se resfrescaron los datos correctamnente Si desea resfrescar  la tabla haga click en Aceptar");
          //Detectamos si el usuario acepto el mensaje
          if (mensaje) {
            location.reload();
            alert("¡Se actuliazaon los datos!");
          }
          //Detectamos si el usuario denegó el mensaje
          else {
            alert("¡Haz Cancelado  el refresco de la tabla!");
          }
        }
      },
      "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
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

  <body>

    <div class="container-fluid">

      <div class="row">
        <div class="col-sm-1" >
        </div>
        <div class="col-sm-12 table-responsive" >
          <table  id="tablax" class="table table-bordered display nowrap" >
            <thead>
              <tr>

                <th>ID</th>
                <th>Cod de sitio</th>
                <th>Nombre de Sitio</th>
                <th>Dirreción de Sitio</th>
                <th>Región del  Sitio</th>
                <th>Comuna del Sitio</th>
                <th>Tipo de Estructura</th>
                <th>Naturaleza de Sitio</th>
                <th>Tipo de Sitio</th>
                <th>Estado de Contrato</th>
                <th>Prorroga Automatica</th>
                <th>Periodo Prorroga Automatica</th>
                <th>Clasificación de Sitio</th>
                <th>Naturaleza de Sitio</th>
                <th>Tipo de Sitio </th>
                <th>Tipo de Contrato</th>
                <th>Tipo de Propietario</th>
                <th>Tipo de Moneda</th>
                <th>Periodo de Pago</th>
                <th>Renta o Precio Vigente</th>
                <th>Fecha Vigencia Contrato</th>
                <th>Fecha Termino Contrato</th>
                <th>Naturaleza de Sitio</th>
                <th>Tipo de Sitio </th>
                <th>Tipo de Contrato</th>
                <th>Tipo de Propietario</th>
                <th>Tipo de Moneda</th>
              </tr>
            </thead>

            <!-- <tfoot>
              <tr>
                <th colspan="23" style="text-align:center;" >
                </th>
              </tr>
            </tfoot> -->
          </table>
        </div>
        <div class="col-sm-1" >
        </div>
      </div>
    </div>


  </body>
</html>
