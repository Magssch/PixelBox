<?php

if(!defined("MAIN_SET")) { die("Dette er en systemfil som er skjult for brukere"); }
if($user['level'] >= 4 && ($user['rights'] == "admin" || $user['rights'] == "forummod" || $user['rights'] == "forumglobal")) {

$query = mysql_query("SELECT * FROM threads WHERE id = '".$_GET['id']."'");

if(mysql_num_rows($query) > 0) {

$thread = mysql_fetch_array($query);

$query = mysql_query("SELECT * FROM forums WHERE id = '".$thread['forum_id']."'");
$forum = mysql_fetch_array($query);


pagetop($settings['site_name']." forum - slett tr&#229;d");
include("includes/subheader.php");
pagemid();

mysql_query("DELETE FROM threads WHERE id = '".$thread['id']."' LIMIT 1");

mysql_query("DELETE FROM forum_posts WHERE thread_id = '".$thread['id']."'");


mysql_query("UPDATE forums SET total_posts = '".($forum['total_posts']-$thread['posts'])."' WHERE id = '".$thread['forum_id']."'");

mysql_query("UPDATE forums SET total_threads = '".($forum['total_threads']-1)."' WHERE id = '".$thread['forum_id']."'");


echo"<meta http-equiv='refresh' content='0; url=forum?action=thread&id=".$thread['id']."'>";

echo"Tr&#229;den ble slettet!";

pagebot($settings['footer']);
} else {
include("forum_inc/forumlist.php");
}
} else {
include("forum_inc/forumlist.php");
}
?>