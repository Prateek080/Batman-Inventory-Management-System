<!doctype html>
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

<html lang="en">

<head>
	<meta charset="utf-8"/>
	<title>Dashboard I  Panel</title>
	
	<link rel="stylesheet" href="css/layout.css" type="text/css" media="screen" />
	
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<script src="js/jquery-1.5.2.min.js" type="text/javascript"></script>
	<script src="js/hideshow.js" type="text/javascript"></script>
	<script src="js/jquery.tablesorter.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/jquery.equalHeight.js"></script>
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

    $(function(){
        $('.column').equalHeight();
    });
	
	function reset() {
    document.getElementById("Add").reset();
}
</script>
<script type="text/javascript">

function order()
{
	alert("Payment Gateway Required");
}
function checkform ()
{

  if (document.Add.id.value == "") {
    document.Add.id.focus();
    return false ;
  }
    if (document.Add.name.value == "") {

    document.Add.name.focus();
    return false ;
  }
    if (document.Add.description.value == "") {

    document.Add.description.focus();
    return false ;
  }
    if (document.Add.threshold.value == "") {
    document.Add.threshold.focus();
    return false ;
  }
    if (document.Add.count.value == "") {
    document.Add.count.focus();
    return false ;
  }

  return true ;
}
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
	<h4 class='alert_info'>Welcome to Batman Gadgets world</h4>
		<article class="module width_full">
	
			<header><h3>UPDATES</h3></header>
			<div class="message_list" style="height:600px;">
			
			<div class="module_content">
			
<?php

error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 1);

//get the q parameter from URL

$q="Google";

//find out which feed was selected
if($q=="Google") {
  $xml=("rss.xml");
} elseif($q=="NBC") {
  $xml=("http://rss.msnbc.msn.com/id/3032091/device/rss/rss.xml");
}

$xmlDoc = new DOMDocument();
$xmlDoc->load($xml);


//get elements from "<channel>"
$channel=$xmlDoc->getElementsByTagName('channel')->item(0);


$channel_title = $channel->getElementsByTagName('title')->item(0)->childNodes->item(0)->nodeValue;


$channel_link = $channel->getElementsByTagName('link')->item(0)->childNodes->item(0)->nodeValue;
$channel_desc = $channel->getElementsByTagName('description')->item(0)->childNodes->item(0)->nodeValue;
//output elements from "<channel>"
echo("<p><a href='" . $channel_link. "'>" . $channel_title . "</a><br>");
echo("<br><br>");
echo($channel_desc . "</p>");

//get and output "<item>" elements
$x=$xmlDoc->getElementsByTagName('item');
for ($i=0; $i<=2; $i++) {
  $item_title=$x->item($i)->getElementsByTagName('title')->item(0)->childNodes->item(0)->nodeValue;
  $item_link=$x->item($i)->getElementsByTagName('link')->item(0)->childNodes->item(0)->nodeValue;
  $item_desc=$x->item($i)->getElementsByTagName('description')->item(0)->childNodes->item(0)->nodeValue;
  echo ("<p><a href='" . $item_link. "'>" . $item_title . "</a>");
  echo ("<br>");
  echo ($item_desc . "</p><hr>");
}
?> 
   
				
					
				
				<div class="clear"></div>
			</div>
		</article><!-- end of stats article -->
		
		<article class="module width_3_quarter">
		<header><h3 class="tabs_involved">Sorted Inventories</h3>
		<ul class="tabs">
   			<li><a href="#tab1" onclick="order()"> Re Order </a></li>

		</ul>
		</header>

		<div class="message_list">
			<div id="module_content">
			<table class="tablesorter" cellspacing="0"> 
			<thead> 
				<tr> 
   					<th></th> 
    				<th>Name</th> 
    				<th>count</th> 
    				<th>cost</th> 
    				<th>threshold</th> 
				</tr> 
			</thead> 
			<tbody> 
				
				<?php 


				
				$sql="SELECT * FROM inventory WHERE threshold>count";
					$sql=$con->query($sql);

	                  while($rw = $sql->fetch(PDO::FETCH_ASSOC)){
	                  echo "<tr> <td><input type='checkbox'></td> <td> ".$rw['name']." </td> 	<td>".$rw['count']." </td> 	<td>".$rw['cost']." </td> <td>".$rw['threshold']."</td> </tr>";
	                  }
				
				?>
   				
			</tbody> 
			</table>
			</div><!-- end of #tab1 -->
			
			
			
		</div><!-- end of .tab_container -->
		
		</article><!-- end of content manager article -->
		
		<article class="module width_quarter">
		





			<header><h3>Messages</h3></header>
			<div class="message_list">
				<div class="module_content">
					
					<?php
					$sql2="select  * from admin_message where 1=1";
					$sql2=$con->prepare($sql2);
					$sql2->execute();
