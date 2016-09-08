<?php 
	$db = new Conexion();
	$email = $db->real_escape_string($_POST['email']);

	$sql = $db->query("SELECT id_user, user FROM user WHERE email = '$email' LIMIT 1;");
	if($db->rows($sql) > 0){

		$data = $db->recorrer($sql);
		$id = $data[0];
		$user = $data[1];
		$keypass = md5(time());
		$new_pass = strtoupper(substr(sha1(time()),0,8));
		$link = APP_URL . '?view=lostpass&key='.$keypass;


		$asunto = "Recuperar contrasena perdida"; 
		//para el envío en formato HTML 
		$headers = "MIME-Version: 1.0\r\n"; 
		$headers .= "Content-type: text/html; charset=UTF-8\r\n"; //iso-8859-1
		//dirección del remitente 
		$headers .= "From: Complat <soporte@complat.esy.es>\r\n";

		$cuerpo= LostPassTemplate($user,$link);

		if(!mail($email,$asunto,$cuerpo,$headers)){
			$HTML = '<div class="warning-fail">
            			<div class="div-icon-warning">
            				<span class="icon-exclamation"></span>
            			</div>
           				<div class="div-texto-warning">
            				<p class="p-texto-warning">No se pudo enviar el correo, intentalo mas tarde.</p>
           				</div>  
            		</div>';

		}else{
			$db->query("UPDATE user SET keypass='$keypass', new_pass='$new_pass' WHERE id = '$id'; ");
			$HTML = 1; 
		}


	}else{
		$HTML = '<div class="warning-fail">
            			<div class="div-icon-warning">
            				<span class="icon-exclamation"></span>
            			</div>
           				<div class="div-texto-warning">
            				<p class="p-texto-warning">El email ingresado no existe en el sistema.</p>
           				</div>  
            	</div>';
	}


	$db->liberar($sql);
	$db->close();
	echo $HTML; 

?>