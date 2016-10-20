<?php 
	if(!isset($_SESSION['app_id']) and isset($_GET['key'])){
		$db = new Conexion();
		$keypass = $db->real_escape_string($_GET['key']); 
		$sql = $db->query("SELECT id_user, new_pass FROM user WHERE keypass = '$keypass' LIMIT 1 ;");
		if($db->rows($sql) > 0){
			$data = $db->recorrer($sql); 
			$id_user = $data[0];
			$new_pass = Encrypt($data[1]);
			$password = $data[1];
			$db->query("UPDATE user SET keypass='', new_pass='', pass='$new_pass' WHERE id_user = '$id_user';"); 
			include('html/lostpass_mensaje.php'); 

		}else{
			header('location: ?view=home'); 
		}
		$db->liberar($sql); 
		$db->close(); 		
	}else{
		header('location: ?view=home'); 
	}

?>