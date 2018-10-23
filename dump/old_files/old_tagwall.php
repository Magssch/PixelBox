<?php

include"main.php";

database_con();

if($settings['maintenance'] == "yes" && $user['level'] != "4") {
die("<meta http-equiv='refresh' content='0; url=maintenance.php'>"); }


pagetop("".$settings['site_name']." tagwall");
include"includes/subheader.php";
pagemid();

if(isset($user['name']) && ($user['password'])) {


if(isset($_GET['report_post']) && ($_GET['id'])) {

mysql_query("UPDATE guestbook SET status = 'reported' WHERE id='".$_GET['id']."'");

echo"Posten er rapportert!<meta http-equiv='refresh' content='1; url=tagwall.php'><br/><br/>";

}

echo"
<form action='tagwall.php?page=".$settings['page']."' method='post'>
<input type='hidden' name='name' value='".$user['name']."'>
<input type='hidden' name='type' value='message'>
";

if (isset($_POST['message'])) {

echo"

<textarea READONLY style='height: 140px; width: 400px;  
  font-family: Verdana;
  font-size: 11px;
  font-weight: normal;
  color: #000000;
' name='message' maxlength='50' id='textinput'></textarea>
<br/><br/><input type='button' id='button' DISABLED value='Post melding' /><br/>
";

} else {


echo"
<textarea style='height: 140px; width: 400px;  
  font-family: Verdana;
  font-size: 11px;
  font-weight: normal;
  color: #000000;
' name='message' maxlength='50' id='textinput'></textarea>
<br/><br/><input type='submit' id='button' value='Post melding' /><br/>
";

}

pagebreak();

// <-------------------------------------------------------------->

if (isset($_POST['message'])) {

if (isset($_POST['type']) && $_POST['message'] != "") {

 $x5=$settings['latestpostid'];
 $vari5 = $x5+1;

 mysql_query("UPDATE latestids SET latestpostid='".$vari5."'");

$result = mysql_query("SELECT * FROM tagpage");
while($row = mysql_fetch_array($result))
  {
  
  if($row['posts'] == "15") {
  
  
   
 $x=$row['page'];
 $vari = $x+1;


mysql_query("UPDATE tagpage SET page='".$vari."'");
 
mysql_query("UPDATE tagpage SET posts='1'");
 
 
$message = striphtml($_POST['message']);

$sql="INSERT INTO guestbook (id, name, message, page, page_post, date, ip) VALUES 
('".$vari5."', '".$user['name']."','".$message."','".$vari."','1','".strftime("%d.%m.%Y - %H:%M")."','".USER_IP."')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }



} else {
  
  
     
 $x4=$row['posts'];
 $vari4 = $x4+1;

mysql_query("UPDATE tagpage SET posts='".$vari4."'");
 
 
$message = striphtml($_POST['message']);

$sql="INSERT INTO guestbook (id, name, message, page, page_post, date, ip) VALUES 
('".$vari5."', '".$user['name']."','".$message."','".$row['page']."','".$vari4."','".strftime("%d.%m.%Y - %H:%M")."','".USER_IP."')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

  
}

}
 
$result = mysql_query("SELECT * FROM tagpage");
while($row = mysql_fetch_array($result))
  {

 $x6=$row['posts'];
 $vari6 = $x6+1;
 
     


     
     
 $x=$user['tagwallposts'];
 $vari = $x+1;

mysql_query("UPDATE usersystem SET tagwallposts='".$vari."' WHERE username='".$user['name']."'");
  

 
  }
 
$x=$user['points'];
$vari = $x+1;


$sql="UPDATE usersystem SET points = '".$vari."'
WHERE username = '".$user['name']."'";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
echo"<meta http-equiv='refresh' content='0; url=tagwall.php'>";

} else {
echo"Du m&#229; skrive noe f&#248;r du poster det.<br/><br/>";
}

} else {
echo" ";
}



// <-------------------------------------------------------------->

// older messages

} else {

echo"Du m&#229; logge inn for &#229; poste i tagwallen.
";
 pagebreak();

}


