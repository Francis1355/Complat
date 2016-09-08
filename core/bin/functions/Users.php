<?php
  function Users(){
    $db = new Conexion();
    $sql = $db->query("SELECT * FROM user;");
    if($db->rows($sql) > 0){
      while($d = $db->recorrer($sql)){
        $users[$d['id_user']] = array(
          'id_user' => $d['id_user'],
          'user' => $d['user'],
          'pass' => $d['pass'],
          'permiso' => $d['permiso'],
          'activo' => $d['activo']
        );
      }
    } else{
      $users = false;
    }
    $db->liberar($sql);
    $db->close();
    return $users;
  }
?>
