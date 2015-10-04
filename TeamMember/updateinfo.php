<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8"/>
	<title>Dashboard I Admin Panel</title>
	
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
			<h1 class="site_title"><a href="index.php">Admin Area</a></h1>
				<h2 class="section_title">Dashboard</h2>
		</hgroup>
	</header> <!-- end of header bar -->
	

		</hgroup>
	</header>
	

	
	<aside id="sidebar" class="column">
		<form class="quick_search">
			<input type="text" value="Quick Search" onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;">
		</form>
		<hr/>
		<h3>Your Profile</h3>
		<ul class="toggle">
		<br>
		<?php

session_start();
if (isset($_SESSION['view']))
{

include('dbcon.php');
$user = $_SESSION['user'];
$result = "SELECT * FROM data WHERE Email='$user'";
$run = mysql_query($result) or die("ERROR".mysql_error());
while($row = mysql_fetch_array($run))
  {
  

echo "<li class='icn_add_user'><a>Name:&nbsp;&nbsp;" . $row['Fname'] . "&nbsp;" . $row['Lname'] . "</a></li>";
echo "<li class='icn_add_user'><a>Mail:&nbsp;&nbsp;" . $row['Email']."</a></li>";
echo "<li class='icn_add_user'><a>Department:&nbsp;&nbsp;</a></li>";
echo "<li class='icn_add_user'><a>Designation:&nbsp;&nbsp;</a></li>";
echo "<li><a href='Update.php'><input type='button' value='update profile'/></a></li>";
echo "<br>";
$x=$row['Under'];
 $y=$row['Id'];
  }
  	echo	"</ul>";
	echo	"<h3>Team members</h3>";
	echo	"<ul class='toggle'>";
$result1= "SELECT Fname,Lname FROM data WHERE Usertype='TeamM' and Email != '$user' and Under='$x'";
$run1 = mysql_query($result1) or die("ERROR".mysql_error());
while($row2=mysql_fetch_array($run1))
	{
	echo		"<li class='icn_add_user'><a>". $row2['Fname'] . "&nbsp;" . $row2['Lname'] . "</a></li>";
	}
	echo	"</ul>";
	
	echo "<br>";
	echo "<h3>Change Password</h3>";
	echo  "<ul class='toggle'>";
	echo  "<li><a>New Password:</a><form action= '../pass.php' method='POST'><input type='hidden' name='id' value='". $y."'> </input><input type='pass' name='pass'></input><br><br><input type='submit' value='change'></form></li>";
	
	echo "</ul>";
	echo "<br>";
	echo "<h3>Admin</h3>";
	echo  "<ul class='toggle'>";
echo "<form action='destroy.php' method='POST'>";
echo "<li><a><input type='submit' value='LOGOUT'></input></form></a></li>";
echo	"</ul>";
	}
	?>		
		<footer>
			<hr />
			</footer>
	</aside><!-- end of sidebar -->
	
	<section id="main" class="column">
	<?php
if (isset($_SESSION['view']))
{

include('dbcon.php');
$user = $_SESSION['user'];



$result = "SELECT * FROM data WHERE Email='$user'";

$run = mysql_query($result) or die("ERROR".mysql_error());
$row=mysql_fetch_array($run);
	echo "<h4 class='alert_info'>Welcome &nbsp;". $row['Fname'] ."&nbsp;". $row['Lname'] ."&nbsp; . You Logged in as a team member</h4>";
}	?>
		
		
		
			
			
		
		
		<article class="module width_full">
			<header><h3>Update Your Information</h3></header>
				<div class="module_content">
				<form action="updateinfoaction.php" method="POST">
						<fieldset>
							<label>First Name</label>
							<input type="text" name="newF" value="<?php echo $row['Fname']; ?>">;
						</fieldset>
						<fieldset>
							<label>Last Name</label>
							<input type="text" name="newL" value="<?php echo $row['Lname']; ?>">;
						</fieldset>
						<fieldset>
							<label>City</label>
							<input type="text" name="newC" value="<?php echo $row['City']; ?>">;
						</fieldset>
						<fieldset>
							<label>Department</label>
							<input type="text">
						</fieldset>
					
						
						<fieldset style="width:48%; float:left; margin-right: 3%;"> <!-- to make two field float next to one another, adjust values accordingly -->
							<label>Designation</label>
							<select style="width:92%;">
								<option>Development Head</option>
								<option>Project Manager</option>
								<option>Team Leader</option>
								<option>Team Member</option>
							</select>
						</fieldset>
						<div class="clear"></div>
				</div>
			<footer>
				<div class="submit_link">
				
					<input type="hidden" value="<?php echo $user; ?>">
					<input type="submit" value="Update" class="alt_btn">
				</div>
			</footer>
		</article><!-- end of post new article -->
		
		
		<div class="spacer"></div>
	</section>


</body>

</html>