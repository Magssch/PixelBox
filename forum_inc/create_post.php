<?php

if(!defined("MAIN_SET")) { die("Dette er en systemfil som er skjult for brukere"); }

if($user['chat_ban'] >= 1) {

pagetop($settings['site_name']." forum - opprett post");
include("includes/subheader.php");
pagemid();
echo"Du har chatban og kan derfor ikke poste i forumet.";
pagebot($settings['footer']);

} else {

$query = mysql_query("SELECT * FROM threads WHERE id = '".$_GET['thread_id']."' AND locked < '1'");
if(mysql_num_rows($query) > 0) {
$thread = mysql_fetch_array($query);


$query = mysql_query("SELECT * FROM forums WHERE id = '".$thread['forum_id']."'");
$forum = mysql_fetch_array($query);


$query = mysql_query("SELECT id FROM forum_posts ORDER BY id DESC LIMIT 1");
$post = mysql_fetch_array($query);

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


mysql_query("UPDATE threads SET posts = '".($thread['posts']+1)."' WHERE id = '".$thread['id']."'");

mysql_query("UPDATE threads SET lastpostby = '".$user['name']."' WHERE id = '".$thread['id']."'");

mysql_query("UPDATE threads SET latestpost = '".time()."' WHERE id = '".$thread['id']."'");

mysql_query("UPDATE threads SET latestpostdate = '".strftime("%d.%m.%Y - %H:%M")."' WHERE id = '".$thread['id']."'");

mysql_query("UPDATE forums SET total_posts = '".($forum['total_posts']+1)."' WHERE id = '".$forum['id']."'");


mysql_query("UPDATE usersystem SET points = '".($user['points']+1)."' WHERE username = '".$user['name']."'");

$sql="INSERT INTO forum_posts (id, forum_id, thread_id, message, author, date, ip) VALUES 
('".($post['id']+1)."', '".$forum['id']."','".$thread['id']."','".$message."','".$user['name']."','".strftime("%d.%m.%Y - %H:%M")."','".$_SERVER['REMOTE_ADDR']."')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
  $x=$row['points'];
$vari = $x+2;

mysql_query("UPDATE usersystem SET points = '".$vari."'
WHERE username = '".$row['username']."'");

echo"Innlegget ble postet!<br/><br/><b>| <a href='forum?action=thread&id=".$thread['id']."&page=".striphtml($_POST['page'])."#post-".($post['id']+1)."'>Tilbake til tr&#229;den</a> | <a href='forum?action=forum&id=".$forum['id']."'>Til forumet</a> |</b>";
} else {
echo"<meta http-equiv='refresh' content='0; url=forum'>";
}

} else {
echo"Innlegget m&#229; inneholde minst 3 ord.<br/><br/><b>| <a href='forum?action=create_post&thread_id=".$thread['id']."&page=".striphtml($_POST['page'])."'>Pr&#248;v igjen</a> | <a href='forum?action=thread&id=".$thread['id']."&page=".striphtml($_POST['page'])."'>Tilbake til tr&#229;den</a> |</b>";
}
} else {

$mycode = randomtext("aA1", 10);

$_SESSION['forum_post_code'] = $mycode;

if(isset($_GET['quote_id']) && is_numeric($_GET['quote_id'])) {

$query = mysql_query("SELECT * FROM forum_posts WHERE id = '".striphtml($_GET['quote_id'])."'");
if(mysql_num_rows($query) > 0) {
$post = mysql_fetch_array($query);

$quote = preg_replace("(\[quote=([^]]+)\])is", null, $post['message']);
$quote = preg_replace("(\[quote\])is", null, $quote);
$quote = preg_replace("(\[/quote\])is", "\n", $quote);
$quote = solvebr("[quote=".$post['author']."]".$quote."[/quote]");
}
}

echo"<b><text class='nou'><span style='font-size: 11px; float:left;'><a href='forum?action=thread&id=".$thread['id']."&page=".$tp."' style='color: #3D3D3D;'>Tilbake til tr&#229;d</a></span></text></b><br/><hr/>
<form method='post' name='forum_form' action='?action=create_post&thread_id=".$_GET['thread_id']."'>
<input type='hidden' name='code' value='".$mycode."'>
<input type='hidden' name='page' value='".$tp."'>
<b>Innlegg:</b><br/>
<textarea style='height: 140px; width: 400px;  
  font-family: Verdana;
  font-size: 11px;
  font-weight: normal;
  color: #000000;' name='message' cols='40' rows='15' id='textinput'>".$quote."</textarea><br/>"; 

showcodes("message", "forum_form");
echo "<br/><br/><input type='submit' id='button' value='Post innlegg' /><br/></form>";
}
pagebot($settings['footer']);

} else {
include("forum_inc/forumlist.php");
}
}
?>