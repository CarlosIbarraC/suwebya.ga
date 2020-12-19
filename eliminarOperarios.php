<?php 
require_once "conexion.php";
$id=$_POST['id'];

$result=$conn->query("DELETE FROM `operarios` WHERE `id_operario`='".$id."'");
echo $result;

?>