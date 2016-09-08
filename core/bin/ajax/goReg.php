<?php 
	$db = new Conexion();
	$pass = Encrypt($_POST['pass']);
	$user = $db-> real_escape_string($_POST['user']);
	$email = $db-> real_escape_string($_POST['email']);

	$sql = $db->query("SELECT user FROM user WHERE user ='$user' OR email = '$email' LIMIT 1;");

	if($db->rows($sql) == 0){

		$keyreg = md5(time());

		$link = APP_URL . '?view=activar&key=' . $keyreg;

		 
		$asunto = "Activa tu cuenta"; 
		//para el envío en formato HTML 
		$headers = "MIME-Version: 1.0\r\n"; 
		$headers .= "Content-type: text/html; charset=UTF-8\r\n"; //iso-8859-1
		//dirección del remitente 
		$headers .= "From: Complat <soporte@complat.esy.es>\r\n";

		$cuerpo= EmailTemplate($user,$link);

		if(!mail($email,$asunto,$cuerpo,$headers)){
			$HTML = '<div class="warning-fail">
            			<div class="div-icon-warning">
            				<span class="icon-exclamation"></span>
            			</div>
           				<div class="div-texto-warning">
            				<p class="p-texto-warning">No se pudo realizar el registro.</p>
           				</div>  
            		</div>';

		}else{
			$db->query("INSERT INTO user(user, pass, email, keyreg) VALUES('$user', '$pass', '$email', '$keyreg');");
			$sql_2 = $db->query("SELECT MAX(id) AS id FROM users;");
			$_SESSION['app_id'] = $db->recorrer($sql_2)[0]; 
			$db->liberar($sql_2); 
			$HTML = 1;

		}



		//En cuenta free no se puede usar esto 

		/*$mail = new PHPMailer;

		//$mail->SMTPDebug = 3;                               // Enable verbose debug output
		$mail->CharSet ="UTF-8";
		$mail->Encoding = "quoted-printable";
		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = PHPMAILER_HOST;  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = PHPMAILER_USER;                 // SMTP username
		$mail->Password = PHPMAILER_PASS;                           // SMTP password
		$mail->SMTPSecure = 'tls';   //ssl                         // Enable TLS encryption, `ssl` also accepted
		$mail->Port = PHPMAILER_PORT;                                    // TCP port to connect to

		$mail->setFrom(PHPMAILER_USER, APP_TITTLE); //Quien manda el correo 
		$mail->addAddress($email, $user);     // A quien le llega 
		
		$mail->isHTML(true);                                  // Set email format to HTML

		$mail->Subject = 'Activación de tu cuenta';
		$mail->Body    = EmailTemplate($user,$link);
		$mail->AltBody = 'Hola ' . $user . ' para activar tu cuenta accede al siguente enlace: ' . $link;

		if(!$mail->send()) {
			$HTML = '<div class="warning-fail">
            			<div class="div-icon-warning">
            				<span class="icon-exclamation"></span>
            			</div>
           				<div class="div-texto-warning">
            				<p class="p-texto-warning">'.$mail->ErrorInfo.'</p>
           				</div>  
            		</div>';
		} else {
    		$db->query("INSERT INTO users(user, pass, email, keyreg) VALUES('$user', '$pass', '$email', '$keyreg');");
			$sql_2 = $db->query("SELECT MAX(id) AS id FROM users;");
			$_SESSION['app_id'] = $db->recorrer($sql_2)[0]; 
			$db->liberar($sql_2); 
			$HTML = 1;
		}	*/	
		//En cuenta free no se puede usar esto 

	}else{
		$usuario = $db->recorrer($sql)[0];
		if(strtolower($user) == strtolower($usuario)){
			$HTML = '<div class="warning-fail">
            			<div class="div-icon-warning">
            				<span class="icon-exclamation"></span>
            			</div>
           				<div class="div-texto-warning">
            				<p class="p-texto-warning">El usuario ingresado ya existe.</p>
           				</div>  
            		</div>';

		}else{
			$HTML = '<div class="warning-fail">
            			<div class="div-icon-warning">
            				<span class="icon-exclamation"></span>
            			</div>
           				<div class="div-texto-warning">
            				<p class="p-texto-warning">El email ingresado ya existe.</p>
           				</div>  
            		</div>';
		}
	}
	$db->liberar($sql); 
	$db->close();
	echo $HTML;
?>