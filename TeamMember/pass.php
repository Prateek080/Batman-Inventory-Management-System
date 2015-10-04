<?php

session_start();
if (isset($_SESSION['view']))
{

include('dbcon.php');
$user = $_SESSION['user'];
$pass = $_POST['pass'];
$result = "UPDATE data SET Password=$pass WHERE Email='$user'";
$run = mysql_query($result) or die("ERROR".mysql_error());

echo "<script>alert('Changed Successfully')</script>";
echo "<script>window.location.assign('Team member/index.php')</script>";
}
else
{
echo "<script>window.location.assign('login.php')</script>";
}
?>