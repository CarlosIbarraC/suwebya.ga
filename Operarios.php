<?php 
require 'menu.php';
require 'conexion.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Operarios - HTML Version |Suwebya</title>
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

<body>
    <div class="app" id="app">
        <div class="padding">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <h2>Formulario de Operarios</h2>
                            <small>Ingreso de Operarios de Planta</small>
                        </div>
                        <div class="box-divider m-0"></div>
                        <div class="box-body">
                            <form role="form">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nombre de Operario</label>
                                    <input type="text" class="form-control" id="Noperario" name="Noperario"
                                        placeholder="nombre del dispositivo" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Identificacion</label>
                                    <input type="text" class="form-control" id="idoperario" name="idoperario"
                                        placeholder="numero por la cual se le relaciona" REQUIRED>
                                </div>

                                <div class="form-group">
                                    <label for="Observaciones">Especializacion</label>
                                    <input type="text" class="form-control" id="Especializacion" name="Especializacion"
                                        placeholder="trabajo que realiza la maquina" REQUIRED>
                                    </label>
                                </div>
                                <button type="submit" class="btn white " onclick="guardarOperarios()">Guardar</button>
                            </form>
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="box">
                                <div class="box-header">
                                    <h2>Listado de Operarios</h2>
                                    <small>Operarios que manejan maquinas o procesos</small>
                                </div>
                                <div class="box-divider m-0"></div>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Operaio</th>
                                            <th>Identificacion</th>
                                            <th>Espializacion</th>
                                            <th>Editar</th>
                                            <th>Eliminar</th>
                                        </tr>
                                    </thead>
                                    <?php 
                                    
                                  $result = $conn->query("SELECT * FROM `operarios`");
                                  $operarios = $result->fetch_all(MYSQLI_ASSOC);
                                  foreach($operarios as $operario){
                                     
                                      $datos=$operario['id_operario']."||".$operario['name_operario']."||".$operario['number_operario']."||".$operario['especializacion_operario'];
                                      
                                  ?>
                                    <tbody>
                                        <tr>
                                            <td id="idRegistro"><?php echo $operario['id_operario'] ?></td>
                                            <td><?php echo $operario['name_operario'] ?></td>
                                            <td><?php echo $operario['number_operario'] ?></td>
                                            <td><?php echo $operario['especializacion_operario'] ?></td>
                                            <td>
                                                <button type="button" class="btn primary" data-toggle="modal"
                                                    data-target="#exampleModal"
                                                    onclick="agregarOperarios('<?php echo $datos ?>')">
                                                    <i class="fa fa-edit"></i>
                                                </button></td>
                                            <td>
                                                <button type="button" class="btn accent" data-toggle="modal"
                                                    data-target="#eliminarRegistro"
                                                    onclick="preguntarSiNoO(<?php echo $operario['id_operario'] ?>)">
                                                    <i class="fa fa-close"></i>
                                                </button></td>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content dark">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
                                                            <button type="button" class="close text-white"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form role="form">
                                                                <div class="form-group ">
                                                                    <label for="exampleInputEmail1"># de
                                                                        operario</label>
                                                                    <input type="text" class="form-control" id="idOE"
                                                                        name="idO" placeholder="nombre del dispositivo"
                                                                        readonly>
                                                                </div>
                                                                <div class="form-group ">
                                                                    <label for="exampleInputEmail1">Nombre de
                                                                        Operario</label>
                                                                    <input type="text" class="form-control"
                                                                        id="NoperarioE" name="NoperarioE"
                                                                        placeholder="nombre del dispositivo">
                                                                </div>
                                                                <div class="form-group ">
                                                                    <label
                                                                        for="exampleInputPassword1">Identificacion</label>
                                                                    <input type="Number" class="form-control "
                                                                        id="idoperarioE" name="idoperarioE"
                                                                        placeholder="numero por la cual se le relaciona">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="Observaciones">Especializacion</label>
                                                                    <input type="text" class="form-control "
                                                                        id="ObservacionesOE" name="ObservacionesOE"
                                                                        placeholder="trabajo que realiza la maquina">
                                                                    </label>
                                                                </div>


                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn danger"
                                                                data-dismiss="modal">Cancelar</button>
                                                            <button type="submit" class="btn primary"
                                                                onclick="editarOperarios()">Guardar</button>

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
                                                            <h5 class="modal-title" id="exampleModalLabel">Eliminar
                                                                Registro</h5>
                                                            <button type="button" class="close text-white"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h5>Esta seguro de eliminar registro ?</h5>
                                                            <div class="form-group ">

                                                                <input type="text" class="form-control" id="idO">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn info"
                                                                data-dismiss="modal">Volver</button>
                                                            <button type="submit" class="btn danger"
                                                                id="eliminarR">Eliminar</button>
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
                    function agregarOperarios(datos) {
                        d = datos.split('||');
                        $('#idOE').val(d[0]);
                        $('#NoperarioE').val(d[1]);
                        $('#idoperarioE').val(d[2]);
                        $('#ObservacionesOE').val(d[3]);

                    }

                    function guardarOperarios() {
                        nOperario = $('#Noperario').val();
                        idOperario = $('#idoperario').val();
                        Especializacion = $('#Especializacion').val();


                        cadena = "Noperario=" + nOperario +
                            "&idoperario=" + idOperario +
                            "&Especializacion=" + Especializacion;


                        $.ajax({
                            type: "POST",
                            url: "guardarOperarios.php",
                            data: cadena,
                            success: function (r) {
                                if (r == 1) {
                                   
                                    location.reload();
                                } else {

                                    console.log('fallo en el servidor');
                                }
                            }
                        })

                    }

                    function editarOperarios() {
                        idO = $("#idOE").val();
                        name = $('#NoperarioE').val();
                        idOperario = $('#idoperarioE').val();
                        Especializacion = $('#ObservacionesOE').val();

                        cadena = "idO=" + idO +
                            "&name=" + name +
                            "&idOperario=" + idOperario +
                            "&Especializacion=" + Especializacion;

                        $.ajax({
                            type: "POST",
                            url: "editarOperarios.php",
                            data: cadena,
                            success: function (r) {
                                if (r == 1) {
                                    console.log('agregado con exito');
                                    location.reload();
                                } else {

                                    console.log('fallo en el servidor');
                                }
                            }
                        })

                    }

                    function preguntarSiNo(id) {


                        eliminarDatos(id);

                    }

                    function eliminarDatos(id) {
                        $('#idM').val(id);
                        cadena = "id=" + id;
                        $.ajax({
                            type: "POST",
                            url: "eliminarDatos.php",
                            data: cadena,
                            success: function (r) {
                                if (r == 1) {
                                    console.log('eliminado con exito');
                                } else {

                                    console.log('fallo en el servidor');
                                }
                            }
                        })

                    }

                    function preguntarSiNoO(id) {

                        eliminarOperarios(id);

                    }

                    function eliminarOperarios(id) {
                        $('#idO').val(id);
                        cadena = "id=" + id;
                        $.ajax({
                            type: "POST",
                            url: "eliminarOperarios.php",
                            data: cadena,
                            success: function (r) {
                                if (r == 1) {
                                    console.log('eliminado con exito');
                                } else {

                                    console.log('fallo en el servidor');
                                }
                            }
                        })

                    }
                </script>