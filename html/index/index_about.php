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

	<?php include(HTML_DIR.'overall/header.php'); ?>

	<section class="container">
		<?php include(HTML_DIR.'index/about.php'); ?>
	</section>
	<div class="push"></div>

</div>


<!--Iniciar sesión-->
<?php include(HTML_DIR . '/public/login.php') ?>

<!--Registro-->
<?php include(HTML_DIR . '/public/registro.html') ?>

<!--Lost pass-->

<?php include(HTML_DIR . '/public/lostpass.html') ?>



<footer class="footer">
	<?php include(HTML_DIR . '/overall/footer.php') ?>
</footer>


</body>
</html>