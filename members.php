<?php

include"main.php";

database_con();
/*
if($_GET['action'] == "h") {
die("&#198;sj, du fant den! Her er koden til modul 4: <b>module.swap(calm)</b>");
}
*/

if($_GET['action'] == "egref" && !in_array("ese1", $user['itemsx'])) {
mysql_query("UPDATE usersystem SET items = '".$user['items']."ese1,' WHERE username='".$user['name']."'");
die("Du fant p&#229;skeegg nummer 1!");
}

if($settings['maintenance'] == "yes" && $user['level'] != "4") {
die("<meta http-equiv='refresh' content='0; url=maintenance.php'>"); }

if(defined("ONLINE")) {

pagetop("".$settings['site_name']." brukerliste");
include"includes/subheader.php";
pagemid();


echo"<table border='0' width='100%'>";
echo"<tr  style='

font-family: Verdana; 
font-size: 11px; 
font-weight: normal; 
color: #000000;
border: 1px solid #999;

' height='10'>
<th style='border: 1px solid #999;'>Brukernavn</th>
<th style='border: 1px solid #999;'>Habbonavn</th>
<th style='border: 1px solid #999; width: 100px;'>Rank</th>
</tr>";
/*
echo"<tr><td id='td'><a href='?action=h'>mohahahaha</a></td>"; 

echo"<td id='td' style='color: red;'>Ikke bry deg</td>"; 

echo"<td id='td'>Kongen!</td>";
*/
if(!isset($_POST['search'])) {

if($user['level'] >= "4") {
$t = mysql_query("SELECT * FROM usersystem");
} else {
$t = mysql_query("SELECT * FROM usersystem WHERE userlevel > '1'");
}
$a                = mysql_fetch_object($t);  
$total_items      = mysql_num_rows($t);  
$limit            = $_GET['limit'];  
$type             = $_GET['type'];  
$page             = $_GET['page'];

//set default if: $limit is empty, non numerical, less than 10, greater than 50  
if((!$limit)  || (is_numeric($limit) == false) || ($limit < 10) || ($limit > 50)) {  
     $limit = 30; //default  
}  

//set default if: $page is empty, non numerical, less than zero, greater than total available  
if((!$page) || (is_numeric($page) == false) || ($page < 0) || ($page > $total_items)) {  
      $page = 1; //default  
}  

//calcuate total pages  
$total_pages     = ceil($total_items / $limit);  
$set_limit       = $page * $limit - ($limit);  

  if($user['level'] >= "4") {
$result = mysql_query("SELECT * FROM usersystem ORDER BY userlevel DESC LIMIT $set_limit, $limit");
} else {
$result = mysql_query("SELECT * FROM usersystem WHERE userlevel > '1' ORDER BY userlevel DESC LIMIT $set_limit, $limit");
}
} else {

if($user['level'] >= "4") {
$t = mysql_query("SELECT * FROM usersystem WHERE username LIKE '%".mysql_real_escape_string($_POST['search'])."%'");
} else {
$t = mysql_query("SELECT * FROM usersystem WHERE userlevel > '1' AND username LIKE '%".mysql_real_escape_string($_POST['search'])."%'");
}
$a                = mysql_fetch_object($t);  
$total_items      = mysql_num_rows($t);  
$limit            = $_GET['limit'];  
$type             = $_GET['type'];  
$page             = $_GET['page'];

//set default if: $limit is empty, non numerical, less than 10, greater than 50  
if((!$limit)  || (is_numeric($limit) == false) || ($limit < 10) || ($limit > 50)) {  
     $limit = 30; //default  
}  

//set default if: $page is empty, non numerical, less than zero, greater than total available  
if((!$page) || (is_numeric($page) == false) || ($page < 0) || ($page > $total_items)) {  
      $page = 1; //default  
}  

//calcuate total pages  
$total_pages     = ceil($total_items / $limit);  
$set_limit       = $page * $limit - ($limit);  

  if($user['level'] >= "4") {
$result = mysql_query("SELECT * FROM usersystem WHERE username LIKE '%".mysql_real_escape_string($_POST['search'])."%' ORDER BY userlevel DESC LIMIT $set_limit, $limit");
} else {
$result = mysql_query("SELECT * FROM usersystem WHERE userlevel > '1' AND username LIKE '%".mysql_real_escape_string($_POST['search'])."%' ORDER BY userlevel DESC LIMIT $set_limit, $limit");

}
}
while($row = mysql_fetch_array($result))
  {
echo"<tr><td id='td'><a href='profile.php?id=".$row['id']."'>".$row['username']."</a></td>"; 
if($row['verified_habbo'] == "yes") {
echo"<td id='td'>".$row['habboname']."</td>"; 
} else {
echo"<td id='td' style='color: red;'>Ikke verifisert</td>"; 
}
if(empty($row['title'])) {
$bad_entities = array("1", "2", "3", "4");
$safe_entities = array("Utestengt", "Bruker", "VIP", "Administrator");
$userlevel1 = str_replace($bad_entities, $safe_entities, $row['userlevel']); 
} else {
$userlevel1 = str_replace(" ", "&nbsp;", $row['title']);
}
if($row['userlevel'] != "1") {
echo"<td id='td'>".$userlevel1."</td>"; 
} else {
echo"<td id='td' style='color: red;'>".$userlevel1."</td>"; 
}
  }
  
echo"</tr></table><br/>";


$number1=$page-3;
$number2=$page-2;
$number3=$page-1;
$number4=$page;

$prev_page = $page - 1;  

if($prev_page >= 1) {  

  echo("<b>&#171;</b> <a href='?page=$prev_page'><b>Forrige</b></a> | ");  
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
   echo(" | <a href='?page=$next_page'><b>Neste</a> &#187;</b>");  
}  

echo"<br/><br/>";
$result = mysql_query("SELECT * FROM usersystem");
$users = mysql_num_rows($result);
echo"| Antall registrerte brukere: <b>".$users."</b> |";
$result = mysql_query("SELECT * FROM usersystem ORDER BY id DESC LIMIT 1");
while($row = mysql_fetch_array($result))
  { 
echo" Siste medlem: <b><a href='profile.php?id=".$row['id']."'>".$row['username']."</a></b> |";
  }

if(in_array("es_2", $user['itemsx']) && !in_array("ese1", $user['itemsx'])) {
echo" Antall egg: <b><a href='?action=egref' style='color:black;'>1</a></b> |";
}

 echo" <br/><br/>
<form method='post'><b>S&#248;k: </b><input type='text' id='textinput' name='search' style='width:200px;'> <input type='submit' id='button' value='S&#248;k'>
</form>"; 
pagebot($settings['footer']);
} else {
header("Location:index.php");
die();
}
?>