<?php 
	if(isset($_GET['key'], $_SESSION['app_id'])){
		$db = new Conexion();
		$id = $_SESSION['app_id'];
		$key = $db->real_escape_string($_GET['key']);
		$sql= $db->query("SELECT id_user FROM user WHERE id_user = '$id' AND keyreg = '$key' LIMIT 1;");
		if($db->rows($sql) > 0){
			$db->query("UPDATE user SET activo='1', keyreg='' WHERE id_user = '$id';");
			header('location: ?view=home&success=true');
		}else{
			header('location: ?view=home&error=true');

		}
		$db->liberar($sql);
		$db->close();


	}else{
		include('html/public/logearte.php'); 
	}

?>