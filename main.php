<?php

/*==========================================/
| Filnavn: main.php
| Eier: HabboFix.no
| Utvikler: sumodonut
/===========================================/
| Vennligst ikke fjern denne teksten.
/==========================================*/

session_start();

foreach ($_GET as $check_url) {
	if (!is_array($check_url)) {
		$check_url = str_replace("\"", "", $check_url);
		if ((eregi("<[^>]*script*\"?[^>]*>", $check_url)) || (eregi("<[^>]*object*\"?[^>]*>", $check_url)) ||
			(eregi("<[^>]*iframe*\"?[^>]*>", $check_url)) || (eregi("<[^>]*applet*\"?[^>]*>", $check_url)) ||
			(eregi("<[^>]*meta*\"?[^>]*>", $check_url)) || (eregi("<[^>]*style*\"?[^>]*>", $check_url)) ||
			(eregi("<[^>]*form*\"?[^>]*>", $check_url)) ||
			(eregi("\"", $check_url))) {
		die ();
		}
	}
	}
unset($check_url);


define("USER_IP", $_SERVER['REMOTE_ADDR']);
define("SERVER", $_SERVER['HTTP_HOST']);
define("REQUEST_URL", $_SERVER['REQUEST_URI']);
define("MAIN_SET", TRUE);

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

$result = mysql_query("SELECT totallock FROM settings");
$row = mysql_fetch_array($result);
$totallock=$row['totallock'];
unset($row);
if($totallock == "yes") {
die("Siden er blitt midlertidig stengt.");
}


if($_COOKIE['remember'] == "yes") {

$_SESSION['username'] = $_COOKIE['cusername'];
$_SESSION['password'] = $_COOKIE['cpassword'];

session_regenerate_id();


}

if(isset($_SESSION['username']) && ($_SESSION['password'])) {

$not_active_limit = 3600;
$last_active = $_SESSION['last_active'];
$validate_fingerprint = $_SESSION['validate_fingerprint'];

if($_COOKIE['remember'] != "yes") {

if(($last_active + $not_active_limit <= time()) || ($validate_fingerprint != md5('SECRET-SALT'.$_SERVER['HTTP_USER_AGENT'])) || (isset($_GET['logout']))) {

session_destroy();

setcookie("remember", "yes", time()-60*60*24*100, "/");
setcookie("cusername", $username, time()-60*60*24*100, "/");
setcookie("cpassword", $password, time()-60*60*24*100, "/");

header("Location:index");
die();

} else {

session_regenerate_id();

$_SESSION['last_active'] = time();
$_SESSION['validate_fingerprint'] = $validate_fingerprint;

}
} else {

if((isset($_GET['logout']))) {

session_destroy();

setcookie("remember", "yes", time()-60*60*24*100, "/");
setcookie("cusername", $username, time()-60*60*24*100, "/");
setcookie("cpassword", $password, time()-60*60*24*100, "/");

header("Location:index.php");
die();

} else {

session_regenerate_id();

$_SESSION['last_active'] = time();
$_SESSION['validate_fingerprint'] = $validate_fingerprint;

}
}
mysql_query("UPDATE usersystem SET last_active='".time()."' WHERE username='".$_SESSION['username']."' ");

$result = mysql_query("SELECT * FROM usersystem WHERE username='".$_SESSION['username']."' AND password='".$_SESSION['password']."'");
$user = mysql_fetch_array($result);

// userinfo <----------------------------------->
$user['name'] = $user['username'];
$user['level'] = $user['userlevel'];
// userinfo <----------------------------------->

if($user['name'] == $_SESSION['username'] && $user['password'] == $_SESSION['password']) {

// userinfo <----------------------------------->
$user['habbo'] = $user['habboname'];
$user['sname'] = str_split($user['sname']);
$user['text'] = $user['freetext'];
$user['badgesx'] = explode(",", $user['badges']);
$user['itemsx'] = explode(",", $user['items']);
$user['furnix'] = explode(",", $user['furni']);
$user['visited_profilesx'] = explode(",", $user['visited_profiles']);
// define online status
define("ONLINE", TRUE);

define("SNOW", $user['snow']);
// userinfo <----------------------------------->

if($user['points'] < 0) {
mysql_query("UPDATE usersystem SET points='0' WHERE username='".$_SESSION['username']."' ");
}

if($user['credits'] < 0) {
mysql_query("UPDATE usersystem SET credits='0' WHERE username='".$_SESSION['username']."' ");
}

$result = mysql_query("SELECT * FROM usersystem WHERE username='".$_SESSION['username']."' AND password='".$_SESSION['password']."'");
$row = mysql_fetch_array($result);

$row['credits'] = $user['credits'];
$row['points'] = $user['points'];

unset($row);

if($user['verified_habbo'] != "yes") {
if(defined("USERPANEL") || defined("HELP")) {

} else {
header("Location:userpanel.php");
die();
}
}


} else {

session_destroy();

setcookie("remember", "yes", time()-60*60*24*100, "/");
setcookie("cusername", $username, time()-60*60*24*100, "/");
setcookie("cpassword", $password, time()-60*60*24*100, "/");

header("Location:index.php");
die();


}
if($user['level'] == "1") {

session_destroy();

setcookie("remember", "yes", time()-60*60*24*100, "/");
setcookie("cusername", $username, time()-60*60*24*100, "/");
setcookie("cpassword", $password, time()-60*60*24*100, "/");

header("Location:index.php");
die();
}

}

