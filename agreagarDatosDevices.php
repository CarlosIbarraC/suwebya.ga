<?php 
require_once "conexion.php";
$alias = ($_POST['alias']);
$serie = ($_POST['serie']);
$maquina = ($_POST['machine']);
$observaciones = ($_POST['observacion']);

$result=$conn->query("INSERT INTO `devices` (`name_device`, `code_device`, `machine_device`, `observations_device`) VALUES ('".$alias."', '".$serie."', '".$maquina."','".$observaciones."');");

echo $result; 
  
?>
