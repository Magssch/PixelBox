<?php

function pagetop($title)
{
echo" 
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<link rel='shortcut icon' href='http://www.wuax.net/favicon.ico'> 

<title>".$title."</title>
<link href='themes/".THEME."/style.css' rel='stylesheet' type='text/css' />
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
//-->
</script>
 <style type='text/css'>
     A:link { 
  text-decoration: 1; 
  color:#000000
} 
  A:visited { 
  text-decoration: 1; 
  color:#000000 
}
  A:hover { 
  text-decoration: none; 
  color:#FF9900 }
  
  
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
  <script type="text/javascript" src="includes/getrss.js"></script>
  <script type="text/javascript" src="includes/topmessage.js"></script>
  <script type="text/javascript" src="includes/javascript.js"></script>
</head>
<body onLoad="showRSS('Habbo'), MM_preloadImages('themes/<?php echo THEME; ?>/images/media_light.png','themes/<?php echo THEME; ?>/images/sikkerhet_light.png',
'themes/<?php echo THEME; ?>/images/fancenter_light.png','themes/<?php echo THEME; ?>/images/zorex_light.png','themes/<?php echo THEME; ?>/images/habboinfo_light.png',
'themes/<?php echo THEME; ?>/images/mobelpriser_light.png','themes/<?php echo THEME; ?>/images/tagwall_light.png','themes/<?php echo THEME; ?>/images/button_header.png')">

<?php

echo"
<div id='container'>
";
if(defined("ONLINE")) {
$result = mysql_query("SELECT * FROM post WHERE status='unread' AND receiver='".$_SESSION['username']."'");
 if(mysql_num_rows($result) > 0) {

?>
<div id="topbar">
<a href="" onClick="closebar(); return false"><img src="http://i44.tinypic.com/28i9ouo.gif" border="0" /></a>
<?php
echo"<a href='post.php'>Du har "; 

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
<div class='logo'><img src='themes/wuax_beta/images/wuax_button_logo.gif' alt='Wuax' />
</div>

<div class='set_menu'>
";

?>
<a href='index.php'><img src='themes/<?php echo THEME; ?>/images/hovedmeny.png'
   onMouseOver='this.src = "themes/<?php echo THEME; ?>/images/hovedmeny_light.png"; ' onMouseOut='this.src = "themes/<?php echo THEME; ?>/images/hovedmeny.png"; ' border='0'></a>
<a href='media.php'><img src='themes/<?php echo THEME; ?>/images/media.png'  style='margin-left: -4px;'
   onMouseOver='this.src = "themes/<?php echo THEME; ?>/images/media_light.png"; ' onMouseOut='this.src = "themes/<?php echo THEME; ?>/images/media.png"; ' border='0'></a>
<a href='safety.php'><img src='themes/<?php echo THEME; ?>/images/sikkerhet.png'  style='margin-left: -4px;'
   onMouseOver='this.src = "themes/<?php echo THEME; ?>/images/sikkerhet_light.png"; ' onMouseOut='this.src = "themes/<?php echo THEME; ?>/images/sikkerhet.png"; ' border='0'></a>
<a href='page.php?id=5'><img src='themes/<?php echo THEME; ?>/images/fancenter.png'  style='margin-left: -4px;'
   onMouseOver='this.src = "themes/<?php echo THEME; ?>/images/fancenter_light.png"; ' onMouseOut='this.src = "themes/<?php echo THEME; ?>/images/fancenter.png"; ' border='0'></a>
<a href='site.php'><img src='themes/<?php echo THEME; ?>/images/wuax.png'  style='margin-left: -4px;'
   onMouseOver='this.src = "themes/<?php echo THEME; ?>/images/wuax_light.png"; ' onMouseOut='this.src = "themes/<?php echo THEME; ?>/images/wuax.png"; ' border='0'></a>
<a href='habboinfo.php'><img src='themes/<?php echo THEME; ?>/images/habboinfo.png'  style='margin-left: -4px;'
   onMouseOver='this.src = "themes/<?php echo THEME; ?>/images/habboinfo_light.png"; ' onMouseOut='this.src = "themes/<?php echo THEME; ?>/images/habboinfo.png"; ' border='0'></a>
<a href='values.php'><img src='themes/<?php echo THEME; ?>/images/mobelpriser.png'  style='margin-left: -4px;'
   onMouseOver='this.src = "themes/<?php echo THEME; ?>/images/mobelpriser_light.png"; ' onMouseOut='this.src = "themes/<?php echo THEME; ?>/images/mobelpriser.png"; ' border='0'></a>
<a href='tagwall.php'><img src='themes/<?php echo THEME; ?>/images/tagwall.png'  style='margin-left: -4px;'
   onMouseOver='this.src = "themes/<?php echo THEME; ?>/images/tagwall_light.png"; ' onMouseOut='this.src = "themes/<?php echo THEME; ?>/images/tagwall.png"; ' border='0'></a>

<?php 
echo"
</div>
</div>";
 }
 
function pagemid()
{

echo"
<div class='container'>
<div class='left'>
";

if(isset($_SESSION['username'])) { echo"<div id='box_top_green_user'>"; } else { echo"<div class='header_login'>"; }
 
echo"</div><div class='boxmid' style='text-align: center;'>
";


if(isset($_SESSION['username']) && ($_SESSION['password'])) {
$result = mysql_query("SELECT * FROM latestids ");
while($row = mysql_fetch_array($result))
  {
  
// latestids <----------------------------------->
$settings['messages'] = $row['messages'];
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
  }
echo"

"; 
 if(strlen($user['name']) >= 14) {
$text = substr($user['name'], 0, (14-3))."...";
} else {
$text = $user['name'];
}
 echo"
<b><font size='2'>".$text."</font></b>"; if($user['verified_habbo'] != "yes") {
 echo"<br/><br/><a href='userpanel.php'>Verifiser habboen din!</a>"; } else { echo" "; }
 echo"<br/><br/>


";

if($user['level'] == "4") {

echo"
<b><a href='adminpanel.php'>Adminpanel</a> </b><br/>
"; 
}
echo"<b>
<a href='userpanel.php'>Innstillinger</a><br/>
<a href='post.php'>Postboks ";
$result = mysql_query("SELECT * FROM post WHERE status='unread' AND receiver='".$user['name']."'");
 if(mysql_num_rows($result) != 0) {
echo"(".mysql_num_rows($result).")";
}
echo"</a><br/>
<a href='members.php'>Brukerliste</a><br/>
<a href='center.php'>Poengsenter</a><br/>
<a href='profile.php?id=".$user['id']."'>Min profil</a><br/>
<a href='logout.php'>Logg ut</a></b><br/>";
/*
$result = mysql_query("SELECT * FROM post WHERE status='unread' AND receiver='".$user['name']."'");
 if(mysql_num_rows($result) != 0) {
echo"<br/><a href='post.php'>Du har <b>".mysql_num_rows($result)."</b> nye meldinger</a><br/>";
}
*/
if($user['level'] == "4" && ($user['rights'] == "mod" || $user['rights'] == "admin")) {
if($settings['messages'] != "0") {
echo"<br/><b><a href='adminpanel.php?action=messages'>Det er ".$settings['messages']." ubesvart(e) n&#248;danrop!</a></b>";
}
}

echo"<br/>";

} else {




echo"
<br/>
<form method='post' action='login.php'><input type='text' id='textinput' value='brukernavn' name='username'"; ?> onFocus='this.value="";' <?php echo"
<br/><br/><input type='password' id='textinput' value='passord' name='password'"; ?> onFocus='this.value="";' <?php echo"
<br/><br/><input type='submit' value='Logg inn' id='button'></form><br/><a href='forgot.php'>Glemt passord?</a>
<br/><br/>
| <a href='login.php'>Logg inn</a> | <a href='register.php'>Registrer deg</a> |
<br/><br/>
";


}

echo"
</div>
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
  echo "<td id='td' width='100%'><b>&#9679; <a href='profile.php?id=" . $row['id'] . "
'>"; if(strlen($row['username']) >= 14) {
$text = substr($row['username'], 0, (14-3))."...";
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

 echo"</div><div class='center'>
<div class='header_content'></div>
<div class='contentmid' align='center'><div id='text'><br/> ";

  }

function pagebreak()
{
echo"</div></div><div id='mid_bot_break'></div><div id='mid_top_break'></div><div class='contentmid' align='center'><div id='text'>";
}

function pagebot($footer)
{
echo"<br/><br/> </div></div>
<div class='contentbot' align='center'>".$footer."</div>
</div>

<div class='right'>
<div class='header_news'></div>
<div class='boxmid'>"; 




$result = mysql_query("SELECT * FROM news ORDER BY id DESC LIMIT 3 ");

while($row = mysql_fetch_array($result))
  { 
  echo"
 <table border='0' width='100%'><tr>";
 

  
  echo "<td id='td' width='100%'><b><a href='news.php?id=" . $row['id'] . "

'>";  if(strlen($row['name']) >= 45) {
$text = substr($row['name'], 0, (45-3))."...";
} else {
$text = $row['name'];
} echo $text; echo"</a></b><br/><span style='color: #999999;'>".$row['date']."</span></td>";


echo"</tr></table>"; 
  }
if(isset($_SESSION['username'])) { 
  echo"</div>
<div class='boxbot'></div>

<div class='header_cfh'></div>
<div class='boxmid' align='center'><b><a href='help.php'>Rapporter en bug</a></b>
"; 
}
echo"</div>
<div class='boxbot'></div>
";


echo"</div></div></body></html>";

}

?>