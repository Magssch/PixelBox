<?php

include"main.php";

database_con();

if(isset($user['name'])) {

if($settings['maintenance'] == "yes" && $user['level'] != "4") {
die("<meta http-equiv='refresh' content='0; url=maintenance.php'>"); }

pagetop($settings['site_name'] ." post");
include"includes/subheader.php";
pagemid();
echo"<text style='float: right;'>| <a href='post.php?action=new'>Ny melding</a> | <a href='post.php?action=inbox'>Innboks</a> |  <a href='post.php?action=outbox'>Utboks</a>  |</text><br/><br/>";

oB_start();
switch($_GET['action']) {

default:

$t = mysql_query("SELECT * FROM post WHERE receiver = '".$user['name']."'");

$a                = mysql_fetch_object($t);  
$total_items      = mysql_num_rows($t);  
$limit            = $_GET['limit'];  
$type             = $_GET['type'];  
$page             = $_GET['page'];

//set default if: $limit is empty, non numerical, less than 10, greater than 50  
if((!$limit)  || (is_numeric($limit) == false) || ($limit < 10) || ($limit > 50)) {  
     $limit = 22; //default  
}  

//set default if: $page is empty, non numerical, less than zero, greater than total available  
if((!$page) || (is_numeric($page) == false) || ($page < 0) || ($page > $total_items)) {  
      $page = 1; //default  
}  

//calcuate total pages  
$total_pages     = ceil($total_items / $limit);  
$set_limit       = $page * $limit - ($limit);  

if(isset($_POST['do'])) {
foreach($_POST['do'] as $do)
{
if(striphtml($_POST['action']) == "unread") {
mysql_query("UPDATE post SET status = 'unread' WHERE id = '".mysql_real_escape_string($do)."'");
} elseif(striphtml($_POST['action']) == "read") {
mysql_query("UPDATE post SET status = 'read' WHERE id = '".mysql_real_escape_string($do)."'");
} else {
mysql_query("DELETE FROM post WHERE id = '".mysql_real_escape_string($do)."'");
}
}
echo"Handlingen ble utf&#248;rt!";
}

$result = mysql_query("SELECT * FROM post WHERE receiver = '".$user['name']."'");
 if(mysql_num_rows($result) != 0) {

  echo"<form method='post'>
 <table cellpadding='4' border='0'> 
<tr style='text-align:left'>
<th style='text-align:left'> </th>
<th style='text-align:left'><b>Emne:</b></th>
<th style='text-align:left'><b>Fra:</b></th>
<th style='text-align:left'><b>Dato:</b></th>

</tr>
";
 
$result = mysql_query("SELECT * FROM post WHERE receiver = '".$user['name']."' ORDER BY id DESC LIMIT $set_limit, $limit");
while($row = mysql_fetch_array($result))
  { 

  echo "<tr><td id='td' width='20'><input type='checkbox' name='do[]' value='".$row['id']."'></td><td id='td' width='150'><a href='post.php?action=read_message_inbox&id=" . $row['id'] . "
' style=' color: #000000'>"; if($row['status'] == "unread") {
echo"<b>".$row['title']."</b>"; } else { echo $row['title']; } 
if($row['sender'] == $settings['third_bot_name']){
echo"</a><td id='td' width='130'><b style='color: #FF0000;'>".$row['sender']."</b></td>"; 
} else {
echo"</a><td id='td' width='130'><a href='profile?user=".$row['sender']."'>".$row['sender']."</a></td>"; 
}
echo"
<td id='td' width='165'>".$row['date']."</td></tr>
";
}
echo"</table><br/>"; 

$number1=$page-3;
$number2=$page-2;
$number3=$page-1;
$number4=$page;

$prev_page = $page - 1;  

if($prev_page >= 1) {  


  echo("<b>&#171;</b> <a href='?action=inbox&page=$prev_page'><b>Forrige</b></a> | ");  
     if($number1 == 1 || $number2 == 1 || $number3 == 1 || $number4 == 1) {
   
   } else { echo"<a href='?action=inbox&page=1'>1</a> ... "; }
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
  echo("<a href='?action=inbox&page=$a'>$a</a> ");  
     }  }
}  

$number1=$page+3;
$number2=$page+2;
$number3=$page+1;
$number4=$page;

