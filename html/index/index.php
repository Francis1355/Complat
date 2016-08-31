<?php
	//Si no existe la variable view redirigir automaticamente a home 
	if(!isset($_GET['view'])){
		header('location: ?view=home'); 
	}
?>
<!DOCTYPE html>
<html lang="es">

<?php include(HTML_DIR.'overall/head.php') ?>

<?php include(HTML_DIR.'overall/header.php') ?>


<body>

<section class="container">
<?php 
	if(isset($_GET['success'])){
        echo '<div class="warning-success">
            		<div class="div-icon-warning">
            			<span class="icon-exclamation"></span>
            		</div>
           			<div class="div-texto-warning">
            			<p class="p-texto-warning">Tu usuario se ha activado correctamente.</p>
           			</div>  
            </div>';
    } 

?>
<?php 
	if(isset($_GET['error'])){
    	echo '<div class="warning-fail">
            		<div class="div-icon-warning">
            			<span class="icon-exclamation"></span>
            		</div>
           			<div class="div-texto-warning">
            			<p class="p-texto-warning">Tu usuario no se pudo activar.</p>
           			</div>  
            </div>';
    } 
?>
<?php
  if(isset($_SESSION['app_id'])){
    $userActive = $users[$_SESSION['app_id']]['activo']; 
    if($userActive == 0){
      echo '<div class="warning-info">
                <div class="div-icon-warning">
                  <span class="icon-exclamation"></span>
                </div>
                <div class="div-texto-warning">
                  <p class="p-texto-warning">Para activar su cuenta favor de verificar el correo que ha sido enviado a la cuenta registrada. En caso de no recibir el correo favor de verificar en correos no deseados.</p>
                </div>  
            </div>';
      /*echo '<div class="warning-info">
                <div class="div-icon-warning">
                  <span class="icon-exclamation"></span>
                </div>
                <div class="div-texto-warning">
                  <p class="p-texto-warning">En caso de no recibir el correo favor de verificar en correos no deseados (SPAM).</p>
                </div>  
            </div>';*/

    }

  }
?>

<?php include(HTML_DIR . '/overall/main.php') ?>


</section>

<!--Iniciar sesión-->
<?php include(HTML_DIR . '/public/login.html') ?>

<!--Registro-->
<?php include(HTML_DIR . '/public/registro.html') ?>

<!--Lost pass-->

<?php include(HTML_DIR . '/public/lostpass.html') ?>

<script src="views/js/main.js"></script>

</body>

</html>