$result = mysql_query("SELECT * FROM tagpage ");
while($row = mysql_fetch_array($result))
  {
  
  $posts = $row['posts'];

  }

 if(isset($_GET['page'])) { 
 
  $i=15;

while($i>=1)
  {

$result = mysql_query("SELECT * FROM guestbook WHERE page='".$_GET['page']."' AND page_post='".$i."' ORDER BY id DESC ");
while($row = mysql_fetch_array($result))
  {
  
 echo"
<div id='tagcontainer'><div id='tagtop'><div id='text'><br/>"; 
 
 if($row['name'] == $settings['bot_name']) {
 
 echo"<b style='color: #FF3300;'>- ".$row['name']."</b>";
 
 } else {
 
 echo"<b>- <a href='profile.php?user=".$row['name']."'>".$row['name']."</a></b>";
 
 }
  echo"</div></div>
  <div id='tagmid'><div id='text'><br/><br/>";  if($row['name'] == $settings['bot_name']) {
  
   echo"".$row['message']."<br/><br/>"; 
  } else {
   echo $row['message']."<br/><br/>"; 
  }
echo"Postet: <b>".$row['date']."</b><br/><br/>";
     
   if($user['level'] == "2" || $user['level'] == "3" || $user['level'] == "4") {
   if($row['name'] != $settings['bot_name']) {
   
   echo"<a href='tagwall.php?action=tagwall&report_post=true&id=".$row['id']."'>Rapporter</a>"; 
   }
   }
   
   if($user['level'] == "4") {
   
   echo" &#9679; <a href='adminpanel.php?action=tagwall&delete_post=true&id=".$row['id']."'>Slett</a>";
   
   }
   
  echo"</div></div>
   <div id='tagbot'>";
   echo"</div></div>
 ";

  }
  
 
  $i--;
  }

} else {

  $i=15;

while($i>=1)
  {

$result = mysql_query("SELECT * FROM guestbook WHERE page='".$settings['page']."' AND page_post='".$i."' ORDER BY id DESC ");
while($row = mysql_fetch_array($result))
  {
  
 echo"
<div id='tagcontainer'><div id='tagtop'><div id='text'><br/>"; 
 
 if($row['name'] == $settings['bot_name']) {
 
 echo"<b style='color: #FF3300;'>- ".$row['name']."</b>";
 
 } else {
 
 echo"<b>- <a href='profile.php?user=".$row['name']."'>".$row['name']."</a></b>";
 
 }
  echo"</div></div>
  <div id='tagmid'><div id='text'><br/><br/>";
  if($row['name'] == $settings['bot_name']) {
  
   echo"".$row['message']."<br/><br/>"; 
  } else {
   echo $row['message']."<br/><br/>"; 
  }
  echo"Postet: <b>".$row['date']."</b><br/><br/>";
  
   if($user['level'] == "2" || $user['level'] == "3" || $user['level'] == "4") {
   if($row['name'] != $settings['bot_name']) {
   
   echo"<a href='tagwall.php?action=tagwall&report_post=true&id=".$row['id']."'>Rapporter</a>"; 
   }
   }
   
   if($user['level'] == "4") {
   
   echo" &#9679; <a href='adminpanel.php?action=tagwall&delete_post=true&id=".$row['id']."'>Slett</a>";
   
   }
   
  echo"</div></div>
   <div id='tagbot'>";
   echo"</div></div>
 ";

  }
  
  
 
  $i--;
  }

}




pagebreak();

$result = mysql_query("SELECT * FROM tagpage ");
while($row = mysql_fetch_array($result))
  {


if(isset($_GET['page'])) {



$i=$row['page'];

while($i>=1)
  {
  if($_GET['page'] == $i) {
  echo "<b>" . $i . "</b> ";
  } else {
    echo "<a href='?page=" . $i . "'>" . $i . "</a> ";
  }
  
  $i--;
  }

} else {


$i=$row['page'];
while($i>=1)
  {
  if($i == $row['page']) {
  echo "<b>" . $i . "</b> ";
  } else {
    echo "<a href='?page=" . $i . "'>" . $i . "</a> ";
  }
  
  $i--;
  }

}

  }


pagebot($settings['footer']);





?> 