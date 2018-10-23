<?php

if(isset($_GET['id']) || isset($_GET['user'])) {

include"main.php";

database_con();


if($settings['maintenance'] == "yes" && $user['level'] != "4") {
die("<meta http-equiv='refresh' content='0; url=maintenance.php'>"); }


 $result = mysql_query("SELECT * FROM usersystem WHERE id='".mysql_real_escape_string($_GET['id'])."' OR username='".mysql_real_escape_string($_GET['user'])."'");
 
 if(mysql_num_rows($result) > 0) {

$userinfo = mysql_fetch_array($result);

 if($userinfo['userlevel'] == "1") {
 if($user['level'] > "3") {
 } else {
 die("<meta http-equiv='refresh' content='0; url=index'>");
 }
 }

  if(!empty($userinfo['background'])) { define("BACKGROUND", $userinfo['background']); define("PROFILE", true); }
  
pagetop("".$settings['site_name']." blog for ".$userinfo['username']."");
include"includes/subheader.php";
pagemid();




 echo"<div id='tagcontainer2'>
<div id='tagtop'>"; 

  echo"</div>
  <div id='tagmid'><center>";
echo"

<table cellpadding='0' width='85%' cellspacing='0' style='text-align:center;'><tr>
<td><a href='profile?id=".$userinfo['id']."'><img src='images/buttons/console_inactive.gif' onmouseover='this.src=\"images/buttons/console_active.gif\";' onmouseout='this.src=\"images/buttons/console_inactive.gif\";' border='0' title='Profil' style='padding-side: 15px; vertical-align:middle;'></a></td>

<td style='padding-left:15px;'><a href='profile?id=".$userinfo['id']."&guestbook'><img src='images/buttons/text_no.gif' onmouseover='this.src=\"images/buttons/text.gif\";' onmouseout='this.src=\"images/buttons/text_no.gif\";'  border='0' title='Gjestebok' style='padding-side: 15px; vertical-align:middle;'></a></td>

<td><a href='showroom?id=".$userinfo['id']."'><img src='images/buttons/room_icon_closed.gif' onmouseover='this.src=\"images/buttons/room_icon_open.gif\";' onmouseout='this.src=\"images/buttons/room_icon_closed.gif\";'  border='0' title='Samlerom' style='padding-side: 15px; vertical-align:middle;'></a></td>


<td><a href='blog?id=".$userinfo['id']."'><img src='images/buttons/groupboard_Sticky.gif' onmouseover='this.src=\"images/buttons/groupboard_Sticky_on.gif\";' onmouseout='this.src=\"images/buttons/groupboard_Sticky.gif\";'  border='0' title='Blogg' style='padding-side: 15px; vertical-align:middle; margin-bottom:3px;'></a></td>

"; 


echo"
</tr></table>";

  echo"</center></div>
   <div id='tagbot'>";
   echo"</div></div>
   
 ";

 echo"<hr/>";



if(in_array("blog", explode(",", $userinfo['items']))) {



if(isset($user['name']) && $user['name'] == $userinfo['username']) {

if($user['chat_ban'] >= 1) {

echo"<div class='falsebg'>Du har chatban og kan derfor ikke poste i bloggen.</div>";


} else {

if(isset($_GET['report_post']) && ($_GET['post_id'])) {

mysql_query("UPDATE blogposts SET status = 'reported' WHERE id='".mysql_real_escape_string($_GET['post_id'])."'");

mysql_query("UPDATE blogposts SET reportedby = '".$user['name']."' WHERE id='".mysql_real_escape_string($_GET['post_id'])."'");

echo"<div class='truebg'>Posten er rapportert!</div><meta http-equiv='refresh' content='1; url=blog?id=".$userinfo['id']."'><br/>";

}
if (isset($_POST['message'])) {

$code = $_SESSION['blogcode'];

unset($_SESSION['blogcode']);

if($code == $_POST['code']) {


if (isset($_POST['type']) && ($_POST['message'])) {


 $message = striphtml($_POST['message']);


$sql="INSERT INTO blogposts (name, content, page_id, date, ip) VALUES 
('".$user['name']."','".nl2br($message)."','".$userinfo['id']."','".strftime("%d.%m.%Y - %H:%M")."','".$_SERVER['REMOTE_ADDR']."')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

$x=$user['points'];
$vari = $x+2;

$sql="UPDATE usersystem SET points = '".$vari."'
WHERE username = '".$user['name']."'";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
     

$sql="UPDATE usersystem SET blog_last_update = '".strftime("%d.%m.%Y - %H:%M")."'
WHERE username = '".$user['name']."'";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }


} else {
echo"<div class='falsebg'>Du m&#229; skrive noe f&#248;r du blogger det.</div><br/>";
}
}
}


}
}

if(empty($userinfo['blogcontent'])) {
echo"<div class='noticebg'>Denne brukeren har ikke skrevet noen bloggtekst enda.</div>
<br/><span style='color:#999999;'>Siste oppdatering: ".$userinfo['blog_last_update']."</span>";
} else {
echo "<div style='text-align:left;'>".$userinfo['blogcontent']."";

echo"<br/><br/><span style='color:#999999;'>Siste oppdatering: ".$userinfo['blog_last_update']."</span>";
echo"</div>";
}
$result = mysql_query("SELECT * FROM blogposts WHERE page_id='".$userinfo['id']."' ORDER BY id DESC LIMIT 20");

if(mysql_num_rows($result) != 0) {
pagebreak();

while($row = mysql_fetch_array($result))
  {
  
 echo"<div id='tagcontainer'>
<div id='tagtop'></div>
  <div id='tagmid'><div id='text'>";

echo "<span style='font-size:14px;'>".strsmileys($row['content'])."</span>";



  echo"<br/><br/>";
  echo"<i><span style='color:#999999;'>Skrevet ".$row['date']."</span></i>";

   if($user['level'] == "2" || $user['level'] == "3" || $user['level'] == "4") {
   
   echo" &#9679; <a href='blog?id=".$_GET['id']."&report_post=true&post_id=".$row['id']."' onclick='return confirm(\"Er du sikker?\");'><img src='themes/".THEME."/buttons/my_3.gif' style='vertical-align:middle;' onmouseover='this.src=\"themes/".THEME."/buttons/my_4.gif\";' title='Rapporter' onmouseout='this.src=\"themes/".THEME."/buttons/my_3.gif\";' border='0'></a>"; 
   
   }
   
   if($user['level'] == "4") {
   
   echo" &#9679; <a href='blog?id=".$_GET['id']."&action=delete_post&post_id=".$row['id']."' onclick='return confirm(\"Er du sikker?\");'><img src='themes/".THEME."/buttons/my_7.gif' style='vertical-align:middle;' onmouseover='this.src=\"themes/".THEME."/buttons/my_8.gif\";' title='Slett' onmouseout='this.src=\"themes/".THEME."/buttons/my_7.gif\";' border='0'></a>";
   
   }

  echo"</div></div>
   <div id='tagbot'>";
   echo"</div></div>
   
 ";

  }

  

}
if(isset($user['name']) && $user['name'] == $userinfo['username']) {
$mycode = randomtext("aA1", 10);

$_SESSION['blogcode'] = $mycode;


pagebreak();
echo"
<form action='blog?id=".$userinfo['id']."' method='post' name='comment'>

<input type='hidden' name='name' value='".$user['name']."'>
<input type='hidden' name='type' value='comment'>
<input type='hidden' name='code' value='".$mycode."'>

<textarea style='height: 100px; width: 400px; 
  font-family: Verdana;
  font-size: 11px;
  font-weight: normal;
  color: #000000;
' name='message' id='textinput'></textarea>
  <br/>";
  echo showcodes("message", "comment");
  echo"
<br/><br/><input type='submit' id='button' value='Blogg det!' />
";
}

} else {

echo"<div class='noticebg'>Denne brukeren har ingen blogg.</div>";

}

pagebot($settings['footer']);





} else {
echo"<meta http-equiv='refresh' content='0; url=index'>";

}


} else {
echo"<meta http-equiv='refresh' content='0; url=members'>";

}


?>