<header>
	<?php 
		if(isset($_SESSION['app_id'])){
			echo '<div class="container-header">
					<a href="?view=home"><img src="views/img/complat_logo.png" alt="Complat" class="complat-logo"></a>
					<!-- Menu Desktop-->
					<nav class="nav-desktop">
						<ul>
							<li><a href="?view=logout">SALIR</a></li>
							<li><a href="?view=perfil&id='.$_SESSION['app_id'].'">'.strtoupper($users[$_SESSION['app_id']]['user']).'</a></li>
							<li><a href="#">ACERCA DE</a></li>
							<li><a href="#">MIS CURSOS</a></li>
							<li><a href="?view=home">INICIO</a></li>
						</ul>
					</nav>
				</div>';
		}else{
			echo '<div class="container-header">
					<a href="?view=home"><img src="views/img/complat_logo.png" alt="Complat" class="complat-logo"></a>
					<!-- Menu Desktop-->
					<nav class="nav-desktop">
						<ul>
							<li><a href="#" id="btn_registro">REGISTRO</a></li>
							<li><a href="#" id="btn_login">INICIAR SESIÓN</a></li>
							<li><a href="#">ACERCA DE</a></li>
							<li><a href="#">CURSOS</a></li>
							<li><a href="?view=home">INICIO</a></li>
						</ul>
					</nav>
				</div>';
		}
	?>
</header>