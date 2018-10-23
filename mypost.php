<?php

include"main.php";

function encodechar($text)
{
include"includes/chars.php";
return $text;
}

if(isset($user['name'])){
if(strftime("%H") >= 0 && strftime("%H") <= 7) {
if(!empty($_POST['text'])) {
if($user['chat_ban'] != 1) {

$sql="INSERT INTO `chat` (username, content, date, time) VALUES ('".$user['name']."','".encodechar(striphtml($_POST['text']))."','".strftime("%d.%m.%Y")."','".strftime("%H:%M")."')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

} else { echo"1"; }
	} else { echo"2"; }
}
} else { echo"3"; }
?>