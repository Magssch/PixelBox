<?php

include"main.php";

if(strftime("%H") >= 0 && strftime("%H") <= 7) {

function encodechar($text)
{
include"includes/chars.php";
return $text;
}

if(isset($user['name'])) {
mysql_query("UPDATE `usersystem` SET `last_chat_active` = '".time()."' WHERE `id` = '".$user['id']."' LIMIT 1");
}

$q = mysql_query("SELECT * FROM `chat` ORDER BY id LIMIT 50");

while($row = mysql_fetch_array($q))
{
echo"<div class='msgln' style='padding-bottom:4px;'><b>".encodechar($row['username'])."</b>: ".encodechar($row['content'])." (".$row['time'].")<br /></div>";
}
}
	
?>