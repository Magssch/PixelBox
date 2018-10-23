<?php

if(!defined("MAIN_SET")) { die("Dette er en systemfil som er skjult for brukere"); }

$query = mysql_query("SELECT * FROM forum_posts WHERE id = '".$_GET['id']."' AND author = '".$user['name']."'");


if(mysql_num_rows($query) > 0) {


if($user['chat_ban'] >= 1) {

pagetop($settings['site_name']." forum - endre post");
include("includes/subheader.php");
pagemid();

echo"Du har chatban og kan derfor ikke poste i forumet.";
pagebot($settings['footer']);
} else {

$post = mysql_fetch_array($query);

if($post['deleted'] < 1) {

$query = mysql_query("SELECT * FROM threads WHERE id = '".$post['thread_id']."' AND locked < 1");

if(mysql_num_rows($query) > 0) {

$thread = mysql_fetch_array($query);


$query = mysql_query("SELECT * FROM forums WHERE id = '".$post['forum_id']."'");
$forum = mysql_fetch_array($query);

if(isset($_GET['page']) && is_numeric($_GET['page'])) {
$tp=striphtml($_GET['page']);
} else {
$tp=1;
}

pagetop($settings['site_name']." - Forum");
include("includes/subheader.php");
pagemid();

if(isset($_POST['message']) && !empty($_POST['message'])) {

if(str_word_count($_POST['message']) >= 3) {

$code = $_SESSION['forum_post_code'];

unset($_SESSION['forum_post_code']);

if($code == $_POST['code']) {

$message = nl2br(striphtml($_POST['message']));

mysql_query("UPDATE forum_posts SET message = '".$message."' WHERE id = '".$post['id']."'");

mysql_query("UPDATE forum_posts SET date = '".strftime("%d.%m.%Y - %H:%M")."' WHERE id = '".$posts['id']."'");

mysql_query("UPDATE forum_posts SET ip = '".$_SERVER['REMOTE_ADRR']."' WHERE id = '".$post['id']."'");

mysql_query("UPDATE forum_posts SET edited = '1' WHERE id = '".$post['id']."'");



echo"Innlegget ble oppdatert!<br/><br/><b>| <a href='forum?action=thread&id=".$thread['id']."&page=".striphtml($_POST['page'])."#post-".$post['id']."'>Tilbake til tr&#229;den</a> | <a href='forum?action=forum&id=".$forum['id']."'>Til forumet</a> |</b>";
} else {
echo"<meta http-equiv='refresh' content='0; url=forum'>";
}

} else {
echo"Innlegget m&#229; inneholde minst 3 ord.<br/><br/><b>| <a href='forum?action=edit_post&id=".$_GET['id']."&page=".$tp."'>Pr&#248;v igjen</a> | <a href='forum?action=thread&id=".$thread['id']."&page=".striphtml($_POST['page'])."'>Tilbake til tr&#229;den</a> |</b>";
}
} else {

$mycode = randomtext("aA1", 10);

$_SESSION['forum_post_code'] = $mycode;


echo"<b><text class='nou'><span style='font-size: 11px; float:left;'><a href='forum?action=thread&id=".$thread['id']."&page=".$tp."' style='color: #3D3D3D;'>Tilbake til tr&#229;d</a></span></text></b><br/><hr/>
<form method='post' name='forum_form' action='?action=edit_post&id=".$_GET['id']."'>
<input type='hidden' name='code' value='".$mycode."'>
<b>Innlegg:</b><br/>
<textarea style='height: 140px; width: 400px;  
  font-family: Verdana;
  font-size: 11px;
  font-weight: normal;
  color: #000000;' name='message' cols='40' rows='15' id='textinput'>".solvebr($post['message'])."</textarea><br/>"; 

showcodes("message", "forum_form");
echo "<br/><br/><input type='submit' id='button' value='Oppdater innlegg' /><br/></form>";
}
pagebot($settings['footer']);
} else {
include("forum_inc/forumlist.php");
}
} else {
include("forum_inc/forumlist.php");
}
}
} else {
include("forum_inc/forumlist.php");
}
?>