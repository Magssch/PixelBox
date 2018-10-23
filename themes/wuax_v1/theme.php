<?php

function pagetop($title)
{

echo" 
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html>
<head>
<link rel='shortcut icon' href='http://www.wuax.net/favicon.ico'> 
<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1' />
<title>".$title."</title>";
if(defined("PROFILE") && file_exists("images/backgrounds/".BACKGROUND.".gif")) {
echo"
<style type='text/css'>
body {
	background-image: url(images/backgrounds/".BACKGROUND.".gif);
	background-repeat: repeat;
	padding: 0;
	margin: 0;
	font-family: Verdana, Geneva, Arial, Helvetica, sans-serif;
	font-size: 10px;

}

</style>";
} else {
echo"
<style type='text/css'>
body {
	background-image: url(themes/".THEME."/images/background.png);
	background-repeat: repeat;
	padding: 0;
	margin: 0;
	font-family: Verdana, Geneva, Arial, Helvetica, sans-serif;
	font-size: 10px;

}

</style>";
}
echo"
<link href='themes/".THEME."/style.css' rel='stylesheet' type='text/css' />"; ?>
<script type='text/javascript'>
<!--
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf('#')!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf('?'))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
   
}
/****************************************************
     Author: Eric King
     Url: http://redrival.com/eak/index.shtml
     This script is free to use as long as this info is left in
     Featured on Dynamic Drive script library (http://www.dynamicdrive.com)
****************************************************/
var win=null;
function NewWindow(mypage,myname,w,h,scroll,pos){
if(pos=="random"){LeftPosition=(screen.width)?Math.floor(Math.random()*(screen.width-w)):100;TopPosition=(screen.height)?Math.floor(Math.random()*((screen.height-h)-75)):100;}
if(pos=="center"){LeftPosition=(screen.width)?(screen.width-w)/2:100;TopPosition=(screen.height)?(screen.height-h)/2:100;}
else if((pos!="center" && pos!="random") || pos==null){LeftPosition=0;TopPosition=20}
settings='width='+w+',height='+h+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+',location=no,directories=no,status=no,menubar=no,toolbar=no,resizable=no';
win=window.open(mypage,myname,settings);}
//-->
</script>

<?php
if(SNOW != "off") {
include"includes/snow/snow_panel.php";
}
echo" 


<style type='text/css'>

   A: { 
  text-decoration: underline; 
  color:#000000;
} 
   A:link { 
  text-decoration: underline; 
  color:#242424;
} 
  A:visited { 
  text-decoration: undeline; 
  color:#171717;
}
  A:hover { 
  text-decoration: none; 
  color:#FF9900;
}
a:active {
text-decoration: none;
color:#FFA500;
}
  
#topbar{
position:absolute;
border: 1px solid #000000;
color: #000;
padding: 2px;
background-color: #FFFF66;
width: 300px;
visibility: hidden;
z-index: 100;
}

  </style>
  "; 
  ?>

  <script type="text/javascript" src="includes/getrss.js" onLoad="showRSS('Habbo');"></script>
  <script type="text/javascript" src="includes/topmessage.js"></script>
  <script type="text/javascript" src="includes/javascript.js"></script>
  <script type='text/javascript' src='includes/swfobject.js'></script>
  <style type="text/css">

#dhtmltooltip{
position: absolute;
border: 1px solid grey;
padding: 2px;
background-color: white;
visibility: hidden;
z-index: 100;
/*Remove below line to remove shadow. Below line should always appear last within this CSS*/
filter: progid:DXImageTransform.Microsoft.Shadow(color=gray,direction=135);
}

</style>
</head>
<body onLoad="MM_preloadImages('themes/<?php echo THEME; ?>/images/anmeldelser_light.png','themes/<?php echo THEME; ?>/images/sikkerhet_light.png',
'themes/<?php echo THEME; ?>/images/fancenter_light.png','themes/<?php echo THEME; ?>/images/wuax_light.png','themes/<?php echo THEME; ?>/images/habboinfo_light.png',
'themes/<?php echo THEME; ?>/images/mobelpriser_light.png','themes/<?php echo THEME; ?>/images/tagwall_light.png','themes/<?php echo THEME; ?>/images/button_header.png')">
<div id="dhtmltooltip"></div>

