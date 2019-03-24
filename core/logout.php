<?php
   session_start();
   unset($_SESSION["login_user"]);
   unset($_SESSION['valid']);
   
   echo 'You have cleaned session';
   header('Refresh: 2; URL = login.php');
?>