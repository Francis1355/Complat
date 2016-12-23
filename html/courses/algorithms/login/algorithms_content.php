<?php 
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
			$db = new Conexion();
			$id_course_index = $_GET['id_course_index'];
			$id_course = $_GET['id_course']; 
			$id_user = $_SESSION['app_id']; 


			$sql = $db->query("SELECT content FROM course_content JOIN course_index using(id_course_index) WHERE id_course_index = '$id_course_index' LIMIT 1;");

			$sql2 = $db->query("SELECT topic_number FROM course_index WHERE id_course_index = '$id_course_index' LIMIT 1;");

			$topic_number = $db->recorrer($sql2)[0];

			$db->query("UPDATE rel_advance SET seen = '1' WHERE id_course = '$id_course' AND id_user = '$id_user' AND topic_number = '$topic_number';");

			if($db->rows($sql)){
				while ($content_course = $db->recorrer($sql)){
					echo $content_course[0];
				}
			}

			
		    
			
		?>
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