<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<title>Suwebya - HTML Version | Bootstrap 4 Web App Kit with AngularJS</title>
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
	<!-- ----------------graficas morris--------------- -->
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
	
</head>
<?php 
require_once 'menu.php' ;
require_once 'conexion.php';
$result = $conn->query("SELECT * FROM `datos_maq`  ORDER BY `datos_id` DESC LIMIT 10");
$revoluciones = $result->fetch_all(MYSQLI_ASSOC);
 

?>

<body>
	<div class="app" id="app">

		
		<!-- ############ PAGE START-->
		<div class="padding">
			<div class="margin">
				<h5 class="mb-0 _300">Suwebya, Bienvenido</h5>
				<small class="text-muted">Tablero de control Principal</small>
			</div>
			<div class="row">
				<div class="col-sm-12 col-md-5 col-lg-4">
					<div class="row">
						<div class="col-sm-6">
							<div class="box p-a">
								<div class="pull-left m-r">
									<i class="fa fa-tachometer text-2x text-danger m-y-sm"></i>
								</div>
								<div class="clear">
									<div class="text-muted">RPM--</div>
									<h4 class="m-0 text-md _600"><a id ="rpm" href>--</a></h4>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="box p-a">
								<div class="pull-left m-r">
									<i class="fa fa-line-chart text-2x text-info m-y-sm"></i>
								</div>
								<div class="clear">
									<div class="text-muted">kls/hr</div>
									<h4 class="m-0 text-md _600"><a id="kls" href>--</a></h4>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="box p-a">
								<div class="pull-left m-r">
									<i class="fa fa-fire text-2x text-accent m-y-sm"></i>

								</div>
								<div class="clear">
									<div class="text-muted">Temperatura</div>
									<h4 class="m-0 text-md _600"><a id="temp" href>--</a></h4>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="box p-a">
								<div class="pull-left m-r">
									<i class="fa fa-bolt text-2x text-success m-y-sm"></i>
								</div>
								<div class="clear">
									<div class="text-muted">Estado</div>
									<h4 class="m-0 text-md _600"><a id="estado" href>OFF</a></h4>
								</div>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="row no-gutter box-color text-center  ">
								<div class="col-sm-6 p-a primary">
									Operario
									<h6 class="m-0 text-sm _600 "><a href>Andres Cardona</a></h6>
								</div>
								<div class="col-sm-6 p-a dker info">
									Referencia
									<h4 class="m-0 text-md _600"><a href>F1919</a></h4>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-12 col-md-7 col-lg-8">
					<div class="row no-gutter box dark bg">
						<div class="col-sm-8">
							<div class="box-header">
								<h3>Actividad</h3>
								<small>Actividad en las ultimas 8 horas vs dia anterior</small>
							</div>
							<?php 
							$r=0;
							$dat= array();
							foreach($revoluciones as $datos){
						$datosRPM = explode(",", $datos['datos_values']);	
						$RPM1= floatval($datosRPM[0])."<br>";
						$RPM2= floatval($datosRPM[1])."<br>";
						$RPM3= floatval(($datosRPM[2])/4)."<br>";							
						array_push($dat,$RPM1,$RPM2,$RPM3);						
						//$revoluciones = implode(",",$dat);
							
						
						}?> 
							<div class="box-body">
								<div ui-jp="plot" ui-refresh="app.setting.color" ui-options="
			              [
			                { 
			                  data: [[1, '<?php echo floatval($dat[0])?>'], [2, '<?php echo floatval($dat[3])?>'], [3, '<?php echo floatval($dat[6])?>'], [4, '<?php echo floatval($dat[9])?>'], [5, '<?php echo floatval($dat[12])?>'], [6, '<?php echo floatval($dat[15])?>'], [7, '<?php echo floatval($dat[18])?>']], 
			                  points: { show: true, radius: 0}, 
			                  splines: { show: true, tension: 0.45, lineWidth: 2, fill: 0 } 
			                },
			                { 
			                  data: [[1,'<?php echo floatval($dat[1])?>'], [2, '<?php echo floatval($dat[4])?>'], [3, '<?php echo floatval($dat[7])?>'], [4, '<?php echo floatval($dat[10])?>'], [5, '<?php echo floatval($dat[13])?>'], [6, '<?php echo floatval($dat[16])?>'], [7, '<?php echo floatval($dat[19])?>']], 
			                  points: { show: true, radius: 0}, 
			                  splines: { show: true, tension: 0.45, lineWidth: 2, fill: 0 } 
			                },
							{ 
			                  data: [[1, '<?php echo floatval($dat[2])?>'], [2, '<?php echo floatval($dat[5])?>'], [3, '<?php echo floatval($dat[8])?>'], [4, '<?php echo floatval($dat[11])?>'], [5, '<?php echo floatval($dat[14])?>'], [6, '<?php echo floatval($dat[17])?>'], [7, '<?php echo floatval($dat[20])?>']], 
			                  points: { show: true, radius: 0}, 
			                  splines: { show: true, tension: 0.45, lineWidth: 2, fill: 0 } 
			                }
			              ], 
			              {
			                colors: ['#0cc2aa','#fcc100','#a88add'],
			                series: { shadowSize: 3 },
			                xaxis: { show: true, font: { color: '#ccc' }, position: 'bottom' },
			                yaxis:{ show: true, font: { color: '#ccc' }},
			                grid: { hoverable: true, clickable: true, borderWidth: 0, color: 'rgba(120,120,120,0.5)' },
			                tooltip: true,
			                tooltipOpts: { content: '%x.0 is %y.4',  defaultTheme: false, shifts: { x: 0, y: -40 } }
			              }
			            " style="height:162px">
								</div>
							</div>
						</div>
						<div class="col-sm-4 dker">
							<div class="box-header">
								<h3>Reports</h3>
							</div>
							<div class="box-body">
								<p class="text-muted">Aqui encontraras los datos consolidados comparados con otras
									Maquinas ,Referencias ,Operarios y materias Primas</p>
								<a href class="btn btn-sm btn-outline rounded b-success">Consolidados</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-xl-4">
					<div class="box">
						<div class="box-header">
							<h3>Datos Rendimiento</h3>
							<small>Calculo ultimos 7 dias</small>
						</div>
						<div class="box-tool">
							<ul class="nav">
								<li class="nav-item inline">
									<a class="nav-link">
										<i class="material-icons md-18">&#xe863;</i>
									</a>
								</li>
								<li class="nav-item inline dropdown">
									<a class="nav-link" data-toggle="dropdown">
										<i class="material-icons md-18">&#xe5d4;</i>
									</a>
									<div class="dropdown-menu dropdown-menu-scale pull-right">
										<a class="dropdown-item" href>dia</a>
										<a class="dropdown-item" href>semana</a>
										<a class="dropdown-item" href>mes</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item">hoy</a>
									</div>
								</li>
							</ul>
						</div>
						<div class="text-center b-t">
							<div class="row-col">
								<div class="row-cell p-a">
									<div class="inline m-b">
										<div ui-jp="easyPieChart" class="easyPieChart" ui-refresh="app.setting.color"
											data-redraw='true' data-percent="55" ui-options="{
	                      lineWidth: 8,
	                      trackColor: 'rgba(0,0,0,0.05)',
	                      barColor: '#0cc2aa',
	                      scaleColor: 'transparent',
	                      size: 100,
	                      scaleLength: 0,
	                      animate:{
	                        duration: 3000,
	                        enabled:true
	                      }
	                    }">
											<div>
												<h5>55%</h5>
											</div>
										</div>
									</div>
									<div>
										Terminado
										<small class="block m-b">320</small>
										<a href class="btn btn-sm white rounded">Gestion</a>
									</div>
								</div>
								<div class="row-cell p-a dker">
									<div class="inline m-b">
										<div ui-jp="easyPieChart" class="easyPieChart" ui-refresh="app.setting.color"
											data-redraw='true' data-percent="45" ui-options="{
	                      lineWidth: 8,
	                      trackColor: 'rgba(0,0,0,0.05)',
	                      barColor: '#fcc100',
	                      scaleColor: 'transparent',
	                      size: 100,
	                      scaleLength: 0,
	                      animate:{
	                        duration: 3000,
	                        enabled:true
	                      }
	                    }">
											<div>
												<h5>45%</h5>
											</div>
										</div>
									</div>
									<div>
										Parcial
										<small class="block m-b">205</small>
										<a href class="btn btn-sm white rounded">Gestion</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-xl-4">
					<div class="box">
						<div class="box-header">
							<h3>Maquina 21</h3>
							<small>Calculo ultimos 30 dias</small>
						</div>
						<div class="box-tool">
							<ul class="nav">
								<li class="nav-item inline">
									<a class="nav-link">
										<i class="material-icons md-18">&#xe863;</i>
									</a>
								</li>
								<li class="nav-item inline dropdown">
									<a class="nav-link" data-toggle="dropdown">
										<i class="material-icons md-18">&#xe5d4;</i>
									</a>
									<div class="dropdown-menu dropdown-menu-scale pull-right">
										<a class="dropdown-item" href>Diario</a>
										<a class="dropdown-item" href>Mensual</a>
										<a class="dropdown-item" href>Anual</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item">Today</a>
									</div>
								</li>
							</ul>
						</div>
						<div class="box-body">
							<div ui-jp="plot" ui-refresh="app.setting.color" ui-options="
	              [
	                { data: [[1, 3], [2, 2.6], [3, 3.2], [4, 3], [5, 3.5], [6, 3], [7, 3.5]], 
	                  points: { show: true, radius: 0}, 
                  	  splines: { show: true, tension: 0.45, lineWidth: 2, fill: 0.2 } 
	                },
	                { data: [[1, 3.6], [2, 3.5], [3, 6], [4, 4], [5, 4.3], [6, 3.5], [7, 3.6]], 
	                  points: { show: true, radius: 0}, 
                  	  splines: { show: true, tension: 0.45, lineWidth: 2, fill: 0.1 } 
	                }
	              ], 
	              {
	                colors: ['#fcc100','#0cc2aa'],
	                series: { shadowSize: 3 },
	                xaxis: { show: true, font: { color: '#ccc' }, position: 'bottom' },
	                yaxis:{ show: true, font: { color: '#ccc' },  min: 2},
	                grid: { hoverable: true, clickable: true, borderWidth: 0, color: 'rgba(120,120,120,0.5)' },
	                tooltip: true,
	                tooltipOpts: { content: '%x.0 is %y.4',  defaultTheme: false, shifts: { x: 0, y: -40 } }
	              }
	            " style="height:200px">
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-xl-4">
					<div class="box">
						<div class="box-header">
							<h3>Rendimiento</h3>
							<small>Escala ultimos 7 dias</small>
						</div>
						<div class="box-tool">
							<ul class="nav">
								<li class="nav-item inline">
									<a class="nav-link">
										<i class="material-icons md-18">&#xe863;</i>
									</a>
								</li>
								<li class="nav-item inline dropdown">
									<a class="nav-link" data-toggle="dropdown">
										<i class="material-icons md-18">&#xe5d4;</i>
									</a>
									<div class="dropdown-menu dropdown-menu-scale pull-right">
										<a class="dropdown-item" id="semana" href>This week</a>
										<a class="dropdown-item" href>This month</a>
										<a class="dropdown-item" href>This week</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item">Today</a>
									</div>
								</li>
							</ul>
						</div>
						
						<div class="box-body" id="Velocidades" class="morris" style="height: 232px;width:auto;" ></div>					
						
					</div>
				</div>
				<div class="col-md-12 col-xl-12">
					<div class="box">
						<div class="box-header">
							<h3>Rendimiento</h3>
							<small>Escala ultimos 7 dias</small>
						</div>
						<div class="box-tool">
							<ul class="nav">
								<li class="nav-item inline">
									<a class="nav-link">
										<i class="material-icons md-18">&#xe863;</i>
									</a>
								</li>
								<li class="nav-item inline dropdown">
									<a class="nav-link" data-toggle="dropdown">
										<i class="material-icons md-18">&#xe5d4;</i>
									</a>
									<div class="dropdown-menu dropdown-menu-scale pull-right">
										<a class="dropdown-item" id="semana" href>This week</a>
										<a class="dropdown-item" href>This month</a>
										<a class="dropdown-item" href>This week</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item">Today</a>
									</div>
								</li>
							</ul>
						</div>
						
						<div class="box-body" >
						<canvas id="myChart" style="height: 200px;width:auto;"></canvas>
						</div>					
						
					</div>
				</div>
			</div>

			<!-- ############ PAGE END-->

		</div>
	</div>
	<!-- / -->

	<?php require_once 'Theme.php' ?>
	<!-- / -->

	<!-- ############ LAYOUT END-->

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
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
	<script src="scripts/app.js"></script>
	<!-- ajax -->
	<script src="../libs/jquery/jquery-pjax/jquery.pjax.js"></script>
	<script src="scripts/ajax.js"></script>
	<script src="https://unpkg.com/mqtt/dist/mqtt.min.js"></script>
	

	<script>
	var dataGraficoArea="[{ data: [[1, 3], [2, 2.6], [3, 3.2], [4, 3], [5, 3.5], [6, 3], [7, 3.5]], 	                  points: { show: true, radius: 0}, 	 splines: { show: true, tension: 0.45, lineWidth: 2, fill: 0.2 }   }, { data: [[1, 3.6], [2, 3.5], [3, 6], [4, 4], [5, 4.3], [6, 3.5], [7, 3.6]], 	                  points: { show: true, radius: 0},                   	  splines: { show: true, tension: 0.45, lineWidth: 2, fill: 0.1 }    } ], {  colors: ['#fcc100','#0cc2aa'],  series: { shadowSize: 3 },  xaxis: { show: true, font: { color: '#ccc' }, position: 'bottom' },               yaxis:{ show: true, font: { color: '#ccc' },  min: 2},	                grid: { hoverable: true, clickable: true, borderWidth: 0, color: 'rgba(120,120,120,0.5)' },	                tooltip: true,	                tooltipOpts: { content: '%x.0 is %y.4',  defaultTheme: false, shifts: { x: 0, y: -40 } }  } ";
	console.log(dataGraficoArea);

	function data(){

		return dataGraficoArea;
	}
	
	</script>


 <script>

	 /*******************************************
********    procesos    ********************
********************************************* */
        var rpm;
        var kls;
        var temp;
        var estado;
        //console.log(luces);
          
        function update_values(rpm, kls,temp,estado) {
          $("#rpm").html(rpm);
          $("#kls").html(kls);
		  $("#temp").html(temp);
		  $("#estado").html(estado);
		  
		}     
       
        
        function process_msg(topic, message) {
          // ej: "10,11,12"
          if (topic == "values") {
            var msg = message.toString();
            var sp = msg.split(",");
            var rpm = sp[0];
            var kls = sp[1];
			var temp = sp[2];
			if(rpm>0){
				estado="ON"
			}
            update_values(rpm, kls, temp,estado);
           
          }
          if (topic == "valuesM2") {
            var msg = message.toString();
            var sp = msg.split(",");
            var rpm = sp[0];
            var kls= sp[1];
			var temp = sp[2];
			if(rpm>0){
				estado="ON"
			}
			
			update_values(rpm, kls, temp,estado);
			
			intervalo(rpm,kls,temp);
			intervaloChart(rpm);
            
          }
          if (topic == "fabrica") {

            var msg = message.toString();
            //  console.log("fabrica envia->",msg);
          }
          /* if (topic == "revoluciones") {
            var msgR = message.toString();
            var rpm = msgR.substring(14);
            update_valuesR(rpm);
            rpmMaquina(rpm)
           
		  } */
		   /* ----------------grafica----------------------------- */
		   var datosG = 0;

          /* ----------------grafica----------------------------- */
        }

