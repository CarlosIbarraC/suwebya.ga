<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Dispositivos - HTML Version | Bootstrap 4 Web App Kit with AngularJS</title>
    <meta name="description" content="Admin, Dashboard, Bootstrap, Bootstrap 4, Angular, AngularJS" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- for ios 7 style, multi-resolution icon of 152x152 -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-barstyle" content="black-translucent">
    <link rel="apple-touch-icon" href="assets/images/logo.png">
    <meta name="apple-mobile-web-app-title" content="Flatkit">
    <!-- for Chrome on Android, multi-resolution icon of 196x196 -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="shortcut icon" sizes="196x196" href="assets/images/logo.png">

    <!-- style -->
    <link rel="stylesheet" href="assets/animate.css/animate.min.css" type="text/css" />
    <link rel="stylesheet" href="assets/glyphicons/glyphicons.css" type="text/css" />
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css" type="text/css" />
    <link rel="stylesheet" href="assets/material-design-icons/material-design-icons.css" type="text/css" />

    <link rel="stylesheet" href="assets/bootstrap/dist/css/bootstrap.min.css" type="text/css" />
    <!-- build:css assets/styles/app.min.css -->
    <link rel="stylesheet" href="assets/styles/app.css" type="text/css" />
    <!-- endbuild -->
    <link rel="stylesheet" href="assets/styles/font.css" type="text/css" />
</head>
<?php 
require_once 'menu.php';
require 'conexion.php';


