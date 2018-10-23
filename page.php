<?php

if(isset($_GET['id'])) {

include"main.php";

database_con();

if($settings['maintenance'] == "yes" && $user['level'] != "4") {
die("<meta http-equiv='refresh' content='0; url=maintenance.php'>"); }

$result = mysql_query("SELECT * FROM pages WHERE id='".mysql_real_escape_string($_GET['id'])."'");
while($row = mysql_fetch_array($result))
  {
  
$id = $row['id'];
$title = $row['title'];
if(empty($row['subheader'])) {
$subheader = "subheader.php";
} else {
$subheader = $row['subheader'];
}
$content = stripslashes($row['content']);

  }


if($title != "" && $content !="") {


pagetop($settings['site_name']." - ".$title);
if(file_exists("includes/".$subheader)) {
include"includes/".$subheader."";
} else {
include"includes/subheader.php";
}
pagemidcustom();

ob_start();
eval("?>".$content."<?php ");
$content = ob_get_contents();
ob_end_clean();

echo $content;



pagebot($settings['footer']);


  } else {

echo"<meta http-equiv='refresh' content='0; url=index.php'>";

}
 
  
} else {

echo"<meta http-equiv='refresh' content='0; url=index.php'>";

}

?>