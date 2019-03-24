<?php
   session_start();
   unset($_SESSION["login_user"]);
   unset($_SESSION['valid']);
   
  // echo 'You have cleaned session';
   header('Refresh: 0.5; URL = ../index.php');
?>