while($row2 = $sql2->fetch(PDO::FETCH_ASSOC)){
  $notice=$row2['message'];
				?>
				<div class="message" ><p style="width:100%; float:left;"><?php echo $notice;?></p>
					<p><strong>Admin</strong></p></div>
					
					<?php }?>
				</div>
			</div>
			
		</article><!-- end of messages article -->
		
		<div class="clear"></div>
		<form name="Add" method="POST" action="addinventory.php" onsubmit="return checkform()"  >
		<article class="module width_full">
			<header><h3>Add New Inventory</h3></header>
				<div class="module_content">
						<fieldset>
							<label>Inventory Id</label>
							<input type="text" name="id" value="" >
						</fieldset>
						<fieldset>
							<label>Inventory Name</label>
							<input type="text" name="name" value="" >
						</fieldset>
						<fieldset>
							<label>Description</label>
							<textarea rows="12" name="description" value=""></textarea>
						</fieldset>
						
						<fieldset>
							<label>Count</label>
							<input type="text" name="count" value="" >
						</fieldset>

						<fieldset>
							<label>Cost</label>
							<input type="text" name="cost" value="" >
						</fieldset>
						
						<fieldset style="width:48%; float:left; margin-right: 3%;"> <!-- to make two field float next to one another, adjust values accordingly -->
							<label>Category</label>
							<select style="width:92%;" name="category">
								<option value="Weapons">Weapons</option>
								<option value="Communicators">Communicators</option>
								<option value="Tracking Device">Tracking Device</option>
								<option value="Support System Inventory">Support System Inventory</option>
								<option value="Tech Kits">Tech Kits</option>
								<option value="Other">Other</option>
							</select>
						</fieldset>
						
					
						<fieldset style="width:48%; float:left;"> <!-- to make two field float next to one another, adjust values accordingly -->
							<label>Threshold</label>
							<input type="text" name="threshold" style="width:92%;">
						</fieldset><div class="clear"></div>
				</div>
				<footer>
					<div class="submit_link">
						<input type="submit" value="Add" class="alt_btn">
						<input type="button"  onclick="reset()"value="Reset"  >
					</div>
				</footer>
			</article><!-- end of post new article -->
		</form>
		
<br>
		<div class="clear"></div>
		<form name="products" method="POST" action="addgadgets.php" onsubmit="return validate()"  >
		<article class="module width_full">
			<header><h3>Add Gadgets</h3></header>
				<div class="module_content">
						<fieldset>
							<label>Gadget Name</label>
							<input type="text" name="name" value="" >
						</fieldset>
						<fieldset>
							<label>Description</label>
							<textarea rows="12" name="description" value=""></textarea>
						</fieldset>
						
				</div>
				<footer>
					<div class="submit_link">
						<input type="submit" value="Add" class="alt_btn">
						<input type="button"  onclick="reset()"value="Reset"  >
					</div>
				</footer>
			</article><!-- end of post new article -->
		</form>
		

		


</body>

</html>
