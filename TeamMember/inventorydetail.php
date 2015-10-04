<?php

session_start();

if(!isset($_SESSION["view"]) )
header("Location:../index.php");
else{
include 'connect.php';
	$db = new DB_CONNECT();
$con = $db->connect();
}
?>


<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8"/>
	<title>Dashboard I Admin Panel</title>

	<link rel="stylesheet" href="../css/layout.css" type="text/css" media="screen" />
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<script src="../js/jquery-1.5.2.min.js" type="text/javascript"></script>
	<script src="../js/hideshow.js" type="text/javascript"></script>
	<script src="../js/jquery.tablesorter.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="../js/jquery.equalHeight.js"></script>
	<script type="text/javascript">
	$(document).ready(function()
    	{
      	  $(".tablesorter").tablesorter();
   	 }
	);
	$(document).ready(function() {

	//When page loads...
	$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content

	//On Click Event
	$("ul.tabs li").click(function() {

		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content

		var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active ID content
		return false;
	});

});
    </script>
    <script type="text/javascript">
    $(function(){
        $('.column').equalHeight();
    });
</script>

</head>


<body>

	<header id="header">
		<hgroup>
			<h1 class="site_title"><a href="index.php">User Area</a></h1>
				<h2 class="section_title">Dashboard</h2>
		</hgroup>
	</header> <!-- end of header bar -->
	


	
	<aside id="sidebar" class="column">
		<form class="quick_search">
			<input type="text" value="Quick Search" onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;">
		</form>
		<hr/>
		<h3>Projects</h3>
		<ul class="toggle">
			<li class="icn_new_article"><a href="inventorylist.php">List of Inventories</a></li>
			<br>
			<li class="icn_new_article"><a href="productlist.php">List of Gadgets</a></li>
		</ul>
		<br>
		<h3>Place Order</h3>
		<ul class="toggle">
			<li class="icn_new_article"><a href="new-notice.php">Place Your order</a></li>
			
		</ul>
		<br>
		
		<?php

	
	
	
	echo "</ul>";
	echo "<br>";
	echo "<br>";
	echo "<h3>Admin</h3>";
	echo  "<ul class='toggle'>";
echo "<form action='destroy.php' method='POST'>";
echo "<li><a><input type='submit' value='LOGOUT'></input></form></a></li>";
echo	"</ul>";
?>		
		<footer>
			<hr />
			</footer>
		
	</aside><!-- end of sidebar -->

	<section id="main" class="column">


		<article class="module width_full">

			<header><h3>PROJECT DETAILS</h3></header>
			<div class="message_list" style="height:600px;">

			<div class="module_content">



				<?php
				$id=$_POST['id'];

					$result = "SELECT * FROM inventory WHERE inventory_id='$id'";
$sql=$con->prepare($result);
$sql->bindParam(1,$id);
$sql->execute();
while($row = $sql->fetch(PDO::FETCH_ASSOC)){?>

   <div class="message">
   <br>
   <h3>
   <p align="left">NAME : <?php
   echo $row['name'];
				?>

</h3>

					</div>
					<br>
					<h3>DESCRIPTION OF THE PROJECT</h3>
					<br>
					<p><?php echo $row['description'];?></p>
					<?php }?>
   <br>
				<div class="clear"></div>
			</div>
		</article><!-- end of stats article -->

	





		<div class="clear"></div>




</body>

</html>
