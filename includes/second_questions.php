<?php

if(!defined("MAIN_SET")) { die("Dette er en systemfil som er skjult for brukere"); }

$search = array("!", "?", ".", ",", " ", "*", "-", "_", ":", ";");
$overlap = array("", "", "", "", "", "", "", "", "", "");
$replace = str_replace($search, $overlap, $_POST['message']);

  $messagedown = strtolower($replace);
  $botdown = strtolower($settings['second_bot_name']);
  $botdown2 = strtolower($settings['bot_name']);  
 
 /*
 if(isstr($botdown, $messagedown)) {
 $x5=$vari5;
 $vari5 = $x5+1;

 mysql_query("UPDATE latestids SET latestpostid='".$vari5."'"); 

$message = striphtml($_POST['message']);

$sql="INSERT INTO guestbook (id, name, message, date, ip) VALUES 
('".$vari5."', '".$settings['second_bot_name']."','Sa noen navnet mitt?','".strftime("%d.%m.%Y - %H:%M")."','".$_SERVER['REMOTE_ADDR']."')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
  } 
  
  */

  
 if(isstr($botdown, $messagedown) && isstr("klokk", $messagedown)) {
   $x5=$vari5;
 $vari5 = $x5+1;

 mysql_query("UPDATE latestids SET latestpostid='".$vari5."'"); 

$message = striphtml($_POST['message']);

$sql="INSERT INTO guestbook (id, name, message, date, ip) VALUES 
('".$vari5."', '".$settings['second_bot_name']."','Klokken... Den er <b>".strftime("%H:%M")."</b>!','".strftime("%d.%m.%Y - %H:%M")."','".$_SERVER['REMOTE_ADDR']."')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

  } 
  
  
   
 elseif(isstr($botdown, $messagedown) && isstr("myntkode", $messagedown)) {
   $x5=$vari5;
 $vari5 = $x5+1;

 mysql_query("UPDATE latestids SET latestpostid='".$vari5."'"); 

$message = striphtml($_POST['message']);

$sql="INSERT INTO guestbook (id, name, message, date, ip) VALUES 
('".$vari5."', '".$settings['second_bot_name']."','Dere f&#229;r ikke myntkoder hvis dere maser!','".strftime("%d.%m.%Y - %H:%M")."','".$_SERVER['REMOTE_ADDR']."')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
  } 
  
  
 elseif(isstr($botdown, $messagedown) && isstr("slem", $messagedown)) {
   $x5=$vari5;
 $vari5 = $x5+1;

 mysql_query("UPDATE latestids SET latestpostid='".$vari5."'"); 

$message = striphtml($_POST['message']);

$sql="INSERT INTO guestbook (id, name, message, date, ip) VALUES 
('".$vari5."', '".$settings['second_bot_name']."','Nå overdriver du vel? :S','".strftime("%d.%m.%Y - %H:%M")."','".$_SERVER['REMOTE_ADDR']."')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
  } 
  
 elseif(isstr($botdown, $messagedown) && isstr("rar", $messagedown)) {
   $x5=$vari5;
 $vari5 = $x5+1;

 mysql_query("UPDATE latestids SET latestpostid='".$vari5."'"); 

$message = striphtml($_POST['message']);

$sql="INSERT INTO guestbook (id, name, message, date, ip) VALUES 
('".$vari5."', '".$settings['second_bot_name']."','Neh, det syns ikke jeg','".strftime("%d.%m.%Y - %H:%M")."','".$_SERVER['REMOTE_ADDR']."')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
  } 

 elseif(isstr($botdown, $messagedown) && isstr("kul", $messagedown)) {
   $x5=$vari5;
 $vari5 = $x5+1;

 mysql_query("UPDATE latestids SET latestpostid='".$vari5."'"); 

$message = striphtml($_POST['message']);

$sql="INSERT INTO guestbook (id, name, message, date, ip) VALUES 
('".$vari5."', '".$settings['second_bot_name']."','Thanks mate!','".strftime("%d.%m.%Y - %H:%M")."','".$_SERVER['REMOTE_ADDR']."')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
  } 
 elseif(isstr($botdown, $messagedown) && (isstr("hvem", $messagedown) || isstr("hva", $messagedown))) {
   $x5=$vari5;
 $vari5 = $x5+1;

 mysql_query("UPDATE latestids SET latestpostid='".$vari5."'"); 

$message = striphtml($_POST['message']);

$sql="INSERT INTO guestbook (id, name, message, date, ip) VALUES 
('".$vari5."', '".$settings['second_bot_name']."','Jeg er en bot som gj&#248;r nesten akkurat det samme som ".$settings['bot_name'].", sp&#248;r ham istedet.','".strftime("%d.%m.%Y - %H:%M")."','".$_SERVER['REMOTE_ADDR']."')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
  }

   elseif(isstr($botdown, $messagedown) && (isstr("hei", $messagedown) || isstr("hall", $messagedown) || isstr("hell", $messagedown) || 
   isstr("hai", $messagedown) || isstr("hey", $messagedown))) {
      $x5=$vari5;
 $vari5 = $x5+1;

 mysql_query("UPDATE latestids SET latestpostid='".$vari5."'"); 

$message = striphtml($_POST['message']);

$sql="INSERT INTO guestbook (id, name, message, date, ip) VALUES 
('".$vari5."', '".$settings['second_bot_name']."','Hey!','".strftime("%d.%m.%Y - %H:%M")."','".$_SERVER['REMOTE_ADDR']."')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

  }

   elseif((isstr($botdown, $messagedown)) && (isstr("kli", $messagedown))) {
   $x5=$vari5;
 $vari5 = $x5+1;

 mysql_query("UPDATE latestids SET latestpostid='".$vari5."'"); 

$message = striphtml($_POST['message']);

$sql="INSERT INTO guestbook (id, name, message, date, ip) VALUES 
('".$vari5."', '".$settings['second_bot_name']."', '*Klorer deg på ryggen*','".strftime("%d.%m.%Y - %H:%M")."','".$_SERVER['REMOTE_ADDR']."')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
  }
  
  
/*
 elseif(isstr($botdown, $messagedown) && isstr("godjul", $messagedown)) {
   $x5=$vari5;
 $vari5 = $x5+1;

 mysql_query("UPDATE latestids SET latestpostid='".$vari5."'"); 

$message = striphtml($_POST['message']);

$sql="INSERT INTO guestbook (id, name, message, date, ip) VALUES 
('".$vari5."', '".$settings['second_bot_name']."', 'Ha en *host* gledelig jul *host*!','".strftime("%d.%m.%Y - %H:%M")."','".$_SERVER['REMOTE_ADDR']."')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
  } */ 
  
  else {  }

?>