<script type="text/javascript">

/***********************************************
* Cool DHTML tooltip script- &#169; Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
***********************************************/

var offsetxpoint=5 //Customize x offset of tooltip
var offsetypoint=20 //Customize y offset of tooltip
var ie=document.all
var ns6=document.getElementById && !document.all
var enabletip=false
if (ie||ns6)
var tipobj=document.all? document.all["dhtmltooltip"] : document.getElementById? document.getElementById("dhtmltooltip") : ""

function ietruebody(){
return (document.compatMode && document.compatMode!="BackCompat")? document.documentElement : document.body
}

function ddrivetip(thetext, thecolor, thewidth){
if (ns6||ie){
if (typeof thewidth!="undefined") tipobj.style.width=thewidth+"px"
if (typeof thecolor!="undefined" && thecolor!="") tipobj.style.backgroundColor=thecolor
tipobj.innerHTML=thetext
enabletip=true
return false
}
}

function positiontip(e){
if (enabletip){
var curX=(ns6)?e.pageX : event.clientX+ietruebody().scrollLeft;
var curY=(ns6)?e.pageY : event.clientY+ietruebody().scrollTop;
//Find out how close the mouse is to the corner of the window
var rightedge=ie&&!window.opera? ietruebody().clientWidth-event.clientX-offsetxpoint : window.innerWidth-e.clientX-offsetxpoint-20
var bottomedge=ie&&!window.opera? ietruebody().clientHeight-event.clientY-offsetypoint : window.innerHeight-e.clientY-offsetypoint-20

var leftedge=(offsetxpoint<0)? offsetxpoint*(-1) : -1000

//if the horizontal distance isn't enough to accomodate the width of the context menu
if (rightedge<tipobj.offsetWidth)
//move the horizontal position of the menu to the left by it's width
tipobj.style.left=ie? ietruebody().scrollLeft+event.clientX-tipobj.offsetWidth+"px" : window.pageXOffset+e.clientX-tipobj.offsetWidth+"px"
else if (curX<leftedge)
tipobj.style.left="5px"
else
//position the horizontal position of the menu where the mouse is positioned
tipobj.style.left=curX+offsetxpoint+"px"

//same concept with the vertical position
if (bottomedge<tipobj.offsetHeight)
tipobj.style.top=ie? ietruebody().scrollTop+event.clientY-tipobj.offsetHeight-offsetypoint+"px" : window.pageYOffset+e.clientY-tipobj.offsetHeight-offsetypoint+"px"
else
tipobj.style.top=curY+offsetypoint+"px"
tipobj.style.visibility="visible"
}
}

function hideddrivetip(){
if (ns6||ie){
enabletip=false
tipobj.style.visibility="hidden"
tipobj.style.left="-1000px"
tipobj.style.backgroundColor=''
tipobj.style.width=''
}
}

document.onmousemove=positiontip

</script>

<?php

echo"
<div id='container'>
";
if(defined("ONLINE")) {
$result = mysql_query("SELECT * FROM post WHERE status='unread' AND receiver='".$_SESSION['username']."'");
 if(mysql_num_rows($result) > 0) {

?>
<div id="topbar">
<a href="" onClick="closebar(); return false"><img src="http://i44.tinypic.com/28i9ouo.gif" border="0" style="vertical-align: middle;" /></a>
<?php
echo"<a href='post'>Du har "; 

$result = mysql_query("SELECT * FROM post WHERE status='unread' AND receiver='".$_SESSION['username']."'");
echo mysql_num_rows($result);

echo" uleste meldinger i postboksen din!</a>";
?>
</div>

<?php
}
}
echo"
<div class='header_bg'>
<div class='logo'><img src='themes/".THEME."/images/wuax_header.png' alt='Wuax' />
</div>

<div class='set_menu'>
";

?>
<a href='index'><img src='themes/<?php echo THEME; ?>/images/hovedmeny.png'
   onMouseOver='this.src = "themes/<?php echo THEME; ?>/images/hovedmeny_light.png"; ' onMouseOut='this.src = "themes/<?php echo THEME; ?>/images/hovedmeny.png"; ' border='0'></a>
