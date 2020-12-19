<?php 
require_once "conexion.php";
$operarioP = ($_POST['operarioP']);
$machineP = ($_POST['machineP']);
$diaEP = ($_POST['diaEP']);
 

$result=$conn->query("SELECT * FROM `programacion_operarios` WHERE `operario_programacion` = '".$operarioP."'");
$operarios = $result->fetch_all(MYSQL_ASSOC);
$count = count($operarios);

if($count>0){
    echo $r=1;
}else{
    echo $r=1;
}

?>