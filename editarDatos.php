<?php 
require_once "conexion.php";
$id=$_POST['id'];
$maquina=$_POST['maquina'];
$numero=$_POST['numero'];
$observacion=$_POST['observacion'];
$result=$conn->query("UPDATE  `Maquinaria` SET `name_machine`= '$maquina',`number_machine`='$numero',`observation_machine`='$observacion' WHERE `id_machine` = '".$id."'");
echo $result;

?>