<?php

define("FORGOT", TRUE);

include"main.php";
database_con();

if($settings['maintenance'] == "yes" && $user['level'] != "4") {
die("<meta http-equiv='refresh' content='0; url=maintenance.php'>"); } 

if(session_is_registered(username)) {
die("<meta http-equiv='refresh' content='0; url=maintenance.php'>");
}

pagetop("Glemt passord");
include"includes/subheader.php";
pagemid();
if(isset($_POST['username'])) {

$result = mysql_query("SELECT * FROM usersystem WHERE username='".mysql_real_escape_string($_POST['username'])."' AND email='".mysql_real_escape_string($_POST['email'])."' LIMIT 1");
if(mysql_num_rows($result) > 0) {

 	$string = ""; $encode = "";
	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	for ($i = 0; $i < 10; $i++) {
		$string .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
	}
	for ($i = 0; $i < 31; $i++) {
		$encode .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
	}
	
mysql_query("UPDATE usersystem SET password='".sumohash(md5($string))."' WHERE username='".mysql_real_escape_string($_POST['username'])."' && email='".mysql_real_escape_string($_POST['email'])."'"); 

  $email = $_POST['email'];
  mail($email, "Nytt passord",
  "Du har bedt om ett nytt passord fra HabboFix. 
Passordet du skal logge inn med er: ".$string."".
  "From: HabboFix <glemtpassord@habbofix.net>" );
  echo"Ditt nye passord er sendt til din innboks!<br/><br/>";


}
  
}
echo"Hvis du har glemt passordet ditt kan du fylle ut disse feltene<br/> og hvis de er riktige vil du f&#229; tilsendt ett nytt passord.";

echo"<br/><br/><form method='post'><b>Brukernavn:</b><br/><input type='text' name='username' id='textinput'><br/><br/>
<b>Epostadresse:</b><br/><input type='text' name='email' id='textinput'><br/><br/><input type='submit' value='Send' id='button'>
</form>";

pagebot($settings['footer']);


?>