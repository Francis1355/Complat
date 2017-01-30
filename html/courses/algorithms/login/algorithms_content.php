<?php 
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
		<?php 
			$db = new Conexion();
			$id_course_index = $_GET['id_course_index'];
			$id_course = $_GET['id_course']; 
			$id_user = $_SESSION['app_id']; 

			//querys para cargar contenido del curso 
			$sql = $db->query("SELECT content FROM course_content JOIN course_index using(id_course_index) WHERE id_course_index = '$id_course_index' LIMIT 1;");

			$sql2 = $db->query("SELECT topic_number FROM course_index WHERE id_course_index = '$id_course_index' LIMIT 1;");

			//Query para verificar si el usuario esta registrado al curso 
			$sql3 = $db->query("SELECT id_course FROM rel_user_course_score WHERE id_user = '$id_user' AND id_course = '$id_course' LIMIT 1");
			//Realizar verificacion 
			if($db->rows($sql3)){
				//Usuario esta inscrito 
				$topic_number = $db->recorrer($sql2)[0];

				$db->query("UPDATE rel_advance SET seen = '1' WHERE id_course = '$id_course' AND id_user = '$id_user' AND topic_number = '$topic_number';");

				if($db->rows($sql)){
					while ($content_course = $db->recorrer($sql)){
						echo $content_course[0];
					}
				}
			}else{
				//usuario no esta inscrito en el curso 
				//redireccionar a la pagina de cursos 
				header('location: ?view=courses&forbidden=true');
			}

			$db->liberar($sql);
			$db->liberar($sql2);
			$db->liberar($sql3);
			$db->close();			
		    
			
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