<?php

if(!defined("MAIN_SET")) { die("Dette er en systemfil som er skjult for brukere"); }
if($user['level'] >= 4 && ($user['rights'] == "admin" || $user['rights'] == "forummod" || $user['rights'] == "forumglobal")) {
$query = mysql_query("SELECT * FROM forum_posts WHERE id = '".$_GET['id']."'");


if(mysql_num_rows($query) > 0) {
$post = mysql_fetch_array($query);

if($post['deleted'] < 1) {

$query = mysql_query("SELECT * FROM threads WHERE id = '".$post['thread_id']."'");

if(mysql_num_rows($query) > 0) {

$thread = mysql_fetch_array($query);


$query = mysql_query("SELECT * FROM forums WHERE id = '".$post['forum_id']."'");
$forum = mysql_fetch_array($query);


pagetop($settings['site_name']." forum - slett post");
include("includes/subheader.php");
pagemid();

mysql_query("UPDATE forum_posts SET message = '[Melding slettet]' WHERE id = '".$post['id']."'");

mysql_query("UPDATE forum_posts SET date = '".strftime("%d.%m.%Y - %H:%M")."' WHERE id = '".$posts['id']."'");

mysql_query("UPDATE forum_posts SET edited = '0' WHERE id = '".$post['id']."'");

mysql_query("UPDATE forum_posts SET deleted = '1' WHERE id = '".$post['id']."'");

echo"<meta http-equiv='refresh' content='0; url=forum?action=thread&id=".$thread['id']."'>";

echo"Posten ble slettet!";

pagebot($settings['footer']);
} else {
include("forum_inc/forumlist.php");
}
} else {
include("forum_inc/forumlist.php");
}
} else {
include("forum_inc/forumlist.php");
}
} else {
include("forum_inc/forumlist.php");
}
?>