/* else {
if(defined("REGISTER")) {
} elseif(defined("FORGOT")) {  } else {
header("Location:beta.php");
die();
}
} */

$result = mysql_query("SELECT * FROM settings");
$settings = mysql_fetch_array($result);

// settings <----------------------------------->
define("THEME", $theme);
// settings <----------------------------------->


$result = mysql_query("SELECT * FROM latestids ");
while($row = mysql_fetch_array($result))
  {

// latestids <----------------------------------->
$settings['latestid'] = $row['latestid'];
$settings['latestpostid'] = $row['latestpostid'];
$settings['latestpageid'] = $row['latestpageid'];
$settings['latestnewsid'] = $row['latestnewsid'];
$settings['latestarticleid'] = $row['latestarticleid'];
$settings['latestcommentid'] = $row['latestcommentid'];
$settings['messages'] = $row['messages'];
$settings['latestprivatepostid'] = $row['latestprivatepostid'];
// latestids <----------------------------------->


}

$result = mysql_query("SELECT * FROM magazine");
$magazine = mysql_fetch_array($result);

$result = mysql_query("SELECT * FROM `poll` ORDER BY `poll_id` DESC LIMIT 1");
$poll = mysql_fetch_array($result);

require"includes/duce_functions.php";

require"includes/functions.php";

function database_con()
{
include"config.php";

$con = mysql_connect($host,$username,$password);
if (!$con)
  {
  die('Tilkoblingsfeil: ' . mysql_error() . '<br/><br/><a href="http://'.SERVER.'/">Til root-index.</a>');
  }
mysql_select_db($database, $con);
}

require"themes/".THEME."/theme.php";

if(isset($_GET['status']) && is_numeric($_GET['status']) && $_GET['status'] > 0 && $_GET['status'] < 5) {
mysql_query("UPDATE usersystem SET status = '".striphtml($_GET['status'])."' WHERE username = '".$user['name']."'");
}
/*
if($settings['maintenance'] == "yes" && $user['level'] != "4" && !defined("MAINTEN")) {
die("<meta http-equiv='refresh' content='0; url=maintenance.php'>"); }
*/
$f=count($user['sname'])-1;
if($user['sname'] [$f] == "s") {
$end="'";
} else {
$end="s";
}

if(mt_rand(1,2) == 1) {
$chbot=$settings['bot_name'];
$ch=1;
} else {
$chbot=$settings['second_bot_name'];
$ch=2;
}

?>