$next_page = $page + 1;  
if($next_page <= $total_pages) {  
   if($number1 == $total_pages || $number2 == $total_pages || $number3 == $total_pages || $number4 == $total_pages) {
   
   } else { echo"... <a href='?action=inbox&page=$total_pages'>$total_pages</a>"; }
   echo(" | <b><a href='?action=inbox&page=$next_page'>Neste</a> &#187;</b>");  
}  
echo"<br/><br/><b>Gj&#248;r med valgte poster:</b><br/><select name='action' id='textinput'>
<option value='unread'>Ulest</option>
<option value='read'>Lest</option>
<option value='delete'>Slett</option>
</select> <input type='submit' onclick='return confirm(\"Er du sikker?\");' value='Utf&#248;r' id='button'></form>
<br/><a href='post?action=empty'><b>T&#248;m innboksen</b></a>";
} else {
echo"Tomt... *sukk*";
}
break;

case "unread";
if(isset($_GET['id'])) {

$result = mysql_query("SELECT * FROM post WHERE id='".mysql_real_escape_string($_GET['id'])."'");
 if(mysql_num_rows($result) != 0) {

$result = mysql_query("SELECT * FROM post WHERE id='".mysql_real_escape_string($_GET['id'])."'");
while($row = mysql_fetch_array($result))
  { 
  
$receiver = $row['receiver'];
  
if($receiver == $user['name']) {

mysql_query("UPDATE post SET status='unread' WHERE id='".mysql_real_escape_string($_GET['id'])."'");
echo"Meldingen ble gjort ulest!<meta http-equiv='refresh' content='1; url=post.php'>";
} else {
echo"Du har ikke rettigheter til &#229; gj&#248;re denne meldingen ulest.";
}

  }
    } else {
echo"<meta http-equiv='refresh' content='0; url=post.php'>";
}
}
break;

case "delete";
if(isset($_GET['id'])) {

$result = mysql_query("SELECT * FROM post WHERE id='".$_GET['id']."'");
 if(mysql_num_rows($result) != 0) {

$result = mysql_query("SELECT * FROM post WHERE id='".$_GET['id']."'");
while($row = mysql_fetch_array($result))
  { 
  
$receiver = $row['receiver'];
  
if($receiver == $user['name']) {

mysql_query("DELETE FROM post WHERE id='".$_GET['id']."'");
echo"Meldingen ble slettet!<meta http-equiv='refresh' content='1; url=post.php'>";
} else {
echo"Du har ikke rettigheter til &#229; slette denne meldingen.";
}

  }
  
  } else {
echo"<meta http-equiv='refresh' content='0; url=post.php'>";
}

}
break;

case "empty";

if(isset($_GET['yes'])) {
mysql_query("DELETE FROM post WHERE receiver='".$user['name']."'");
echo"Innboksen din ble t&#248;mt!<meta http-equiv='refresh' content='1; url=post.php'><br/><br/>";
} else {
echo"<b>Er du sikker p&#229; at du vil t&#248;mme innboksen din?</b><br/><br/>| <a href='post?action=empty&yes'>Fortsett</a> | <a href='post?action=inbox'>Avbryt</a> |";
}

break;

case "outbox";

$t = mysql_query("SELECT * FROM post WHERE sender='".$user['name']."'");
$a                = mysql_fetch_object($t);  
$total_items      = mysql_num_rows($t);  
$limit            = $_GET['limit'];  
$type             = $_GET['type'];  
$page             = $_GET['page'];

//set default if: $limit is empty, non numerical, less than 10, greater than 50  
if((!$limit)  || (is_numeric($limit) == false) || ($limit < 10) || ($limit > 50)) {  
     $limit = 22; //default  
}  

//set default if: $page is empty, non numerical, less than zero, greater than total available  
if((!$page) || (is_numeric($page) == false) || ($page < 0) || ($page > $total_items)) {  
      $page = 1; //default  
}  

//calcuate total pages  
$total_pages     = ceil($total_items / $limit);  
$set_limit       = $page * $limit - ($limit);  


$result = mysql_query("SELECT * FROM post WHERE sender='".$user['name']."'");
 if(mysql_num_rows($result) != 0) {

  echo"
 <table cellpadding='8' border='0'>
 
<tr style='text-align:left'>

<th style='text-align:left'><b>Emne:</b></th>
<th style='text-align:left'><b>Til:</b></th>
<th style='text-align:left'><b>Dato:</b></th>

</tr>
";
$result = mysql_query("SELECT * FROM post WHERE sender='".$user['name']."' ORDER BY id DESC LIMIT $set_limit, $limit");
while($row = mysql_fetch_array($result))
  { 

  echo "<tr><td id='td' width='150'><a href='post.php?action=read_message_outbox&id=" . $row['id'] . "
'>" . $row['title'] . "</a><td id='td' width='130'><a href='profile.php?user=".$row['receiver']."'>".$row['receiver']."</a></td>
<td id='td' width='165'>".$row['date']."</td></tr>
";
}
echo"</table><br/>"; 

$number1=$page-3;
$number2=$page-2;
$number3=$page-1;
$number4=$page;

$prev_page = $page - 1;  

if($prev_page >= 1) {  

  echo("<b>&#171;</b> <a href='?action=outbox&page=$prev_page'><b>Forrige</b></a> | ");  
     if($number1 == 1 || $number2 == 1 || $number3 == 1 || $number4 == 1) {
   
   } else { echo"<a href='?action=outbox&page=1'>1</a> ... "; }
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
  echo("<a href='?action=outbox&page=$a'>$a</a> ");  
     }  }
}  

