<?php

define("REGISTER", TRUE);

include"main.php";

database_con();


if($settings['maintenance'] == "yes" && $user['level'] != "4") {
die("<meta http-equiv='refresh' content='0; url=maintenance.php'>"); }


if (isset($user['name'])) {

echo" <meta http-equiv='refresh' content='0; url=index.php'>";

} else {

$result = mysql_query("SELECT * FROM usersystem WHERE register_ip='".$_SERVER['REMOTE_ADDR']."' LIMIT 2");
while($row = mysql_fetch_array($result))
  {
  $ip = $row['register_ip'];
  }
  
pagetop("".$settings['site_name']." registrering");

include"includes/subheader.php";
pagemid();

$result = mysql_query("SELECT * FROM usersystem WHERE register_ip='".$_SERVER['REMOTE_ADDR']."' LIMIT 2");
if(mysql_num_rows($result) > 2) {

echo"Du kan ikke lage mer enn 2 brukere.";
 } else {

if(isset($_POST['username']) && !empty($_POST['password']) && !empty($_POST['repeat_password']) && !empty($_POST['email'])) {

/*
if(isset($_POST['invitation'])) {


$result = mysql_query("SELECT * FROM vouchers WHERE code='".$_POST['invitation']."'");

if(mysql_num_rows($result) > 0) {

mysql_query("DELETE FROM vouchers WHERE code='".$_POST['invitation']."'");

} else {
die("Beta-invitasjons koden fins ikke!<meta http-equiv='refresh' content='2; url=register.php'>");
}

}
*/

if(preg_match("/^[-0-9A-Z_@:=?!-.,\s]{3,15}$/i", $_POST['username']) && is_censor_valid($_POST['username'])) {

if($_POST['accept'] == "yes") {

if ($_POST['password'] == $_POST['repeat_password']) {

$result = mysql_query("SELECT * FROM usersystem WHERE habboname='".mysql_real_escape_string($_POST['habboname'])."'");

if(mysql_num_rows($result) <= 0) {

$result = mysql_query("SELECT * FROM usersystem WHERE email='".mysql_real_escape_string($_POST['email'])."'");

if(mysql_num_rows($result) <= 0) {



// mysql code start

$result = mysql_query("SELECT * FROM usersystem WHERE username='".removespace(mysql_real_escape_string(striphtmltags($_POST['username'])))."'");

// mysql code end
 
 if(mysql_num_rows($result) > 0) {
 
 echo"Brukernavnet finnes allerede<meta http-equiv='refresh' content='1; url=register.php'>";
 
 } else {
 
 $x=$settings['latestid'];
 $vari = $x+1;


mysql_query("UPDATE latestids SET latestid='".$vari."'");

$username = removespace(striphtmltags($_POST['username']));
$habboname = striphtml($_POST['habboname']);

$sql="INSERT INTO usersystem (id, ip, username, password, email, habboname, freetext, userlevel, register_date, smileys, register_ip, verified_habbo) VALUES 
('".$vari."','".$_SERVER['REMOTE_ADDR']."','".$username."','".sumohash(md5($_POST['password']))."','".$_POST['email']."','".$habboname."','','2','".strftime("%d.%m.%Y - %H:%M")."','on','".$_SERVER['REMOTE_ADDR']."','no')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }


  if(isset($_POST['refferId']) && is_numeric($_POST['refferId'])) {
  
 $result = mysql_query("SELECT * FROM usersystem WHERE id='".mysql_real_escape_string($_POST['refferId'])."' LIMIT 1");

 if(mysql_num_rows($result) != 0) {

while($row = mysql_fetch_array($result))
  {


if($row['ip'] != $_SERVER['REMOTE_ADDR']) {


$x=$row['points'];
$vari = $x+50;

mysql_query("UPDATE usersystem SET reffered='".$row['reffered']."".$username.",' WHERE id='".$row['id']."'");

$sql="UPDATE usersystem SET points = '".$vari."'
WHERE id = '".$_POST['refferId']."'";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }  
 } 
  }
  }
  }

 $x5=$settings['latestpostid'];
 $vari5 = $x5+1;


 mysql_query("UPDATE latestids SET latestpostid='".$vari5."'");
if($ch == 1) {
$t="Velkommen til v&#229;r nye bruker - <b>".$username."</b>!";
} else {
$t="Hey, &#248;nsk velkommen til en ny bruker - <b>".$username."</b>!";
}
$sql="INSERT INTO guestbook (id, name, message, date) VALUES 
('".$vari5."','".$chbot."','".$t."','".strftime("%d.%m.%Y - %H:%M")."')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
 
 
echo"<img src='images/frank_06.gif'><br/>Brukeren ble lagt til! Du kan n&#229; logge inn.<br/><br/>Brukernavnet ditt kan ha blitt endret grunnet restriksjoner<br/> s&#229; dette er brukernavnet som ble registrert: <b>".$username."</b>";

$registered = true;

}
} else {

echo"Epostadressen er allerede i bruk.<br/><br/>";

}

} else {

echo"Habbonavnet er allerede i bruk.<br/><br/>";

}

} else {

echo"Passordene stemmer ikke.<br/><br/>";

}

} else {

echo"Du m&#229; akseptere brukerbetingelsene.<br/><br/>";

}


} else {

echo"Ugyldig brukernavn.<br/><br/>";

}
}

if(!isset($registered)) {
echo"<form method='post' name='register_form'>";
/* <span style=' color: red; '>*</span><b>Beta-invitasjonskode:</b> <br/><input type='text' id='textinput' name='invitation' maxlength='15'><br/><br/> */

  if(isset($_GET['refferId'])) {
echo"<input type='hidden' name='refferId' value='".$_GET['refferId']."'>";
}

echo"
<span style=' color: red; '>*</span><b>Brukernavn:</b> <br/><input type='text' value='".$_POST['username']."' id='textinput' name='username' maxlength='15'><br/>Mellomrom og html tags vil automatisk bli fjernet fra brukernavnet.<br/>
Brukernavnet kan inneholde 3 - 15 tegn.<br/><br/>
<span style=' color: red; '>*</span><b>Passord:</b> <br/><input type='password' id='textinput' name='password' maxlength='15'><br/>IKKE bruk ditt Habbopassord.<br/>Passordet kan inneholde max 15 tegn.<br/><br/>
<span style=' color: red; '>*</span><b>Gjenta passord:</b> <br/><input type='password' id='textinput' name='repeat_password' maxlength='15'><br/><br/>
<span style=' color: red; '>*</span><b>Epost:</b> <br/><input type='text' id='textinput' value='".$_POST['email']."' name='email' maxlength='70'><br/><br/>";

 echo"<img src='http://www.habbo.no/habbo-imaging/avatarimage?user=-mackie-&action=std&direction=2&head_direction=3&gesture=sml&size=b' id='habimage'><br/><br/>";
 
 
echo"<b>Habbonavn:</b> <br/><input type='text' id='textinput' value='".$_POST['habboname']."' onkeyup=\"document.getElementById('habimage').src='http://www.habbo.no/habbo-imaging/avatarimage?user=' + this.value + '&action=std&direction=2&head_direction=3&gesture=sml&size=b';\" name='habboname' maxlength='25'><br/><br/>";
  echo"Jeg har lest <a href='page?id=20' target='_blank'>brukervilk&#229;rene</a> og jeg aksepterer dem<br/>
  <input type='checkbox' name='accept' value='yes' id='textinput'><br/><br/>
Felter merket med <span style=' color: red; '>*</span> m&#229; utfylles.<br/><br/>
<input type='submit' id='button' value='Registrer deg'></form>";

  if(isset($_GET['refferId'])) {

 $result = mysql_query("SELECT * FROM usersystem WHERE id='".mysql_real_escape_string($_GET['refferId'])."'");
 if(mysql_num_rows($result) != 0) {

while($row = mysql_fetch_array($result))
  {


  
  echo"<br/><br/>Vennen din venter p&#229; deg!<br/><img src='
  http://www.habbo.no/habbo-imaging/avatarimage?user=".$row['habboname']."&action=wav&frame=3&direction=3&head_direction=3&size=b&gesture=sml&img_format=gif
  ' alt='".$row['habboname']."' >";
  }
  }
}
}
}

pagebot($settings['footer']);



}






?>