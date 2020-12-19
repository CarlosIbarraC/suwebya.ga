<?php
session_start();

require "conexion.php";
$email ="";
$password ="";
$name="";
$msg="";

if(isset($_POST['email'])&& isset($_POST['password'])&& isset($_POST['name'])){
  $email=strip_tags($_POST['email']);
  $password=strip_tags($_POST['password']);
  $name=strip_tags($_POST['name']);
  $password_r=strip_tags($_POST['password_r']); 

  if ($password==$password_r){
    $result=$conn->query("SELECT* FROM `user` WHERE `user_email` = '".$email."'");
    $users=$result->fetch_all(MYSQLI_ASSOC);
    //cuento elementos de la tabla
    $count=count($users);
    //si no hay usuario con el mismo email procedemos a insertar una fila con datos
    $password= sha1($password);//encripto clave
    if($count==0){
    $conn->query("INSERT INTO `user` (`user_name`, `user_email`, `user_pass`) VALUES ('".$name."', '".$email."', '".$password."');");
    $msg="usuario creado correctamente, ingresa <a href='signin.php'>Click aqui</a><br>";
    }else{
      $msg="El email ya existe <br>";
    }
  }else{
    $msg="las claves no coinciden";
  }
}else{
  $msg="complete el formulario";
}

?>


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
</head>
<body>
  <div class="app" id="app">

<!-- ############ LAYOUT START-->
  <div class="center-block w-xxl w-auto-xs p-y-md">
    <div class="navbar">
      <div class="pull-center">
        <div ui-include="'views/blocks/navbar.brand.html'"></div>
      </div>
    </div>

    <div class="p-a-md box-color r box-shadow-z1 text-color m-a">
      <div class="m-b text-sm">
        Inscribase para su cuenta en Suwebya
      </div>
      <form name="form" method="POST" target="signup.php">
        <div class="md-form-group">
          <input type="text" class="md-input" name="name" value="<?php echo $name;?>" required>
          <label>Name</label>
        </div>
        <div class="md-form-group">
          <input type="email" class="md-input" name="email" value="<?php echo $email;?>" required>
          <label>Email</label>
        </div>
        <div class="md-form-group">
          <input type="password" class="md-input" name="password" required>
          <label>Password</label>
        </div>
        <div class="md-form-group">
          <input type="password" class="md-input" name="password_r" required>
          <label>Repeat Password</label>
        </div>
        <div class="m-b-md">
          <label class="md-check">
            <input type="checkbox" required><i class="primary"></i> Acepto  <a href>terminos y condiciones</a>
          </label>
        </div>
        <button type="submit" class="btn primary btn-block p-x-md">Sign up</button>
      </form>
    </div>

    <div class="p-v-lg text-center">
      <div>Si ya tienes una cuenta ? <a ui-sref="access.signin" href="signin.php" class="text-primary _600">Sign in</a></div>
    </div>
    <div class="p-v-lg text-center text-danger">
      <div><p><?php echo $msg ?></p></div>
    </div>
  </div>

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
<!-- endbuild -->


 </body>
</html>