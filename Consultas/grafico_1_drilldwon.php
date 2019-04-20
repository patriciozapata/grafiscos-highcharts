<?php


include_once '..\Conexion\Conexion.php';
//consulta realizada para visualozar los usuarios por filtro root
//se realiza misma operacion que la anterior pero filtrando por usuarios dmeneses

$name = isset($_POST['name']) ? $_POST['name'] : '';

// Set the JSON header


$dbcon->setAttribute( PDO::ATTR_EMULATE_PREPARES, false );//linea magica



$grafico_moviles=$dbcon->prepare("select case when isnull(tsit_nombre) then 'Sin Info' when tsit_nombre= '' then 'null' else tsit_nombre end as Categorias_red ,count(sitio_cod) as totalidad
from tabla_neg_sitio
where tipo_red='$name' && SITIO_ENTEL='SI'
group by case when isnull(tsit_nombre) then 'Sin Info' else tsit_nombre end
order by totalidad desc");



$grafico_moviles->execute();
$arr= $grafico_moviles->fetchAll(PDO::FETCH_NUM);

if(!$arr)exit('No filas');

echo json_encode($arr);
$grafico_moviles=null;


 ?>
