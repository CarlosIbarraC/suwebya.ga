<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Programacion - HTML Version |Suwebya</title>
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
$pagina="Programacion Eventos";
$mensaje="*";
?>


<body onload="recorrer()">
    

    <body>
        <div class="app" id="app">
            <?php require_once 'menu.php';

$evento= $conn->query("SELECT*FROM `Programacion_eventos`");
$maquinas= $conn->query("SELECT*FROM `Maquinaria` ORDER BY `number_machine`");
$tablaEvento=$conn->query("SELECT*FROM `programacion_eventos`ORDER BY `id_evento`DESC");


if ($tablaEvento->num_rows){
   
    $Maxevento=($tablaEvento->fetch_assoc()['numero_evento']);
    $Maxevento=$Maxevento+1;
}else{
    $Maxevento=1000;
    
}



            ?>


            <!-- ############ PAGE START-->
            <div class="padding">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-header">
                                <div class="row">
                                    <div class="col-6">
                                        <h2>Formulario de Programacion de Operarios</h2>
                                        <small>Lista de Operarios en Maquinas de la planta</small>
                                    </div>
                                    <div class="col-6 align-self-center">
                                        <h4 id="reloj" class="text-center text-success"></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="box-divider m-0"></div>
                            <div class="box-body">
                                <form role="form">
                                    <div class="form-group">
                                        <div class="col-3 pl-0">

                                            <label for="Observaciones">Numero de evento</label>
                                            <input type="text" class="form-control text-warning" id="Nevento"
                                                name="Nevento" value="<?php echo $Maxevento ?>">
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-6 pl-0">
                                            <label for="maquina">Seleccionar Maquina</label>
                                            <select id="machineE" name="machineE" class="form-control">
                                                <option value="0">Maquina</option>
                                                <?php while($maq= $maquinas->fetch_assoc()){ ?>
                                                <option class="text-info" value="<?php echo $maq['number_machine']?>">
                                                    <?php echo $maq['number_machine']?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-6 col-sm-4">
                                            <label for="exampleInputPassword1">Inicio de evento</label>
                                            <input type="datetime-local" class="form-control" id="fechaEI"
                                                name="fechaEI" REQUIRED>
                                        </div>

                                        <div class="col-10 col-sm-6 my-3">
                                            <i class="fa fa-flag text-warning"></i>
                                            <span class="spinner-grow text-danger"></span>
                                            <small> La fecha inicial del evento pude ser anterior o posterior al dia actual</small>
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <div class="col-6 col-sm-4 ">
                                            <label for="exampleInputPassword1">Final de evento</label>
                                            <input type="datetime-local" class="form-control" id="fechaEF"
                                                name="fechaEF" REQUIRED>
                                        </div>

                                        <div class="col-10 col-sm-6 my-3">
                                            <i class="fa fa-flag text-warning"></i> <small> La fecha final de un evento
                                                debe ser mayor a la inicial</small>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-3 pl-0">
                                            <label for="Observaciones">Estado</label>
                                            <input type="text" class="form-control" name="estadoEvento"
                                                id="estadoEvento" value="Abierto" READONLY></>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="Observaciones">Observaciones</label>
                                        <textarea class="form-control" name="ObservacionesEvento"
                                            id="ObservacionesEvento" rows="3"></textarea>
                                        </label>
                                    </div>

                                    <button type="button" class="btn white m-b"
                                        onclick="agregarDatosPro()">Guardar</button>
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="box">
                                    <div class="box-header">
                                        <h2>Programacion</h2>
                                        <small>listado de programacion de operarios .</small>
                                    </div>
                                    <div class="box-divider m-0"></div>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Numero de evento</th>
                                                <th>Maquina</th>
                                                <th>Inicio Evento</th>
                                                <th>Fin de Evento</th>
                                                <th>Observaciones</th>
                                                <th>Estado</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($tablaEvento as $programa){ ?>
                                            <tr>
                                                <td> <?php echo $programa['numero_evento'] ?> </td>
                                                <td><?php echo $programa['maquina_evento'] ?> </td>
                                                <td><?php echo $programa['fechaE_evento']?> </td>
                                                <td><?php echo $programa['fechaS_evento']?> </td>
                                                <td><?php echo $programa['observaciones_evento'] ?> </td>
                                                <td><?php echo $programa['estado_evento'] ?></td>

                                                <td>
                                                    <button type="button"
                                                        class="<?php echo $programa['estado_evento'] ?> btn primary "
                                                        data-toggle="modal" data-target="#eliminarRegistroP"
                                                        onclick="preguntarSiNo(<?php echo '`'. $programa['numero_evento'].','.$programa['estado_evento'].','.$programa['fechaE_evento'].','.$programa['fechaS_evento'].'`' ?>)">
                                                        <i
                                                            class="<?php echo $programa['estado_evento']."1" ?> fa fa-unlock"></i></button>
                                                </td>
                                                <div class="modal fade" id="eliminarRegistroP" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalLabelP"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content dark">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Cerrar
                                                                    Registro</h5>
                                                                <button type="button" class="close text-white"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>

                                                            <div class="modal-body">
                                                            <div class="form-group ">
                                                            <label for="fechaEP">Numero de Evento</label>
                                                             <input type="text" class="form-control"
                                                                 id="ProgramacionEX" name="ProgramacionEX" readonly>
                                                             </div>
                                                             <div class="form-group ">
                                                            <label for="fechaEP">Estado Evento</label>
                                                             <input type="text" class="form-control"
                                                                 id="EstadoE" readonly>
                                                             </div>
                                                                <div class="form-group ">
                                                                <label for="fechaEP">Entrada Evento</label>
                                                                    <input type="text" class="form-control" id="fechaEP"
                                                                     readonly>
                                                                </div>
                                                                <div class="form-group " id="nn">
                                                                <label for="fechaSP">Ingrese Fecha Final de Evento</label>
                                                                    <input type="datetime-local" class="form-control" id="fechaSP"
                                                                       >
                                                                </div>
                                                                <div class="form-group " id="xx">
                                                                <label for="fechaSPx"> Fecha Final de Evento</label>
                                                                    <input type="text" class="form-control" id="fechaSPx"
                                                                       readonly>
                                                                </div>
                                                                
                                                            </div>
                                                            <div class="modal-footer" >
                                                                <button type="button" class="btn info"
                                                                    data-dismiss="modal" >Volver</button>
                                                                <button type="submit" class="btn danger" id="eliminarRE"
                                                                    onclick="eliminarDatos() ">Cerrar</button>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </tr>

                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

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
                            function recorrer() {

                                $("table tbody tr td").each(function () {
                                    if ($(this).text().trim() == "Cerrado") {
                                        $('.Cerrado').removeClass('primary').addClass('info');
                                        $('.Cerrado1').removeClass('fa-unlock').addClass('fa-lock');


                                    } else {
                                        console.log("no es pdf");
                                    }
                                });

                            }


                            function agregarDatosPro() {

                                numeroEvento = $('#Nevento').val();
                                machineE = $('#machineE').val();
                                FechaEI = $('#fechaEI').val();
                                FechaSI = $('#fechaEF').val();
                                observacionesEvento = $('#ObservacionesEvento').val();
                                estado_evento = $('#estadoEvento').val();
                                console.log(FechaSI);

                                if (machineE != 0) {

                                    if (FechaEI <= FechaSI || FechaSI == 0) {

                                        if (FechaSI == 0) {
                                            FechaSI = null;
                                        }

                                        cadena = "numeroEvento=" + numeroEvento +
                                            "&machineE=" + machineE +
                                            "&FechaEI=" + FechaEI +
                                            "&FechaSF=" + FechaSI +
                                            "&observacionesEvento=" + observacionesEvento +
                                            "&estado_evento=" + estado_evento;

                                        console.log(cadena);

                                        $.ajax({
                                            type: "post",
                                            url: "agregarDatosProgramacion.php",
                                            data: cadena,
                                            success: function (r) {
                                                if (r == 1) {
                                                    location.reload();
                                                    console.log(r);
                                                    console.log('agregado con exito');
                                                } else {

                                                    alert('programacion inconsistente');

                                                    console.log('fallo en el servidor');
                                                }
                                            }
                                        });



                                    } else {
                                        alert("El dia de inicio de la programacion debe ser menor que el dia  final");
                                    }
                                } else {
                                    alert("Complete el formulario por favor");
                                }

                            }

                            function preguntarSiNo(id) {
                                var Cadenas = id.split(',');

                                console.log(Cadenas[3]);

                                if (Cadenas[1] == 'Cerrado') {
                                    $('#ProgramacionEX').val(Cadenas[0]);
                                    $('#fechaEP').val(Cadenas[2]);
                                    $('#EstadoE').val(Cadenas[1]);
                                    $('#nn').hide();
                                    $('#eliminarRE').hide();
                                    $('#xx').show();
                                    $('#fechaSPx').val(Cadenas[3]);
                                    retun;
                                } else {
                                    $('#nn').show();
                                    $('#xx').hide();
                                    $('#ProgramacionEX').val(Cadenas[0]);
                                    $('#fechaEP').val(Cadenas[2]);
                                    $('#EstadoE').val(Cadenas[1]);
                                    $('#eliminarRE').show();
                                }
                            }

                            function eliminarDatos() {
                                id = $('#ProgramacionEX').val();
                                cadena = "id=" + id;
                                console.log(id);

                                $.ajax({
                                    type: "POST",
                                    url: "eliminarDatosP.php",
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
                        </script>

    </body>
    <?php 
require_once 'Theme.php';
?>