///----
///--

	 /*******************************************
********    conexion    ********************
********************************************* */
     // Initialize a mqtt variable globally
     const options = {
          clean: true, // retain session
      connectTimeout: 4000, // Timeout period
      // Authentication information
      clientId: 'carlos_mqtt'+(Math.floor((Math.random() * 1000) + 1)),
     username: 'client_web',
    password: '121212',
    keepalive:60,
}
const connectUrl = 'wss://suwebya.ga:8094/mqtt'
const client = mqtt.connect(connectUrl, options)

client.on('connect', () => {
    console.log('conectado con exito')
    client.publish('fabrica','hello SWY ', (error)=>{
      console.log(error || 'publish success')
	})
	

    client.subscribe('valuesM2',{qos:0},(error)=>{
      if(!error){
        console.log('Subscripcion exitosa con SWY')
      }else{
        console.log('subscripcion fallida reintentar')
      }
    })
})
client.on('reconnect', (error) => {
    console.log('reconnecting:', error)
})

client.on('error', (error) => {
    console.log('Connection failed:', error)
})

client.on('message', (topic, message) => {
  console.log('reciviendo  message：', topic,'->', message.toString())
  process_msg(topic, message) 
})


 </script>
 <script>
  //Cuando la página esté cargada completamente
  $(document).ready(function(){
    //Cada 10 segundos (10000 milisegundos) se ejecutará la función refrescar
    setTimeout(refrescar, 3600000);
  });
  function refrescar(){
    //Actualiza la página
    location.reload();
  }
