<?php
/**
 * Created by PhpStorm.
 * User: shubh
 * Date: 4/10/15
 * Time: 2:46 AM
 */
session_start();
if(!isset($_SESSION["view"]) )
header("Location:../index.php");
else{
 $_SESSION['add']=0;
include 'connect.php';
$db = new DB_CONNECT();
$con = $db->connect();

$id=isset($_POST['id'])?$_POST['id']:"null";
$name=isset($_POST['name'])?$_POST['name']:"null";
$category=isset($_POST['category'])?$_POST['category']:"null";
$threshold=isset($_POST['threshold'])?$_POST['threshold']:"null";
$cost=isset($_POST['cost'])?$_POST['cost']:20;
$count=isset($_POST['count'])?$_POST['count']:20;
$description=isset($_POST['description'])?$_POST['description']:"null";

$sql= "insert into inventory (inventory_id,name,category,threshold,cost,count,description) values(?,?,?,?,?,?,?)";
$sql=$con->prepare($sql);
$sql->bindParam(1,$id);
$sql->bindParam(2,$name);
$sql->bindParam(3,$category);
$sql->bindParam(4,$threshold);
$sql->bindParam(5,$cost);
$sql->bindParam(6,$count);
$sql->bindParam(7,$description);
$sql->execute();

$code=$sql->errorCode();
if($code='00000'){
      $_SESSION['add']=1;
    $response = '{"success":"true"}';
}
else
{   $_SESSION['add']=0;
    $response = '{"success":"false"}';
  }
echo "<script>window.location.assign('index.php')</script>";
print $response;
}
?>