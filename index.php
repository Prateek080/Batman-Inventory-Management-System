<?php
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 1);
echo "h3454";
include 'connect.php';
$db = new DB_CONNECT();
$con = $db->connect();

if($db)
{
echo "here";
header("Location:login.php");
}
else
echo "not";
