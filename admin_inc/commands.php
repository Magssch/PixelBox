<?php

if(!defined("MAIN_SET")) { die(); }

if($user['level'] >= 4 && ($user['rights'] == "admin" || $user['rights'] == "forumglobal")) {
if(isset($_POST['command'])) {

$command = explode("||", $_POST['command']);
$count = count($command);

switch(strtolower($command[0]))
{

case":updateuser";
if($user['rights'] == "admin") {
if($count == 4) {

mysql_query("UPDATE usersystem SET ".$command[2]." = '".$command[3]."' WHERE username = '".$command[1]."' LIMIT 1");

}
}
break;


case":updatebadge";
if($user['rights'] == "admin") {
if($count == 4) {

mysql_query("UPDATE badges SET ".$command[2]." = '".$command[3]."' WHERE code = '".$command[1]."' LIMIT 1");
}
}

break;


case":createforum";

if($count == 3) {

$query = mysql_query("SELECT id FROM forums ORDER BY id DESC LIMIT 1");
$latestid = mysql_fetch_array($query);

$sql="INSERT INTO forums (id, name, explanation, total_threads, total_posts) VALUES 
('".($latestid['id']+1)."','".$command[1]."','".$command[2]."','0','0')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

}

break;


case":updateforum";

if($count == 4) {

mysql_query("UPDATE forums SET ".$command[2]." = '".$command[3]."' WHERE name = '".$command[1]."' LIMIT 1");

}

break;


case":sumohash";
if($user['rights'] == "admin") {
if($count == 2) {

echo"<b>".sumohash($command[1])."</b><br/><br/>";

}
}
break;


case":updatethread";
if($user['rights'] == "admin") {
if($count == 4) {

mysql_query("UPDATE forums SET ".$command[2]." = '".$command[3]."' WHERE subject = '".$command[1]."' LIMIT 1");

}
}
break;


case":totallock";
if($user['rights'] == "admin") {
if($count == 2) {
if($command[1] == "on") {
mysql_query("UPDATE settings SET totallock = 'yes'");
} elseif($command[1] == "off") {
mysql_query("UPDATE settings SET totallock = 'no'");
} else { } }

break;
}
}


echo"Kommandoen ble utf&#248;rt!<br/><br/>";

}

echo"

<form method='post'>

<b>Kommando:</b><br/>
<input type='text' style='width: 250px;' id='textinput' name='command'>
<br/><br/><input type='submit' value='Utf&#248;r' id='button'>
</form>
";
}
?>