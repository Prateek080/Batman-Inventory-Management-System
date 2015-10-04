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
$cost=isset($_POST['cost'])?$_POST['cost']:2;
$description=isset($_POST['description'])?$_POST['description']:"null";


$sql= "insert into product (product_id,name,cost,description) values(?,?,?,?)";
$sql=$con->prepare($sql);
$sql->bindParam(1,$id);
$sql->bindParam(2,$name);
$sql->bindParam(3,$cost);
$sql->bindParam(4,$description);
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

header("Location:index.php");
}
?>