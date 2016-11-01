<?php
	//Si no existe la variable view redirigir automaticamente a home 
	if(!isset($_GET['view'])){
		header('location: ?view=home'); 
	}
?>
<!DOCTYPE html>
<html lang="es">

<?php include(HTML_DIR.'overall/head.php'); ?>


<body>

<?php include(HTML_DIR.'overall/header.php'); ?>


<section class="container">

		<?php
			if(!isset($_SESSION['app_id'])){
				include(HTML_DIR.'courses/algorithms/logout/algorithms.php');
			}else{
				include(HTML_DIR.'courses/algorithms/login/algorithms.php');
			}
		?>

	
</section>


<!--Iniciar sesión-->
<?php include(HTML_DIR . '/public/login.php') ?>

<!--Registro-->
<?php include(HTML_DIR . '/public/registro.html') ?>

<!--Lost pass-->

<?php include(HTML_DIR . '/public/lostpass.html') ?>


</body>
</html>