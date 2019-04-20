<?php


include_once '..\Conexion\Conexion.php';
//consulta realizada para visualozar los usuarios por filtro root
//se realiza misma operacion que la anterior pero filtrando por usuarios dmeneses


$grafico1=$dbcon->prepare("select case when isnull(tipo_red) then 'Sin Info' else tipo_red end as tipo_red ,count(sitio_cod) as Tot_sitios from tabla_neg_sitio
where SITIO_ENTEL='SI'
group by case when isnull(tipo_red) then 'Sin Info' else tipo_red end
order by tot_sitios desc");



//echo json_encode($json3);

//echo "((".json_encode($json)."))";

$drildowntotal=$dbcon->prepare("
select tipo_red,tsit_nombre Categorias_red,FORMAT( count(sitio_cod), 0 )  totalidad
from tabla_neg_sitio
where  SITIO_ENTEL='SI'
group by tipo_red,tsit_nombre
order by totalidad desc ");



 ?>
