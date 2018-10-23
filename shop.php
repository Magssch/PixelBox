<?php

include"main.php";

database_con();

if($settings['maintenance'] == "yes" && $user['level'] != "4") {
die("<meta http-equiv='refresh' content='0; url=maintenance.php'>"); }

if(isset($user['name']) && ($user['password'])) {

if($_GET['action'] == "eleb" && !in_array("ese3", $user['itemsx'])) {
mysql_query("UPDATE usersystem SET items = '".$user['items']."ese3,' WHERE username='".$user['name']."'");
die("Du fant p&#229;skeegg nummer 3!");
}

pagetop("".$settings['site_name']." Shoppingsenter");
include"includes/subheader.php";
pagemid();

oB_start();
switch($_GET['action']) {

default:
echo"<div style='text-align: left;'>Dette er shoppingsenteret. Her kan du kj&#248;pe ekstra ting til brukeren din slik som samleobjekter, skilt, profilst&#230;sj og annet for mynter.</div><hr/>
<br/><b><a href='?action=profile'>Profilst&#230;sj &#187; </a></b>
<br/><br/><b><a href='?action=backgrounds'>Bakgrunner &#187; </a></b>
<br/><br/><b><a href='?action=badges'>Skilt &#187; </a></b>"; 
if(in_array("es_2", $user['itemsx']) && !in_array("ese3", $user['itemsx'])) {
echo"

<br/><br/><b><a href='?action=eleb'>Gulr&#248;tter &#187; </a></b>";
}
 echo"
<br/><br/><b><a href='?action=collectables'>Samleobjekter &#187; </a></b>";
/*
if(in_array("deluxe_shop_card", $user['itemsx'])) {
echo"
<br/><br/><b><a href='?action=deluxe'>Deluxebutikk &#187; </a></b>
";}
*/
echo"<br/><br/><img src='images/offers.gif' alt='Varer'>";

if($settings['campaign_active'] > 0) {
echo "<br/><br/><b style='font-size: 14px;'>Kampanje</b><br/><hr/><div style='float: left; text-align: left;'>".nl2br($settings['campaign_exp'])."</div><br/><br/>";
}
break;

case("collectables");
if(isset($_GET['buy']) && is_numeric($_GET['buy'])) {

$find = mysql_query("SELECT * FROM furni WHERE id = '".$_GET['buy']."' AND inshop = 'yes'");
if(mysql_num_rows($find) > 0) {

while($row = mysql_fetch_array($find))
  {
  $image = $row['image'];
  $code = $row['code'];
  $title = $row['title'];
  $mimage = $row['mimage'];
  $inshop = $row['inshop'];
  $cost = $row['cost'];
  $campaign_cost = $row['campaign_cost'];
  }
  
if(in_array($code, explode(",", $user['furni']))) { 
echo"Du har allerede kj&#248;pt <b>".$code."</b>!<br/><br/>";
} else { 
if($settings['campaign_active'] > 0 && $campaign_cost > 0) {
if($user['credits'] >= $campaign_cost) {


 $x=$user['credits'];
 $vari3 = $x-$campaign_cost;

mysql_query("UPDATE usersystem SET credits = '".$vari3."' WHERE username='".$user['name']."'");

mysql_query("UPDATE usersystem SET furni = '".$user['furni']."".$code.",' WHERE username='".$user['name']."'");

$x=$row['points'];
$vari = $x+3;

mysql_query("UPDATE usersystem SET points = '".$vari."'
WHERE username = '".$row['username']."'");


echo"Du har kj&#248;pt <b>".$code."</b>!<br/><br/>";
} else {
echo"Du har ikke nok mynter til &#229; kj&#248;pe <b>".$code."</b>.<br/><br/>";
}
} else {
if($user['credits'] >= $cost) {


 $x=$user['credits'];
 $vari3 = $x-$cost;

mysql_query("UPDATE usersystem SET credits = '".$vari3."' WHERE username='".$user['name']."'");

mysql_query("UPDATE usersystem SET furni = '".$user['furni']."".$code.",' WHERE username='".$user['name']."'");


echo"Du har kj&#248;pt <b>".$code."</b>!<br/><br/>";
} else {
echo"Du har ikke nok mynter til &#229; kj&#248;pe <b>".$code."</b>.<br/><br/>";
}

}
}
}
}

echo"<b style='font-size: 14px;'>Samleobjekter</b>
<br/>Her kan du kj&#248;pe samleobjekter som vil bli plassert p&#229; ditt samlerom.<br/>Klikk p&#229; et samleobjekt for &#229; kj&#248;pe det.<hr/>";

$result = mysql_query("SELECT * FROM furni WHERE inshop = 'yes' ORDER BY id DESC");
while($row = mysql_fetch_array($result))
  {
  if(empty($row['mimage'])) {

$ani = "";

} else { $ani = "<b>Trykkf&#248;lsom</b><br/>"; }
if(!in_array($row['code'], explode(",", $user['furni']))) {  
if($settings['campaign_active'] > 0 && $row['campaign_cost'] > 0) {
echo "<a href='?action=collectables&buy=".$row['id']."' onclick='return confirm(\"Er du sikker?\");'><img src='".$row['image']."' border='0' alt='".$row['code']."' style='vertical-align:middle; margin: 6px;' 
onMouseover=\"ddrivetip('<b>".$row['code']."</b><br/>".$row['title']."<br/>".$ani."<b style=\'color:#FF0000;\'>Kampanjepris:</b> ".$row['campaign_cost']."<img src=\'themes/".THEME."/buttons/money.gif\' alt=\'mynt.\' style=\'vertical-align:-2px; padding-left:3px;\'><br/><span style=\'font-size:9px;\'>Normalpris: ".$row['cost'].",-</span>','white')\";
onMouseout=\"hideddrivetip()\"/ border='0'></a>";
} else {

echo "<a href='?action=collectables&buy=".$row['id']."' onclick='return confirm(\"Er du sikker?\");'><img src='".$row['image']."' border='0' alt='".$row['code']."' style='vertical-align:middle; margin: 6px;' 
onMouseover=\"ddrivetip('<b>".$row['code']."</b><br/>".$row['title']."<br/>".$ani."<b>Pris:</b> ".$row['cost']."<img src=\'themes/".THEME."/buttons/money.gif\' alt=\'mynt.\' style=\'vertical-align:-2px; padding-left:3px;\'>','white')\";
onMouseout=\"hideddrivetip()\"/ border='0'></a>";
}
} else { 
echo "<img src='".$row['image']."' border='0' alt='".$row['code']."' style='vertical-align:middle; margin: 6px;' 
onMouseover=\"ddrivetip('<b>".$row['code']."</b><br/>".$row['title']."<br/>".$ani."<b>Du har allerede kj&#248;pt dette samleobjektet.</b>','white')\";
onMouseout=\"hideddrivetip()\"/ border='0'>";
 }

  }
  echo"<br/><hr/><img src='images/truck.gif'><img src='http://www.habbo.no/habbo-imaging/avatarimage?user=".$settings['third_bot_habbo']."&action=wav&direction=4&head_direction=5&gesture=srp&size=s' style='vertical-align:top; margin-left:-18px;'>";
  
break;


case("badges");
if(isset($_GET['buy']) && is_numeric($_GET['buy'])) {

$find = mysql_query("SELECT * FROM badges WHERE id = '".$_GET['buy']."' AND inshop = 'yes'");
if(mysql_num_rows($find) > 0) {

$row = mysql_fetch_array($find);

  
if(in_array($row['code'], explode(",", $user['badges']))) { 
echo"Du har allerede kj&#248;pt dette skiltet!<br/><br/>";
} else { 
if($settings['campaign_active'] > 0 && $row['campaign_cost'] > 0) {
if($user['credits'] >= $row['campaign_cost']) {


 $x=$user['credits'];
 $vari3 = $x-$row['campaign_cost'];

mysql_query("UPDATE usersystem SET credits = '".$vari3."' WHERE username='".$user['name']."'");

mysql_query("UPDATE usersystem SET badges = '".$user['badges']."".$row['code'].",' WHERE username='".$user['name']."'");

$x=$row['points'];
$vari = $x+5;

mysql_query("UPDATE usersystem SET points = '".$vari."'
WHERE username = '".$row['username']."'");


echo"Du har kj&#248;pt et skilt!<br/><br/>";
} else {

echo"Du har ikke nok mynter til &#229; kj&#248;pe dette skiltet.<br/><br/>";
}
} else {
if($user['credits'] >= $row['cost']) {


 $x=$user['credits'];
 $vari3 = $x-$row['cost'];

mysql_query("UPDATE usersystem SET credits = '".$vari3."' WHERE username='".$user['name']."'");

mysql_query("UPDATE usersystem SET badges = '".$user['badges']."".$row['code'].",' WHERE username='".$user['name']."'");


echo"Du har kj&#248;pt et skilt!<br/><br/>";
} else {

echo"Du har ikke nok mynter til &#229; kj&#248;pe dette skiltet.<br/><br/>";
}

}
}
}
}

echo"<b style='font-size: 14px;'>Skilt</b><br/>Her kan du kj&#248;pe skilt som du kan bruke p&#229; siden.<hr/><table cellpadding='0' cellspacing='0' style='text-align:left;' width='100%'>";
 /*
    style='background-color: #".$color.";'

    if(!isset($color)) {
$color = "D9D9D9";
} else {
if($color == "D9D9D9") {
$color = "none";
} else {
$color = "D9D9D9";
}
}
 style='border-bottom: solid #D9D9D9 2px;'
  */
$result = mysql_query("SELECT * FROM badges WHERE inshop = 'yes'  ORDER BY id DESC");
$o=mysql_num_rows($result);
$i=1;
while($row = mysql_fetch_array($result))
  {


if(!in_array($row['code'], explode(",", $user['badges']))) {
if($settings['campaign_active'] > 0 && $row['campaign_cost'] > 0) {  
echo "<tr><td id='td' width='53' style='text-align:center; "; if($o != ($i)) {echo"padding-bottom:8px;";} echo"'><img src='".$row['image']."' alt='".$row['code']."'></td><td id='td' width='370' style='"; if($o != ($i)) {echo"padding-bottom:8px;";} echo"'>".$row['title']."<br/>
<b style='color:#FF0000;'>Kampanjepris:</b> ".$row['campaign_cost']."<img src='themes/".THEME."/buttons/money.gif' alt='mynt' style='vertical-align:-2px; padding-left:3px;'><br/><span style='font-size:9px;'>Normalpris: ".$row['cost'].",-</span><br/><b><a href='?action=badges&buy=".$row['id']."' onclick='return confirm(\"Er du sikker?\");'>Kj&#248;p!</a></b></td>
</tr>\n";
} else {

echo "<tr><td id='td' width='53' style='text-align:center; "; if($o != ($i)) {echo"padding-bottom:5px;";} echo"'><img src='".$row['image']."' alt='".$row['code']."'></td><td id='td' width='370' style='"; if($o != ($i)) {echo"padding-bottom:5px;";} echo"'>".$row['title']."<br/>
<b>Pris:</b> ".$row['cost']."<img src='themes/".THEME."/buttons/money.gif' alt='mynt' style='vertical-align:-2px; padding-left:3px;'><br/><b><a href='?action=badges&buy=".$row['id']."' onclick='return confirm(\"Er du sikker?\");'>Kj&#248;p!</a></b></td>
</tr>\n";
}
}
$i++;
}
echo"</table>";
  echo"";
  
break;




case("backgrounds");
if(isset($_GET['buy']) && is_numeric($_GET['buy'])) {

$find = mysql_query("SELECT * FROM backgrounds WHERE id = '".$_GET['buy']."' AND inshop = '1'");
if(mysql_num_rows($find) > 0) {

$row = mysql_fetch_array($find);

  
if(in_array($row['code'], explode(",", $user['items']))) { 
echo"Du har allerede kj&#248;pt denne bakgrunnen!<br/><br/>";
} else { 
if($settings['campaign_active'] > 0 && $row['campaign_cost'] > 0) {
if($user['credits'] >= $row['campaign_cost']) {


 $x=$user['credits'];
 $vari3 = $x-$row['campaign_cost'];

mysql_query("UPDATE usersystem SET credits = '".$vari3."' WHERE username='".$user['name']."'");

mysql_query("UPDATE usersystem SET items = '".$user['items']."".$row['code'].",' WHERE username='".$user['name']."'");

$x=$row['points'];
$vari = $x+5;

mysql_query("UPDATE usersystem SET points = '".$vari."'
WHERE username = '".$row['username']."'");


echo"Du har kj&#248;pt <b>".$row['name']."</b>!<br/><br/>";
} else {

echo"Du har ikke nok mynter til &#229; kj&#248;pe <b>".$row['name']."</b>.<br/><br/>";
}
} else {
if($user['credits'] >= $row['cost']) {


 $x=$user['credits'];
 $vari3 = $x-$row['cost'];

mysql_query("UPDATE usersystem SET credits = '".$vari3."' WHERE username='".$user['name']."'");

mysql_query("UPDATE usersystem SET items = '".$user['items']."".$row['code'].",' WHERE username='".$user['name']."'");


echo"Du har kj&#248;pt <b>".$row['name']."</b>!<br/><br/>";
} else {

echo"Du har ikke nok mynter til &#229; kj&#248;pe <b>".$row['name']."</b>.<br/><br/>";
}

}
}
}
}

echo"<b style='font-size: 14px;'>Bakgrunner</b><br/>Her kan du kj&#248;pe bakgrunner som du kan ha p&#229; din profil.<hr/><table cellpadding='0' cellspacing='0' style='text-align:left;' width='100%'>";
 /*style='background-color: #".$color.";'
   
    if(!isset($color)) {
$color = "D9D9D9";
} else {
if($color == "D9D9D9") {
$color = "none";
} else {
$color = "D9D9D9";
}
}
 style='border-bottom: solid #D9D9D9 2px;'
  */
$result = mysql_query("SELECT * FROM backgrounds WHERE inshop = '1'  ORDER BY id DESC");
$o=mysql_num_rows($result);
$i=1;
while($row = mysql_fetch_array($result))
  {


if(!in_array($row['code'], explode(",", $user['items']))) {
if($settings['campaign_active'] > 0 && $row['campaign_cost'] > 0) {  
echo "<tr><td id='td' style='"; if($o != ($i)) {echo"padding-bottom:7px;";} echo"' width='20'><img src='images/invisible.gif' style='background-image: url(images/backgrounds/".$row['code'].".gif); width: 70px; height: 50px; border: solid #000 1px;' alt='".$row['name']."'>
</td><td id='td' width='370' style='vertical-align:top;"; if($o != ($i)) {echo"padding-bottom:7px;";} echo"'><b>Navn:</b> ".$row['name']."<br/>
<b style='color:#FF0000;'>Kampanjepris:</b> ".$row['campaign_cost']."<img src='themes/".THEME."/buttons/money.gif' alt='mynt' style='vertical-align:-2px; padding-left:3px;'><br/><span style='font-size:9px;'>Normalpris: ".$row['cost'].",-</span><br/><b><a href='?action=backgrounds&buy=".$row['id']."' onclick='return confirm(\"Er du sikker?\");'>Kj&#248;p!</a></b></td>
</tr>\n";
} else {

echo "<tr><td id='td' style='"; if($o != ($i)) {echo"padding-bottom:4px;";} echo"' width='20'><img src='images/invisible.gif' style='background-image: url(images/backgrounds/".$row['code'].".gif); width: 70px; height: 50px; border: solid #000 1px;' alt='".$row['name']."'>
</td><td id='td' width='370' style='vertical-align:top;"; if($o != ($i)) {echo"padding-bottom:4px;";} echo"'><b>Navn:</b> ".$row['name']."<br/>
<b>Pris:</b> ".$row['cost']."<img src='themes/".THEME."/buttons/money.gif' alt='mynt' style='vertical-align:-2px; padding-left:3px;'><br/><b><a href='?action=backgrounds&buy=".$row['id']."' onclick='return confirm(\"Er du sikker?\");'>Kj&#248;p!</a></b></td>
</tr>\n";
}
}
$i++;
}
  echo"</table>";
  
break;


case("profile");

if($_GET['buy'] == "vip") {
$cost=500;
if($user['level'] < "3") {
if($user['credits'] >= $cost) {


 $x=$user['credits'];
 $vari3 = $x-$cost;

mysql_query("UPDATE usersystem SET credits = '".$vari3."' WHERE username='".$user['name']."'");

mysql_query("UPDATE usersystem SET userlevel='3' WHERE username='".$user['name']."'");


echo"Du har blitt en VIP!<br/><br/>";
}
}
}

elseif($_GET['buy'] == "avatar_pack_one") {
$cost=100;
if(in_array("avatar_pack_one", explode(",", $user['items']))) {  

} else {
if($user['credits'] >= $cost) {


 $x=$user['credits'];
 $vari3 = $x-$cost;

mysql_query("UPDATE usersystem SET credits = '".$vari3."' WHERE username='".$user['name']."'");

mysql_query("UPDATE usersystem SET items = '".$user['items']."avatar_pack_one,' WHERE username='".$user['name']."'");


echo"Du har kj&#248;pt avatar pakke 1!<br/><br/>";

}
}
}


elseif($_GET['buy'] == "avatar_pack_two") {
$cost=100;
if(in_array("avatar_pack_two", explode(",", $user['items']))) {  

} else {
if($user['credits'] >= $cost) {


 $x=$user['credits'];
 $vari3 = $x-$cost;

mysql_query("UPDATE usersystem SET credits = '".$vari3."' WHERE username='".$user['name']."'");

mysql_query("UPDATE usersystem SET items='".$user['items']."avatar_pack_two,' WHERE username='".$user['name']."'");


echo"Du har kj&#248;pt avatar pakke 2!<br/><br/>";

}
}
}


elseif($_GET['buy'] == "avatar_pack_three") {
$cost=90;
if(in_array("avatar_pack_three", explode(",", $user['items']))) {  

} else {
if($user['credits'] >= $cost) {


 $x=$user['credits'];
 $vari3 = $x-$cost;

mysql_query("UPDATE usersystem SET credits = '".$vari3."' WHERE username='".$user['name']."'");

mysql_query("UPDATE usersystem SET items='".$user['items']."avatar_pack_three,' WHERE username='".$user['name']."'");


echo"Du har kj&#248;pt avatar pakke 2!<br/><br/>";

}
}
}


elseif($_GET['buy'] == "guestbook") {
$cost=200;
if(in_array("guestbook", explode(",", $user['items']))) {  

} else {
if($user['credits'] >= $cost) {


 $x=$user['credits'];
 $vari3 = $x-$cost;
mysql_query("UPDATE usersystem SET credits = '".$vari3."' WHERE username='".$user['name']."'");

mysql_query("UPDATE usersystem SET items='".$user['items']."guestbook,' WHERE username='".$user['name']."'");

echo"Du har kj&#248;pt Gjesteboken!<br/><br/>";

}
}
}



elseif($_GET['buy'] == "pr_visi") {
$cost=85;
if(in_array("pr_visi", explode(",", $user['items']))) {  

} else {
if($user['credits'] >= $cost) {


 $x=$user['credits'];
 $vari3 = $x-$cost;
mysql_query("UPDATE usersystem SET credits = '".$vari3."' WHERE username='".$user['name']."'");

mysql_query("UPDATE usersystem SET items='".$user['items']."pr_visi,' WHERE username='".$user['name']."'");

echo"Du har kj&#248;pt Profilbes&#248;k!<br/><br/>";

}
}
}

elseif($_GET['buy'] == "avatar_bg_blue") {
$cost=90;
if(in_array("avatar_bg_blue", explode(",", $user['items']))) {  

} else {
if($user['credits'] >= $cost) {


 $x=$user['credits'];
 $vari3 = $x-$cost;
mysql_query("UPDATE usersystem SET credits = '".$vari3."' WHERE username='".$user['name']."'");

mysql_query("UPDATE usersystem SET items='".$user['items']."avatar_bg_blue,' WHERE username='".$user['name']."'");

echo"Du har kj&#248;pt Bl&#229; avatar bakgrunn!<br/><br/>";

}
}
}

elseif($_GET['buy'] == "avatar_bg_red") {
$cost=90;
if(in_array("avatar_bg_red", explode(",", $user['items']))) {  

} else {
if($user['credits'] >= $cost) {


 $x=$user['credits'];
 $vari3 = $x-$cost;
mysql_query("UPDATE usersystem SET credits = '".$vari3."' WHERE username='".$user['name']."'");

mysql_query("UPDATE usersystem SET items='".$user['items']."avatar_bg_red,' WHERE username='".$user['name']."'");

echo"Du har kj&#248;pt R&#248;d avatar bakgrunn!<br/><br/>";

}
}
}


elseif($_GET['buy'] == "avatar_bg_green") {
$cost=90;
if(in_array("avatar_bg_green", explode(",", $user['items']))) {  

} else {
if($user['credits'] >= $cost) {


 $x=$user['credits'];
 $vari3 = $x-$cost;
mysql_query("UPDATE usersystem SET credits = '".$vari3."' WHERE username='".$user['name']."'");

mysql_query("UPDATE usersystem SET items='".$user['items']."avatar_bg_green,' WHERE username='".$user['name']."'");

echo"Du har kj&#248;pt Gr&#248;nn avatar bakgrunn!<br/><br/>";

}
}
}



echo"<b style='font-size: 14px;'>Profilst&#230;sj</b><br/>Her kan du kj&#248;pe ekstra st&#230;sj til profilen din.<hr/>";
if($user['level'] < "3") {
$cost=500;
echo"
<b>VIP medlemskap</b><br/>

Bli en VIP og f&#229; goder, som blant annet<br/>spesielle grimaser og handlinger til avataren<br/> din, eksklusive bakgrunner til profilen og avataren din,<br/> bl&#229;tt navn diverse steder og ett VIP skilt!
<br/><img src='uploads/gfx/VIP.gif' alt='VIP'><br/><b>";
if($user['credits'] >= $cost) {
echo"
<a href='shop.php?action=profile&buy=vip'>Kj&#248;p n&#229;! ($cost mynt)</a>
";
} else {

echo"<span title='du m&#229; ha $cost eller flere mynter for &#229; kj&#248;pe VIP.'>Kj&#248;p n&#229;! ($cost mynt)</span>";

}
echo"</b>";

} else {
      echo"<b>Du har allerede kj&#248;pt VIP.</b>";
}

echo"<br/><hr/>";
        
      if(in_array("avatar_pack_one", explode(",", $user['items']))) {  
      echo"<b>Du har allerede kj&#248;pt Avatar pakke 1.</b>";
      } else {
      $cost=100;
echo"
<b>Avatar pakke 1</b><br/>
Ved &#229; kj&#248;pe dette, f&#229;r du disse handlingene: Japansk te,<br/> Gr&#248;nn brus og R&#248;d brus + grimasen &quot;trist&quot; til avataren p&#229; profilen din.
<br/><b>";
if($user['credits'] >= $cost) {
echo"
<a href='shop.php?action=profile&buy=avatar_pack_one'>Kj&#248;p n&#229;! ($cost mynt)</a>
";
} else {

echo"<span title='du m&#229; ha $cost eller flere mynter for &#229; kj&#248;pe Avatar pakke 1.'>Kj&#248;p n&#229;! ($cost mynt)</span>";

}
echo"</b>";
}

echo"<br/><hr/>";

      if(in_array("avatar_pack_two", explode(",", $user['items']))) {  
      echo"<b>Du har allerede kj&#248;pt Avatar pakke 2.</b>";
      } else {
      $cost=100;
echo"
<b>Avatar pakke 2</b><br/>
Ved &#229; kj&#248;pe dette, f&#229;r du disse handlingene: Gulrot,<br/> HabboCola og Kaffe + grimasen &quot;sint&quot; til avataren p&#229; profilen din.
<br/><b>";
if($user['credits'] >= $cost) {
echo"
<a href='shop.php?action=profile&buy=avatar_pack_two'>Kj&#248;p n&#229;! ($cost mynt)</a>
";
} else {

echo"<span title='du m&#229; ha $cost eller flere mynter for &#229; kj&#248;pe Avatar pakke 2.'>Kj&#248;p n&#229;! ($cost mynt)</span>";

}
echo"</b>";
}
echo"<br/><hr/>";

      if(in_array("avatar_pack_three", explode(",", $user['items']))) {  
      echo"<b>Du har allerede kj&#248;pt Avatar pakke 3.</b>";
      } else {
      $cost=90;
echo"
<b>Avatar pakke 3</b><br/>
Ved &#229; kj&#248;pe dette, f&#229;r du handlingene &quot;Pogo-mogo&quot; og &quot;Hoverboard&quot;<br/> + grimasen &quot;lukkede &#248;yne&quot; til avataren p&#229; profilen din.
<br/><b>";
if($user['credits'] >= $cost) {
echo"
<a href='shop.php?action=profile&buy=avatar_pack_three'>Kj&#248;p n&#229;! ($cost mynt)</a>
";
} else {

echo"<span title='du m&#229; ha $cost eller flere mynter for &#229; kj&#248;pe Avatar pakke 3.'>Kj&#248;p n&#229;! ($cost mynt)</span>";

}
echo"</b>";
}

echo"<br/><hr/>";

      if(in_array("avatar_bg_blue", explode(",", $user['items']))) {  
      echo"<b>Du har allerede kj&#248;pt Bl&#229; avatar bakgrunn.</b>";
      } else {
      $cost=90;
echo"
<b>Bl&#229; avatar bakgrunn</b><br/><img src='images/avatar_bg_blue.gif'><br/>
En bl&#229; bakgrunn til avataren din med gylden ramme!
<br/><b>";
if($user['credits'] >= $cost) {
echo"
<a href='shop.php?action=profile&buy=avatar_bg_blue'>Kj&#248;p n&#229;! ($cost mynt)</a>
";
} else {

echo"<span title='du m&#229; ha $cost eller flere mynter for &#229; kj&#248;pe Bl&#229; avatar bakgrunn.'>Kj&#248;p n&#229;! ($cost mynt)</span>";

}
echo"</b>";
}

echo"<br/><hr/>";

      if(in_array("avatar_bg_red", explode(",", $user['items']))) {  
      echo"<b>Du har allerede kj&#248;pt R&#248;d avatar bakgrunn.</b>";
      } else {
      $cost=90;
echo"
<b>R&#248;d avatar bakgrunn</b><br/><img src='images/avatar_bg_red.gif'><br/>
En r&#248;d bakgrunn til avataren din med gylden ramme!
<br/><b>";
if($user['credits'] >= $cost) {
echo"
<a href='shop.php?action=profile&buy=avatar_bg_red'>Kj&#248;p n&#229;! ($cost mynt)</a>
";
} else {

echo"<span title='du m&#229; ha $cost eller flere mynter for &#229; kj&#248;pe R&#248;d avatar bakgrunn.'>Kj&#248;p n&#229;! ($cost mynt)</span>";

}
echo"</b>";
}

echo"<br/><hr/>";

      if(in_array("avatar_bg_green", explode(",", $user['items']))) {  
      echo"<b>Du har allerede kj&#248;pt Gr&#248;nn avatar bakgrunn.</b>";
      } else {
      $cost=90;
echo"
<b>Gr&#248;nn avatar bakgrunn</b><br/><img src='images/avatar_bg_green.gif'><br/>
En gr&#248;nn bakgrunn til avataren din med gylden ramme!
<br/><b>";
if($user['credits'] >= $cost) {
echo"
<a href='shop.php?action=profile&buy=avatar_bg_green'>Kj&#248;p n&#229;! ($cost mynt)</a>
";
} else {

echo"<span title='du m&#229; ha $cost eller flere mynter for &#229; kj&#248;pe Gr&#248;nn avatar bakgrunn.'>Kj&#248;p n&#229;! ($cost mynt)</span>";

}
echo"</b>";
}

echo"<br/><hr/>";


      if(in_array("pr_visi", explode(",", $user['items']))) {  
      echo"<b>Du har allerede kj&#248;pt Profilbes&#248;k.</b>";
      } else {
      $cost=85;
echo"
<b>Profilbes&#248;k</b><br/>
Viser hvor mange brukere som har bes&#248;kt din profil.
<br/><b>";
if($user['credits'] >= $cost) {
echo"
<a href='shop.php?action=profile&buy=pr_visi'>Kj&#248;p n&#229;! ($cost mynt)</a>
";
} else {

echo"<span title='du m&#229; ha $cost eller flere mynter for &#229; kj&#248;pe Profilbes&#248;k.'>Kj&#248;p n&#229;! ($cost mynt)</span>";

}
echo"</b>";
}

echo"<br/><hr/>";

      if(in_array("guestbook", explode(",", $user['items']))) {  
      echo"<b>Du har allerede kj&#248;pt gjesteboken.</b>";
      } else {
      $cost=200;
echo"
<b>Gjestebok</b><br/>
Ved &#229; kj&#248;pe dette f&#229;r du en gjestebok p&#229; profilen din.
<br/><b>";
if($user['credits'] >= $cost) {
echo"
<a href='shop.php?action=profile&buy=guestbook'>Kj&#248;p n&#229;! ($cost mynt)</a>
";
} else {

echo"<span title='du m&#229; ha $cost eller flere mynter for &#229; kj&#248;pe Monster skiltet.'>Kj&#248;p n&#229;! ($cost mynt)</span>";

}
echo"</b>";
}

break;


}

pagebot($settings['footer']);

} else {

echo"<meta http-equiv='refresh' content='0; url=index.php'>";

}

?>