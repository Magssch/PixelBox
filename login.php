<?php

// URL sessions - declared as well hehe 
// use more serverpower, but silly goldfish in the wide open sea!!
    /* ini_set('session.use_only_cookies', true);
    ini_set('session.use_trans_sid', false); */

session_start();


require"config.php";

$con = mysql_connect($host,$username,$password);
if (!$con)
  {
  die('Tilkoblingsfeil: ' . mysql_error() . '<br/><br/><a href="http://'.SERVER.'/">Til root-index.</a>');
  }
mysql_select_db($database, $con);

$result = mysql_query("SELECT * FROM ipbans WHERE ip='".$_SERVER['REMOTE_ADDR']."' LIMIT 1");
if(mysql_num_rows($result) > 0) {

header("Location:".$redirect."");
die();

}

function sumohash($array)
{
$ini = strtolower(str_replace(" ", null, $array));
$ini = hash('sha256', base64_encode($ini));
$array = strrev(substr($ini, floor(strlen($ini) / 2)));
return $array;
}

$result = mysql_query("SELECT totallock FROM settings");
$row = mysql_fetch_array($result);

$totallock=$row['totallock'];

unset($row);

if($totallock == "yes") {
die("Siden er blitt midlertidig stengt.");
}

$result = mysql_query("SELECT * FROM settings ");
while($row = mysql_fetch_array($result))
  {
  
// settings <----------------------------------->
$settings['maintenance'] = "".$row['maintenance']."";
$settings['footer'] = "".$row['footer']."";
$settings['site_name'] = "".$row['site_name']."";
$settings['bot_name'] = "".$row['bot_name']."";
$settings['site_url'] = "".$row['site_url']."";
$settings['maintenance_reason'] = $row['maintenance_reason'];
$settings['extra_link'] = $row['extra_link'];
$settings['link_goal'] = $row['link_goal'];
define("THEME", $theme);
$ip = $_SERVER['REMOTE_ADRR'];
// settings <----------------------------------->

}

require"themes/".THEME."/theme.php";

define("MAIN_SET", TRUE);

function striphtml($text)
{
include"includes/striphtml.php";
return $text; 
}


if(session_is_registered(username)){

    header("Location:index.php");
    die();
    
}



if(isset($_POST['username']) && ($_POST['password'])) {

if($_GET['try'] <= "3") {

$password = $_POST['password'];

// mysql code start
$result = mysql_query("SELECT * FROM usersystem WHERE username='".mysql_real_escape_string($_POST['username'])."' AND password='".sumohash(md5($password))."'");
// mysql code end

if(mysql_num_rows($result) > "0") {

while($row = mysql_fetch_array($result))
  {
  $password = $row['password'];
  $username = $row['username'];
  $userip = $row['ip'];
  $user_register_ip = $row['register_ip'];
  $userlevel = $row['userlevel'];
  $letindate = explode("||", $row['letindate']);
  $banreason = $row['banreason'];
  }

$time =  time()+(+9*3600);

if($userlevel == "1" && $letindate[0] <= strftime("%y%m%d")) {
mysql_query("UPDATE usersystem SET userlevel = '2' WHERE username='".$username."'");
  $userlevel = "2";
} else {

while($row = mysql_fetch_array($result))
  {
  $userlevel = $row['userlevel'];
  }
}

if($userlevel > "1") {

// new id to avoid crash and holes!!
session_regenerate_id();
$_SESSION['username'] = striphtml($username);
$_SESSION['password'] = $password;
$_SESSION['last_active'] = time();
$_SESSION['validate_fingerprint'] = md5('SECRET-SALT'.$_SERVER['HTTP_USER_AGENT']);

if($_POST['remember'] == "yes") {
setcookie("remember", "yes", time()+60*60*24*100, "/");
setcookie("cusername", $_SESSION['username'], time()+60*60*24*100, "/");
setcookie("cpassword", $_SESSION['password'], time()+60*60*24*100, "/");
}

if($userlevel > 3) {

$sql="INSERT INTO securitylog2 (admin_logins) VALUES 
('user: ".$username.", ip: ".$_SERVER['REMOTE_ADDR'].", date: ".strftime("%d.%m.%Y-%H:%M")."')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
  
}

if($_SERVER['REMOTE_ADDR'] != $userip) {

$sql="INSERT INTO securitylog (odd_login) VALUES 
('user: ".$username.", newip: ".$_SERVER['REMOTE_ADDR'].", oldip: ".$userip.", registerip: ".$user_register_ip.", date: ".strftime("%d.%m.%Y-%H:%M")."')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
  
}

echo"<title>Logger inn</title>";

$time =  time()+(+9*3600);

$result = mysql_query("SELECT * FROM usersystem WHERE username='".$_POST['username']."'");
while($row = mysql_fetch_array($result))
  {

if(strftime("%d.%m.%Y - %H:%M") == $row['logdate']) {

echo" ";

} else {

$x=$row['points'];
$vari = $x+3;


mysql_query("UPDATE usersystem SET points = '".$vari."'
WHERE username = '".$row['username']."'");

mysql_query("UPDATE usersystem SET logdate = '".strftime("%d.%m.%Y - %H:%M")."'
WHERE username = '".$row['username']."'");

  } 
 }

mysql_query("UPDATE usersystem SET ip = '".$_SERVER['REMOTE_ADDR']."' WHERE username='".$username."'");

if($ip != $_SERVER['REMOTE_ADRR']) {
header("Location:login.php");
die("ip ugyldig");
}

echo"<p style=' font-family: Verdana;
  font-size: 10px;
  font-weight: normal;
  color: #000000; '>Logger p&#229; ".$username." <img src='images/progress_bubbles.gif'></p>";
echo"<meta http-equiv='refresh' content='0; url=index'>";

} else {

echo"<title>Utestengt</title>
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
  </style>
<p style=' font-family: Verdana;
  font-size: 10px;
  font-weight: normal;
  color: #000000; '>
<b>Du er blitt utestengt av administrator, grunnen for dette er: </b><br/><br/>".$banreason."<br/><br/>Utestengelsen varer til: <b>".$letindate[1]."</b>
<br/>

<br/><a href='index.php'>Til forsiden</a><p/>
";
}

} else {

$x=$_GET['try'];

echo"
<title>Feil passord eller brukernavn</title>
<p style=' font-family: Verdana;
  font-size: 10px;
  font-weight: normal;
  color: #000000; '>
Feil passord eller brukernavn!</p><meta http-equiv='refresh' content='0; url=login.php?try=".$x."'>
";

}
} else {
echo"<title>Feil</title>
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
  </style>
<p style=' font-family: Verdana;
  font-size: 10px;
  font-weight: normal;
  color: #000000; '>
<b>Du har feilet i &#229; logge inn for mange ganger! </b><br/>

<br/><a href='index'>Til forsiden</a><p/>
";
}

  } else {





pagetop("Logg inn");
include"includes/subheader.php";
pagemid();

$x=$_GET['try']+1;

echo"

<form name='loginform' method='post' action='login?try=".$x."'>
<b>Brukernavn:</b> <br/><input type='text' name='username' id='textinput'><br/><br/>
<b>Passord:</b> <br/><input type='password' name='password' id='textinput'><br/><br/><!--<b>Husk meg</b><br/>--><input type='hidden' name='remember' value='yes'>
<input type='submit' id='button' value='Logg inn'><br/><br/><a href='forgot.php'>Glemt passord?</a>";

pagebot($settings['footer']);
}

?>