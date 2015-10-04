<?php
session_start();

if(isset($_SESSION['view']))
  unset($_SESSION['view']);

if(isset($_SESSION['user']))
  unset($_SESSION['user']);

  session_destroy();
  echo "<script>window.location.assign('../login.php')</script>";
?> 