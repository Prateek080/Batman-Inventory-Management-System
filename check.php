
<?php

include("dbcon.php");

$user=$_POST['user'];
$pass=$_POST['pass'];



$result = "SELECT Password,Usertype FROM data WHERE Email='$user'";
$run = mysql_query($result) or die("ERROR".mysql_error());
$row=mysql_fetch_array($run);



if($pass != $row[0] || $pass == "")
{
	echo "<script>alert('Password dont match or mail id is wrong')</script>";
	echo "<script>window.location.assign('login.php')</script>";
}




else
{
session_start();
$_SESSION['view']=1;
$_SESSION['user']=$user;
if($row['Usertype']=='TeamM'){
echo "<script>window.location.assign('Team member/index.php')</script>";
}
else if($row['Usertype']=='Teaml'){
echo "<script>window.location.assign('Team Leader/index.php')</script>";
}
else if($row['Usertype']=='Pmanager'){
echo "<script>window.location.assign('Project-Manager/index.php')</script>";
}
else if($row['Usertype']=='admin'){
echo "<script>window.location.assign('admin/admin.php')</script>";
}
}
?>
