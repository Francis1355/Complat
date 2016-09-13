<?php
  if(!empty($_POST['user']) and !empty($_POST['pass'])){
    $db = new Conexion();
    $data = $db->real_escape_string($_POST['user']);
    $pass = Encrypt($_POST['pass']);
    $sql = $db->query("SELECT id_user FROM user WHERE (user='$data' OR email='$data') AND pass='$pass' LIMIT 1;");
    if($db->rows($sql)>0){
      if($_POST['sesion']){
        ini_set('session.cookie_lifetime', time() + (60*60*24)); //La sesion dura 1 dia
        ini_set("session.gc_maxlifetime", time() + (60*60*24));      
      }
      $_SESSION['app_id'] = $db->recorrer($sql)[0];
      echo 1; //Todo correcto
    }else{
      echo '<div class="warning-fail">
            			<div class="div-icon-warning">
            				<span class="icon-exclamation"></span>
            			</div>
           				<div class="div-texto-warning">
            				<p class="p-texto-warning">Credenciales invalidas</p>
           				</div>  
            		</div>';

    }

    $db->liberar($sql);
    $db->close();
  }else{
    echo '<div class="warning-fail">
            			<div class="div-icon-warning">
            				<span class="icon-exclamation"></span>
            			</div>
           				<div class="div-texto-warning">
            			   <p class="p-texto-warning">Todos los campos deben estar llenos.</p>
           				</div>  
            		</div>';
  }
?>