<?php 
header("Content-type: application/json");
require_once "conexion.php";
//$conn->set_charset('utf8');
$result=$conn->query("SELECT * FROM `datos_maq` ORDER BY `datos_id` desc LIMIT 60 ");
$respuesta=[];

while ($fila=$result->fetch_assoc()) {
    $dMaquinas=[
        'ID'=>$fila['datos_id'],
        'datos'=>$fila['datos_values'],
        'datos_fecha'=>$fila['datos_fecha']
    ];
    array_push($respuesta,$dMaquinas);
}

echo JSON_ENCODE($respuesta);


?>