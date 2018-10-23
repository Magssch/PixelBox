<?php

include"main.php";

database_con();

if($settings['maintenance'] == "yes" && $user['level'] != "4") {
die("<meta http-equiv='refresh' content='0; url=maintenance.php'>"); }


pagetop($settings['site_name']);
include"includes/subheader_site.php";
pagemidcustom();
oB_start();
switch($_GET['action']) {

default:
$result = mysql_query("SELECT * FROM pages WHERE id='15'");
while($row = mysql_fetch_array($result))
  {
echo $row['content'];
  }
break;

case "about";
$result = mysql_query("SELECT * FROM pages WHERE id='2'");
while($row = mysql_fetch_array($result))
  {
echo $row['content'];
  }
break;

case "employees";
$result = mysql_query("SELECT * FROM pages WHERE id='16'");
while($row = mysql_fetch_array($result))
  {
echo $row['content'];
  }
break;

case "contact";
$result = mysql_query("SELECT * FROM pages WHERE id='17'");
while($row = mysql_fetch_array($result))
  {
echo $row['content'];
  }
break;

case "rules";
$result = mysql_query("SELECT * FROM pages WHERE id='18'");
while($row = mysql_fetch_array($result))
  {
echo $row['content'];
  }
break;

case "structur";
$result = mysql_query("SELECT * FROM pages WHERE id='19'");
while($row = mysql_fetch_array($result))
  {
echo $row['content'];
  }
break;

case "user";
$result = mysql_query("SELECT * FROM pages WHERE id='20'");
while($row = mysql_fetch_array($result))
  {
echo $row['content'];
  }
break;
}
pagebot($settings['footer']);


?>