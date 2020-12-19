<?php 
require_once "conexion.php";
$id=$_POST['id'];
$Alias=$_POST['Alias'];
$Serie=$_POST['Serie'];
$observaciones=$_POST['observaciones'];

$result=$conn->query("UPDATE  `devices` SET `name_device`= '$Alias',`code_device`='$Serie',`observations_device`='$observaciones' WHERE `id_device` = '".$id."'");
echo $result;

?>