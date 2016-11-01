<?php 
	$db = new Conexion(); 
	$id_user = $db->real_escape_string($_POST['id_user']);
	$id_course = $db->real_escape_string($_POST['id_course']);	
	if($db->query("CALL unsuscribe_user($id_user, $id_course)")){
		echo "1";
	}else{
		echo "<div class='unsucribe-user-fail'>No se pudo desiscribir.</div>";
	}
?>