<?php

/*
Historie for julen 09: brukerene fikk &#229;pne kalenderen hver dag og fikk et nytt jule-level skilt + 10 julepoeng.
Disse julepoengene kunne de bruke p&#229; &#229; kj&#248;pe ekstre julestuff til brukeren sin. Det kom en nisselue p&#229; logoen, sn&#248; p&#229; siden og
WuBot og BotaX l&#230;rte seg &#229; forst&#229; "god jul"!
*/

include"main.php";

function gift($points, $holidaypoints, $credits)
{
$result = mysql_query("SELECT * FROM usersystem WHERE username='".$_SESSION['username']."' AND password='".$_SESSION['password']."'");
while($row = mysql_fetch_array($result))
  {
$user['points'] = $row['points'];
$user['credits'] = $row['credits'];
$user['badges'] = $row['badges'];
$user['items'] = $row['items'];
$user['holidaypoints'] = $row['holidaypoints'];
$user['lastgift'] = $row['lastgift'];
  }
if($user['lastgift'] != strftime("%d%m")) {
$x = $user['holidaypoints'];
$vari = $x+$holidaypoints;
mysql_query("UPDATE usersystem SET holidaypoints = '".$vari."' WHERE username = '".$_SESSION['username']."'");

$x = $user['points'];
$vari = $x+$points;
mysql_query("UPDATE usersystem SET points = '".$vari."' WHERE username = '".$_SESSION['username']."'");

$x = $user['credits'];
$vari = $x+$credits;
mysql_query("UPDATE usersystem SET credits = '".$vari."' WHERE username = '".$_SESSION['username']."'");
$user['badgesx'] = explode(",", $user['badges']);
$user['itemsx'] = explode(",", $user['items']);

if(!in_array("XM1", $user['badgesx']) && !in_array("christmas09", $user['itemsx'])) { mysql_query("UPDATE usersystem SET badges = '".$user['badges']."XM1,' WHERE username = '".$_SESSION['username']."'"); mysql_query("UPDATE usersystem SET items = '".$user['items']."christmas09,' WHERE username = '".$_SESSION['username']."'"); }

elseif(in_array("XM1", $user['badgesx'])) mysql_query("UPDATE usersystem SET badges = '".str_replace("XM1", "XM2", $user['badges'])."' WHERE username = '".$_SESSION['username']."'");
elseif(in_array("XM2", $user['badgesx'])) mysql_query("UPDATE usersystem SET badges = '".str_replace("XM2", "XM3", $user['badges'])."' WHERE username = '".$_SESSION['username']."'");
elseif(in_array("XM3", $user['badgesx'])) mysql_query("UPDATE usersystem SET badges = '".str_replace("XM3", "XM4", $user['badges'])."' WHERE username = '".$_SESSION['username']."'");
elseif(in_array("XM4", $user['badgesx'])) mysql_query("UPDATE usersystem SET badges = '".str_replace("XM4", "XM5", $user['badges'])."' WHERE username = '".$_SESSION['username']."'");
elseif(in_array("XM5", $user['badgesx'])) mysql_query("UPDATE usersystem SET badges = '".str_replace("XM5", "XM6", $user['badges'])."' WHERE username = '".$_SESSION['username']."'");
elseif(in_array("XM6", $user['badgesx'])) mysql_query("UPDATE usersystem SET badges = '".str_replace("XM6", "XM7", $user['badges'])."' WHERE username = '".$_SESSION['username']."'");
elseif(in_array("XM7", $user['badgesx'])) mysql_query("UPDATE usersystem SET badges = '".str_replace("XM7", "XM8", $user['badges'])."' WHERE username = '".$_SESSION['username']."'");
elseif(in_array("XM8", $user['badgesx'])) mysql_query("UPDATE usersystem SET badges = '".str_replace("XM8", "XM9", $user['badges'])."' WHERE username = '".$_SESSION['username']."'");
elseif(in_array("XM9", $user['badgesx'])) mysql_query("UPDATE usersystem SET badges = '".str_replace("XM9", "X10", $user['badges'])."' WHERE username = '".$_SESSION['username']."'");
elseif(in_array("X10", $user['badgesx'])) mysql_query("UPDATE usersystem SET badges = '".str_replace("X10", "X11", $user['badges'])."' WHERE username = '".$_SESSION['username']."'");
elseif(in_array("X11", $user['badgesx'])) mysql_query("UPDATE usersystem SET badges = '".str_replace("X11", "X12", $user['badges'])."' WHERE username = '".$_SESSION['username']."'");
elseif(in_array("X12", $user['badgesx'])) mysql_query("UPDATE usersystem SET badges = '".str_replace("X12", "X13", $user['badges'])."' WHERE username = '".$_SESSION['username']."'");
elseif(in_array("X13", $user['badgesx'])) mysql_query("UPDATE usersystem SET badges = '".str_replace("X13", "X14", $user['badges'])."' WHERE username = '".$_SESSION['username']."'");

elseif(in_array("X14", $user['badgesx']) && !in_array("christmas09_2", $user['itemsx'])) { mysql_query("UPDATE usersystem SET badges = '".$user['badges']."XA0,' WHERE username = '".$_SESSION['username']."'"); mysql_query("UPDATE usersystem SET items = '".$user['items']."christmas09_2,' WHERE username = '".$_SESSION['username']."'"); }

elseif(in_array("XA0", $user['badgesx'])) mysql_query("UPDATE usersystem SET badges = '".str_replace("XA0", "XA1", $user['badges'])."' WHERE username = '".$_SESSION['username']."'");
elseif(in_array("XA1", $user['badgesx'])) mysql_query("UPDATE usersystem SET badges = '".str_replace("XA1", "XA2", $user['badges'])."' WHERE username = '".$_SESSION['username']."'");
elseif(in_array("XA2", $user['badgesx'])) mysql_query("UPDATE usersystem SET badges = '".str_replace("XA2", "XA3", $user['badges'])."' WHERE username = '".$_SESSION['username']."'");
elseif(in_array("XA3", $user['badgesx'])) mysql_query("UPDATE usersystem SET badges = '".str_replace("XA3", "XA4", $user['badges'])."' WHERE username = '".$_SESSION['username']."'");
elseif(in_array("XA4", $user['badgesx'])) mysql_query("UPDATE usersystem SET badges = '".str_replace("XA4", "XA5", $user['badges'])."' WHERE username = '".$_SESSION['username']."'");
elseif(in_array("XA5", $user['badgesx'])) mysql_query("UPDATE usersystem SET badges = '".str_replace("XA5", "XA6", $user['badges'])."' WHERE username = '".$_SESSION['username']."'");
elseif(in_array("XA6", $user['badgesx'])) mysql_query("UPDATE usersystem SET badges = '".str_replace("XA6", "XA7", $user['badges'])."' WHERE username = '".$_SESSION['username']."'");
elseif(in_array("XA7", $user['badgesx'])) mysql_query("UPDATE usersystem SET badges = '".str_replace("XA7", "XA8", $user['badges'])."' WHERE username = '".$_SESSION['username']."'");
elseif(in_array("XA8", $user['badgesx'])) mysql_query("UPDATE usersystem SET badges = '".str_replace("XA8", "XA9", $user['badges'])."' WHERE username = '".$_SESSION['username']."'");

if(strftime("%d%m") == 2412) {
$result = mysql_query("SELECT * FROM usersystem WHERE username='".$_SESSION['username']."' AND password='".$_SESSION['password']."'");
$row = mysql_fetch_array($result);

mysql_query("UPDATE usersystem SET badges = '".$row['badges']."XMA,' WHERE username = '".$_SESSION['username']."'");

unset($row);
}

mysql_query("UPDATE usersystem SET lastgift = '".strftime("%d%m")."' WHERE username = '".$_SESSION['username']."'");

echo"Du har f&#229;tt <b>".$holidaypoints."</b> Julepoeng, <b>".$points."</b> poeng,<br/> <b>".$credits."</b> mynter, og et nytt levelskilt!<br/><br/>";
} else {
echo"Du har allerede f&#229;tt gaven for idag.<br/><br/>";
}
}

