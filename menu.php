<?php 
session_start();
$logged= $_SESSION['logged'];

if(!$logged){
  echo "Ingreso no autorizado";
  header("location:https://suwebya.tk/signin.php");
  die();
}

?>
<head>
 
  <link rel="apple-touch-icon" href="assets/images/logo.png">
  
</head>

<!-- ############ LAYOUT START-->

  <!-- aside -->
  <div id="aside" class="app-aside modal fade folded md nav-expand  mx-0">
  	<div class="left navside indigo-900 dk" layout="column">
      <div class="navbar navbar-md no-radius ">
        <!-- brand -->
        <a class="navbar-brand">
        	<div ui-include="'assets/images/logo.svg'"></div>
        	<img src="assets/images/logo.png" alt="." class="hide">
        	<span class="hidden-folded inline text-sm">Suwebya</span>
        </a>
        <!-- / brand -->
      </div>
      <div flex class="hide-scroll">
        <nav class="scroll nav-active-primary">
          
            <ul class="nav" ui-nav>
              <li class="nav-header hidden-folded">
                <small class="text-muted">Menu</small>
              </li>
              
              <li>
                <a href="dashboard.php" >
                  <span class="nav-icon">
                    <i class="material-icons">&#xe3fc;
                      <span ui-include="'assets/images/i_0.svg'"></span>
                    </i>
                  </span>
                  <span class="nav-text">Dashboard</span>
                </a>
              </li>
          
              <li>
                <a>
                  <span class="nav-caret">
                    <i class="fa fa-caret-down"></i>
                  </span>
                  <span class="nav-label">
                    <b class="label rounded label-sm primary">5</b>
                  </span>
                  <span class="nav-icon">
                    <i class="material-icons">&#xe5c3;
                      <span ui-include="'assets/images/i_1.svg'"></span>
                    </i>
                  </span>
                  <span class="nav-text">Apps</span>
                </a>
                <ul class="nav-sub">
                  <li>
                    <a href="inbox.html" >
                      <span class="nav-text">Inbox</span>
                    </a>
                  </li>
                  <li>
                    <a href="contact.html" >
                      <span class="nav-text">Contacts</span>
                    </a>
                  </li>
                  <li>
                    <a href="calendar.html" >
                      <span class="nav-text">Calendar</span>
                    </a>
                  </li>
                </ul>
              </li>
          
            
          
              <li class="nav-header hidden-folded">
                <small class="text-muted">Components</small>
              </li>  
              <li>
                <a>
                  <span class="nav-caret">
                    <i class="fa fa-caret-down"></i>
                  </span>
                  <span class="nav-label"><b class="label no-bg">9</b></span>
                  <span class="nav-icon">
                    <i class="material-icons">&#xe3e8;
                      <span ui-include="'assets/images/i_5.svg'"></span>
                    </i>
                  </span>
                  <span class="nav-text">Paginas</span>
                </a>
                <ul class="nav-sub nav-mega">
                  <li>
                    <a href="Dispositivos.php" >
                      <span class="nav-text">Dispositivos</span>
                    </a>
                  </li>
                  <li>
                    <a href="Operarios.php" >
                      <span class="nav-text">Operarios</span>
                    </a>
                  </li>
                  <li>
                    <a href="Maquinas.php" >
                      <span class="nav-text">Maquinas</span>
                    </a>
                  </li>                  
                  <li>
                    <a href="calendario.php" >
                      <span class="nav-text">Programacion Eventos</span>
                    </a>
                  </li>
                  <li>
                    <a href="gallery.html" >
                      <span class="nav-text">Gallery</span>
                    </a>
                  </li>
                
                </ul>
              </li>
          
              <li>
                <a>
                  <span class="nav-caret">
                    <i class="fa fa-caret-down"></i>
                  </span>
                  <span class="nav-icon">
                    <i class="material-icons">&#xe39e;
                      <span ui-include="'assets/images/i_6.svg'"></span>
                    </i>
                  </span>
                  <span class="nav-text">Formularios</span>
                </a>
                <ul class="nav-sub">
                  <li>
                    <a href="form.layout.html" >
                      <span class="nav-text">Form. Materia P</span>
                    </a>
                  </li>
                  <li>
                    <a href="form.element.html" >
                      <span class="nav-text">Form. Operario</span>
                    </a>
                  </li>
                  <li>
                    <a href="form.validation.html" >
                      <span class="nav-text">Form. turnos</span>
                    </a>
                  </li>
                  <li>
                    <a href="form.select.html" >
                      <span class="nav-text">Form. Maquinas</span>
                    </a>
                  </li>
                
                </ul>
              </li>
          
              <li>
                <a>
                  <span class="nav-caret">
                    <i class="fa fa-caret-down"></i>
                  </span>
                  <span class="nav-icon">
                    <i class="material-icons">&#xe896;
                      <span ui-include="'assets/images/i_7.svg'"></span>
                    </i>
                  </span>
                  <span class="nav-text">Tablas</span>
                </a>
                <ul class="nav-sub">
                  <li>
                    <a href="static.html" >
                      <span class="nav-text">Acumulado anual</span>
                    </a>
                  </li>
                  <li>
                    <a href="datatable.html" >
                      <span class="nav-text">Acumulado mensual</span>
                    </a>
                  </li>
                  <li>
                    <a href="footable.html" >
                      <span class="nav-text">Proyeccion</span>
                    </a>
                  </li>
                </ul>
              </li>
              <li>
                <a>
                  <span class="nav-caret">
                    <i class="fa fa-caret-down"></i>
                  </span>
                  <span class="nav-label hidden-folded">
                    <b class="label label-sm info">N</b>
                  </span>
                  <span class="nav-icon">
                    <i class="material-icons">&#xe1b8;
                      <span ui-include="'assets/images/i_8.svg'"></span>
                    </i>
                  </span>
                  <span class="nav-text">Graficas</span>
                </a>
                <ul class="nav-sub">
                 
                  <li>
                    <a>
                      <span class="nav-caret">
                        <i class="fa fa-caret-down"></i>
                      </span>
                      <span class="nav-text">Produccion</span>
                    </a>
                    <ul class="nav-sub">
                      <li>
                        <a href="echarts-line.html" >
                          <span class="nav-text">Maquina</span>
                        </a>
                      </li>
                      <li>
                        <a href="echarts-bar.html" >
                          <span class="nav-text">Operario</span>
                        </a>
                      </li>
                      <li>
                        <a href="echarts-pie.html" >
                          <span class="nav-text">Materia Prima</span>
                        </a>
                      </li>
                      <li>
                        <a href="echarts-scatter.html" >
                          <span class="nav-text">Referencia</span>
                        </a>
                      </li>
                     
                    </ul>
                  </li>
                </ul>
              </li>
          
              <li class="nav-header hidden-folded">
                <small class="text-muted">Ayuda</small>
              </li>
              
              <li class="hidden-folded" >
                <a href="docs.html" >
                  <span class="nav-text">Documentacion</span>
                </a>
              </li>
          
            </ul>
        </nav>
      </div>
      <div flex-no-shrink>
        <div ui-include="'views/blocks/aside.bottom.0.html'"></div>
      </div>
    </div>
  </div>
    <!-- / aside -->
  
  <!-- content -->
  <div id="content" class="app-content box-shadow-z0" role="main">
    <div class="app-header white box-shadow navbar-md">
        <div class="navbar navbar-toggleable-sm flex-row align-items-center">
            <!-- Open side - Naviation on mobile -->
            <a data-toggle="modal" data-target="#aside" class="hidden-lg-up mr-3">
              <i class="material-icons">&#xe5d2;</i>
            </a>
            <!-- / -->
        
            <!-- Page title - Bind to $state's title -->
            <div class="mb-0 h5 no-wrap" ng-bind="$state.current.data.title" id="pageTitle"></div>
        
            <!-- navbar collapse -->
            <div class="collapse navbar-collapse" id="collapse">
              <!-- link and dropdown -->
              <ul class="nav navbar-nav mr-auto">
                <li class="nav-item dropdown">
                  <a class="nav-link" href data-toggle="dropdown">
                    <i class="fa fa-fw fa-plus text-muted"></i>
                    <span > </span>
                  </a>
                  <div ui-include="'views/blocks/dropdown.new.html'"></div>
                </li>
              </ul>
        
              <div ui-include="'views/blocks/navbar.form.html'"></div>
              <!-- / -->
            </div>
            <!-- / navbar collapse -->
        
            <!-- navbar right -->
            <ul class="nav navbar-nav ml-auto flex-row">
              <li class="nav-item dropdown pos-stc-xs">
                <a class="nav-link mr-2" href data-toggle="dropdown">
                  <i class="material-icons">&#xe7f5;</i>
                  <span class="label label-sm up warn">3</span>
                </a>
                <div ui-include="'views/blocks/dropdown.notification.html'"></div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link p-0 clear" href="#" data-toggle="dropdown">
                  <span class="avatar w-32">
                    <img src="assets/images/a5.jpg" alt="...">
                    <i class="on b-white bottom"></i>
                  </span>
                </a>
                <div ui-include="'views/blocks/dropdown.user.html'"></div>
              </li>
              <li class="nav-item hidden-md-up">
                <a class="nav-link pl-2" data-toggle="collapse" data-target="#collapse">
                  <i class="material-icons">&#xe5d4;</i>
                </a>
              </li>
            </ul>
            <!-- / navbar right -->
        </div>
    </div>
    <div class="app-footer">
      <div class="p-2 text-xs">
        <div class="pull-right text-muted py-1">
          &copy; Copyright <strong>Suwebya</strong> <span class="hidden-xs-down">-Pasion por la Ingenieria   v1.1.3</span>
          <a ui-scroll-to="content"><i class="fa fa-long-arrow-up p-x-sm"></i></a>
        </div>
        <div class="nav">
          <a class="nav-link" href="">Nosotros</a>
          <a class="nav-link" href="http://themeforest.net/user/flatfull/portfolio?ref=flatfull">Informacion</a>
        </div>
      </div>
    </div>
    <div ui-view class="app-body" id="view">