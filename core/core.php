<?php
/*
  EL NUCLEO DE LA APLICACION!
*/

  session_start();

  #Constantes de conexion
  /*define('DB_HOST', 'localhost');
  define('DB_USER', 'root');
  define('DB_PASS', '');
  define('DB_NAME', 'complat');*/

  #Constantes de conexion
  define('DB_HOST', 'mysql.hostinger.mx');
  define('DB_USER', 'u705536276_admin');
  define('DB_PASS', 'complat1234');
  define('DB_NAME', 'u705536276_compl');


  #Constantes de la APP
  define('HTML_DIR', 'html/');
  define('APP_TITTLE', 'Complat' );
  define('APP_COPYRIGHT', 'Copyright &copy; ' . date('Y'),time() .' Complat Software.');
  //define('APP_URL', 'http://localhost/complat/');
  define('APP_URL', 'http://complat.esy.es/');


  /*#constante de php mailer 
  define('PHPMAILER_HOST', 'mx1.hostinger.mx');
  define('PHPMAILER_USER', 'soporte@complat.esy.es');
  define('PHPMAILER_PASS', 'jtiaXpmuk_045.H');
  define('PHPMAILER_PORT', 2525);*/

  /*Backup
  #constante de php mailer 
  define('PHPMAILER_HOST', 'smtp.gmail.com');
  define('PHPMAILER_USER', 'soporte.complat@gmail.com');
  define('PHPMAILER_PASS', 'jtiaXpmuk_045.G');
  define('PHPMAILER_PORT', 587);

  */

  require('vendor/autoload.php'); //cargar todos los componentes de las librerias descargadas con Composer
  require('core/models/class.Conexion.php');
  require('core/bin/functions/Encrypt.php');
  require('core/bin/functions/Users.php');
  require('core/bin/functions/EmailTemplate.php');
  require('core/bin/functions/LostPassTemplate.php');

  $users = Users();

?>
