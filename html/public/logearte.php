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
  <div class="warning-info">
    <div class="div-icon-warning">
      <span class="icon-exclamation"></span>
    </div>
    <div class="div-texto-warning">
      <p class="p-texto-warning">Para visualizar este contenido debes haber <a href="#" id="btn_logearte" class="link-warning" >iniciado sesión</a></p>
    </div>   
  </div>
	


</section>

<!--Iniciar sesión-->
<?php include(HTML_DIR . '/public/login.php') ?>

<!--Registro-->
<?php include(HTML_DIR . '/public/registro.html') ?>

<!--Lost pass-->

<?php include(HTML_DIR . '/public/lostpass.html') ?>

<script src="views/js/main.js"></script>

</body>

</html>