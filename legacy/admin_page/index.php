<?php
  session_start();
  if (!isset($_SESSION['auth']) || $_SESSION['auth'] != 1) {
   header('Location: login.php');
   exit();
 } elseif ($_SESSION['auth'] == 1){
   header('Location: dashboard.php');
   exit();
 }
 ?>
