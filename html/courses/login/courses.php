<div class="cointainer-courses">
	<div class="search-courses">
		<ul>
			<li><input type="text" placeholder="Buscar..." class="input-search"></li>
			<li><span class="icon-search"></span></li>
		</ul>
	</div>

	<div class="courses courses-ajax"></div>

	<div class="courses">
		<!--<div class="course">
			<img class="course-img" src="courses_assets/algorithms/img/div_img_course.png" alt="Algoritmos">
			<h4 class="course-title">Diseño de algoritmos</h4>
			<p class="course-description">Lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem lorem ipsum lorem ipsum lorem ipsum sit.</p>
		</div>-->

		<?php 
			//Inicia conexion con base de datos cargar cursos de programacion 
			/*$db = new Conexion();
			$sql = $db->query("SELECT * FROM course WHERE type ='PROGRAMACION';");
			if($db->rows($sql) > 0){
				echo '<h3>Programación:</h3>';
				while ($datos = $db->recorrer($sql)) {
					echo 	'<a href="'.$datos[5].'" class="course-a">
								<div class="course">
									<img class="course-img" src="'.$datos[6].'" alt="'.$datos[1].'"/>
									<h4 class="course-title">'.$datos[1].'</h4>
									<p class="course-description">'.$datos[2].'</p>
								</div>
							</a>';

				}*/
			}


			$db->liberar($sql);
			$db->close();

		?>
		
	</div>




</div>