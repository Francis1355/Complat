<?php
	//Si no existe la variable view redirigir automaticamente a home 
	if(!isset($_GET['view'])){
		header('location: ?view=home'); 
	}
?>
<!DOCTYPE html>
<html lang="es">

<?php include(HTML_DIR.'overall/head.php') ?>

<?php include(HTML_DIR.'overall/header.php') ?>


<body>	

<section class="container">
  <div class="warning-info">
    <div class="div-icon-warning">
      <span class="icon-exclamation"></span>
    </div>
    <div class="div-texto-warning">
      <p class="p-texto-warning">Para visualizar este contenido debes haber <a href="#" id="btn_logearte" >iniciado sesión</a></p>
    </div>   
  </div>
	<h1>Complat</h1>
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam incidunt qui fuga quam aliquam error distinctio nam animi. Molestias animi neque esse impedit tenetur nihil, debitis error vitae iure inventore!</p>
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia a cum porro. Quasi possimus fugit eum impedit cumque qui, rerum nostrum laborum, consequatur dolorum. Libero, quasi iusto enim recusandae veritatis.</p>
</section>

<!--Iniciar sesión-->
<?php include(HTML_DIR . '/public/login.html') ?>

<!--Registro-->
<?php include(HTML_DIR . '/public/registro.html') ?>

<script src="views/js/main.js"></script>

</body>

</html>