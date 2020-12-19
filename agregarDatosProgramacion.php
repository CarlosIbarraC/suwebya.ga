<?php 
require_once "conexion.php";
$numeroEvento = ($_POST['numeroEvento']);
$machineE = ($_POST['machineE']);
$FechaEI = ($_POST['FechaEI']);
$FechaSF = ($_POST['FechaSF']);
$observacionesEvento = ($_POST['observacionesEvento']);
$estado_evento=($_POST['estado_evento']);



     if($FechaSF==0){
        $result=$conn->query("INSERT INTO `programacion_eventos` (`numero_evento`, `maquina_evento`, `fechaE_evento`,`observaciones_evento`) VALUES ('".$numeroEvento."','".$machineE."', '".$FechaEI."','".$observacionesEvento."') ; ");

        echo $result;     

     }else{

        $estado_evento="Cerrado";
        $result=$conn->query("INSERT INTO `programacion_eventos` (`numero_evento`, `maquina_evento`, `fechaE_evento`, `fechaS_evento`,  `observaciones_evento`,`estado_evento`) VALUES ('".$numeroEvento."','".$machineE."', '".$FechaEI."', '".$FechaSF."','".$observacionesEvento."','".$estado_evento."') ; ");

        echo $result;     

     }

        

    

   
  
?>
