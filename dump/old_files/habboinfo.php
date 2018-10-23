<?php

include"main.php";

database_con();

if($settings['maintenance'] == "yes" && $user['level'] != "4") {
die("<meta http-equiv='refresh' content='0; url=maintenance.php'>"); }

pagetop("Habboinfo");
include"includes/subheader_habboinfo.php";
pagemidcustom();
oB_start();
switch($_GET['action']) {

default:
$result = mysql_query("SELECT * FROM pages WHERE id='13'");
while($row = mysql_fetch_array($result))
  {
echo $row['content'];
  }
break;

case "guides";
$result = mysql_query("SELECT * FROM pages WHERE id='12'");
while($row = mysql_fetch_array($result))
  {
echo $row['content'];
  }
break;

case "safety";
$result = mysql_query("SELECT * FROM pages WHERE id='14'");
while($row = mysql_fetch_array($result))
  {
echo $row['content'];
  }
break;
}
pagebot($settings['footer']);



?>