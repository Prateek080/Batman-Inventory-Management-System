<?php

session_start();
if (isset($_SESSION['view']))
{

include('../dbcon.php');


$date=date("Y/m/d H:i:s");
$user=$_SESSION['user'];
$status=$_POST['status'];

$sql = "INSERT INTO status(sender,status,date)
VALUES
('$user','$status','$date')";

mysql_query($sql) or die("ERROR".mysql_error());

echo "<script>alert('Inserted Successfully')</script>";
echo "<script>window.location.assign('index.php')</script>";
}

else
{
echo "<script>window.location.assign('login.php')</script>";
}
?>