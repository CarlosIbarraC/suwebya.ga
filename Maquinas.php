<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title> Maquinas - HTML Version |Suwebya</title>
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




$mensaje="*";
if(isset($_POST['Nmaquina'])&& isset($_POST['idMaquina'])&& isset($_POST['Observaciones'])){
$maquina= $_POST['Nmaquina'];
$numeroMaquina = $_POST['idMaquina'];
$observaciones = $_POST['Observaciones'];
$result=$conn->query("SELECT * FROM `Maquinaria` WHERE `number_machine` = '".$numeroMaquina."'");
$idmachines = $result->fetch_all(MYSQLI_ASSOC);
$count=count($idmachines);
$mensaje="*";
if($count==0){
$conn->query(" INSERT INTO `Maquinaria` (`name_machine`, `number_machine`, `observation_machine` ) VALUES ('".$maquina."', '".$numeroMaquina."', '".$observaciones."');");
$mensaje="maquina ingresada";

}elseif($count==1) {
    $mensaje="<div class='alert alert-light' role='alert'>
    Maquina ya ingresada
  </div>";
}

}

?>


<body>

  <div class="app" id="app">


    <div class="padding">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h2>Formulario de Maquinaria</h2>
              <small>Listado de maquinas para Censar</small>
            </div>
            <div class="box-divider m-0"></div>
            <div class="box-body">
              <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nombre de Maquina</label>
                  <input type="text" class="form-control" id="Nmaquina" name="Nmaquina"
                    placeholder="nombre del dispositivo" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Numero</label>
                  <input type="Number" class="form-control" id="idMaquina" name="idMaquina"
                    placeholder="numero por la cual se le relaciona" REQUIRED>
                </div>

                <div class="form-group">
                  <label for="Observaciones">Observaciones</label>
                  <input type="text" class="form-control" id="Observaciones" name="Observaciones"
                    placeholder="trabajo que realiza la maquina" REQUIRED>
                  </label>
                </div>
                <button type="submit" class="btn white m-b">Guardar</button>
              </form>
              <div>
                <h4><?php echo $mensaje ?></h4>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <div class="box">
                <div class="box-header">
                  <h2>Maquinaria a Censar</h2>
                  <small>Listado de la maquinaria que colocamos dispositivos de medicion</small>
                </div>
                <div class="box-divider m-0"></div>
                <table class="table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Maquina</th>
                      <th>numero</th>
                      <th>Observaciones</th>
                      <th>Editar</th>
                      <th>Eliminar</th>
                    </tr>
                  </thead>
                  <?php 
                                    $result = $conn->query("SELECT * FROM `Maquinaria`");
                                    $machines = $result->fetch_all(MYSQLI_ASSOC);
                                    foreach($machines as $machine){
                                       
                                        $datos=$machine['id_machine']."||".$machine['name_machine']."||".$machine['number_machine']."||".$machine['observation_machine'];
                                        
                                    ?>
                  <tbody>
                    <tr>
                      <td id="idRegistro"><?php echo $machine['id_machine'] ?></td>
                      <td><?php echo $machine['name_machine'] ?></td>
                      <td><?php echo $machine['number_machine'] ?></td>
                      <td><?php echo $machine['observation_machine'] ?></td>
                      <td>
                        <button type="button" class="btn primary" data-toggle="modal" data-target="#exampleModal"
                          onclick="agregarDatos('<?php echo $datos ?>')">
                          <i class="fa fa-edit"></i>
                        </button></td>
                      <td>
                        <button type="button" class="btn accent" data-toggle="modal" data-target="#eliminarRegistro"
                          onclick="preguntarSiNo(<?php echo $machine['id_machine'] ?>)">
                          <i class="fa fa-close"></i>

                        </button></td>

                      <!-- Modal -->
                      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content dark">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
                              <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form role="form">
                                <div class="form-group ">
                                  <label for="exampleInputEmail1"># de id</label>
                                  <input type="text" class="form-control" id="idE" name="idE"
                                    placeholder="nombre del dispositivo" readonly>
                                </div>
                                <div class="form-group ">
                                  <label for="exampleInputEmail1">Nombre de Maquina</label>
                                  <input type="text" class="form-control" id="NmaquinaE" name="NmaquinaE"
                                    placeholder="nombre del dispositivo">
                                </div>
                                <div class="form-group ">
                                  <label for="exampleInputPassword1">Numero</label>
                                  <input type="Number" class="form-control " id="idMaquinaE" name="idMaquinaE"
                                    placeholder="numero por la cual se le relaciona">
                                </div>

                                <div class="form-group">
                                  <label for="Observaciones">Observaciones</label>
                                  <input type="text" class="form-control " id="ObservacionesE" name="ObservacionesE"
                                    placeholder="trabajo que realiza la maquina">
                                  </label>
                                </div>


                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn danger" data-dismiss="modal">Cancelar</button>
                              <button type="submit" class="btn primary" onclick="editarDatos()">Guardar</button>

                            </div>
                          </div>
                        </div>
                      </div>


                      <!-- Modal para eliminar registro -->



                      <div class="modal fade" id="eliminarRegistro" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content dark">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Eliminar Registro</h5>
                              <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <h5>Esta seguro de eliminar registro ?</h5>
                              <div class="form-group ">

                                <input type="text" class="form-control" id="idM" name="NmaquinaE">
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn info" data-dismiss="modal">Volver</button>
                              <button type="submit" class="btn danger" id="eliminarR"
                                onclick="eliminarDatos()">Eliminar</button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>

                    </tr>
                    <?php }
                                      
                                    ?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <!-- ############ PAGE END-->

          <?php 
require_once 'Theme.php';
?>
        </div>
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
        <script src="../libs/jquery/jquery-pjax/jquery.pjax.js"></script>
        <script src="scripts/ajax.js"></script>
       
        <script>
          function agregarDatos(datos) {
            d = datos.split('||');
            $('#idE').val(d[0]);
            $('#NmaquinaE').val(d[1]);
            $('#idMaquinaE').val(d[2]);
            $('#ObservacionesE').val(d[3]);

          }

          function editarDatos() {
            id = $('#idE').val();
            maquina = $('#NmaquinaE').val();
            numero = $('#idMaquinaE').val();
            observacion = $('#ObservacionesE').val();

            cadena = "id=" + id +
              "&maquina=" + maquina +
              "&numero=" + numero +
              "&observacion=" + observacion;

            $.ajax({
              type: "POST",
              url: "editarDatos.php",
              data: cadena,
              success: function (r) {
                if (r == 1) {
                  console.log('agregado con exito');
                } else {

                  console.log('fallo en el servidor');
                }
              }
            });

          }

          function preguntarSiNo(id) {

            $('#idM').val(id);

          }


          function eliminarDatos() {

            id = $('#idM').val();

            cadena = "id=" + id;

            console.log(cadena);
            $.ajax({
              type: "POST",
              url: "eliminarDatos.php",
              data: cadena,
              success: function (r) {
                if (r == 1) {
                  console.log('eliminado con exito');
                  lacation.reload();
                } else {

                  console.log('fallo en el servidor');
                }
              }
            })

          }

        
  
        </script>
        <!-- endbuild -->
</body>

</html>