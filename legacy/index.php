<?php
  session_start();
  if (!isset($_SESSION['auth']) || $_SESSION['auth'] != 1) {
   header('Location: /admin_page/login.php');
   exit();
 } elseif ($_SESSION['auth'] == 1){
   header('Location: /admin_page/dashboard.php');
   exit();
 }
 ?>