$number1=$page+3;
$number2=$page+2;
$number3=$page+1;
$number4=$page;

$next_page = $page + 1;  
if($next_page <= $total_pages) {  
   if($number1 == $total_pages || $number2 == $total_pages || $number3 == $total_pages || $number4 == $total_pages) {
   
   } else { echo"... <a href='?action=outbox&page=$total_pages'>$total_pages</a>"; }
   echo(" | <a href='?action=outbox&page=$next_page'><b>Neste</a> &#187;</b>");  
}  
 

} else {
echo"Tomt... *sukk*";
}

break;

case "new";
if($user['chat_ban'] >= 1) {

echo"Du har chatban og kan derfor ikke sende post.";

} else {
if(isset($_POST['title']) && removespace($_POST['title']) != "" && removespace($_POST['message']) != "" && removespace($_POST['receiver'])) {



$x=$row['points'];
$vari = $x+4;

mysql_query("UPDATE usersystem SET points = '".$vari."'
WHERE username = '".$row['username']."'");

 $x1=$settings['latestprivatepostid'];
 $vari1 = $x1+1;

mysql_query("UPDATE latestids SET latestprivatepostid='".$vari1."'");

$sql="INSERT INTO post (id, receiver, sender, title, message, date, status) VALUES 
('".$vari1."','".removespace($_POST['receiver'])."','".$user['name']."'
,'".striphtml($_POST['title'])."','".nl2br(striphtml($_POST['message']))."','".strftime("%d.%m.%Y - %H:%M")."','unread')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
  echo"Meldingen ble sendt!<br/><br/>";
}



echo"<form name='post' method='post' name='post' action='post.php?action=new'><b>Emne:</b><br/>
<input type='text' name='title' id='textinput' value='".$_GET['title']."' style='width: 200px;' maxlength='25'><br/><br/>";

  echo"
<b>Mottaker:</b><br/>
<table><select name='receiver' id='textinput' style='font-size: 10px; width: 200px;'>
";
$result = mysql_query("SELECT username FROM usersystem ORDER BY username");
while($row = mysql_fetch_array($result))
  { 
  if($row['username'] != $user['name']){
  echo"<option value='".$row['username']."' "; if($row['username'] == $_GET['sendTo']) { echo"SELECTED"; } echo" id='textinput' style='font-size: 10px;'>".$row['username']."</option>";
  }
  }
echo"</select></table>
<br/><b>Melding:</b><br/><textarea name='message' id='textinput' style='width: 400px; height: 300px; '></textarea>"; 

 echo"<br/>  ";
  echo showcodes("message", "post");
  echo"<br/><br/><input type='submit' id='button' value='Send'>
";
}
break;

case "report";

if(isset($_GET['id'])){
$result = mysql_query("SELECT id FROM post WHERE id='".mysql_real_escape_string($_GET['id'])."'");
if(mysql_num_rows($result) > 0) {

mysql_query("UPDATE post SET restatus = 'reported'
WHERE id = '".$_GET['id']."'");
echo"Posten ble rapportert! <meta http-equiv='refresh' content='1; url=post.php'>";
} else {
echo"<meta http-equiv='refresh' content='0; url=post.php'>";
}

} else {
echo"<meta http-equiv='refresh' content='0; url=post.php'>";
}

break;

case "resend";
if($user['chat_ban'] >= 1) {

echo"Du har chatban og kan derfor ikke sende post.";

} else {
if(isset($_GET['id'])) {

$result = mysql_query("SELECT * FROM post WHERE id='".mysql_real_escape_string($_GET['id'])."'");
 if(mysql_num_rows($result) != 0) {
 
 while($row = mysql_fetch_array($result))
 {
 $receiver = $row['receiver'];
 $sender = $row['sender'];
 }
  if($receiver == $user['name'] && $sender != $settings['third_bot_name']) {
if(isset($_POST['title']) && removespace($_POST['title']) != "" && removespace($_POST['message']) != "") {

$x=$row['points'];
$vari = $x+4;

mysql_query("UPDATE usersystem SET points = '".$vari."'
WHERE username = '".$row['username']."'");


 $x1=$settings['latestprivatepostid'];
 $vari1 = $x1+1;

mysql_query("UPDATE latestids SET latestprivatepostid='".$vari1."'");

$sql="INSERT INTO post (id, receiver, sender, title, message, date, status) VALUES 
('".$vari1."','".$sender."','".$user['name']."','RE: ".striphtml(remove("RE: ", $_POST['title']))."'
,'".nl2br(striphtml($_POST['message']))."','".strftime("%d.%m.%Y - %H:%M")."','unread')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
  echo"Meldingen ble sendt!<br/><br/>";
}

$result = mysql_query("SELECT * FROM post WHERE id='".mysql_real_escape_string($_GET['id'])."'");
while($row = mysql_fetch_array($result))
  { 
  $title = $row['title'];
  $oldmessage = $row['message'];
  $receiver = $row['sender'];
  }
echo"<form name='post' method='post' name='post' action='post.php?action=resend&id=".$_GET['id']."'><b>Emne:</b><br/>
<input type='text' READONLY name='title' value='RE: ".remove("RE: ", $title)."' id='textinput' style='width: 200px;'><br/><br/>";

 echo"
<b>Mottaker:</b><br/>
<table><select DISABLED name='receiver' id='textinput' style='font-size: 10px; width: 200px;'>
";

  echo"<option value='".$receiver."' id='textinput' style='font-size: 10px;'>".$receiver."</option>";

echo"</select></table>
<input type='hidden' name='oldmessage' value='".$oldmessage."'>
<br/><b>Melding:</b><br/><textarea name='message' id='textinput' style='width: 400px; height: 300px; '></textarea>"; 

 echo"<br/>  ";
  echo showcodes("message", "post");
  echo"<br/><br/><input type='submit' id='button' value='Send'>
";
} else { echo"<meta http-equiv='refresh' content='0; url=post.php'>";  }
} else { echo"<meta http-equiv='refresh' content='0; url=post.php'>";  }
} else { echo"<meta http-equiv='refresh' content='0; url=post.php'>";  }
}
break;



case "read_message_inbox";
$result = mysql_query("SELECT * FROM post WHERE id='".mysql_real_escape_string($_GET['id'])."'");
 if(mysql_num_rows($result) != 0) {

while($row = mysql_fetch_array($result))
  { 
  
$receiver = $row['receiver'];
$sender = $row['sender'];

  if($receiver == $user['name']) {

mysql_query("UPDATE post SET status='read' WHERE id='".mysql_real_escape_string($_GET['id'])."'");

 echo"<p align='left'><b>Emne:</b> ".$row['title']."<br/>";

if($row['sender'] == $settings['third_bot_name']){
echo"<b>Sender:</b> <b style='color: #FF0000;'>".$row['sender']."</b>"; 
} else {
echo"<b>Sender:</b> <a href='profile.php?user=".$row['sender']."'>".$row['sender']."</a>"; 
}
echo"<br/><b>Dato:</b> ".$row['date']."</p>"; 

echo"
 <hr/><div align='left'>"; 
  
 echo solvebr(strcodes($row['message']));
echo"</div><hr/>| <a href='post.php?action=delete&id=".$_GET['id']."'>Slett</a> "; 
if($sender != $settings['third_bot_name']) {echo"| <a href='post.php?action=resend&id=".$_GET['id']."'>Svar</a> ";}
 echo"| <a href='post.php?action=unread&id=".$_GET['id']."'>Gj&#248;r ulest</a> |";
  } else {
echo"<meta http-equiv='refresh' content='0; url=post.php'>"; 
  }
  
  }
    } else {
echo"<meta http-equiv='refresh' content='0; url=post.php'>"; 
  }
break;



case "read_message_outbox";
$result = mysql_query("SELECT * FROM post WHERE id='".mysql_real_escape_string($_GET['id'])."'");
 if(mysql_num_rows($result) != 0) {

$result = mysql_query("SELECT * FROM post WHERE id='".$_GET['id']."'");
while($row = mysql_fetch_array($result))
  { 
  
$receiver = $row['receiver'];
$sender = $row['sender'];

  if($sender == $user['name']) {

echo"<p align='left'><b>Emne:</b> ".$row['title']."<br/><b>Mottaker:</b>
  ".$row['receiver']."<br/><b>Dato:</b> ".$row['date']."</p><hr/><div align='left'>"; 
  
 echo solvebr(strcodes($row['message']));
echo"</div><hr/>";
  } else {
echo"<meta http-equiv='refresh' content='0; url=post.php'>"; 
  }
  
  }
    } else {
echo"<meta http-equiv='refresh' content='0; url=post.php'>"; 
  }
break;

}
pagebot($settings['footer']);



} else {
echo"<meta http-equiv='refresh' content='0; url=maintenance.php'>";
}
?>