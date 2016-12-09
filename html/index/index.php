<?php
	//Si no existe la variable view redirigir automaticamente a home 
	if(!isset($_GET['view'])){
		header('location: ?view=home'); 
	}
?>
<!DOCTYPE html>
<html lang="es">

<?php include(HTML_DIR.'overall/head.php') ?>

<body>

<div class="wrapper">

  <?php include(HTML_DIR.'overall/header.php') ?>


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
                    <p class="p-texto-warning">Para activar su cuenta favor de verificar el correo que ha sido enviado al Email registrado.</p>
                  </div>  
              </div>';
      }

    }
  ?>

  <!--Sección principal-->

  <?php 
    if(!isset($_SESSION['app_id'])){
      include(HTML_DIR . '/index/main_logout.php');
    }else{
      include(HTML_DIR . '/index/main_login.php');
    }
  ?>



  </section>
  <div class="push"></div>

</div>

<!--Footer-->
<footer class="footer">
  <?php include(HTML_DIR . '/overall/footer.php') ?>
</footer>


<!--Iniciar sesión-->
<?php include(HTML_DIR . '/public/login.php') ?>

<!--Registro-->
<?php include(HTML_DIR . '/public/registro.html') ?>

<!--Lost pass-->

<?php include(HTML_DIR . '/public/lostpass.html') ?>

</body>

</html>