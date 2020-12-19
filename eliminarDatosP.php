<?php 
require_once "conexion.php";
$id=$_POST['id'];

$result=$conn->query(" UPDATE `programacion_eventos` SET `estado_evento`='Cerrado' WHERE `numero_evento`='".$id."'");
echo $result;

?>