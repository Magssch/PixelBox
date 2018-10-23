<?php

include"main.php";
if(defined("ONLINE")) {
define("FORUM2", true);

if($_GET['action'] == "easet" && !in_array("ese4", $user['itemsx'])) {
mysql_query("UPDATE usersystem SET items = '".$user['items']."ese4,' WHERE username='".$user['name']."'");
die("Du fant p&#229;skeegg nummer 4!");
}

switch($_GET['action'])
{

default:

include("forum_inc/forumlist.php");

break;

case("forum");
if(isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0) {

include("forum_inc/lookup_forum.php");

} else {
include("forum_inc/forumlist.php");
}
break;

case("thread");
if(isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0) {

include("forum_inc/lookup_thread.php");

} else {
include("forum_inc/forumlist.php");
}
break;

case("create_post");
if(isset($_GET['thread_id']) && is_numeric($_GET['thread_id']) && $_GET['thread_id'] > 0) {

include("forum_inc/create_post.php");

} else {
include("forum_inc/forumlist.php");
}

break;

case("edit_post");
if(isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0) {

include("forum_inc/edit_post.php");

} else {
include("forum_inc/forumlist.php");
}

break;

case("delete_post");
if(isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0) {

include("forum_inc/delete_post.php");

} else {
include("forum_inc/forumlist.php");
}

break;

case("close_thread");
if(isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0) {

include("forum_inc/close_thread.php");

} else {
include("forum_inc/forumlist.php");
}

break;

case("unlock_thread");
if(isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0) {

include("forum_inc/unlock_thread.php");

} else {
include("forum_inc/forumlist.php");
}

break;



case("sticky_thread");
if(isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0) {

include("forum_inc/sticky_thread.php");

} else {
include("forum_inc/forumlist.php");
}

break;

case("unsticky_thread");
if(isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0) {

include("forum_inc/unsticky_thread.php");

} else {
include("forum_inc/forumlist.php");
}

break;



case("delete_thread");
if(isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0) {

include("forum_inc/delete_thread.php");

} else {
include("forum_inc/forumlist.php");
}

break;

case("create_thread");
if(isset($_GET['forum_id']) && is_numeric($_GET['forum_id']) && $_GET['forum_id'] > 0) {

include("forum_inc/create_thread.php");

} else {
include("forum_inc/forumlist.php");
}

break;

}
} else {
echo"<meta http-equiv='refresh' content='0; url=index'>";
}

?>