<a href='page?id=11'><img src='themes/<?php echo THEME; ?>/images/anmeldelser.png'  style='margin-left: -4px;'
   onMouseOver='this.src = "themes/<?php echo THEME; ?>/images/anmeldelser_light.png"; ' onMouseOut='this.src = "themes/<?php echo THEME; ?>/images/anmeldelser.png"; ' border='0'></a>
<a href='page?id=3'><img src='themes/<?php echo THEME; ?>/images/wuax_magazine.png'  style='margin-left: -4px;'
   onMouseOver='this.src = "themes/<?php echo THEME; ?>/images/wuax_magazine_light.png"; ' onMouseOut='this.src = "themes/<?php echo THEME; ?>/images/wuax_magazine.png"; ' border='0'></a>
<a href='page?id=5'><img src='themes/<?php echo THEME; ?>/images/fancenter.png'  style='margin-left: -4px;'
   onMouseOver='this.src = "themes/<?php echo THEME; ?>/images/fancenter_light.png"; ' onMouseOut='this.src = "themes/<?php echo THEME; ?>/images/fancenter.png"; ' border='0'></a>
<a href='page?id=15'><img src='themes/<?php echo THEME; ?>/images/wuax2.png'  style='margin-left: -4px;'
   onMouseOver='this.src = "themes/<?php echo THEME; ?>/images/wuax.png"; ' onMouseOut='this.src = "themes/<?php echo THEME; ?>/images/wuax2.png"; ' border='0'></a>
<a href='page?id=13'><img src='themes/<?php echo THEME; ?>/images/habboinfo.png'  style='margin-left: -4px;'
   onMouseOver='this.src = "themes/<?php echo THEME; ?>/images/habboinfo_light.png"; ' onMouseOut='this.src = "themes/<?php echo THEME; ?>/images/habboinfo.png"; ' border='0'></a>
<a href='values'><img src='themes/<?php echo THEME; ?>/images/mobelpriser.png'  style='margin-left: -4px;'
   onMouseOver='this.src = "themes/<?php echo THEME; ?>/images/mobelpriser_light.png"; ' onMouseOut='this.src = "themes/<?php echo THEME; ?>/images/mobelpriser.png"; ' border='0'></a>
<a href='tagwall'><img src='themes/<?php echo THEME; ?>/images/tagwall.png'  style='margin-left: -4px;'
   onMouseOver='this.src = "themes/<?php echo THEME; ?>/images/tagwall_light.png"; ' onMouseOut='this.src = "themes/<?php echo THEME; ?>/images/tagwall.png"; ' border='0'></a>
   
<?php if(!session_is_registered("username")) { ?>
<a href='register' align='right'><img src='themes/<?php echo THEME; ?>/images/registrer.png'  style='margin-left: -4px;'
   onMouseOver='this.src = "themes/<?php echo THEME; ?>/images/registrer_light.png"; ' onMouseOut='this.src = "themes/<?php echo THEME; ?>/images/registrer.png"; ' border='0' align='right'></a>
<?php } else { ?>
<a href='forum' align='right'><img src='themes/<?php echo THEME; ?>/images/forum.png'  style='margin-left: -4px;'
   onMouseOver='this.src = "themes/<?php echo THEME; ?>/images/forum_light.png"; ' onMouseOut='this.src = "themes/<?php echo THEME; ?>/images/forum.png"; ' border='0' align='right'></a>
<?php }
echo"
</div>
</div>";
 }