if ($conn==false){
  echo "Hubo un problema al conectarse a María DB";
  die();
}
?>
<body>
<div class="app" id="app">
<?php 
$result = $conn->query("SELECT * FROM `devices` ");
$devices = $result->fetch_all(MYSQLI_ASSOC);
$maq= $conn->query("SELECT * FROM `Maquinaria`");
//$machines = $maq->fetch_all(MYSQL_ASSOC);
?>


        <!-- ############ PAGE START-->
        <div class="padding">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <h2>Formulario de Dispositivos</h2>
                            <small>Esat es la lista de dispositivos instalados en las maquinas de la planta</small>
                        </div>
                        <div class="box-divider m-0"></div>
                        <div class="box-body">
                            <form role="form"  >
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Alias</label>
                                    <input type="text" class="form-control" id="alias" name="alias"
                                        placeholder="nombre del dispositivo" REQUIRED>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Serie</label>
                                    <input type="text" class="form-control" id="serie" name="serie"
                                        placeholder="serie" REQUIRED>
                                </div>
                                <div class="form-group ">
                                    <label for="cars">Maquina a Instalar</label>
                                    <select id="machine" name="machine" class="form-control ">
                                        <option value="0">Maquina</option>
                                        <?php while($machine= $maq->fetch_assoc()){ ?>
                                        <option class="text-info" value="<?php echo $machine['number_machine']?>"><?php echo $machine['number_machine']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="Observaciones">Observaciones</label>
                                    <input type="text" class="form-control" id="Observaciones" name="observaciones"
                                        placeholder="Observaciones del dispositivo">
                                    </label>
                                </div>
                                <button type="button" class="btn white m-b" onclick="agregarDatos()">Guardar</button>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="box">
                                <div class="box-header">
                                    <h2>Basic</h2>
                                    <small>listado de Dispositivos instalados .</small>
                                </div>
                                <div class="box-divider m-0"></div>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre</th>
                                            <th>Serie</th>
                                            <th>fecha</th>
                                            <th>Maquina</th>
                                            <th>observaciones</th>
                                            <th>Editar</th>
                                            <th>Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($devices as $device){
                                          $datosD=$device['id_device']."||".$device['name_device']."||".$device['code_device']."||".$device['date_device']."||".$device['machine_device']."||".$device['observations_device'];   
                                            ?>
                                        <tr>
                                            <td> <?php echo $device['id_device'] ?>  </td>
                                            <td><?php echo $device['name_device'] ?> </td>
                                            <td><?php echo $device['code_device'] ?> </td>
                                            <td><?php echo $device['date_device'] ?> </td>
                                            <td><?php echo $device['machine_device'] ?> </td>
                                            <td><?php echo $device['observations_device'] ?> </td>
                                            <td> <button type="button" class="btn primary" data-toggle="modal" data-target="#editarDispositivo"
                          onclick="agregarDispositivos('<?php echo $datosD ?>')">
                          <i class="fa fa-edit"></i>
                        </button> </td>
                                            <td><button type="button" class="btn accent" data-toggle="modal" data-target="#eliminarDispositivo"
                          onclick="preguntarSiNoD(<?php echo $device['id_device'] ?>)">
                          <i class="fa fa-close"></i>

                        </button></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Modal edicion dispositivo -->
<div class="modal fade" id="editarDispositivo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content dark">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Dispositivo</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form role="form">

                             <div class="form-group ">
                                  <label for="exampleInputEmail1"># de id</label>
                                  <input type="text" class="form-control" id="idDE" name="idDE"
                                    placeholder="id en tabla del dispositivo" readonly>
                                </div>
                                <div class="form-group ">
                                  <label for="exampleInputEmail1">Alias</label>
                                  <input type="text" class="form-control" id="NDE" name="NDE"
                                    placeholder="nombre del dispositivo" >
                                </div>
                                <div class="form-group ">
                                  <label for="exampleInputEmail1">Serie</label>
                                  <input type="text" class="form-control" id="SDE" name="SDE"
                                    placeholder="Serie">
                                </div>
                                <div class="form-group ">
                                  <label for="exampleInputPassword1">Instalado en Maquina</label>
                                  <input type="Number" class="form-control " id="MDE" name="MDE"
                                    placeholder="numero por la cual se le relaciona" readonly>
                                </div>

                                <div class="form-group">
                                  <label for="Observaciones">Observaciones</label>
                                  <input type="text" class="form-control " id="ODE" name="ODE"
                                    placeholder="observaciones generales">
                                  </label>
                                </div>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn danger" data-dismiss="modal">Cancelar</button>
                              <button type="submit" class="btn primary" onclick="editarDispositivo()">Guardar Cambios</button>
      </div>
    </div>
  </div>
</div>
<!--  --------------fin de modal -------------------- -->

<!-- '''''''''''''''''''Modal eliminar Dispositivo''''''''''''''''''''''''' -->


<!-- Modal -->
<div class="modal fade" id="eliminarDispositivo" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content dark">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Eliminar Dispositivo</h5>
                              <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <h5>Esta seguro de eliminar Dispositivo en registro ?</h5>
                              <div class="form-group ">

                                <input type="text" class="form-control small" id="idD" name="NmaquinaE">
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn info" data-dismiss="modal">Volver</button>
                              <button type="submit" class="btn danger" id="eliminarR"
                                onclick="eliminarDispositivo()">Eliminar</button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>

<!-- '''''''''''''''''''Fin eliminar Dispositivo''''''''''''''''''''''''' -->

                    <!-- ############ PAGE END-->
                    <?php require_once 'Theme.php' ?>
                    <!-- / -->
                    <!-- ############ LAYOUT END-->
                    <!-- build:js scripts/app.html.js -->
                    <!-- jQuery -->
                    <script src="libs/jquery/jquery/dist/jquery.js"></script>
                    <!-- Bootstrap -->
                    <script src="libs/jquery/tether/dist/js/tether.min.js"></script>
                    <script src="libs/jquery/bootstrap/dist/js/bootstrap.js"></script>
                    <!-- core -->
                    <script src="libs/jquery/underscore/underscore-min.js"></script>
                    <script src="libs/jquery/jQuery-Storage-API/jquery.storageapi.min.js"></script>
                    <script src="libs/jquery/PACE/pace.min.js"></script>
                    <script src="scripts/config.lazyload.js"></script>
                    <script src="scripts/palette.js"></script>
                    <script src="scripts/ui-load.js"></script>
                    <script src="scripts/ui-jp.js"></script>
                    <script src="scripts/ui-include.js"></script>
                    <script src="scripts/ui-device.js"></script>
                    <script src="scripts/ui-form.js"></script>
                    <script src="scripts/ui-nav.js"></script>
                    <script src="scripts/ui-screenfull.js"></script>
                    <script src="scripts/ui-scroll-to.js"></script>
                    <script src="scripts/ui-toggle-class.js"></script>
                    <script src="scripts/app.js"></script>

                    <!-- ajax -->
                    <script src="libs/jquery/jquery-pjax/jquery.pjax.js"></script>
                    <script src="scripts/ajax.js"></script>
                    <!-- endbuild -->
                   

                    <script>
                       function agregarDatos(){
     alias=$('#alias').val();    
     serie=$('#serie').val();
     machine=$('#machine').val();
     observacion=$('#Observaciones').val();

     cadena="alias="+ alias +
            "&serie="+ serie +
            "&machine="+ machine +
            "&observacion="+ observacion;
            console.log(cadena);

      $.ajax({
          type:"post",
          url:"agreagarDatosDevices.php",
          data:cadena,
          success:function(r){
              if(r==1){
                   location.reload();
                  console.log('agregado con exito');
              }else{
                
                  console.log('fallo en el servidor');
              }
          }
      })      

  }
  function agregarDispositivos(datosD) {
            d = datosD.split('||');
            $('#idDE').val(d[0]);
            $('#NDE').val(d[1]);
            $('#SDE').val(d[2]);
            $('#MDE').val(d[4]);
            $('#ODE').val(d[5]);

          }

          function editarDispositivo() {
            
            id =$('#idDE').val();
            Alias =$('#NDE').val();
            Serie =$('#SDE').val();            
            observaciones =$('#ODE').val();
            

            cadena = "id=" + id +
              "&Alias=" + Alias +
              "&Serie=" + Serie +              
              "&observaciones=" + observaciones;

            $.ajax({
              type: "POST",
              url: "editarDispositivos.php",
              data: cadena,
              success: function (r) {
                if (r == 1) {
                    location.reload();
                 
                } else {

                console.log('fallo en el servidor');
                }
              }
            });

          }
          function preguntarSiNoD(id) {

$('#idD').val(id);


}


function eliminarDispositivo(id) {

id = $('#idD').val();

cadena = "id=" + id;

console.log(cadena);
$.ajax({
  type: "POST",
  url: "eliminarDispositivos.php",
  data: cadena,
  success: function (r) {
    if (r == 1) {
     location.reload();
      console.log('eliminado con exito');
    } else {

      console.log('fallo en el servidor');
    }
  }
})

}
                    </script>

</body>

</html>