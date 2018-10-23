<?php

include"main.php";

database_con();

define("NEWS", "yes");

if($settings['maintenance'] == "yes" && $user['level'] != "4") {
die("<meta http-equiv='refresh' content='0; url=maintenance.php'>"); }


if(isset($_GET['id']) && is_numeric($_GET['id'])) {



$result = mysql_query("SELECT * FROM articles WHERE id='".mysql_real_escape_string($_GET['id'])."'");
while($row = mysql_fetch_array($result))
  {
  
$id = $row['id'];
$name = $row['name'];
$content = $row['content'];
$date = $row['date'];
$time = $row['time'];
$composer = $row['composer'];

  }


if($name != "" && $content !="") {


pagetop("".$settings['site_name']." Anmeldelser - ".$name."");
include"includes/subheader_media.php";
pagemid();



echo"<div id='text' align='left'><b><font size='2'>".$name."</font></b><br/><span style=' color: #999999; '>Skrevet: ".$date."</span><br/><hr width='100%'/><br/>
";
echo strcodes($content);
echo"<br/><br/><hr width='100%'/>Skrevet av: <b><a href='profile.php?user=".$composer."'>".$composer."</a></b></div><br/>";
define("RENEWS", TRUE);
pagebreak();


if(isset($user['name'])) {


if($user['chat_ban'] >= 1) {

echo"<div class='falsebg'>Du har chatban og kan derfor ikke poste kommentarer.</div>";


} else {


if(isset($_GET['report_comment']) && isset($_GET['comment_id']) && is_numeric($_GET['comment_id'])) {

mysql_query("UPDATE comments SET status = 'reported' WHERE id='".mysql_real_escape_string($_GET['comment_id'])."'");

echo"<div class='truebg'>Posten er rapportert!<meta http-equiv='refresh' content='1; url=articles.php?id=".$id."'></div><br/><br/>";

}

if (isset($_POST['message'])) {

$code = $_SESSION['tagwallcode'];

unset($_SESSION['tagwallcode']);

if($code == $_POST['code']) {



if (isset($_POST['type']) && ($_POST['message'])) {

 $x5=$settings['latestcommentid'];
 $vari5 = $x5+1;

mysql_query("UPDATE latestids SET latestcommentid='".$vari5."'");


 $message = striphtml($_POST['message']);


$sql="INSERT INTO comments (id, name, message, page_id, date, ip, type) VALUES 
('".$vari5."', '".$user['name']."','".nl2br($message)."','".mysql_real_escape_string($_GET['id'])."','".strftime("%d.%m.%Y - %H:%M")."','".$_SERVER['REMOTE_ADDR']."','articles')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

  


$x=$user['points'];
$vari = $x+0;

$sql="UPDATE usersystem SET points = '".$vari."'
WHERE username = '".$user['name']."'";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
     




} else {
echo"<br/>Du m&#229; skrive noe f&#248;r du poster det.<br/><br/>";
}
}
}

$mycode = randomtext("aA1", 10);

$_SESSION['tagwallcode'] = $mycode;


echo"
<form action='articles.php?id=".$_GET['id']."' method='post' name='comment'>
<input type='hidden' name='name' value='".$user['name']."'>
<input type='hidden' name='type' value='comment'>
<input type='hidden' name='code' value='".$mycode."'>

<textarea style='height: 140px; width: 400px; 
  font-family: Verdana;
  font-size: 11px;
  font-weight: normal;
  color: #000000;
' name='message' id='textinput'></textarea>
  <br/>";
  echo showcodes("message", "comment");
  echo"
<br/><br/><input type='submit' id='button' value='Post kommentar' /><br/>
";
}
} else {

echo"Du m&#229; logge inn for &#229; skrive kommentarer.";

}


pagebreak();

 if(!isset($_GET['action']) && $_GET['action'] != "all") {
$result = mysql_query("SELECT * FROM comments WHERE page_id='".mysql_real_escape_string($_GET['id'])."' AND type='articles' ORDER BY id DESC LIMIT 10");
} else {
$result = mysql_query("SELECT * FROM comments WHERE page_id='".mysql_real_escape_string($_GET['id'])."' AND type='articles' ORDER BY id DESC");
}
while($row = mysql_fetch_array($result))
  {
  
 echo"<div id='tagcontainer'>
<div id='tagtop'><div id='text'><br/>"; 

 echo"<b>- <a href='profile.php?user=".$row['name']."'>".$row['name']."</a></b>";

  echo"</div></div>
  <div id='tagmid'><div id='text'><br/><br/>";
if($row['message'] == "[Kommentar slettet]") {

echo $row['message'];

} else {

echo strcodes($row['message']);

}

  echo"<br/><br/>";
  echo"Postet: <b>".$row['date']."</b>";
   if($user['level'] == "2" || $user['level'] == "3" || $user['level'] == "4") {
   
   echo"<br/><br/><a href='articles?id=".$_GET['id']."&report_comment=true&comment_id=".$row['id']."' onclick='return confirm(\"Er du sikker?\");'>Rapporter</a>"; 
   
   }
   
   if($user['level'] > 3 && ($user['rights'] == "admin" || $user['rights'] == "mod" || $user['rights'] == "global")) {
   
   echo" &#9679; <a href='adminpanel?action=comments&delete_comment=true&id=".$row['id']."'>Slett</a>";
   
   }
   
  echo"</div></div>
   <div id='tagbot'>";
   echo"</div></div>
   
 ";

  }


$result = mysql_query("SELECT * FROM comments WHERE page_id='".$_GET['id']."'");
 if(mysql_num_rows($result) > 10) {
 

if(!isset($_GET['action']) && $_GET['action'] != "all") {
echo"<a href='articles?id=".$_GET['id']."&action=all'>Vis alle kommentarer</a>";
} else {
echo"Alle kommentarer blir vist.";
}

} else {
echo"Alle kommentarer blir vist.";
}
pagebot($settings['footer']);


  } else {

echo"<meta http-equiv='refresh' content='0; url=index.php'>";

}
  
  
} else {

pagetop("".$settings['site_name']." Anmeldelsesarkiv");
include"includes/subheader_media.php";
pagemidcustom();

echo"";


$t = mysql_query("SELECT * FROM articles");
$a                = mysql_fetch_object($t);  
$total_items      = mysql_num_rows($t);  
$limit            = $_GET['limit'];  
$type             = $_GET['type'];  
$page             = $_GET['page'];

//set default if: $limit is empty, non numerical, less than 10, greater than 50  
if((!$limit)  || (is_numeric($limit) == false) || ($limit < 10) || ($limit > 50)) {  
     $limit = 15; //default  
}  

//set default if: $page is empty, non numerical, less than zero, greater than total available  
if((!$page) || (is_numeric($page) == false) || ($page < 0) || ($page > $total_items)) {  
      $page = 1; //default  
}  

//calcuate total pages  
$total_pages     = ceil($total_items / $limit);  
$set_limit          = $page * $limit - ($limit);  


$result = mysql_query("SELECT * FROM articles ORDER BY id DESC LIMIT $set_limit, $limit");
while($row = mysql_fetch_array($result))
  {

  echo"<b><a href='?id=".$row['id']."'>".$row['name']."</a></b><br/>Skrevet: <span style='color: #999999;'>".$row['date']."</span><br/><br/>";
  
  }
  echo"<text style='float:center;'>";
  $number1=$page-3;
$number2=$page-2;
$number3=$page-1;
$number4=$page;

$prev_page = $page - 1;  

if($prev_page >= 1) {  

  echo("<b><<</b> <a href='?page=$prev_page'><b>Forrige</b></a> | ");  
     if($number1 == 1 || $number2 == 1 || $number3 == 1 || $number4 == 1) {
   
   } else { echo"<a href='?page=1'>1</a> ... "; }
}  

for($a = 1; $a <= $total_pages; $a++)  
{  
$number1=$page-1;
$number2=$page-2;
$number3=$page+1;
$number4=$page+2;
$number5=$page-3;
$number6=$page+3;


if($a == $number1 || $a == $number2 || $a == $number3 || $a == $number4 || $a == $page || $a == $number5 || $a == $number6) {
   if($a == $page) {  
      echo("<b>$a</b> "); //no link  
     } else {  
  echo("<a href='?page=$a'>$a</a> ");  
     }  }
}  

$number1=$page+3;
$number2=$page+2;
$number3=$page+1;
$number4=$page;

$next_page = $page + 1;  
if($next_page <= $total_pages) {  
   if($number1 == $total_pages || $number2 == $total_pages || $number3 == $total_pages || $number4 == $total_pages) {
   
   } else { echo"... <a href='?page=$total_pages'>$total_pages</a>"; }
   echo(" | <a href='?page=$next_page'><b>Neste</a> >></b>");  
}  
echo"</text>";

  
 echo""; 

pagebot($settings['footer']);

}


?>