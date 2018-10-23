<?php


function cleanchars($text)
{
if(file_exists("includes/chars.php")) {
include"includes/chars.php";
} else {
include"chars.php";
}
return $text;
}

function pagetop($title)
{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns='http://www.w3.org/1999/xhtml'>
 <head>

<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />

<title><?php echo $title; ?></title>

<link href="themes/<?php echo THEME; ?>/style.css" rel="stylesheet" type="text/css" />





















<script type="text/javascript">

/***********************************************
* Switch Menu script- by Martial B of http://getElementById.com/
* Modified by Dynamic Drive for format & NS4/IE4 compatibility
* Visit http://www.dynamicdrive.com/ for full source code
***********************************************/

var persistmenu="yes" //"yes" or "no". Make sure each SPAN content contains an incrementing ID starting at 1 (id="sub1", id="sub2", etc)
var persisttype="sitewide" //enter "sitewide" for menu to persist across site, "local" for this page only

if (document.getElementById){ //DynamicDrive.com change
document.write('<style type="text/css">\n')
document.write('.submenu{display: none;}\n')
document.write('</style>\n')
}

function SwitchMenu(obj){
	if(document.getElementById){
	var el = document.getElementById(obj);
	var ar = document.getElementById("masterdiv").getElementsByTagName("span"); //DynamicDrive.com change
		if(el.style.display != "block"){ //DynamicDrive.com change
			for (var i=0; i<ar.length; i++){
				if (ar[i].className=="submenu") //DynamicDrive.com change
				ar[i].style.display = "none";
			}
			el.style.display = "block";
		}else{
			el.style.display = "none";
		}
	}
}

function get_cookie(Name) { 
var search = Name + "="
var returnvalue = "";
if (document.cookie.length > 0) {
offset = document.cookie.indexOf(search)
if (offset != -1) { 
offset += search.length
end = document.cookie.indexOf(";", offset);
if (end == -1) end = document.cookie.length;
returnvalue=unescape(document.cookie.substring(offset, end))
}
}
return returnvalue;
}

function onloadfunction(){
if (persistmenu=="yes"){
var cookiename=(persisttype=="sitewide")? "switchmenu" : window.location.pathname
var cookievalue=get_cookie(cookiename)
if (cookievalue!="")
document.getElementById(cookievalue).style.display="block"
}
}

function savemenustate(){
var inc=1, blockid=""
while (document.getElementById("sub"+inc)){
if (document.getElementById("sub"+inc).style.display=="block"){
blockid="sub"+inc
break
}
inc++
}
var cookiename=(persisttype=="sitewide")? "switchmenu" : window.location.pathname
var cookievalue=(persisttype=="sitewide")? blockid+";path=/" : blockid
document.cookie=cookiename+"="+cookievalue
}

if (window.addEventListener)
window.addEventListener("load", onloadfunction, false)
else if (window.attachEvent)
window.attachEvent("onload", onloadfunction)
else if (document.getElementById)
window.onload=onloadfunction

if (persistmenu=="yes" && document.getElementById)
window.onunload=savemenustate

</script>









<?php
if(defined("PROFILE") && file_exists("images/backgrounds/".BACKGROUND.".gif")) {
echo"
<style type='text/css'>
body {
  background:           url('images/backgrounds/".BACKGROUND.".gif');
  margin:               0;
  top:                  0;
  bottom:               0;
  font-family: Verdana, Geneva, sans-serif;
  font-size: 10px;
}
</style>";
} else {
echo"
<style type='text/css'>
body {
  background:           url('themes/".THEME."/img/hfbg.png');
  margin:               0;
  top:                  0;
  bottom:               0;
  font-family: Verdana, Geneva, sans-serif;
  font-size: 10px;
}
</style>";
}
?>


<script type="text/javascript">
<!--
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
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

  
  <script type="text/javascript" src="includes/getrss.js" onLoad="showRSS('Habbo');"></script>
  
  <script type="text/javascript" src="includes/topmessage.js"></script>
  
  <script type="text/javascript" src="includes/dragobject.js"></script>

  <script type="text/javascript" src="includes/poll.js"></script>

  <script type="text/javascript" src="includes/javascript.js"></script>
  
  <script type='text/javascript' src='includes/swfobject.js'></script>

<link rel='alternate' type='application/rss+xml' title='RSS' href='RSS' />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>

<script type="text/javascript" src="themes/<?php echo THEME; ?>/fadeslideshow.js">

/***********************************************
* Ultimate Fade In Slideshow v2.0- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for this script and 100s more
***********************************************/

</script>

<script type="text/javascript">

var mygallery=new fadeSlideShow({
	wrapperid: "fadeshow1", //ID of blank DIV on page to house Slideshow
	dimensions: [471, 205], //width/height of gallery in pixels. Should reflect dimensions of largest image
	imagearray: [
	<?php
$do=mysql_fetch_array(mysql_query("SELECT id FROM slideshow ORDER BY id DESC LIMIT 1"));
	$q=mysql_query("SELECT * FROM slideshow");
	while($row=mysql_fetch_array($q)) {
if($row['id'] == $do['id']) {
	echo"
		[\"".$row['image']."\", \"".$row['link']."\", \"\", \"".$row['text']."\"]
		";
} else {
	echo"
		[\"".$row['image']."\", \"".$row['link']."\", \"\", \"".$row['text']."\"],
		";
}
}
	?>
	],
	displaymode: {type:'auto', pause:3500, cycles:0, wraparound:false},
	persist: false, //remember last viewed slide and recall within same session?
	fadeduration: 500, //transition duration (milliseconds)
	descreveal: "always",
	togglerid: ""
})
</script>


</head>
<body>
<div id="dhtmltooltip"></div>

<script type="text/javascript">
function Ajax(){
var xmlHttp;
	try{	
		xmlHttp=new XMLHttpRequest();// Firefox, Opera 8.0+, Safari
	}
	catch (e){
		try{
			xmlHttp=new ActiveXObject("Msxml2.XMLHTTP"); // Internet Explorer
		}
		catch (e){
		    try{
				xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch (e){
				alert("Din browser har ikke Ajax. Vi anbefaler deg &#229; laste ned FireFox :)");
				return false;
			}
		}
	}

xmlHttp.onreadystatechange=function(){
	if(xmlHttp.readyState==4){
		document.getElementById('ReloadThis2').innerHTML=xmlHttp.responseText;

	}
}
<?php

 echo"xmlHttp.open(\"GET\",\"includes/get_online_mods.php\",true);";

?>

xmlHttp.send(null);
}

window.onload=function(){
	setTimeout('Ajax()',100);
}

</script>

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
<?php if(!defined("FORUM")) { ?>
<div class="container">
<?php } else { ?>
<div class="container">
<?php } ?>
<div class="header">

<div class="menu">
<a href="index" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('hovedmeny','','themes/<?php echo THEME; ?>/img/hovedsiden_light.png',1)"><img src="themes/<?php echo THEME; ?>/img/hovedsiden.png" name="hovedmeny" width="89" height="24" border="0" id="media" class="menu_button" /></a><a href="page?id=11" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('anmeldelser','','themes/<?php echo THEME; ?>/img/anmeldelser_light.png',1)"><img src="themes/<?php echo THEME; ?>/img/anmeldelser.png" name="anmeldelser" width="93" height="24" border="0" id="anmeldelser" class="menu_button" /></a><a href="page?id=3" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('magazine','','themes/<?php echo THEME; ?>/img/magazine_light.png',1)"><img src="themes/<?php echo THEME; ?>/img/magazine.png" name="magazine" width="111" height="24" border="0" id="magazine" class="menu_button" /></a><a href="page?id=5" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('fancenter','','themes/<?php echo THEME; ?>/img/fancenter_light.png',1)"><img src="themes/<?php echo THEME; ?>/img/fancenter.png" name="fancenter" width="84" height="24" border="0" id="fancenter" class="menu_button" /></a><a href="page?id=15" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('habbofix','','themes/<?php echo THEME; ?>/img/habbofix_light.png',1)"><img src="themes/<?php echo THEME; ?>/img/habbofix.png" name="habbofix" width="" height="" border="0" id="w" class="menu_button" /></a><a href="page?id=13" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('habboinfo','','themes/<?php echo THEME; ?>/img/habboinfo_light.png',1)"><img src="themes/<?php echo THEME; ?>/img/habboinfo.png" name="habboinfo" width="81" height="24" border="0" id="habboinfo" class="menu_button" /></a><a href="values" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('mobelpriser','','themes/<?php echo THEME; ?>/img/mobelpriser_light.png',1)"><img src="themes/<?php echo THEME; ?>/img/mobelpriser.png" name="mobelpriser" width="93" height="24" border="0" id="mobelpriser" class="menu_button" /></a><a href="tagwall" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('tagwall','','themes/<?php echo THEME; ?>/img/tagwall_light.png',1)"><img src="themes/<?php echo THEME; ?>/img/tagwall.png" name="tagwall" width="66" height="24" border="0" id="tagwall" class="menu_button" /></a>
</div>

     <div class="hot_head"><div class="sistenytt"><img src="themes/<?php echo THEME; ?>/img/sistenytt.png" /></div></div>

   </div>
    <div class="menu_head"> <?php }


function pageheadermid()
{


if(isset($_SESSION['username']) && ($_SESSION['password'])) {
$result = mysql_query("SELECT * FROM settings");
$settings = mysql_fetch_array($result);

$result = mysql_query("SELECT * FROM usersystem WHERE username='".$_SESSION['username']."' AND password='".$_SESSION['password']."'");
$user = mysql_fetch_array($result);

$user['name'] = $user['username'];
$user['level'] = $user['userlevel'];
$user['habbo'] = $user['habboname'];
$user['text'] = $user['freetext'];

}

?>
    </div>

     <div class="top_left">
<?php if(!defined("ONLINE")) { ?>
<a href="register" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('regg','','themes/<?php echo THEME; ?>/img/regg_light.png',1)"><img src="themes/<?php echo THEME; ?>/img/regg.png" name="regg" width="119" height="25" border="0" id="regggg" style='margin-top:-1px;' /></a><a href="login" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('logginn','','themes/<?php echo THEME; ?>/img/logginn_light.png',1)"><img src="themes/<?php echo THEME; ?>/img/logginn.png" name="logginn" width="86" height="25" border="0" id="logginn" class="top_left_btn" style='margin-top:-1px;' /></a>
<?php



$x=$_GET['try']+1;

echo"<div style='text-align:center; background: #EFEFEF; margin-top: -4px; padding-bottom:2px;'><br/>
<form method='post' action='login?try=".$x."'><b>Brukernavn:</b><br/><input type='text' id='textinput' name='username'>
<br/><br/><b>Passord:</b><br/><input type='password' id='textinput' name='password'>
<br/><br/>"; 

// echo"<input type='checkbox' name='remember' value='yes' title='Husk meg?' style='vertical-align:-2px;'>&nbsp;"; 

echo"<input type='hidden' name='remember' value='yes' style='vertical-align:-2px;'><!-- <b>Husk meg</b><br/><br/>-->"; 

echo"<input type='submit' value='Logg inn' id='button'></form>
<br/>
| <a href='forgot'>Glemt passord?</a> |
<br/><br/>
</div>
";
?>

<?php } else { 

echo"
            <div style='text-align:center; border-bottom: solid #000 1px; background: #C7C7C7; padding-top:3px; padding-bottom:3px;'>  <b><font size='2'><a href='profile?id=".$user['id']."'>".$user['name']."</a></font></b>         </div>
<div style='text-align:center; background: #EFEFEF;'>
";
if($user['verified_habbo'] == "yes") {
echo"<a href='http://habbo.no/home/".$user['habbo']."'><img src='http://www.habbo.no/habbo-imaging/avatarimage?user=".$user['habbo']."&action=wav&direction=3&head_direction=3&gesture=sml&size=b' alt='".$habboname."'
 align='right' style='margin-top:-10px; margin-left:-18px; margin-right:12px;' border='0'></a><br/><br/>";
}
 echo"
<table cellpadding='2'"; 
if($user['verified_habbo'] == "yes") {
echo" style='margin-top:-10px;'";
} else {
echo" style='margin-top:14px;'";
}
 echo" align='center' cellspacing='0' border='0'><tr><td id='td'><div align='middle'><img src='themes/".THEME."/buttons/money.gif' title='Mynter' style='vertical-align:middle; float:middle;'></div></td>


<td id='td'><div align='middle'></div></td><td id='td'><div align='middle'></div></td><td id='td'><div align='middle'></div></td><td id='td'><div align='middle'></div></td>
<td id='td'><div align='middle'><img src='themes/".THEME."/buttons/points.gif' title='Poeng' style='vertical-align:middle; float:middle;'></div></td>



</tr>


<tr><td id='td'><div align='middle'><b>".$user['credits']."</b></div></td>

<td id='td'><div align='middle'></div></td><td id='td'><div align='middle'></div></td><td id='td'><div align='middle'></div></td><td id='td'><div align='middle'></div></td>

<td id='td'><div align='middle'><b>".$user['points']."</b></div></td>


</tr>
</table>";

$url=REQUEST_URL;

$burl=explode("?status", $url);


$burl=explode("&status", $burl[0]);


$url=$burl[0];

echo"<br/><b>Status:</b><br/><select name='status' id='textinput' onchange='window.location.href=this.value'>";
if(isstr("?", $url)) {
echo"<option value='".$url."&status=1'"; if($user['status'] == "1") {echo" SELECTED";} echo">Tilgjengelig</option>";
} else {
echo"<option value='?status=1'"; if($user['status'] == "1") {echo" SELECTED";} echo">Tilgjengelig</option>";
}
if(isstr("?", $url)) {
echo"<option value='".$url."&status=2'"; if($user['status'] == "2") {echo" SELECTED";} echo">Opptatt</option>";
} else {
echo"<option value='?status=2'"; if($user['status'] == "2") {echo" SELECTED";} echo">Opptatt</option>";
}
if(isstr("?", $url)) {
echo"<option value='".$url."&status=3'"; if($user['status'] == "3") {echo" SELECTED";} echo">Snart tilbake</option>";
} else {
echo"<option value='?status=3'"; if($user['status'] == "3") {echo" SELECTED";} echo">Snart tilbake</option>";
}
if(isstr("?", $url)) {
echo"<option value='".$url."&status=4'"; if($user['status'] == "4") {echo" SELECTED";} echo">Borte</option>";
} else {
echo"<option value='?status=4'"; if($user['status'] == "4") {echo" SELECTED";} echo">Borte</option>";
}
 echo"
</select><br/><br/><div class='forum_teaser' onclick='window.location=\"forum\"' style='border-top: solid #000 1px;'></div></div>";

 } ?>
     </div>
      <div id="fadeshow1"></div>
       <div class="top_right">
       <?php
       
$result = mysql_query("SELECT * FROM news ORDER BY id DESC LIMIT 6 ");

while($row = mysql_fetch_array($result))
  { 

$do=mysql_fetch_array(mysql_query("SELECT * FROM newscategories WHERE name = '".$row['category']."' LIMIT 1"));


  echo "<div style='background-color:#87CEFA;'>";
if(empty($row['category'])) {
 echo"<div class='hotline_icon2' onclick='window.location=\"news?id=" . $row['id'] . "\"' style='opacity:1;' onmouseover='this.style.opacity=0.85;'  onmouseout='this.style.opacity=1'>";
} else {
 echo"<div class='hotline_icon' onclick='window.location=\"news?id=" . $row['id'] . "\"' style='opacity:1;' onmouseover='this.style.opacity=0.85;'  onmouseout='this.style.opacity=1'><img src='".$do['image']."' title='".$do['name']."' border='0' alt='0' align='left' style='margin-top:1px; margin-right:9px;'>";
}
 echo"<b>";  if(strlen($row['name']) >= 45) {
$text = substr($row['name'], 0, (45-3))."...";

} else {
$text = $row['name'];
} echo $text."</b><br/><span style='color: #999999;'>".$row['date']."</span></div></div>";

unset($do);
 } 
?>

             <div style="border-bottom:1px solid #EDEDED;"></div>

       </div>
        <div class="middle_bar"></div>
         <br style="clear:both;" />
<?php if(!defined("FORUM")) { ?>
          <div class="body_left">
<?php if(isset($user)) { ?>
           <div style="background-image: url('themes/<?php echo THEME; ?>/img/brukerpanelb.png');" class="lboxtop">
           </div>

             <?php


if(!empty($settings['extra_link'])) {
if($settings['link_access'] == "all") {
echo"<div style='background-color:#87CEFA;'><b><div class='log_list' onclick='window.location=\"".$settings['link_goal']."\"' style='opacity:1;cursor:pointer;border-bottom: solid #000 2px;' onmouseover='this.style.opacity=0.85;' onmouseout='this.style.opacity=1'>".$settings['extra_link']."</div></b></div>";
} elseif(is_numeric($settings['link_access'])) {
if($settings['link_access'] <= $user['level']) {
echo"<div style='background-color:#87CEFA;'><b><div class='log_list' onclick='window.location=\"".$settings['link_goal']."\"' style='opacity:1;cursor:pointer;border-bottom: solid #000 2px;' onmouseover='this.style.opacity=0.85;' onmouseout='this.style.opacity=1'>".$settings['extra_link']."</div></b></div>";
}
} else {
if($settings['link_access'] == $user['rights']) {
echo"<div style='background-color:#87CEFA;'><b><div class='log_list' onclick='window.location=\"".$settings['link_goal']."\"' style='opacity:1;cursor:pointer;border-bottom: solid #000 2px;' onmouseover='this.style.opacity=0.85;' onmouseout='this.style.opacity=1'>".$settings['extra_link']."</div></b></div>";
}
}
}


if($user['level'] > 3) {
echo"
<div style='background-color:#87CEFA;'><b><div class='log_list' onclick='window.location=\"adminpanel\"' style='opacity:1;cursor:pointer;' onmouseover='this.style.opacity=0.85;' onmouseout='this.style.opacity=1'><img src='themes/".THEME."/buttons/status_exclusive_big.gif' style='vertical-align:middle; margin-top:-3px;margin-left:-1px;'> Adminpanel</div></b></div>"; 
}
echo"<div style='background-color:#87CEFA;'><b><div class='log_list' onclick='window.location=\"userpanel\"' style='opacity:1;cursor:pointer;' onmouseover='this.style.opacity=0.85;' onmouseout='this.style.opacity=1'><img src='themes/".THEME."/buttons/my_5.gif' style='vertical-align:middle; margin-top:-3px;'> Innstillinger</div>";

echo"
        <div class='log_list' onclick='window.location=\"post\"' style='opacity:1;cursor:pointer;' onmouseover='this.style.opacity=0.85;' onmouseout='this.style.opacity=1'><img src='themes/".THEME."/buttons/mail_1.gif' style='vertical-align:middle; margin-top:-3px;'> Postboks";
$result = mysql_query("SELECT * FROM post WHERE status='unread' AND receiver='".$user['name']."'");
 if(mysql_num_rows($result) != 0) {
echo" (".mysql_num_rows($result).")";
}
echo"</div>
         <div class='log_list' onclick='window.location=\"members\"' style='opacity:1;cursor:pointer;' onmouseover='this.style.opacity=0.85;' onmouseout='this.style.opacity=1'><img src='themes/".THEME."/buttons/v20_7.gif' style='vertical-align:middle; margin-top:-5px; margin-left:-2px;'> Brukerliste</div>
          <div class='log_list' onclick='window.location=\"center\"' style='opacity:1;cursor:pointer;' onmouseover='this.style.opacity=0.85;' onmouseout='this.style.opacity=1'><img src='themes/".THEME."/buttons/new_04.gif' style='vertical-align:middle; margin-top:-3px;'> Banken</div>
          <div class='log_list' onclick='window.location=\"marketplace\"' style='opacity:1;cursor:pointer;' onmouseover='this.style.opacity=0.85;' onmouseout='this.style.opacity=1'><img src='themes/".THEME."/buttons/my_12.gif' style='vertical-align:middle; margin-top:-3px;'> Bytteplass";
$result = mysql_query("SELECT * FROM marketplace");
 if(mysql_num_rows($result) > 0) {
echo" (".mysql_num_rows($result).")";
}
echo"</div>
          <div class='log_list' onclick='window.location=\"community\"' style='opacity:1;cursor:pointer;' onmouseover='this.style.opacity=0.85;' onmouseout='this.style.opacity=1'><img src='themes/".THEME."/buttons/my_2.gif' style='vertical-align:middle; margin-top:-7px;'> Community</div>
          <div class='log_list' onclick='window.location=\"profile?id=".$user['id']."\"' style='opacity:1;cursor:pointer;' onmouseover='this.style.opacity=0.85;' onmouseout='this.style.opacity=1'><img src='themes/".THEME."/buttons/new_09.gif' style='vertical-align:middle; margin-top:-3px;'> Min profil";

if($user['guest_msg'] > 0) {
echo" (".$user['guest_msg'].")";
}
echo"</div>
		<div class='log_list' onclick='window.location=\"showroom?id=".$user['id']."\"' style='opacity:1;cursor:pointer;' onmouseover='this.style.opacity=0.85;' onmouseout='this.style.opacity=1'><img src='themes/".THEME."/buttons/v20_3.gif' style='vertical-align:middle; margin-top:-3px;'> Mitt samlerom</div>
"; ?>


<div class='log_list' onclick='window.location="logout"' style='opacity:1;cursor:pointer;' onmouseover='this.style.opacity=0.85;' onmouseout='this.style.opacity=1'><?php echo"<img src='themes/".THEME."/buttons/v22_3.gif' style='vertical-align:middle; margin-top:-2px;margin-left:2px;'> Logg ut"; ?></div></div>
 </b>
         <?php


if($user['level'] == "4" && ($user['rights'] == "mod" || $user['rights'] == "admin" || $user['rights'] == "global")) {
$result = mysql_query("SELECT * FROM messages");
 if(mysql_num_rows($result) > 0) {
echo"<div class='lboxmid'>";
echo"<br/><b><a href='adminpanel?action=messages'>Det er ".mysql_num_rows($result)." ubesvart(e) n&#248;danrop!</a></b>";
echo"</div>";
}
}

if($user['level'] == "4" && ($user['rights'] == "mod" || $user['rights'] == "admin" || $user['rights'] == "global")) {
$result = mysql_query("SELECT * FROM guestbook WHERE status = 'reported'");
 if(mysql_num_rows($result) > 0) {
echo"<div class='lboxmid'>";
echo"<br/><b><a href='adminpanel?action=tagwall'>Det er ".mysql_num_rows($result)." rapporterte tagwallposter!</a></b>";
echo"</div>";
}
}

if($user['level'] == "4" && ($user['rights'] == "mod" || $user['rights'] == "admin" || $user['rights'] == "global")) {
$result = mysql_query("SELECT * FROM comments WHERE status = 'reported'");
 if(mysql_num_rows($result) > 0) {
echo"<div class='lboxmid'>";
echo"<br/><b><a href='adminpanel?action=comments'>Det er ".mysql_num_rows($result)." rapporterte kommentarer!</a></b>";

echo"</div>";

}
}



 }

 ?>

<?php if(defined("ONLINE")) { ?>
           <div style="background-image: url('themes/<?php echo THEME; ?>/img/avstemningb_2.png');" class="lboxtop">
<?php } else { ?>
           <div style="background-image: url('themes/<?php echo THEME; ?>/img/avstemningb.png');" class="lboxtop">
<?php } ?>
           </div>
            <div class="lboxmid">
<?php

$result = mysql_query("SELECT * FROM `poll` ORDER BY `poll_id` DESC LIMIT 1");
$poll = mysql_fetch_array($result);


?>
<?php
if(!isset($_SESSION['username']) || in_array($_SESSION['username'], explode(",", $poll['users_voted']))) {
include"includes/poll_vote.php";
} else {
?>
<div id="poll">
<b><?php echo $poll['query']; ?></b><br/>
<form>
<table cellpadding='3' cellspacing='0' width='100%' style='margin-top:5px;'>
<tr><td>
<input type="radio" name="vote" value="a1" onclick="getVote(this.value)" style='vertical-align:middle;' /><?php echo $poll['a1']; ?>
</tr></td>
<tr><td>
<input type="radio" name="vote" value="a2" onclick="getVote(this.value)" style='vertical-align:middle;' /><?php echo $poll['a2']; ?>
</tr></td>
<tr><td>
<input type="radio" name="vote" value="a3" onclick="getVote(this.value)" style='vertical-align:middle;' /><?php echo $poll['a3']; ?>
</tr></td>
</table>
</form>
</div>
<?php
}
?>
            </div>

           <div style="background-image: url('themes/<?php echo THEME; ?>/img/annonserb.png');" class="lboxtop">
           </div>
            <div class="lboxmid" style='<?php if(!defined("ONLINE")) { ?> border-bottom: solid #1D4184 3px; <?php } ?>'>Det er ingen annonser for &oslash;yeblikket.</div> 


<?php if(defined("ONLINE")) { ?>
           <div style="background-image: url('themes/<?php echo THEME; ?>/img/brukereb.png');" class="lboxtop">
           </div>
            <div class="lboxmid" style='border-bottom: solid #1D4184 3px;'><table>
<?php

if(defined("ONLINE")) {
$result = mysql_query("SELECT * FROM usersystem WHERE last_active + 800 >= ".time()." ORDER BY id");
while($row = mysql_fetch_array($result))
  { 
  echo"
 ";
  if($row['last_active'] + 240 >= time()) {
  
  if($row['status'] == "2") {
  echo "<tr><td><b><img src='images/busy.png' title='Opptatt' style='vertical-align:1px;'>"; 
  
  } elseif($row['status'] == "4") {
    echo "<tr><td><b><img src='images/away.png' title='Borte' style='vertical-align:1px;'>"; 
    
    } elseif($row['status'] == "1") {
    echo "<tr><td><b><img src='images/online.png' title='Tilgjengelig' style='vertical-align:1px;'>"; 
    
    } elseif($row['status'] == "3") {
    echo "<tr><td><b><img src='images/soonback.png' title='Snart tilbake' style='vertical-align:1px;'>"; 
    
  }
   else {
    echo "<tr><td><b><img src='images/online.png' title='Tilgjengelig' style='vertical-align:1px;'>"; 
  }


if($row['userlevel'] > 3) {
echo" <a href='profile?id=" . $row['id'] . "' style='color: #009900'>";
} elseif($row['userlevel'] == 3) {
echo" <a href='profile?id=" . $row['id'] . "' style='color: #0033CC'>";
} else {
echo" <a href='profile?id=" . $row['id'] . "'>";
}


if(strlen($row['username']) >= 16) {
$text = substr($row['username'], 0, (16-3))."...";
} else {
$text = $row['username'];
}
 echo $text."</a></b></td></tr>";
} else {
  echo "";
}
echo""; 
  }
  }

?>
           </table> </div>
<?php }  ?>

          </div>
<?php }  ?>

<?php if(!defined("FORUM")) { ?>

           <div class="body_center">
            <div style="background-image: url('themes/<?php echo THEME; ?>/img/fronthead.png');" class="bboxtop">
                   </div>    
<?php } else { ?>

           <div class="body_center">
            <div style="background-image: url('themes/<?php echo THEME; ?>/img/forumhead.png');" class="forumtop">
                   </div>    
<?php } ?>
<?php

}
 
function pagemid()
{
pageheadermid();
echo"<div class='bboxmid' align='center'><div id='mtext'>";

}

function pagemidcustom()
{
pageheadermid();
if(!defined("FORUM")) {
echo"<div class='bboxmid'><div id='mtext'>";
} else {
echo"<div class='forummid'><div id='mtext'>";
}

}

function pagebreak()
{

echo"             </div></div>
              <div class='bboxbot'></div>

             <div class='bboxtop_nohdr' style='margin-top:10px;'></div>
              <div class='bboxmid' align='center'><div id='mtext'>";

}

function pagebot($footer)
{


if(isset($_SESSION['username']) && ($_SESSION['password'])) {

$result = mysql_query("SELECT * FROM usersystem WHERE username='".$_SESSION['username']."' AND password='".$_SESSION['password']."'");
$user = mysql_fetch_array($result);
}


$result = mysql_query("SELECT * FROM settings");
$settings = mysql_fetch_array($result);

$result = mysql_query("SELECT * FROM magazine");
$magazine = mysql_fetch_array($result);

?>
<?php
if(!defined("FORUM")) {
?>
             <br/></div></div>
              <div class='bboxbot'></div>
<?php } else { ?>
             <br/></div></div>
              <div class='forumbot'></div>
<?php } ?>
           </div> 
<?php
if(!defined("FORUM")) {
?>
            <div class="body_right">
            
             <div style="background-image: url('themes/<?php echo THEME; ?>/img/verdi.png');" class="rboxtop">
             </div>
                                    <?php
       
$result = mysql_query("SELECT * FROM furnivalues ORDER BY time DESC LIMIT 4 ");

while($row = mysql_fetch_array($result))
  { 
  $bad=array("low", "high", "medium");
  $good=array("<font color='red'>Synker</font>", "<font color='green'>Stiger</font>", "<font color='grey'>Stabil</font>");
$status=str_replace($bad, $good, $row['status']);

$cat = mysql_fetch_array(mysql_query("SELECT id FROM `furnicategories` WHERE categories = '".$row['category']."' LIMIT 1"));

  echo "<div style='background-color:#87CEFA; width:241px;'><div class='furniline' onclick='window.location=\"values?categoryId=".$cat['id']."#furni-".$row['name']."\"' style='opacity:1;' onmouseover='this.style.opacity=0.85'  onmouseout='this.style.opacity=1'><img src='".$row['image']."' align='left' style='padding-right:9px;'>
<strong>".$row['name']." &nbsp; ".$status."</strong> <br />
" . round($row['value']*$settings['hc_value']) . " Mynt | ".$row['value']." HC<br/><span style='color: #999999;'>".str_replace(" ", "&nbsp;", $row['lastupdate'])."</span>
</div></div>";

 } 
?>

             
             
              <div style="background-image: url('themes/<?php echo THEME; ?>/img/magzn.png');" class="rboxtop">
              </div>
               <div class="rboxmid">
                <?php echo $magazine['panel']; ?>
               </div>

                <?php if(defined("ONLINE")) { ?>
           <div style="background-image: url('themes/<?php echo THEME; ?>/img/nodanropb_2.png');" class="rboxtop">
           </div>
            <div class="ladmid">
            <a href='help'><img src="themes/<?php echo THEME; ?>/img/anrop_2.png" border='0' /></a>
            </div>
         <?php } 
if(isset($_SESSION['username'])) {
?>

              <div style="background-image: url('themes/<?php echo THEME; ?>/img/forumposterb.png');" class="rboxtop">
              </div>
               <div class="rboxmid">


<?php

echo"<table cellpadding='5' cellspacing='0' border='0' width='100%' style='text-align: left;'>";
$i = 1;
$query = mysql_query("SELECT * FROM threads ORDER BY latestpost DESC LIMIT 5");
while($thread = mysql_fetch_array($query))
{

if(!isset($color)) {
$color = "D9D9D9";
} else {
if($color == "D9D9D9") {
$color = "none";
} else {
$color = "D9D9D9";
}

}
echo"<tr>";
if($thread['locked'] > 0) {
echo"<td id='td' style='width: 7px; background-color: #".$color.";'><img src='images/forum/folderlock.gif'></td>";
} else {
if(!in_array("".$thread['id']."||".$thread['latestpost']."", explode(",",$user['threads'])) && ($thread['latestpost']+3*24*3600) >= time()) {
echo"<td id='td' style='width: 7px; background-color: #".$color.";'><img src='images/forum/foldernew2.png'></td>";
} else {
echo"<td id='td' style='width: 7px; background-color: #".$color.";'><img src='images/forum/folder.gif'></td>";
}
}
echo"<td id='td' style=' background-color: #".$color.";'><b><a href='forum?action=thread&id=".$thread['id']."'>".$thread['subject']."</a></b><br/>".$thread['author']."</td></tr>";
$i++;
}
echo"</table>";
?>
               </div><?php } ?>


           <div style="background-image: url('themes/<?php echo THEME; ?>/img/moderatorerb.png');" class="rboxtop">
           </div>
            <div class="rboxmid">


<?php

echo"<text id='ReloadThis2'><img src='images/loading.gif' style='margin-left:50px;' alt='Laster inn...'></text>";
?>
</div>


                <div style="background-image: url('themes/<?php echo THEME; ?>/img/anmld.png');" class="rboxtop">
                </div>
                       <?php
       
$result = mysql_query("SELECT * FROM articles ORDER BY id DESC LIMIT 3 ");

while($row = mysql_fetch_array($result))
  { 

$habbo=mysql_fetch_array(mysql_query("SELECT habboname FROM usersystem WHERE username = '".$row['composer']."'"));

  echo "<div style='background-color:#87CEFA; width:241px;'><div class='verdiline' onclick='window.location=\"articles?id=" . $row['id'] . "\"' style='opacity:1;' onmouseover='this.style.opacity=0.85'  onmouseout='this.style.opacity=1'><img src='fancenter/tools/head/head.php?habbo=".$habbo['habboname']."' align='left' style='margin-top:-18px; margin-left:-2px;' alt=''><b>";  if(strlen($row['name']) >= 45) {
$text = substr($row['name'], 0, (45-3))."...";
} else {
$text = $row['name'];
} echo $text; echo"</b><br/><span style='color: #999999;'>".$row['date']."</span></div></div>";
unset($habbo);
 } 
 
?>
<?php } ?>

<div style='border-bottom: solid #1D4184 3px; width: 242px;'></div>
            </div>
             <br style="clear:both;" />
   <?php
    


      if(defined("ONLINE")) {
$result = mysql_query("SELECT * FROM post WHERE status='unread' AND receiver='".$_SESSION['username']."'");
 if(mysql_num_rows($result) > 0 || $user['guest_msg'] > 0) {

?>
<div id="topbar"><div class='messagetop'></div><div class='messagemid'>
<a href="" onClick="closebar(); return false"><img src="http://i44.tinypic.com/28i9ouo.gif" border="0" style="vertical-align: -4px; padding-left:4px;" /></a>

<?php
 if(mysql_num_rows($result) > 0) {
echo"<a href='post'>Du har "; 

$result = mysql_query("SELECT * FROM post WHERE status='unread' AND receiver='".$_SESSION['username']."'");
echo mysql_num_rows($result);

if(mysql_num_rows($result) == 1) {
echo" ulest melding i postboksen din!</a>";
} else {
echo" uleste meldinger i postboksen din!</a>";
}

if($user['guest_msg'] > 0) {
echo"<br/>";
}

}

if($user['guest_msg'] > 0) {
echo"<text";
 if(mysql_num_rows($result) > 0) {
 echo" style='padding-left:24px;'";
}
 echo"><a href='profile?id=".$user['id']."&guestbook'>Du har ".$user['guest_msg']; 

if(mysql_num_rows($result) == 1) {
echo" ny hilsen i gjesteboken din!</a></text>";
} else {
echo" ny hilsen i gjesteboken din!</a></text>";
}
}
?>

</div><div class='messagebot'></div>
</div>

<?php
}
}

?>
              <div class="bottom_bar"><?php echo $footer; ?></div>

 
               <div class="footer"></div>

 </div>


</body>
</html>
<?php } ?>