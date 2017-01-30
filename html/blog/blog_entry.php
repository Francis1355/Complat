<?php
			$db = new Conexion();
			$id_blog_entry = $_GET['id_blog_entry'];
			//querys para cargar contenido del blog 
			$sql = $db->query("SELECT * FROM blog WHERE id_blog = '$id_blog_entry ' LIMIT 1;");
			if($db->rows($sql)){
				$datos_blog = $db->recorrer($sql);
			}else{
				header('location: ?view=error');
			}

			$db->liberar($sql);
			$db->close();

		?>
<!DOCTYPE html>
<html lang="es">


<head>
<?php include(HTML_DIR.'overall/head.php'); ?>
<meta property="og:url"	content="http://complat.net/'" />
<meta property="og:type" content="article" />	
	<?php echo '<meta property="og:title" content="'.$datos_blog['blog_title'].'" />'; ?>

	<?php echo '<meta property="og:image" content="'.APP_URL.$datos_blog['img_main_path'].'" />'; ?>
</head>


<!--Comentarios fb -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!-- share facebook -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=110004242845198";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>



<body>



<div class="wrapper">


	<?php include(HTML_DIR.'overall/header.php'); ?>

	<section class="container">
		<?php
			$db = new Conexion();
			$id_blog_entry = $_GET['id_blog_entry'];
			//querys para cargar contenido del blog 
			$sql = $db->query("SELECT * FROM blog WHERE id_blog = '$id_blog_entry ' LIMIT 1;");


			//Realizar verificacion 
			if($db->rows($sql)){
				$datos_blog = $db->recorrer($sql);

				echo "	<div class='img-blog'>
							<h1 class='blog-title-entry'>".$datos_blog['blog_title']."</h1>
						</div>";

				echo "	<div class='info-author'>
							<img class='blog-img-author' src='".$datos_blog['img_path_author']."' alt='".$datos_blog['author_name']."'>
							<div class='blog-info-author-name-tw'>
							<span><strong>".$datos_blog['author_name']."</strong></span>
							<br>
							<a href='".$datos_blog['author_tw']."' target='_blank'>@carlosmhw</a>
							</div>
							<span class='blog-date-entry'>".$datos_blog['date_publish']."</span>
						</div>";

				echo "	<div class='blog-content'>
							".$datos_blog['blog_content']."
						</div>"	;


				echo "	<div class='fb-share-button'
							data-href='".$datos_blog['data_href_url']."'
							data-layout='box_count' data-size='small' data-mobile-iframe='false'>
						</div>";


				echo "	<a href='https://twitter.com/share' class='twitter-share-button'					data-url='".$datos_blog['data_href_url']."' data-text='".$datos_blog['blog_title']."' data-via='twcomplat'>Tweet</a>
							<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>";


				echo "<div class='fb-comments' data-href='".$datos_blog['data_href_url']."' data-width='100%'	data-numposts='5'></div>";
			}else{
				header('location: ?view=error');
			}

			$db->liberar($sql);
			$db->close();

		?>
	</section>

	<div class="push"></div>



</div>

<!--Iniciar sesión-->
<?php include(HTML_DIR . '/public/login.php'); ?>

<!--Registro-->
<?php include(HTML_DIR . '/public/registro.html'); ?>

<!--Lost pass-->

<?php include(HTML_DIR . '/public/lostpass.html'); ?>


<footer class="footer">
	<?php include(HTML_DIR . '/overall/footer.php'); ?>
</footer>


</body>



</html>