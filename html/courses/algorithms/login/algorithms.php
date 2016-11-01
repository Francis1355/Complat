<?php
	//Cargar temario desde base de datos  
	//Inicia conexion con base de datos cargar cursos de programacion 
	$id_user = $users[$_SESSION['app_id']]['id_user'];
	$db = new Conexion();
	$sql = $db->query("SELECT * FROM course_index WHERE id_course = '1';");// Query para cargar informacion del curso 
	$sql2= $db->query("SELECT * FROM course WHERE id_course = '1' LIMIT 1;"); //Query para cargar la informacion de el curso con id 1
	//Query para comprobar si el usuario esta inscrito en el curso 
	$sql3 = $db->query("SELECT id_course FROM rel_user_course_score WHERE id_user = '$id_user' AND id_course = '1' LIMIT 1");
	$sql4 = $db->query("SELECT * FROM rel_advance WHERE id_user = '$id_user';");
	if($db->rows($sql) > 0){
		if($db->rows($sql2) > 0){
			$datos_curso = $db->recorrer($sql2); 
			echo '<img src="'.$datos_curso[7].'" alt="'.$datos_curso[1].'" class="course-img-main"/>';
			echo '<h3 class="course-title-main">'.$datos_curso[1].'</h3>';
			echo '<p class="course-main-description">'.$datos_curso[3].'</p>';
			echo '<div class="video-intro-course">'.$datos_curso['video_intro_path'].'<div>';
			echo '<h3>Temas:</h3>';
		}

		//TODO: Cambiar numeros [1], por letras 
		if($db->rows($sql3) > 0){
			//Usuario incrito 
			while ($datos_indice = $db->recorrer($sql)) {
			echo '<ul class="temary">';
			$datos_seen = $db->recorrer($sql4);
			if($datos_indice['topic_number'] == $datos_seen['topic_number']){
				// Si el dato de la tabla course index es igual al dato de la tabla rel_index ("topic_number")
				if($datos_seen['seen'] == 1){
					//usuario ya vio el tema
					if($datos_indice['subitem'] == 0){
						//El elemento es un titulo
						echo '<li><a href="?view=algorithms_content&id_course_index='.$datos_indice['id_course_index'].'&id_course=1" class="temary-a-item">'.$datos_indice['title'].'</a><span class="course-taken-icon"></span></li>';
					}else{
						//El elemento es un subtitulo 
						echo '<li class="temary-subitem"></span><a href="?view=algorithms_content&id_course_index='.$datos_indice['id_course_index'].'&id_course=1" class="temary-a-subitem">'.$datos_indice['title'].'</a><span class="course-taken-icon"></li>';
					}
				}else{
					//Usuario no ha visto el tema
					if($datos_indice['subitem'] == 0){
						//El elemento es un titulo
						echo '<li><a href="?view=algorithms_content&id_course_index='.$datos_indice[0].'&id_course=1" class="temary-a-item">'.$datos_indice['title'].'</a></li>';
					}else{
						//El elemento es un subtitulo 
						echo '<li class="temary-subitem"></span><a href="?view=algorithms_content&id_course_index='.$datos_indice['id_course_index'].'&id_course=1" class="temary-a-subitem">'.$datos_indice['title'].'</a></li>';
					}
				}
			}
			echo '</ul>';
		}
		echo "<div id='_AJAX_ENROLL_'></div>";
		echo '<input type="hidden" value="'.$id_user.'" id="id_user_input"><input type="hidden" value="1" id="id_course_input">';
		echo '<button id="btn_unsuscribe_course" class="btn-unsuscribe">Desiscribirse del curso</button>';
		echo '<div class="box-warning-unsuscribe" id="box_warning_unsuscribe">
			<div id="_AJAX_UNSUSCRIBE_"</div>
			<p>¿Esta complematemente seguro de <strong>desiscribirse</strong> del curso?</p>
			<p>¡Todos sus avances se <strong>eliminaran</strong>!</p>
			<button id="btn_unsuscribe_yes" onClick="goUnsuscribe();" class="btn-unsuscribe-yes">Si</button>
			<button id="btn_unsuscribe_cancel" class="btn-unsuscribe-cancel">Cancelar</button>
		</div>';
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
		echo "<div id='_AJAX_ENROLL_'></div>";
		echo '<input type="hidden" value="'.$id_user.'" id="id_user_input"><input type="hidden" value="1" id="id_course_input">';
		echo '<button class="btn-get" id="btn_enroll_user" onclick="goEnroll();">Inscribirse al curso</button>';		
		}
		
		
	}


	$db->liberar($sql);
	$db->liberar($sql2);
	$db->liberar($sql3);
	$db->liberar($sql4);
	$db->close();

?>
<script src="views/js/enroll.js"></script>
<script src="views/js/unsuscribe.js"></script>
