<?php
  if($_POST){
    require('core/core.php'); 
    switch (isset($_GET['mode']) ? $_GET['mode'] : null) {
      case 'login':
        require('core/bin/ajax/goLogin.php');
        break;
      case 'reg':
        require('core/bin/ajax/goReg.php');
        break;
      case 'lostpass':
        require('core/bin/ajax/goLostPass.php');
        break;

      case 'search':
        require('core/bin/ajax/goSearch.php');
        break;
      case 'enroll':
        require('core/bin/ajax/goEnroll.php');
        break;
      case 'unsuscribe':
        require('core/bin/ajax/goUnsuscribe.php');
        break;
      default:
        header('location: index.php');
        break;
    }
  }else{
    header('location: index.php');
  }
?>
