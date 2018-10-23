<?php

 function pagebreak()
 {
 echo"<hr/>";
 }
 
function pagetop($title)
{ 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel='shortcut icon' href='http://www.wuax.net/favicon.ico'> 
<title><?=$title?></title>
<?php
if(defined("PROFILE") && file_exists("images/backgrounds/".BACKGROUND.".gif")) {
echo"
<style type='text/css'>


  body {
  background-image:url(images/backgrounds/".BACKGROUND.".gif);
  background-color: #FFF;
  font-family: Verdana, Geneva, sans-serif;
  font-size: 10px;
  color: #000;
  margin-left: 15%;
  margin-top: -5px;
  }


</style>";
} else {
echo"
<style type='text/css'>


  body {
  background-image:url(themes/".THEME."/images/email_bg.gif);
  background-color: #FFF;
  font-family: Verdana, Geneva, sans-serif;
  font-size: 10px;
  color: #000;
  margin-left: 15%;
  margin-top: -5px;
  }


</style>";
}
echo"
<link href='themes/".THEME."/contentstyle.css' rel='stylesheet' type='text/css' />";
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
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<?php echo"
<script type='text/javascript' src='themes/".THEME."/fadeslideshow.js'>
"; ?>
/***********************************************
* Ultimate Fade In Slideshow v2.0- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for this script and 100s more
***********************************************/

</script>
<?php echo"
<script type=\"text/javascript\">

var mygallery=new fadeSlideShow({
	wrapperid: \"fadeshow1\", //ID of blank DIV on page to house Slideshow
	dimensions: [471, 205], //width/height of gallery in pixels. Should reflect dimensions of largest image
	imagearray: [
		[\"themes/".THEME."/images/ny1.png\", \"#\", \"\", \"Fusce nec magna risus. Sed sit amet orci ac sem posuere luctus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas aliquet tellus sit amet ipsum euismod dignissim.\"],
		[\"themes/".THEME."/images/ny2.png\", \"#\", \"\", \"Sed sapien massa, varius at rutrum a, sagittis id turpis. Vestibulum vestibulum ante nec magna adipiscing sodales.\"],
		[\"themes/".THEME."/images/ny3.png\", \"#\", \"\", \"Vestibulum sit amet est mi. Nulla ut mi massa. Nullam leo ante, cursus eget ullamcorper in, euismod ut nisi. Quisque mollis turpis id turpis placerat vel faucibus lectus scelerisque. Pellentesque vel lectus quis risus dapibus sodales. Nam quis diam purus, eget accumsan elit.\"],
		[\"themes/".THEME."/images/ny4.png\", \"#\", \"\", \"Morbi sagittis ornare ultricies. Vivamus orci felis, bibendum in ultrices vel, tempor ac dui. Curabitur semper auctor dui, eget malesuada eros gravida at.\"], //<--no trailing comma after very last image element!
	],
	displaymode: {type:'auto', pause:3500, cycles:0, wraparound:false},
	persist: false, //remember last viewed slide and recall within same session?
	fadeduration: 500, //transition duration (milliseconds)
	descreveal: \"always\",
	togglerid: \"\"
})
</script>";
?>
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

<body>
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
?>


<div id="header"></div>
<div id="menu"><?php
echo"
  <div id=\"hovedside\"><a href=\"index\" onMouseOut=\"MM_swapImgRestore()\" onMouseOver=\"MM_swapImage('hovedmeny','','themes/".THEME."/images/hovedsiden_light.png',1)\"><img src=\"themes/".THEME."/images/hovedsiden.png\" name=\"hovedmeny\" width=\"89\" height=\"24\" border=\"0\" id=\"media\" /></a></div>
 
  <div id=\"anmld\"><a href=\"page?id=11\" onMouseOut=\"MM_swapImgRestore()\" onMouseOver=\"MM_swapImage('anmeldelser','','themes/".THEME."/images/anmeldelser_light.png',1)\"><img src=\"themes/".THEME."/images/anmeldelser.png\" name=\"anmeldelser\" width=\"93\" height=\"24\" border=\"0\" id=\"anmeldelser\" /></a></div>
  
  <div id=\"wuaxm\"><a href=\"page?id=3\" onMouseOut=\"MM_swapImgRestore()\" onMouseOver=\"MM_swapImage('magazine','','themes/".THEME."/images/magazine_light.png',1)\"><img src=\"themes/".THEME."/images/magazine.png\" name=\"magazine\" width=\"111\" height=\"24\" border=\"0\" id=\"magazine\" /></a> </div>
  
  <div id=\"fanc\"><a href=\"page?id=5\" onMouseOut=\"MM_swapImgRestore()\" onMouseOver=\"MM_swapImage('fancenter','','themes/".THEME."/images/fancenter_light.png',1)\"><img src=\"themes/".THEME."/images/fancenter.png\" name=\"fancenter\" width=\"84\" height=\"24\" border=\"0\" id=\"fancenter\" /></a> </div>
  
  <div id=\"wuax\"><a href=\"page?id=15\" onMouseOut=\"MM_swapImgRestore()\" onMouseOver=\"MM_swapImage('wuax','','themes/".THEME."/images/wuax_light.png',1)\"><img src=\"themes/".THEME."/images/wuax.png\" name=\"wuax\" width=\"52\" height=\"24\" border=\"0\" id=\"w\" /></a></div>
  
  <div id=\"hinfo\"><a href=\"page?id=13\" onMouseOut=\"MM_swapImgRestore()\" onMouseOver=\"MM_swapImage('habboinfo','','themes/".THEME."/images/habboinfo_light.png',1)\"><img src=\"themes/".THEME."/images/habboinfo.png\" name=\"habboinfo\" width=\"81\" height=\"24\" border=\"0\" id=\"habboinfo\" /></a> </div>
  
  <div id=\"mlp\"><a href=\"values\" onMouseOut=\"MM_swapImgRestore()\" onMouseOver=\"MM_swapImage('mobelpriser','','themes/".THEME."/images/mobelpriser_light.png',1)\"><img src=\"themes/".THEME."/images/mobelpriser.png\" name=\"mobelpriser\" width=\"93\" height=\"24\" border=\"0\" id=\"mobelpriser\" /></a> </div>
  <div id=\"tagw\"><a href=\"tagwall\" onMouseOut=\"MM_swapImgRestore()\" onMouseOver=\"MM_swapImage('tagwall','','themes/".THEME."/images/tagwall_light.png',1)\"><img src=\"themes/".THEME."/images/tagwall.png\" name=\"tagwall\" width=\"66\" height=\"24\" border=\"0\" id=\"tagwall\" /></a> </div>
  "; ?>
  <div id="mellom">
  <?php

   }
 
function pageheadermid()
{


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
$user['holidaypoints'] = $row['holidaypoints'];
  }
echo"

"; 
 if(strlen($user['name']) >= 16) {
$text = substr($user['name'], 0, (16-3))."...";
} else {
$text = $user['name'];
}
}

  echo"
  </div>
  
  
  
  <div id=\"hot_head\"></div>
  <div id=\"sistenytt\"><img src=\"themes/".THEME."/images/sistenytt.png\" /></div>
<div id=\"reglogtop\"><a href=\"forum\"><img src=\"themes/".THEME."/images/wuaxlog.png\" border=\"0\"/></a></div>
<div id=\"userinfo\"></div>

<div id=\"reg\"><a href=\"register\" onMouseOut=\"MM_swapImgRestore()\" onMouseOver=\"MM_swapImage('regg','','themes/".THEME."/images/regg_light.png',1)\"><img src=\"themes/".THEME."/images/regg.png\" name=\"regg\" width=\"119\" height=\"25\" border=\"0\" id=\"regggg\" /></a></div>
<div id=\"log\"><a href=\"login\" onMouseOut=\"MM_swapImgRestore()\" onMouseOver=\"MM_swapImage('logginn','','themes/".THEME."/images/logginn_light.png',1)\"><img src=\"themes/".THEME."/images/logginn.png\" name=\"logginn\" width=\"86\" height=\"25\" border=\"0\" id=\"logginn\" /></a></div>
 "; ?>
<div id="hotpic"><div id="fadeshow1"></div></div>
<div id="hotline">
          <div id="hotline1"></div>
          <div id="hotline2"></div>
          <div id="hotline3"></div>
          <div id="hotline4"></div>
          <div id="hotline5"></div>
          <div id="hotline6"></div>
          <div id="hotline7"></div>
          <div id="hotline8"></div>
</div>
<div id="midt"></div>
<?php
echo"

<div id=\"hjelp\"><img src=\"themes/".THEME."/images/nodanrop.png\" /></div>
<div id=\"na\"><a href=\"#\"><img src=\"themes/".THEME."/images/anrop.png\" border=\"0\"></a></div>
<div id=\"nhead\"></div>
<div id=\"annonser\"><img src=\"themes/".THEME."/images/annonser.png\" /></div>
<div id=\"an\"><a href=\"#\"><img src=\"themes/".THEME."/images/annonse.png\" border=\"0\"></a></div>
";
?>
<div id="frontbg"></div>
  <div id="verdi"></div>
  <div id="hbox">
            <div id="verdi1"></div>
           <div id="verdi2"></div>
           <div id="verdi3"></div>
           <div id="verdi4"></div>
  </div>
      <div id="mag"></div>
      <div id="hbox2"></div>
      <div id="magasin">For &#229; gi dere en liten anelse om hvordan WuaX Magazine kommer til &#229; bli, s&#229; kan vi hinte dere med habbogruppen "Habbo Nytt".
      <img src="http://i33.tinypic.com/2ds0h9j.gif" align="right"/>
      <br /><br /> 
      Den vil bli oppdatert ukentlig, med flere innslag fra v&#229;re bruke. B&#229;de humoristiske og spennende!</div>
         <div id="anmd"></div>
         <div id="hbox3"></div>
<div id="nybox_head"></div>
<div id="nybox_mid"></div>
  <div id="omwuax">
  <?php } 
  
  function pagemid()
{
pageheadermid();
  }
  
  function pagebot($footer)
{
   ?>
  </div>
<div id="nybox_bot"></div>
<div id="footertxt"><center><?=$footer?></center>.</div>
<div id="footer"></div>
</body>
</html>
<?php } ?>