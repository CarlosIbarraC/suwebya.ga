<?php 
require_once "conexion.php";
$name=$_POST['Noperario'];
$id=$_POST['idoperario'];
$espec=$_POST['Especializacion'];
$respuesta=$conn->query(" INSERT INTO `operarios` (`name_operario`, `number_operario`, `especializacion_operario`) VALUES ('".$name."', '".$id."', '".$espec."');");
echo $respuesta;
?>