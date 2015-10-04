
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>





<div class="panel panel-default" id="news">
  <div class="panel-heading">
    <h3 class="panel-title">News</h3>
  </div>
  <div class="panel-body">
    
  
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
</div>
</div>




<style>
#news
{position:fixed;
top:10%;
left:10;
width:30%;
height:70%;
overflow-y:scroll;
overflow-x:hidden;}
</style>
