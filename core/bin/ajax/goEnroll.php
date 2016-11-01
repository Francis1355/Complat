<?php 
	$db = new Conexion(); 
	$id_user = $db->real_escape_string($_POST['id_user']);
	$id_course = $db->real_escape_string($_POST['id_course']);
	//echo "2";	
	if($db->query("CALL enroll_user($id_user, $id_course)")){
		echo "1";
	}else{
		echo "<div class='enroll-user-fail'>No se pudo inscribir.</div>";
	}
?>