<?php 
	if(!empty($_POST['keyword'])){
		error_reporting (0); // Esto debe estar en comentario si se requiere hacer debug 
		$db = new Conexion();
		$keyword = $db->real_escape_string($_POST['keyword']);
		$id_user = $users[$_SESSION['app_id']]['id_user'];
		$sql = $db->query("SELECT * FROM course WHERE course_name LIKE '%$keyword%';");
		if(isset($id_user)){
			//Usuario tiene sesion iniciada 
			if($db->rows($sql)){
				while ($datos = $db->recorrer($sql)) {			
					$id_course = $datos[0];
					$sql_2 = $db->query("SELECT * FROM rel_user_course_score WHERE id_course ='$id_course' AND id_user='$id_user';");
					if($db->rows($sql_2) == 1){
						echo 	'<a href="'.$datos[5].'" class="course-a">
								<div class="course">
									<span class="course-enrolled-icon"></span>
									<img class="course-img" src="'.$datos[6].'" alt="'.$datos[1].'"/>
									<h4 class="course-title">'.$datos[1].'</h4>
									<p class="course-description">'.$datos[2].'</p>
								</div>
							</a>'; 
					}else{
						echo 	'<a href="'.$datos[5].'" class="course-a">
								<div class="course">
									<img class="course-img" src="'.$datos[6].'" alt="'.$datos[1].'"/>
									<h4 class="course-title">'.$datos[1].'</h4>
									<p class="course-description">'.$datos[2].'</p>
								</div>
							</a>';
					}			
				}
			}else{
				echo "<h4>Tu busqueda no devolvio ningun resultado.</h4>";
			}

		}else{
			//Usuario no tiene sesion iniciada
			if($db->rows($sql)){
				while ($datos = $db->recorrer($sql)) {			
					echo 	'<a href="'.$datos[5].'" class="course-a">
							<div class="course">
								<img class="course-img" src="'.$datos[6].'" alt="'.$datos[1].'"/>
								<h4 class="course-title">'.$datos[1].'</h4>
								<p class="course-description">'.$datos[2].'</p>
							</div>
						</a>';						
								
				}

			}else{
				echo "<h4>Tu busqueda no devolvio ningun resultado.</h4>";
			}

		}
		
	}
?>