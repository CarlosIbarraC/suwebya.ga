<?php 
require_once "conexion.php";
$id=$_POST['id'];

$result=$conn->query("DELETE FROM `Maquinaria` WHERE `id_machine`='".$id."'");
echo $result;

?>