function pageheadermid()
{

echo"
<div class='container'>
<div class='left'>
";

if(isset($_SESSION['username'])) { echo"<div id='box_top_green_user'>"; } else { echo"<div class='header_login'>"; }
 
echo"</div><div class='boxmid' style='text-align: center;'>
";


if(isset($_SESSION['username']) && ($_SESSION['password'])) {
$result = mysql_query("SELECT * FROM settings");
while($row = mysql_fetch_array($result))
  {
  
// latestids <----------------------------------->
$settings['maintenance'] = $row['maintenance'];
$settings['footer'] = $row['footer'];
$settings['site_name'] = $row['site_name'];
$settings['bot_name'] = $row['bot_name'];
$settings['bot_image'] = $row['bot_image'];
$settings['second_bot_name'] = $row['second_bot_name'];
$settings['second_bot_image'] = $row['second_bot_image'];
$settings['site_url'] = $row['site_url'];
$settings['welcome_message'] = $row['welcome_message'];
$settings['maintenance_reason'] = $row['maintenance_reason'];
$settings['extra_link'] = $row['extra_link'];
$settings['link_goal'] = $row['link_goal'];
$settings['link_access'] = $row['link_access'];
// latestids <----------------------------------->


}
$result = mysql_query("SELECT * FROM usersystem WHERE username='".$_SESSION['username']."' AND password='".$_SESSION['password']."'");
while($row = mysql_fetch_array($result))
  {
$user['name'] = $row['username'];
$user['level'] = $row['userlevel'];
$user['id'] = $row['id'];
$user['email'] = $row['email'];
$user['habbo'] = $row['habboname'];
$user['text'] = $row['freetext'];
$user['points'] = $row['points'];
$user['tagwallposts'] = $row['tagwallposts'];
$user['body'] = $row['body'];
$user['head'] = $row['head'];
$user['logdate'] = $row['logdate'];
$user['register_date'] = $row['register_date'];
$user['banreason'] = $row['banreason'];
$user['last_active'] = $row['last_active'];
$user['smileys'] = $row['smileys'];
$user['rights'] = $row['rights'];
$user['verified_habbo'] = $row['verified_habbo'];
$user['badges'] = $row['badges'];
$user['credits'] = $row['credits'];
$user['status'] = $row['status'];
$user['holidaypoints'] = $row['holidaypoints'];
  }
echo"

"; 
 if(strlen($user['name']) >= 16) {
$text = substr($user['name'], 0, (16-3))."...";
} else {
$text = $user['name'];
}
 echo"
<b><font size='2'>".$text."</font></b>";

if(!empty($settings['extra_link'])) {
if($settings['link_access'] != "all") {
if($settings['link_access'] == $user['rights']) {
 echo"
<br/><br/><b><a href='".$settings['link_goal']."'>".$settings['extra_link']."</a> </b>
";
}
} else {
 echo"
<br/><br/><b><a href='".$settings['link_goal']."'>".$settings['extra_link']."</a> </b>
";
}
}
echo"<br/><br/>";

if($user['level'] > "3") {

echo"
<img src='themes/".THEME."/buttons/status_exclusive_big.gif' style='vertical-align:middle;'> <b><a href='adminpanel'>Adminpanel</a> </b><br/><br/>
"; 
}
echo"<b>
<img src='themes/".THEME."/buttons/my_5.gif' style='vertical-align:middle;'> <a href='userpanel'>Innstillinger</a><br/><br/>
<img src='themes/".THEME."/buttons/mail_1.gif' style='vertical-align:middle;'> <a href='post'>Postboks ";
$result = mysql_query("SELECT * FROM post WHERE status='unread' AND receiver='".$user['name']."'");
 if(mysql_num_rows($result) != 0) {
echo"(".mysql_num_rows($result).")";
}
echo"</a><br/><br/>
<img src='themes/".THEME."/buttons/v20_7.gif' style='vertical-align:middle;'> <a href='members'>Brukerliste</a><br/><br/>
<img src='themes/".THEME."/buttons/new_04.gif' style='vertical-align:middle;'> <a href='center'>Banken</a><br/><br/>
<img src='themes/".THEME."/buttons/my_12.gif' style='vertical-align:middle;'> <a href='marketplace'>Bytteplass ";
$result = mysql_query("SELECT * FROM marketplace");
 if(mysql_num_rows($result) > 0) {
echo"(".mysql_num_rows($result).")";
}
echo"</a><br/><br/>
<img src='themes/".THEME."/buttons/my_2.gif' style='vertical-align:middle;'> <a href='community'>Community</a><br/><br/>
<img src='themes/".THEME."/buttons/new_09.gif' style='vertical-align:middle;'> <a href='profile?id=".$user['id']."'>Min profil</a><br/><br/>
<img src='themes/".THEME."/buttons/v20_3.gif' style='vertical-align:middle;'> <a href='showroom?id=".$user['id']."'>Mine m&#248;bler</a><br/><br/>
<img src='themes/".THEME."/buttons/v22_3.gif' style='vertical-align:middle;'> <a href='logout'>Logg ut</a></b><br/>

<br/><div align='middle'>
<table cellpadding='2' cellspacing='0' border='0'><tr><td id='td'><div align='middle'><img src='themes/".THEME."/buttons/money.gif' style='vertical-align:middle; float:middle;'></div></td>
<td id='td'><div align='middle'></div></td><td id='td'><div align='middle'></div></td><td id='td'><div align='middle'></div></td><td id='td'><div align='middle'></div></td>
<td id='td'><div align='middle'><img src='themes/".THEME."/buttons/points.gif' style='vertical-align:middle; float:middle;'></div></td></tr>

<tr><td id='td'><div align='middle'><b>".$user['credits']."</b></div></td>
<td id='td'><div align='middle'></div></td><td id='td'><div align='middle'></div></td><td id='td'><div align='middle'></div></td><td id='td'><div align='middle'></div></td>
<td id='td'><div align='middle'><b>".$user['points']."</b></div></td></tr>
</table>";
echo"<br/><b>Status:</b><br/><select name='status' id='textinput' onchange='window.location.href=this.value'>";
if(isstr("?", REQUEST_URL)) {
echo"<option value='".REQUEST_URL."&status=3'"; if($user['status'] == "3") {echo" SELECTED";} echo">Tilgjengelig</option>";
} else {
echo"<option value='?status=3'"; if($user['status'] == "3") {echo" SELECTED";} echo">Tilgjengelig</option>";
}
if(isstr("?", REQUEST_URL)) {
echo"<option value='".REQUEST_URL."&status=2'"; if($user['status'] == "2") {echo" SELECTED";} echo">Borte</option>";
} else {
echo"<option value='?status=2'"; if($user['status'] == "2") {echo" SELECTED";} echo">Borte</option>";
}
if(isstr("?", REQUEST_URL)) {
echo"<option value='".REQUEST_URL."&status=1'"; if($user['status'] == "1") {echo" SELECTED";} echo">Opptatt</option>";
} else {
echo"<option value='?status=1'"; if($user['status'] == "1") {echo" SELECTED";} echo">Opptatt</option>";
}
 echo"
</select><br/>";
echo"</div>
";
/*
echo" &nbsp;&#9679;&nbsp; <img src='themes/wuax/buttons/v20_2.gif' style='vertical-align:middle;'> <b>".$user['holidaypoints']."</b> <br/>";
*/
/*
$result = mysql_query("SELECT * FROM post WHERE status='unread' AND receiver='".$user['name']."'");
 if(mysql_num_rows($result) != 0) {
echo"<br/><a href='post'>Du har <b>".mysql_num_rows($result)."</b> nye meldinger</a><br/>";
}
*/
if($user['level'] == "4" && ($user['rights'] == "mod" || $user['rights'] == "admin" || $user['rights'] == "global")) {
$result = mysql_query("SELECT * FROM messages");
 if(mysql_num_rows($result) > 0) {
echo"<br/><b><a href='adminpanel?action=messages'>Det er ".mysql_num_rows($result)." ubesvart(e) n&#248;danrop!</a></b>";
}
}

if($user['level'] == "4" && ($user['rights'] == "mod" || $user['rights'] == "admin" || $user['rights'] == "global")) {
$result = mysql_query("SELECT * FROM guestbook WHERE status = 'reported'");
 if(mysql_num_rows($result) > 0) {
echo"<br/><b><a href='adminpanel?action=tagwall'>Det er ".mysql_num_rows($result)." rapporterte tagwallposter!</a></b>";
}
}

if($user['level'] == "4" && ($user['rights'] == "mod" || $user['rights'] == "admin" || $user['rights'] == "global")) {
$result = mysql_query("SELECT * FROM comments WHERE status = 'reported'");
 if(mysql_num_rows($result) > 0) {
echo"<br/><b><a href='adminpanel?action=comments'>Det er ".mysql_num_rows($result)." rapporterte kommentarer!</a></b>";
}
}

echo"<br/>";

} else {



$x=$_GET['try']+1;

echo"
<br/>
<form method='post' action='login?try=".$x."'><input type='text' id='textinput' value='brukernavn' name='username'"; ?> onFocus='this.value="";' <?php echo"
<br/><br/><input type='password' id='textinput' value='passord' name='password'"; ?> onFocus='this.value="";' <?php echo"
<br/><br/><b>Husk meg</b><input type='checkbox' name='remember' value='yes'><br/><br/><input type='submit' value='Logg inn' id='button'></form>
<br/>
| <a href='forgot'>Glemt passord?</a> | <a href='register'>Registrer deg</a> |
<br/><br/>
";


}

echo"
</div>
<div class='boxbot'></div>
";

if(isset($_SESSION['username'])) { 

$result = mysql_query("SELECT * FROM usersystem WHERE username='".$_SESSION['username']."' AND password='".$_SESSION['password']."'");
$user = mysql_fetch_array($result);

  echo"
<div class='header_cfh'></div>
<div class='boxmid' align='center'><b><a href='help'>Klikk her for hjelp.</a></b>
"; 
echo"</div>
<div class='boxbot'></div>
";
unset($user);
}
}
 
