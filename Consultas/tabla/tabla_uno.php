<?php
//Utilize la siguienyte pagina https://geekytheory.com/json-ii-creacion-de-un-json-a-partir-de-una-consulta-en-mysql
//declaro el metodo
function getArraySQL(){
  //traigo la conexion de  la base datos
	include_once '../../Conexion/Conexion.php';
	$name = isset($_POST['name']) ? $_POST['name'] : '';

	$fecha = isset($_POST['fecha']) ? $_POST['fecha'] : '';

//realizo la query
$segundodrilldownx=$dbcon->prepare("
select sitio_cod,estado_sitio,
SITIO_NOMBRE,SITIO_DIRECCION,COORD_LAT,COORD_LON,REG_ID,COM_ID,TEST_NOMBRE,EST_ALTURA,METROS_ARRENDADOS,SITIO_PROPIETARIO,NAT_NOMBRE,TSIT_NOMBRE,CAT_NOMBRE,CAT_NOMBRE_2
,CAT_NOMBRE_3,CONDICION_LDA,SITIO_CODPOSTAL,SITIO_ALTURA_PARARRAYOS,SITIO_TIPO_ARMONIZACION,SITIO_ENTEL,TIPO_RED,ICAR,FDT,LLOO,BAFI
from tabla_neg_sitio
where tipo_red='$fecha' && SITIO_ENTEL='SI' and tsit_nombre ='$name'

group by sitio_cod
");
// where tipo_red='$fecha' && SITIO_ENTEL='SI' and tsit_nombre ='$name'
//uinstacio la query para qure se ejecute
$segundodrilldownx->execute();

$rawdata = array(); //creamos un array
$i=0;//guardamos en un array multidimensional todos los datos de la consulta

  while ($row=$segundodrilldownx->fetch(PDO::FETCH_ASSOC)):
    extract($row);
    $arrayName = array($sitio_cod,$estado_sitio,$SITIO_NOMBRE,$SITIO_DIRECCION,$COORD_LAT,$COORD_LON,$REG_ID,$COM_ID,$TEST_NOMBRE,$EST_ALTURA,$METROS_ARRENDADOS,$SITIO_PROPIETARIO,$NAT_NOMBRE,$TSIT_NOMBRE,$CAT_NOMBRE,$CAT_NOMBRE_2,$CAT_NOMBRE_3,$CONDICION_LDA,$SITIO_CODPOSTAL,$SITIO_ALTURA_PARARRAYOS,$SITIO_TIPO_ARMONIZACION,$SITIO_ENTEL,$TIPO_RED,$ICAR,$FDT,$LLOO,$BAFI );
    $rawdata[$i] = $arrayName;
    $i++;
  endwhile;
return $rawdata;//devolvemos el array
}
   //toma la funcion y la guardo en una varibale
   $myArray = getArraySQL();
   //creo un array sobre el array para llevar a cabo el formato
   $arrayName = array("data"=>$myArray );
	  // echo json_encode($arrayName);
   // aca imprimo los datos en formato que desea y json_encode para lograr que este el array sobre el array

	 session_start();
	 $_SESSION["datos1"] = $arrayName;

// session_start();
// 	 echo json_encode($_SESSION["datos1"]);

 ?>
