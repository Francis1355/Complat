<?php
	//Cargar temario desde base de datos  
	//Inicia conexion con base de datos cargar cursos de programacion 
	$id_user = $users[$_SESSION['app_id']]['id_user'];
	$db = new Conexion();
	$sql = $db->query("SELECT * FROM course_index WHERE id_course = '1';");// Query para cargar informacion del curso 
	$sql2= $db->query("SELECT * FROM course WHERE id_course = '1' LIMIT 1;"); //Query para cargar la informacion de el curso 
	//Query para comprobar si el usuario esta inscrito en el curso 
	$sql3 = $db->query("SELECT id_course FROM rel_user_course_score WHERE id_user = '$id_user' LIMIT 1");
	$sql4 = $db->query("SELECT * FROM rel_advance WHERE id_user = '$id_user'");
	if($db->rows($sql) > 0){
		if($db->rows($sql2) > 0){
			$datos_curso = $db->recorrer($sql2); 
			echo '<img src="'.$datos_curso[7].'" alt="'.$datos_curso[1].'" class="course-img-main"/>';
			echo '<h3 class="course-title-main">'.$datos_curso[1].'</h3>';
			echo '<p class="course-main-description">'.$datos_curso[3].'</p>';
			echo '<h3>Temas:</h3>';
		}

		//TODO: verificar si el usuario esta inscrito al curso 
		if($db->rows($sql3) > 0){
			//Usuario incrito 
			while ($datos_indice = $db->recorrer($sql)) {
			echo '<ul class="temary">';
			$datos_seen = $db->recorrer($sql4);
			if($datos_indice[6] == $datos_seen[4]){
				// Si el dato de la tabla course index es igual al dato de la tabla rel_index ("topic_number")
				if($datos_seen[3] == 1){
					//usuario ya vio el tema
					if($datos_indice[3] == 0){
						//El elemento es un titulo
						echo '<li><a href="#" class="temary-a-item">'.$datos_indice[2].'</a><span class="course-taken-icon"></span></li>';
					}else{
						//El elemento es un subtitulo 
						echo '<li class="temary-subitem"></span><a href="#" class="temary-a-subitem">'.$datos_indice[2].'</a><span class="course-taken-icon"></li>';
					}
				}else{
					//Usuario no ha visto el tema
					if($datos_indice[3] == 0){
						//El elemento es un titulo
						echo '<li><a href="#" class="temary-a-item">'.$datos_indice[2].'</a></li>';
					}else{
						//El elemento es un subtitulo 
						echo '<li class="temary-subitem"></span><a href="#" class="temary-a-subitem">'.$datos_indice[2].'</a></li>';
					}
				}
			}
			echo '</ul>';
		}
		echo '<a href="#" value="#" id="btn_unsuscribe" class="btn-unsuscribe">Desiscribirse del curso</a>';
		}else{
			//Usuario no inscrito 
			while ($datos_indice = $db->recorrer($sql)) {
			echo '<ul class="temary">';
			if($datos_indice[3] == 0){
				echo '<li><a href="#" class="temary-a-item">'.$datos_indice[2].'</a></li>';
			}else{
				echo '<li class="temary-subitem"><a href="#" class="temary-a-subitem">'.$datos_indice[2].'</a></li>';
			}
			echo '</ul>';
		}

		echo '<a href="#" id="btn_login_get_login" class="btn-get">Inscribirse al curso</a>';
		}
		
		
	}


	$db->liberar($sql);
	$db->liberar($sql2);
	$db->liberar($sql3);
	$db->liberar($sql4);
	$db->close();

?>

<!--<img src="courses_assets/algorithms/img/main-img-course.png" alt="#" class="course-img-main"/>
<h3 class="course-title-main">Diseño de algoritmos</h3>
<p class="course-main-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis repellat velit in molestias dolore nobis recusandae voluptate mollitia nemo illum saepe cupiditate tempora ullam, vero adipisci, officia, dolor repellendus, tenetur.</p>
<h3>Temas:</h3>
<ul class="temary">
	<li><a href="#" class="temary-a-item">1. Introdución</a></li>
	<li class="temary-subitem"><a href="#" class="temary-a-subitem">1.1 ¿Qué es un algoritmo?</a></li>
	<li class="temary-subitem"><a href="#" class="temary-a-subitem">1.2 Pruebas</a></li>
</ul>
<a href="#" value="#" id="btn_get" class="btn-get">Inscribirse al curso</a>-->