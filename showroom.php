<?php

if(isset($_GET['id']) || isset($_GET['user'])) {

include"main.php";

database_con();


if($settings['maintenance'] == "yes" && $user['level'] != "4") {
die("<meta http-equiv='refresh' content='0; url=maintenance.php'>"); }


 $result = mysql_query("SELECT * FROM usersystem WHERE id='".mysql_real_escape_string($_GET['id'])."' OR username='".mysql_real_escape_string($_GET['user'])."'");
 
 if(mysql_num_rows($result) > 0) {

while($row = mysql_fetch_array($result))
  {
$id = $row['id'];
$username = $row['username'];
$userlevel = $row['userlevel'];
$furni = $row['furni'];
$background = $row['background'];
  }
 if($userlevel == "1") {
 if($user['level'] > "3") {
 } else {
 die("<meta http-equiv='refresh' content='0; url=index.php'>");
 }
 }

  if(!empty($background)) { define("BACKGROUND", $background); define("PROFILE", true); }
  
pagetop("".$settings['site_name']." samlerom for ".$username."");
include"includes/subheader.php";
pagemid();



 echo"<div id='tagcontainer2'>
<div id='tagtop'>"; 

  echo"</div>
  <div id='tagmid'><center>";
echo"

<table cellpadding='0' width='85%' cellspacing='0' style='text-align:center;'><tr>
<td><a href='profile?id=".$id."'><img src='images/buttons/console_inactive.gif' onmouseover='this.src=\"images/buttons/console_active.gif\";' onmouseout='this.src=\"images/buttons/console_inactive.gif\";' border='0' title='Profil' style='padding-side: 15px; vertical-align:middle;'></a></td>

<td style='padding-left:15px;'><a href='profile?id=".$id."&guestbook'><img src='images/buttons/text_no.gif' onmouseover='this.src=\"images/buttons/text.gif\";' onmouseout='this.src=\"images/buttons/text_no.gif\";'  border='0' title='Gjestebok' style='padding-side: 15px; vertical-align:middle;'></a></td>

<td><a href='showroom?id=".$id."'><img src='images/buttons/room_icon_closed.gif' onmouseover='this.src=\"images/buttons/room_icon_open.gif\";' onmouseout='this.src=\"images/buttons/room_icon_closed.gif\";'  border='0' title='Samlerom' style='padding-side: 15px; vertical-align:middle;'></a></td>


<td><a href='blog?id=".$id."'><img src='images/buttons/groupboard_Sticky.gif' onmouseover='this.src=\"images/buttons/groupboard_Sticky_on.gif\";' onmouseout='this.src=\"images/buttons/groupboard_Sticky.gif\";'  border='0' title='Blogg' style='padding-side: 15px; vertical-align:middle; margin-bottom:3px;'></a></td>

"; 

echo"
</tr></table>";

  echo"</center></div>
   <div id='tagbot'>";
   echo"</div></div>
   
 ";

 echo"<hr/>";

if(!empty($furni)) {
echo strfurni($furni);
} else {
echo"Denne brukeren har ingen samleobjekt.";
}
pagebot($settings['footer']);


} else {

echo"<meta http-equiv='refresh' content='0; url=index.php'>";

}





} else {
echo"<meta http-equiv='refresh' content='0; url=members.php'>";

}


?>