<?php
session_start();
if(isset($_SESSION["view"]) )
header("Location:TeamMember/index.php");
else{
include 'connect.php';
$db = new DB_CONNECT();
$con = $db->connect();
$message="";
if(count($_POST)>0) {
    $username=$_POST["user_name"];
    $password=md5($_POST["password"]);
    $query="Select username, admin from users WHERE username=? and password=? Limit 1";

    $row  = $con->prepare($query);
    $row->bindParam(1,$username);
    $row->bindParam(2,$password);
    $row->execute();
    $flag=1;
   while( $row1=$row->fetch(PDO::FETCH_ASSOC)){
       $_SESSION["view"] = 1;
        $_SESSION["user"]=1;
       $message="username".$row1['username']."!!";
       $flag=0;

   }
    if($flag==1)
        $message = "Invalid Username or Password. If you are tyring something Fishy we are recording your attempts.";

}
}?>


<style>#cimage {
        background-repeat: no-repeat;
        background-position: 50%;
        border-radius: 50%;
        width: 100px;
        height: 100px;
    }




    .round {
        position:fixed;
        left:44%;
        top:5%;
        z-index: -1;
        border-radius: 50%;
        overflow: hidden;
        width: 150px;
        height: 150px;
        -webkit-box-shadow: 10px 10px 78px 0px rgba(0,0,0,0.75);
        -moz-box-shadow: 10px 10px 78px 0px rgba(0,0,0,0.75);
        box-shadow: 10px 10px 78px 0px rgba(0,0,0,0.75);

    }
    .round img {
        display: block;
        /* Stretch
              height: 100%;
              width: 100%; */
        min-width: 100%;
        min-height: 100%;
    }


    #frm{
        position:fixed;
        top:40%;
        left:45%;
        z-index:-1;


    }

body{
    background:teal;
    font-family: "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", Geneva, Verdana, sans-serif;
}



    #enterpassword{
        z-index:-2;
        position:absolute;
        top: 100%;
        left:20%;
    }

    .message
    {
     position:absolute;
        top:190%;
        left:-25%;
    }
    </style>

<html>
<head>
<title>User Login</title>
<link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>




<div class="round">
    <img src="bt.jpg" height="100%" width="100%"/>
</div>




<form name="frmUser" id="frm" method="post" action="">
<div class="message"><?php if($message!="") { echo $message; } ?></div>



<table border="0" cellpadding="10" cellspacing="1" width="500" align="center">






    <tr class="">
<td><input type="text" name="user_name" placeholder="Username"></td>
</tr>




    <tr class="">
<td><input type="password" name="password" placeholder="Password"> </td>


</tr>


</table>
</form>
</body>








<script>
    document.onkeydown=function(evt){
        var keyCode = evt ? (evt.which ? evt.which : evt.keyCode) : event.keyCode;
        if(keyCode == 13)
        {
            //your function call here
            document.frmUser.submit();
        }
    }
</script>










</html>



