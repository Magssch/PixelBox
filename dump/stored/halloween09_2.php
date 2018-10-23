<?php
/*
Halloween historien for 2009: BotaX har p&#229; grunn av en programmeringsfeil tatt over WuBot - Brukerene
m&#229; hjelpe til &#229; fjerne BotaX og bringe tilbake WuBot ved &#229; skrive inn modulkoder som er gjemt p&#229; siden.
*/
include"main.php";
database_con();
if(!isset($user['name'])) { die("<meta http-equiv='refresh' content='0; url=index.php'>"); }

if($user['halloween'] == "modules") { die("<meta http-equiv='refresh' content='0; url=index.php'>"); }

if($settings['maintenance'] == "yes" && $user['level'] != "4") {
die("<meta http-equiv='refresh' content='0; url=maintenance.php'>"); } 

pagetop("Halloween - BotaX's moduler");
include"includes/subheader.php";
pagemid();
echo"<form method='post'>";
if(isset($_POST['module1'])) {
if(strtolower($_POST['module1']) == "module.swap(happy)" && strtolower($_POST['module2']) == "module.swap(angry)" && strtolower($_POST['module3']) == "module.swap(sad)"
 && strtolower($_POST['module4']) == "module.swap(calm)") {
 echo"<b>WuBot:</b> Takk for at du fikk meg tilbake!<br/>Derfor vil jeg gjerne gi deg Halloween skilt nr.2<br/>
 og 120 poeng!<br/><img src='tools/head/head.php?habbo=-mackie-'><br/><br/>";
 $x=$user['points'];
 $vari=$x+120;
 mysql_query("UPDATE usersystem SET points='".$vari."' WHERE username='".$user['name']."'"); 
 mysql_query("UPDATE usersystem SET badges='".$user['badges']."THW,' WHERE username='".$user['name']."'");
 mysql_query("UPDATE usersystem SET halloween='modules' WHERE username='".$user['name']."'");
 } else {
 echo"<b>BotaX:</b> Mohahaha du kan ikke fjerne meg!<br/><br/>";
 }
}
echo"Under her skal du skrive koden for hver enkelt modul.<br/>N&#229;r du har skrevet inn riktig kode p&#229; alle feltene<br/>sammtidig, da vil forh&#229;pentligvis BotaX forsvinne...<br/><br/>";
if(strtolower($_POST['module1']) == "module.swap(happy)") {
$module1="<span style='color:green;'>WuBot</span>";
} else {
$module1="<span style='color:red;'>BotaX</span>";
}
echo"Modul 1 = <b>".$module1."</b>";
echo"<br/><input type='text' id='textinput' value='".$_POST['module1']."' style='width: 250px;' name='module1'><br/><br/>";

if($_POST['module2'] == "module.swap(angry)") {
$module2="<span style='color:green;'>WuBot</span>";
} else {
$module2="<span style='color:red;'>BotaX</span>";
}
echo"Modul 2 = <b>".$module2."</b>";
echo"<br/><input type='text' id='textinput' value='".$_POST['module2']."' style='width: 250px;' name='module2'><br/><br/>";

if($_POST['module3'] == "module.swap(sad)") {
$module3="<span style='color:green;'>WuBot</span>";
} else {
$module3="<span style='color:red;'>BotaX</span>";
}
echo"Modul 3 = <b>".$module3."</b>";
echo"<br/><input type='text' id='textinput' value='".$_POST['module3']."' style='width: 250px;' name='module3'><br/><br/>";

if($_POST['module4'] == "module.swap(calm)") {
$module4="<span style='color:green;'>WuBot</span>";
} else {
$module4="<span style='color:red;'>BotaX</span>";
}
echo"Modul 4 = <b>".$module4."</b>";
echo"<br/><input type='text' id='textinput' value='".$_POST['module4']."' style='width: 250px;' name='module4'><br/><br/>";


echo"<input type='submit' value='Forandre moduler' id='button'></form>";

pagebot($settings['footer']);
?>