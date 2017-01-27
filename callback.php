<?php 

	//curl_setopt( $ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4 );

	require('core/core.php');
	
	$db = new Conexion();

	$fb = new Facebook\Facebook([
  					'app_id' => '110004242845198',
  					'app_secret' => 'fc14f5c89d299ad42f4d52c863204d59',
  					'default_graph_version' => 'v2.8',
  				]);

	$helper = $fb->getRedirectLoginHelper();

	try {
		$accessToken = $helper->getAccessToken();
		$response = $fb->get('/me?fields=id,first_name,last_name,email',$accessToken);
		$user = $response->getGraphUser();
		$id_facebook = $user->getID();
		$email = $user->getEmail();	
		$first_name = str_replace(' ', '', $user->getFirstName());
		$last_name = str_replace(' ', '', $user->getLastName());
		$nuevoUser =  $first_name.$last_name;
		$password = md5(time());
	  	$sql = $db->query("SELECT id_user FROM user WHERE email='$email' LIMIT 1;");
	  	if($db->rows($sql)>0){
	        ini_set('session.cookie_lifetime', time() + (60*60*24)); //La sesion dura 1 dia
	        ini_set("session.gc_maxlifetime", time() + (60*60*24));   
	        $_SESSION['app_id'] = $db->recorrer($sql)[0]; 
	        $db->liberar($sql);
	    	$db->close();
	        header('Location: index.php?view=home');
	    }else{
      	//Registrar con email proporcianado por facebook 
	      	$keyreg = md5(time());

			$link = APP_URL . '?view=activar&key=' . $keyreg;

			 
			$asunto = "Activa tu cuenta"; 
			//para el envío en formato HTML 
			$headers = "MIME-Version: 1.0\r\n"; 
			$headers .= "Content-type: text/html; charset=UTF-8\r\n"; //iso-8859-1
			//dirección del remitente 
			$headers .= "From: Complat <soporte@complat.esy.es>\r\n";

			$cuerpo= EmailTemplate($nuevoUser,$link);

			if(!mail($email,$asunto,$cuerpo,$headers)){
				echo "No se pudo realizar el registro.... intenta mas tarde.";
			}else{
				$db->query("INSERT INTO user (user, pass, email, permiso, keyreg, keypass, new_pass) VALUES ('$nuevoUser', '$password', '$email', '0', '$keyreg', '','');");
				$sql_2 = $db->query("SELECT MAX(id_user) AS id FROM user;");
				$_SESSION['app_id'] = $db->recorrer($sql_2)[0]; 
				$db->liberar($sql_2); 
				$db->close();
				header('Location: index.php?view=home'); 

			}
    	}

	} catch(Facebook\Exceptions\FacebookResponseException $e) {
	  // When Graph returns an error
	  echo 'Graph returned an error: ' . $e->getMessage();
	  exit;
	} catch(Facebook\Exceptions\FacebookSDKException $e) {
	  // When validation fails or other local issues
	  echo 'Facebook SDK returned an error: ' . $e->getMessage();
	  exit;
	}

?>


