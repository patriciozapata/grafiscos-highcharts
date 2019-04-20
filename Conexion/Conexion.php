<?php

  //conexcion
  $dbhost = 'localhost';
  $dbname = 'comisites';
  $dbuser= 'root';
  $dbpass= '';



  //conectando la conexcion
  try {

    $dbcon = new PDO("mysql:host={$dbhost};dbname={$dbname};charset=utf8",$dbuser,$dbpass);
    $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //validando errores
  } catch (PDOException $ex) {
    die($ex->getMessage());
  }






 ?>
