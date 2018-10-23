<?php

if(!defined("MAIN_SET")) { die("Dette er en systemfil som er skjult for brukere"); }
if($user['level'] >= 4 && ($user['rights'] == "admin" || $user['rights'] == "forummod" || $user['rights'] == "forumglobal")) {

$query = mysql_query("SELECT * FROM threads WHERE id = '".$_GET['id']."' AND sticky < 1");

if(mysql_num_rows($query) > 0) {

$thread = mysql_fetch_array($query);

$query = mysql_query("SELECT * FROM forums WHERE id = '".$post['forum_id']."'");
$forum = mysql_fetch_array($query);


pagetop($settings['site_name']." forum - fest tr&#229;d");
include("includes/subheader.php");
pagemid();

mysql_query("UPDATE threads SET sticky = '1' WHERE id = '".$thread['id']."'");

echo"<meta http-equiv='refresh' content='0; url=forum?action=thread&id=".$thread['id']."'>";

echo"Tr&#229;den ble l&#229;st til toppen!";

pagebot($settings['footer']);
} else {
include("forum_inc/forumlist.php");
}
} else {
include("forum_inc/forumlist.php");
}
?>