<?php
	if(isset($_SESSION['app_id'])){
		include('html/courses/login/index_courses.php');
	}else{
		include('html/courses/logout/index_courses.php');
	}
  
?>
