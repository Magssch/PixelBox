<?php

if(!defined("MAIN_SET")) { die("Dette er en systemfil som er skjult for brukere"); }

$query = mysql_query("SELECT * FROM forums WHERE id = '".$_GET['id']."'");

if(mysql_num_rows($query) > 0) {

$forum = mysql_fetch_array($query);

pagetop($settings['site_name']." forum - ".$forum['name']."");
include("includes/subheader.php");
pagemidcustom();

$t = mysql_query("SELECT * FROM threads WHERE forum_id = '".$_GET['id']."'");
$a                  = mysql_fetch_object($t);  
$total_items      = mysql_num_rows($t);  
$limit            = $_GET['limit'];  
$type             = $_GET['type'];  
$page             = $_GET['page'];

//set default if: $limit is empty, non numerical, less than 10, greater than 50  
if((!$limit)  || (is_numeric($limit) == false) || ($limit < 10) || ($limit > 50)) {  
     $limit = 13; //default  
}  

//set default if: $page is empty, non numerical, less than zero, greater than total available  
if((!$page) || (is_numeric($page) == false) || ($page < 0) || ($page > $total_items)) {  
      $page = 1; //default  
}  

//calcuate total pages  
$total_pages     = ceil($total_items / $limit);  
$set_limit          = $page * $limit - ($limit);  

echo"<div style='padding-bottom:1px;'><text style='float:left;'>";
echo"<b><text class='nou'><span style='font-size: 11px;'><a href='?action=create_thread&forum_id=".$forum['id']."' style='color: #3D3D3D;'>Ny tr&#229;d</a></span></text></b>
 <b><text class='nou'><span style='font-size: 11px; margin-left:165px;'><a href='forum' style='color: #3D3D3D;'>&#171; Tilbake</a></span></text></b>
<br/><br/>";
echo"</text>";


echo"<text style='float:right;'>Side: ";

$number1=$page-3;
$number2=$page-2;
$number3=$page-1;
$number4=$page;


$prev_page = $page - 1;  

if($prev_page >= 1) {  

     if($number1 == 1 || $number2 == 1 || $number3 == 1 || $number4 == 1) {
   
   } else { echo"<a href='?action=forum&id=".$_GET['id']."&page=1'>1</a> ... "; }
}  

for($a = 1; $a <= $total_pages; $a++)  
{  
$number1=$page-1;
$number2=$page-2;
$number3=$page+1;
$number4=$page+2;
$number5=$page-3;
$number6=$page+3;


if($a == $number1 || $a == $number2 || $a == $number3 || $a == $number4 || $a == $page || $a == $number5 || $a == $number6 ) {
   if($a == $page) {  
      echo("<b>$a</b> "); //no link  
     } else {  
  echo("<a href='?action=forum&id=".$_GET['id']."&page=$a'>$a</a> ");  
     }  }
}  

$number1=$page+3;
$number2=$page+2;
$number3=$page+1;
$number4=$page;

$next_page = $page + 1;  
if($next_page <= $total_pages) {  
   if($number1 == $total_pages || $number2 == $total_pages || $number3 == $total_pages || $number4 == $total_pages) {
   
   } else { echo"... <a href='?action=forum&id=".$_GET['id']."&page=$total_pages'>$total_pages</a>"; }

} 
echo"</text></div><br/><br/>";


echo"
<table width='100%' cellpadding='4' cellspacing='0' border='0' style='text-align: left;'>
<tr style='color: #333333;'>
<th style='width: 7px;'> </th>
<th>Tr&#229;d/Tr&#229;dstarter:</th>
<th>Lest:</th>
<th>Svar:</th>
<th>Nyeste innlegg:</th>
</tr>
";








$query = mysql_query("SELECT * FROM threads WHERE forum_id = '".$forum['id']."' && sticky >= 1 ORDER BY latestpost DESC LIMIT $set_limit, $limit");
while($thread = mysql_fetch_array($query))
{

if(!isset($color)) {
$color = "D9D9D9";
} else {
if($color == "D9D9D9") {
$color = "none";
} else {
$color = "D9D9D9";
}
}

echo"<tr>";

if($thread['locked'] > 0) {
echo"<td id='td' style='width: 7px; background-color: #".$color.";'><img src='images/forum/folderlock.gif'></td>";
} else {
if(!in_array("".$thread['id']."||".$thread['latestpost']."", explode(",",$user['threads'])) && ($thread['latestpost']+3*24*3600) >= time()) {
echo"<td id='td' style='width: 7px; background-color: #".$color.";'><img src='images/forum/foldernew.gif'></td>";
} else {
echo"<td id='td' style='width: 7px; background-color: #".$color.";'><img src='images/forum/folder.gif'></td>";
}
}
echo"
<td id='td' style='width: 170px; background-color: #".$color.";'><img src='images/forum/stickythread2.gif' style='vertical-align:-3px;' /> <b><a href='?action=thread&id=".$thread['id']."'>".$thread['subject']."</a></b><br/><a href='profile?user=".$thread['author']."'>".$thread['author']."</a></td>
<td id='td' style='width: 40px; background-color: #".$color.";'>".$thread['views']."</td>
<td id='td' style='width: 40px; background-color: #".$color.";'>".$thread['posts']."</td>
<td id='td' style='width: 140px; background-color: #".$color.";'><a href='profile?user=".$thread['lastpostby']."'>".$thread['lastpostby']."</a><br/><span style='color: #999999;'>".$thread['latestpostdate']."</span></td>
</tr>";

}
















$query = mysql_query("SELECT * FROM threads WHERE forum_id = '".$forum['id']."' && sticky != 1 ORDER BY latestpost DESC LIMIT $set_limit, $limit");
while($thread = mysql_fetch_array($query))
{

if(!isset($color)) {
$color = "D9D9D9";
} else {
if($color == "D9D9D9") {
$color = "none";
} else {
$color = "D9D9D9";
}
}

echo"<tr>";

if($thread['locked'] > 0) {
echo"<td id='td' style='width: 7px; background-color: #".$color.";'><img src='images/forum/folderlock.gif'></td>";
} else {
if(!in_array("".$thread['id']."||".$thread['latestpost']."", explode(",",$user['threads'])) && ($thread['latestpost']+3*24*3600) >= time()) {
echo"<td id='td' style='width: 7px; background-color: #".$color.";'><img src='images/forum/foldernew.gif'></td>";
} else {
echo"<td id='td' style='width: 7px; background-color: #".$color.";'><img src='images/forum/folder.gif'></td>";
}
}
echo"
<td id='td' style='width: 170px; background-color: #".$color.";'><b><a href='?action=thread&id=".$thread['id']."'>".$thread['subject']."</a></b><br/><a href='profile?user=".$thread['author']."'>".$thread['author']."</a></td>
<td id='td' style='width: 40px; background-color: #".$color.";'>".$thread['views']."</td>
<td id='td' style='width: 40px; background-color: #".$color.";'>".$thread['posts']."</td>
<td id='td' style='width: 140px; background-color: #".$color.";'><a href='profile?user=".$thread['lastpostby']."'>".$thread['lastpostby']."</a><br/><span style='color: #999999;'>".$thread['latestpostdate']."</span></td>
</tr>";

}

echo"</table><br/><text style='float:left;'>";
echo"<b><text class='nou'><span style='font-size: 11px; float:left;'><a href='?action=create_thread&forum_id=".$forum['id']."' style='color: #3D3D3D;'>Ny tr&#229;d</a></span></text></b><br/><br/>";
echo"</text>";


echo"<text style='float:right;'>Side: ";

$number1=$page-3;
$number2=$page-2;
$number3=$page-1;
$number4=$page;


$prev_page = $page - 1;  

if($prev_page >= 1) {  

     if($number1 == 1 || $number2 == 1 || $number3 == 1 || $number4 == 1) {
   
   } else { echo"<a href='?action=forum&id=".$_GET['id']."&page=1'>1</a> ... "; }
}  

for($a = 1; $a <= $total_pages; $a++)  
{  
$number1=$page-1;
$number2=$page-2;
$number3=$page+1;
$number4=$page+2;
$number5=$page-3;
$number6=$page+3;


if($a == $number1 || $a == $number2 || $a == $number3 || $a == $number4 || $a == $page || $a == $number5 || $a == $number6 ) {
   if($a == $page) {  
      echo("<b>$a</b> "); //no link  
     } else {  
  echo("<a href='?action=forum&id=".$_GET['id']."&page=$a'>$a</a> ");  
     }  }
}  

$number1=$page+3;
$number2=$page+2;
$number3=$page+1;
$number4=$page;

$next_page = $page + 1;  
if($next_page <= $total_pages) {  
   if($number1 == $total_pages || $number2 == $total_pages || $number3 == $total_pages || $number4 == $total_pages) {
   
   } else { echo"... <a href='?action=forum&id=".$_GET['id']."&page=$total_pages'>$total_pages</a>"; }

} 
echo"</text>";


pagebot($settings['footer']);

} else {
include("forum_inc/forumlist.php");
}

?>