</script>

<script>
// grafico de actualizacion dinamico----------------------------------

var Morris4 =new Morris.Line({
  // ID of the element in which to draw the chart.
  element: 'Velocidades',  
  
  // The name of the data record attribute that contains x-values.
  xkey: ['hours'],
  xlabel:['hours'],
  // A list of names of data record attributes that contain y-values.
  ykeys: ['valueA','valueB','valueC'],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['Maq 1','Maq 2','Maq 3'],
  lineWidth:[2],
  pointSize:[1],
  lineColors:["#0cc2aa","#6887ff","#a583d6"],
  hideHover: [true],
  ymax:[40],
  parseTime:[false] 
  
});
const numbers=[];
const chartDato=[];
// funcion para integrar datos a la grafica.
function intervalo(rpm,kls,temp){
	if(isNaN(rpm) ){		
		rpm=10;	
	}
	if(isNaN(kls) ){		
		kls=20;		
	}
	if(isNaN(temp) ){		
		temp=15;		
	}
	rpm=parseFloat(rpm);
	kls=parseFloat(kls);
	temp=parseInt(temp/3);
	numbers.unshift(rpm,kls,temp);
	
	if (numbers.length > 15) {
    numbers.length = 15;
	}
	
	var tiempo= new Date();
	var segundo = tiempo.getSeconds();
	
	

	var nuevaData=[ 
	{ hours:'11', valueA: numbers[14],valueB:numbers[13] ,valueC: numbers[12] },
	{ hours:'12', valueA: numbers[11],valueB:numbers[10],valueC: numbers[9] },
	{ hours:'13',  valueA: numbers[8],valueB: numbers[7],valueC: numbers[6] },
	{ hours:'14', valueA:numbers[5],valueB:numbers[4],valueC:numbers[3] },
	{ hours:'15', valueA:numbers[2],valueB:numbers[1],valueC: numbers[0] }]

	Morris4.setData(nuevaData);

};
setTimeout(() => {
		
	intervalo();
	
		
	
}, 2000);

</script>
<script src="js/chart2.js"></script>


</body>
</html>