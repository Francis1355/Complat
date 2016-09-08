<?php
	//Usuario no inicio sesion  
	//echo "Inside algoritms logout";

	//Cargar temario desde base de datos  

	//Inicia conexion con base de datos cargar cursos de programacion 
	$db = new Conexion();
	$sql = $db->query("SELECT * FROM course_index WHERE id_course = '1';");
	$sql2= $db->query("SELECT * FROM course WHERE id_course = '1' LIMIT 1;");
	if($db->rows($sql) > 0){
		if($db->rows($sql2) > 0){
			$datos_curso = $db->recorrer($sql2); 
			echo '<img src="'.$datos_curso[7].'" alt="'.$datos_curso[1].'" class="course-img-main"/>';
			echo '<h3 class="course-title-main">'.$datos_curso[1].'</h3>';
			echo '<p class="course-main-description">'.$datos_curso[3].'</p>';
			echo '<h3>Temas:</h3>';
		}
		
		while ($datos_indice = $db->recorrer($sql)) {
			echo '<ul class="temary">';
			if($datos_indice[3] == 0){
				echo '<li><a href="#" class="temary-a-item">'.$datos_indice[2].'</a></li>';
			}else{
				echo '<li class="temary-subitem"><a href="#" class="temary-a-subitem">'.$datos_indice[2].'</a></li>';
			}
			echo '</ul>';
		}

		echo '<a href="#" value="#" id="btn_get" class="btn-get">Inscribirse al curso</a>';
	}


	$db->liberar($sql);
	$db->liberar($sql2);
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