if($settings['maintenance'] == "yes" && $user['level'] != "4") {
die("<meta http-equiv='refresh' content='0; url=maintenance.php'>"); } 


if($_GET['action'] == "shop") {
pagetop("WuaX Julebutikken 09");
include"includes/subheader.php";
pagemid();


if($_GET['buy'] == "snowcrystal_badge") {
if(in_array("XMS", explode(",", $user['badges']))) {  

} else {
if($user['holidaypoints'] >= "70") {


 $x=$user['holidaypoints'];
 $vari3 = $x-70;

mysql_query("UPDATE usersystem SET holidaypoints = '".$vari3."' WHERE username='".$user['name']."'");

mysql_query("UPDATE usersystem SET badges='".$user['badges']."XMS,' WHERE username='".$user['name']."'");

echo"Du har kj&#248;pt sn&#248;krystall skiltet!<br/><br/>";

}
}
}

elseif($_GET['buy'] == "reindeer_badge") {
if(in_array("REI", explode(",", $user['badges']))) {  

} else {
if($user['holidaypoints'] >= "70") {


 $x=$user['holidaypoints'];
 $vari3 = $x-70;

mysql_query("UPDATE usersystem SET holidaypoints = '".$vari3."' WHERE username='".$user['name']."'");

mysql_query("UPDATE usersystem SET badges='".$user['badges']."REI,' WHERE username='".$user['name']."'");

echo"Du har kj&#248;pt reinsdyr skiltet!<br/><br/>";

}
}
}

elseif($_GET['buy'] == "xmas_bgpattern_starsky") {
if(in_array("xmas_bgpattern_starsky", explode(",", $user['items']))) {  

} else {
if($user['holidaypoints'] >= "60") {


 $x=$user['holidaypoints'];
 $vari3 = $x-60;

mysql_query("UPDATE usersystem SET holidaypoints = '".$vari3."' WHERE username='".$user['name']."'");

mysql_query("UPDATE usersystem SET items='".$user['items']."xmas_bgpattern_starsky,' WHERE username='".$user['name']."'");

echo"Du har kj&#248;pt Julenatt bakgrunnen!<br/><br/>";

}
}
}

elseif($_GET['buy'] == "xmas_bgpattern_gifts") {
if(in_array("xmas_bgpattern_gifts", explode(",", $user['items']))) {  

} else {
if($user['holidaypoints'] >= "60") {


 $x=$user['holidaypoints'];
 $vari3 = $x-60;

mysql_query("UPDATE usersystem SET holidaypoints = '".$vari3."' WHERE username='".$user['name']."'");

mysql_query("UPDATE usersystem SET items='".$user['items']."xmas_bgpattern_gifts,' WHERE username='".$user['name']."'");

echo"Du har kj&#248;pt Julegaver bakgrunnen!<br/><br/>";

}
}
}

echo"Velkommen til Julebutikken!<br/>Her kan du kj&#248;pe juleting til brukeren din.<hr/>";




      if(in_array("XMS", explode(",", $user['badges']))) {  
      echo"<b>Du har allerede kj&#248;pt sn&#248;krystall skiltet</b><br/><br/>";
      } else {
echo"
<b>Sn&#248;krystall skilt</b><br/>
Ved &#229; kj&#248;pe dette f&#229;r du ett sn&#248;krystall skilt.
<br/><img src='uploads/gfx/XMS.gif' alt='XMS'><br/><b>";
if($user['holidaypoints'] >= "70") {
echo"
<a href='christmas?action=shop&buy=snowcrystal_badge'>Kj&#248;p n&#229;! (70 julepoeng)</a>
";
} else {

echo"<span title='du m&#229; ha 70 eller flere julepoeng for &#229; kj&#248;pe sn&#248;krystall skiltet.'>Kj&#248;p n&#229;! (70 julepoeng)</span>";

}
echo"</b><br/><br/>";
}

      if(in_array("REI", explode(",", $user['badges']))) {  
      echo"<b>Du har allerede kj&#248;pt reinsdyr skiltet</b><br/><br/>";
      } else {
echo"
<b>Reinsdyr skilt</b><br/>
Ved &#229; kj&#248;pe dette f&#229;r du ett Reinsdyr skilt.
<br/><img src='http://i34.tinypic.com/2zr438x.gif' alt='REI'><br/><b>";
if($user['holidaypoints'] >= "70") {
echo"
<a href='christmas?action=shop&buy=reindeer_badge'>Kj&#248;p n&#229;! (70 julepoeng)</a>
";
} else {

echo"<span title='du m&#229; ha 70 eller flere julepoeng for &#229; kj&#248;pe reinsdyr skiltet.'>Kj&#248;p n&#229;! (70 julepoeng)</span>";

}
echo"</b><br/><br/>";
}

      if(in_array("xmas_bgpattern_starsky", $user['itemsx'])) {  
      echo"<b>Du har allerede kj&#248;pt julenatt bakgrunnen</b><br/><br/>";
      } else {
echo"
<b>Julenatt bakgrunn</b><br/>
Ved &#229; kj&#248;pe dette f&#229;r du julenatt bakgrunnen.
<br/><img src='images/invisible.gif' style='background-image: url(images/backgrounds/xmas_bgpattern_starsky.gif); width: 160px; height: 100px;' alt='Julenatt'><br/><b>";
if($user['holidaypoints'] >= "60") {
echo"
<a href='christmas?action=shop&buy=xmas_bgpattern_starsky'>Kj&#248;p n&#229;! (60 julepoeng)</a>
";
} else {

echo"<span title='du m&#229; ha 60 eller flere julepoeng for &#229; kj&#248;pe julenatt bakgrunnen.'>Kj&#248;p n&#229;! (60 julepoeng)</span>";

}
echo"</b><br/><br/>";
}

      if(in_array("xmas_bgpattern_gifts", $user['itemsx'])) {  
      echo"<b>Du har allerede kj&#248;pt julegave bakgrunnen</b>";
      } else {
echo"
<b>Julegave bakgrunn</b><br/>
Ved &#229; kj&#248;pe dette f&#229;r du julegaver bakgrunnen.
<br/><img src='images/invisible.gif' style='background-image: url(images/backgrounds/xmas_bgpattern_gifts.gif); width: 160px; height: 100px;' alt='Pakker'><br/><b>";
if($user['holidaypoints'] >= "60") {
echo"
<a href='christmas?action=shop&buy=xmas_bgpattern_gifts'>Kj&#248;p n&#229;! (60 julepoeng)</a>
";
} else {

echo"<span title='du m&#229; ha 60 eller flere julepoeng for &#229; kj&#248;pe julegave bakgrunnen.'>Kj&#248;p n&#229;! (60 julepoeng)</span>";

}
echo"</b>";
}

echo"<br/><br/><img src='uploads/img/3kings.gif' alt='WuaX Julen 09'>";

pagebot($settings['footer']);

} elseif($_GET['action'] == "calendar") {

pagetop("WuaX Adventskalender 09");
include"includes/subheader.php";
pagemid();

if(isset($_POST['send'])) {

if(strftime("%m") == "12" && (strftime("%d%m") != 25 || strftime("%d%m") != 26 || strftime("%d%m") != 27 || strftime("%d%m") != 28 || strftime("%d%m") != 29 || strftime("%d%m") != 30 || strftime("%d%m") != 31)) {

gift(10, 10, 5);

}

else {
echo"Du m&#229; vente til jul med &#229; &#229;pne kalenderen!<br/><br/>";
}

}

echo"Velkommen til Adventskalenderen!<br/>Her vil du hver dag kunne &#229;pne en<br/>ny luke og f&#229; det som er inni den.<br/><table width='150' cellpadding='8' border='0' align='center'><tr><td><img src='uploads/img/rasta_santa.gif'></td><td><form method='post' action='christmas?action=calendar'><input type='hidden' name='send' value='true'>";
echo"<input type='submit' value='&#197;pne dagens luke!' style='width: 200px; height: 70px; border: solid #ccc 2px;' id='button'></form></td></tr></table>";
pagebot($settings['footer']);

} else {

pagetop("WuaX Julesider 09");
include"includes/subheader.php";
pagemid();

echo"Velkommen til Julesidene!<br/> Du har <b>".$user['holidaypoints']."</b> julepoeng.<br/><br/><b><a href='?action=calendar'>Adventskalender &#187;</a></b><br/><br/>
<b><a href='?action=shop'>Julebutikken &#187;</a></b><br/><br/><img src='uploads/img/peis.png' alt='WuaX Julen 09'>";

pagebot($settings['footer']);
}

?>