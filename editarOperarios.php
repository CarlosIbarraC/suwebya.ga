<?php 
require_once "conexion.php";
$id=$_POST['idO'];
$name=$_POST['name'];
$operario=$_POST['idOperario'];
$especializacion=$_POST['Especializacion'];

$result=$conn->query("UPDATE  `operarios` SET `name_operario`= '$name',`number_operario`='$operario',`especializacion_operario`='$especializacion' WHERE `id_operario` = '".$id."'");
echo $result;

?>