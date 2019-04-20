<?php

//se realiza misma operacion que la anterior pero filtrando por usuarios dmeneses
function indicadores($tipo,$limite, $fin,$fuente){
$domain = strstr($fuente, $limite);
$domain = $domain;
switch ($tipo) {
    case "fecha":
        $domain=split('\n',$domain);
       return strip_tags(str_replace("al ","",str_replace($fin,"",$domain[0])));
        break;
    case "uf":
        $domain=strip_tags($domain);
        $domain=split('\n',$domain);
        return str_replace(array("\r\n", "\n", "\r", "\t","&","UF"," ","$"),"",$domain[0]);
        break;
     case "utm":
        $domain=strip_tags($domain);
        $domain=split('\n',$domain);
        return str_replace(array("\r\n", "\n", "\r", "\t","&","UTM"," ","$"),"",$domain[0]);
        break;
    case "dolar":
        $domain=strip_tags($domain);
        $domain=split('\n',$domain);
        return str_replace(array("\r\n", "\n", "\r", "\t","&","lar Observado"," ","$",","),"",$domain[0]);
        break;
    case 2:
        echo "i equals 2";
        break;
}
}

$fuente  = file_get_contents('http://www.bancoestado.cl/bancoestado/indiceseconomicos/indicadores.asp');

$FECHA = indicadores('fecha','al ', ")</fo",$fuente);
$UF=indicadores('uf','UF</a></font></td>', "z",$fuente);
$UTM=indicadores('utm','UTM</a></font></td>', "z",$fuente);
$DOLAR=indicadores('dolar','lar Observado</a></font></td>', "z",$fuente);

// echo "Fecha:".indicadores('fecha','al ', ")</fo",$fuente);
// echo "<br>UF:".indicadores('uf','UF</a></font></td>', "z",$fuente);
// echo "<br>UTM:".indicadores('utm','UTM</a></font></td>', "z",$fuente);
// echo "<br>Dolar:".indicadores('dolar','lar Observado</a></font></td>', "z",$fuente);



?>
