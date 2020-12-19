<?php 
require_once "conexion.php";
$id=$_POST['id'];

$result=$conn->query("DELETE FROM `devices` WHERE `id_device`='".$id."'");
echo $result;

?>