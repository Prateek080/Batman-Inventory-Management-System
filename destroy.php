<?php
session_start();

if(isset($_SESSION['view']))
  unset($_SESSION['view']);

  session_destroy();
  echo "<script>window.location.assign('login.php')</script>";
?> 