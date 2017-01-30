<div class="cointainer-blog">
	<div class="search-blog">
		<ul>
			<li><input type="text" id="input_search" placeholder="Buscar..." class="input-search" onkeyup="search_blog();"></li>
			<li><span class="icon-search"></span></li>
		</ul>
	</div>

	<div class="blogs blogs-ajax" id="_SEARCH_AJAX_"></div>

	<div class="blogs" id="blogs">

		<a href="?view=blog_entry&id_blog_entry=1" class="blog-a">
			<div class="blog">
				<img class="blog-img" src="views/img/blog/1/main-img-blog.png" alt="Ransomware">
				<h4 class="blog-title">Ransomware</h4>
				<span class="blog-line"></span>
				<span class="blog-author">Carlos Carmona</span>
				<span class="blog-date">01/28/2017</span>
			</div>
		</a>

		<?php 
			/*//Inicia conexion con base de datos cargar cursos de programacion 
			$id_user = $users[$_SESSION['app_id']]['id_user'];
			$db = new Conexion();
			$sql = $db->query("SELECT * FROM course WHERE type ='PROGRAMACION';");
			if($db->rows($sql) > 0){
				echo '<h3>Programación:</h3>';
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
			}


			$db->liberar($sql);
			$db->liberar($sql_2);
			$db->close();*/

		?>
		
	</div>




</div>