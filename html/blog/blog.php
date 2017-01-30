<?php
	//Si no existe la variable view redirigir automaticamente a home 
	if(!isset($_GET['view'])){
		header('location: ?view=home'); 
	}
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <?php include(HTML_DIR.'overall/head.php') ?>
</head>

<body>


<div class="wrapper">

  <?php include(HTML_DIR.'overall/header.php') ?>


  <section class="container">


  	<?php include('html/blog/blog_content.php'); ?>  


  </section>

  <br>
  <br>
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