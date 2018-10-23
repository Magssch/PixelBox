<?php

if(!defined("MAIN_SET")) { die("Dette er en systemfil som er skjult for brukere"); }

if($user['chat_ban'] >= 1) {

pagetop($settings['site_name']." forum - lag tr&#229;d");
include("includes/subheader.php");
pagemid();

echo"Du har chatban og kan derfor ikke opprette tr&#229;der i forumet.";
pagebot($settings['footer']);

} else {

$query = mysql_query("SELECT * FROM forums WHERE id = '".$_GET['forum_id']."'");
if(mysql_num_rows($query) > 0) {
$forum = mysql_fetch_array($query);


$query = mysql_query("SELECT id FROM threads ORDER BY id DESC LIMIT 1");
$thread = mysql_fetch_array($query);


pagetop($settings['site_name']." - Forum");
include("includes/subheader.php");
pagemid();

if(isset($_POST['message']) && !empty($_POST['message']) && isset($_POST['subject']) && !empty($_POST['subject'])) {


if(str_word_count($_POST['message']) >= 3) {


$code = $_SESSION['forum_threadmake_code'];

unset($_SESSION['forum_threadmake_code']);

if($code == $_POST['code']) {

$message = nl2br(striphtml($_POST['message']));

mysql_query("UPDATE forums SET total_threads = '".($forum['total_threads']+1)."' WHERE id = '".$forum['id']."'");
if($user['level'] > 3) {
$locked=$_POST['locked'];
$sticky=$_POST['sticky'];
} else {
$locked=0;
$sticky=0;
}
$sql="INSERT INTO threads (id, forum_id, subject, author, views, latestpost, lastpostby, posts, locked, date, sticky) VALUES 
('".($thread['id']+1)."', '".$forum['id']."','".striphtml($_POST['subject'])."','".$user['name']."','0','".time()."','','0','".striphtml($locked)."','".strftime("%d.%m.%Y - %H:%M")."','".striphtml($sticky)."')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }



$query = mysql_query("SELECT * FROM threads WHERE id = '".($thread['id']+1)."'");
if(mysql_num_rows($query) > 0) {
$thread = mysql_fetch_array($query);


$query = mysql_query("SELECT * FROM forums WHERE id = '".$thread['forum_id']."'");
$forum = mysql_fetch_array($query);


$query = mysql_query("SELECT id FROM forum_posts ORDER BY id DESC LIMIT 1");
$post = mysql_fetch_array($query);


mysql_query("UPDATE threads SET posts = '".($thread['posts']+1)."' WHERE id = '".$thread['id']."'");

mysql_query("UPDATE threads SET lastpostby = '".$user['name']."' WHERE id = '".$thread['id']."'");

mysql_query("UPDATE threads SET latestpost = '".time()."' WHERE id = '".$thread['id']."'");

mysql_query("UPDATE threads SET latestpostdate = '".strftime("%d.%m.%Y - %H:%M")."' WHERE id = '".$thread['id']."'");

mysql_query("UPDATE forums SET total_posts = '".($forum['total_posts']+1)."' WHERE id = '".$forum['id']."'");

if(!session_is_registered("created_thread")) {
mysql_query("UPDATE usersystem SET points = '".($user['points']+2)."' WHERE username = '".$user['name']."'");
$_SESSION['created_thread'] = "yes";
}

$sql="INSERT INTO forum_posts (id, forum_id, thread_id, message, author, date, ip) VALUES 
('".($post['id']+1)."', '".$forum['id']."','".$thread['id']."','".$message."','".$user['name']."','".strftime("%d.%m.%Y - %H:%M")."','".$_SERVER['REMOTE_ADDR']."')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

}
$x=$row['points'];
$vari = $x+3;

mysql_query("UPDATE usersystem SET points = '".$vari."'
WHERE username = '".$row['username']."'");


echo"Tr&#229;den ble opprettet!<br/><br/><b>| <a href='forum?action=thread&id=".$thread['id']."'>Til tr&#229;den</a> | <a href='forum?action=forum&id=".$forum['id']."'>Til forumet</a> |</b>";
} else {
echo"<meta http-equiv='refresh' content='0; url=forum'>";
}

} else {
echo"Innlegget m&#229; inneholde minst 3 ord.<br/><br/><b>| <a href='forum?action=create_thread&forum_id=".$forum['id']."'>Pr&#248;v igjen</a> | <a href='forum?action=forum&id=".$forum['id']."'>Tilbake til forumet</a> |</b>";
}

} else {

$mycode = randomtext("aA1", 10);

$_SESSION['forum_threadmake_code'] = $mycode;

echo"<b><text class='nou'><span style='font-size: 11px; float:left;'><a href='forum?action=forum&id=".$_GET['forum_id']."' style='color: #3D3D3D;'>Tilbake til forum</a></span></text></b><br/><hr/>
<form method='post' name='forum_form' action='?action=create_thread&forum_id=".$_GET['forum_id']."'>
<input type='hidden' name='code' value='".$mycode."'>
";
echo"<b>Tr&#229;dnavn:</b><br/><input type='text' name='subject' id='textinput'><br/><br/>";
 echo"<b>Innlegg:</b><br/>
<textarea style='height: 140px; width: 400px;  
  font-family: Verdana;
  font-size: 11px;
  font-weight: normal;
  color: #000000;' name='message' cols='40' rows='15' id='textinput'></textarea><br/>"; 

showcodes("message", "forum_form");
if($user['level'] > 3) {
echo "<br/><br/><b>L&#229;st tr&#229;d?</b><br/><input type='checkbox' name='locked' value='1'>";
}

if($user['level'] > 3) {
echo "<br/><br/><b>Tr&#229;d l&#229;st til toppen?</b><br/><input type='checkbox' name='sticky' value='1'>";
}

echo"<br/><br/><input type='submit' id='button' value='Opprett tr&#229;d' /><br/></form>";
}
pagebot($settings['footer']);
} else {
include("forum_inc/forumlist.php");
}
}
?>