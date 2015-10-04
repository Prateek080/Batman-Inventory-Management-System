<?php

session_start();
if(!isset($_SESSION["view"]) )
header("Location:../index.php");
else{
include 'connect.php';
$db = new DB_CONNECT();
$con = $db->connect();

$id=$_POST['id'];
$cost=$_POST['cost'];

print_r($_POST);

$costsum=0;
foreach ($_POST['inventory'] as $value) {
  $sql1 = "INSERT INTO product_inventory(product_id,inventory_id) VALUES (?,?)";
  $sql=$con->prepare($sql1);
  				$sql->bindParam(1,$id);
          	$sql->bindParam(2,$value);
  				$sql->execute();

  $sql2="select  * from inventory where id=?";
  $sql2=$con->prepare($sql2);
  				$sql2->bindParam(1,$value);
  				$sql2->execute();
  while($row2 = $sql2->fetch(PDO::FETCH_ASSOC)){
     $costsum+=$cost[$row2['id']]*$row2['cost'];
     $new_count=$row2['count']-$cost[$row2['id']];
     $sql3="update inventory set count=? where id=?";
     $sql3=$con->prepare($sql3);
     				$sql3->bindParam(1,$new_count);
            $sql3->bindParam(2,$row2['id']);
     				$sql3->execute();
}
  }
  $sql4="update product set cost=? where product_id=?";
  $sql4=$con->prepare($sql4);
         $sql4->bindParam(1,$costsum);
          $sql4->bindParam(2,$id);
         $sql4->execute();


echo "<script>window.location.assign('index.php')</script>";


}
?>