function pagemid()
{
pageheadermid();
echo"</div><div class='center'>
<div class='header_content'></div>
<div class='contentmid' align='center'><div id='text'><br/> ";

  }
  
   
function pagemidcustom()
{
pageheadermid();
 echo"</div><div class='center'>
<div class='header_content'></div>
<div class='contentmid' align='left'><div id='text'><br/> ";

  }

function pagebreak()
{
echo"</div></div><div id='mid_bot_break'></div><div id='mid_top_break'></div><div class='contentmid' align='center'><div id='text'>";
}

function pagebot($footer)
{
if(!defined("FORUM")) {
echo"<br/><br/> </div></div>
<div class='contentbot' align='center'>".$footer."</div>
</div>

<div class='right'>
<div class='header_news'></div>
<div class='boxmid'>"; 


  echo"
 <table border='0' width='100%'>";

$result = mysql_query("SELECT * FROM news ORDER BY id DESC LIMIT 3 ");

while($row = mysql_fetch_array($result))
  { 

 
 echo"<tr>";
  
  echo "<td id='td' width='100%'><b><a href='news?id=" . $row['id'] . "

'>";  if(strlen($row['name']) >= 45) {
$text = substr($row['name'], 0, (45-3))."...";
} else {
$text = $row['name'];
} echo $text; echo"</a></b><br/><span style='color: #999999;'>".$row['date']."</span></td>";


echo"</tr>"; } echo"<tr><td id='td' width='100%'><a href='news.php'>Flere nyheter &#187;</a></td></tr></table></div>
<div class='boxbot'></div>
";
  
 if(isset($_SESSION['username'])) {
 echo"<div class='header_usronline'></div>
<div class='boxmid'>";


$result = mysql_query("SELECT * FROM usersystem WHERE last_active + 240 >= ".time()." ORDER BY id");
while($row = mysql_fetch_array($result))
  { 
  echo"
 <table border='0'><tr>";
  if($row['last_active'] + 240 >= time()) {
  
  if($row['status'] == "1") {
  echo "<td id='td' width='100%'><b><img src='images/busy.png' style='vertical-align:middle;'> <a href='profile?id=" . $row['id'] . "'>"; 
  
  } elseif($row['status'] == "2") {
    echo "<td id='td' width='100%'><b><img src='images/away.png' style='vertical-align:middle;'> <a href='profile?id=" . $row['id'] . "'>"; 
    
    } elseif($row['status'] == "3") {
    echo "<td id='td' width='100%'><b><img src='images/online.png' style='vertical-align:middle;'> <a href='profile?id=" . $row['id'] . "'>"; 
    
  }
   else {
    echo "<td id='td' width='100%'><b><img src='images/online.png' style='vertical-align:middle;'> <a href='profile?id=" . $row['id'] . "'>"; 
  }
if(strlen($row['username']) >= 16) {
$text = substr($row['username'], 0, (16-3))."...";
} else {
$text = $row['username'];
}
 echo $text."</a></b></td>";
} else {
  echo "";
}
echo"</tr></table>"; 
  }
  
echo"
</div>
<div class='boxbot'></div>
";
}



}

echo"</div></div></body></html>";

}

?>