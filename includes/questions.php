<?php

if(!defined("MAIN_SET")) { die("Dette er en systemfil som er skjult for brukere"); }

$search = array("!", "?", ".", ",", " ", "*", "-", "_", ":", ";");
$overlap = array("", "", "", "", "", "", "", "", "", "");
$replace = str_replace($search, $overlap, $_POST['message']);

 
  $messagedown = strtolower($replace);
  $botdown = strtolower($settings['bot_name']);
  
 
 /*
 if(isstr($botdown, $messagedown)) {
 $x5=$vari5;
 $vari5 = $x5+1;

 mysql_query("UPDATE latestids SET latestpostid='".$vari5."'"); 

$message = striphtml($_POST['message']);

$sql="INSERT INTO guestbook (id, name, message, date, ip) VALUES 
('".$vari5."', '".$settings['bot_name']."','Sa noen navnet mitt?','".strftime("%d.%m.%Y - %H:%M")."','".$_SERVER['REMOTE_ADDR']."')";
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
('".$vari5."', '".$settings['bot_name']."','Klokken er <b>".strftime("%H:%M")."</b>!','".strftime("%d.%m.%Y - %H:%M")."','".$_SERVER['REMOTE_ADDR']."')";
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
('".$vari5."', '".$settings['bot_name']."', 'Det hjelper ikke &#229; mase vet du ;)','".strftime("%d.%m.%Y - %H:%M")."','".$_SERVER['REMOTE_ADDR']."')";
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
('".$vari5."', '".$settings['bot_name']."','Det er din mening, men det syns ikke jeg!','".strftime("%d.%m.%Y - %H:%M")."','".$_SERVER['REMOTE_ADDR']."')";
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
('".$vari5."', '".$settings['bot_name']."','HMMMMMMM?!','".strftime("%d.%m.%Y - %H:%M")."','".$_SERVER['REMOTE_ADDR']."')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
  } 
  /*
 elseif(isstr("spam", $messagedown)) {
   $x5=$vari5;
 $vari5 = $x5+1;

 mysql_query("UPDATE latestids SET latestpostid='".$vari5."'"); 

$message = striphtml($_POST['message']);

$sql="INSERT INTO guestbook (id, name, message, date, ip) VALUES 
('".$vari5."', '".$settings['bot_name']."','Ikke spam da!','".strftime("%d.%m.%Y - %H:%M")."','".$_SERVER['REMOTE_ADDR']."')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
  } 
  */
  
 elseif(isstr($botdown, $messagedown) && isstr("kul", $messagedown)) {
   $x5=$vari5;
 $vari5 = $x5+1;

 mysql_query("UPDATE latestids SET latestpostid='".$vari5."'"); 

$message = striphtml($_POST['message']);

$sql="INSERT INTO guestbook (id, name, message, date, ip) VALUES 
('".$vari5."', '".$settings['bot_name']."','Takker :)','".strftime("%d.%m.%Y - %H:%M")."','".$_SERVER['REMOTE_ADDR']."')";
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
('".$vari5."', '".$settings['bot_name']."','Jeg er en bot som varsler om nye brukere, nyheter, myntkoder og annet.','".strftime("%d.%m.%Y - %H:%M")."','".$_SERVER['REMOTE_ADDR']."')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
  }

   elseif(isstr($botdown, $messagedown) && (isstr("hei", $messagedown) || isstr("hall", $messagedown) || isstr("hell", $messagedown) || 
   isstr("hai", $messagedown) || isstr("hey", $messagedown) )) {
      $x5=$vari5;
 $vari5 = $x5+1;

 mysql_query("UPDATE latestids SET latestpostid='".$vari5."'"); 

$message = striphtml($_POST['message']);

$sql="INSERT INTO guestbook (id, name, message, date, ip) VALUES 
('".$vari5."', '".$settings['bot_name']."','Heisann!','".strftime("%d.%m.%Y - %H:%M")."','".$_SERVER['REMOTE_ADDR']."')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
  }

   elseif(isstr($botdown, $messagedown) && (isstr("unnskyld", $messagedown) || isstr("sorry", $messagedown) || isstr("beklager", $messagedown) || isstr("leimeg", $messagedown) || isstr("sry", $messagedown))) {
   $x5=$vari5;
 $vari5 = $x5+1;

 mysql_query("UPDATE latestids SET latestpostid='".$vari5."'"); 

$message = striphtml($_POST['message']);

$sql="INSERT INTO guestbook (id, name, message, date, ip) VALUES 
('".$vari5."', '".$settings['bot_name']."', 'Riiiiiiight...','".strftime("%d.%m.%Y - %H:%M")."','".$_SERVER['REMOTE_ADDR']."')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
  }


 elseif(isstr($botdown, $messagedown) && isstr("godjul", $messagedown)) {
   $x5=$vari5;
 $vari5 = $x5+1;

 mysql_query("UPDATE latestids SET latestpostid='".$vari5."'"); 

$message = striphtml($_POST['message']);

$sql="INSERT INTO guestbook (id, name, message, date, ip) VALUES 
('".$vari5."', '".$settings['bot_name']."', 'Ha en riktig god jul!','".strftime("%d.%m.%Y - %H:%M")."','".$_SERVER['REMOTE_ADDR']."')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
  }
 else {
 
 } 
  


?>