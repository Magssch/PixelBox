<?php
if(!defined("MAIN_SET")) { die(); }

if($user['rights'] == "admin" || $user['rights'] == "magazine") {




$t = mysql_query("SELECT * FROM comments WHERE type='submitment'");
$a                  = mysql_fetch_object($t);  
$total_items      = mysql_num_rows($t);  
$limit            = $_GET['limit'];  
$type             = $_GET['type'];  
$page             = $_GET['page'];

//set default if: $limit is empty, non numerical, less than 10, greater than 50  
if((!$limit)  || (is_numeric($limit) == false) || ($limit < 10) || ($limit > 50)) {  
     $limit = 7; //default  
}  

//set default if: $page is empty, non numerical, less than zero, greater than total available  
if((!$page) || (is_numeric($page) == false) || ($page < 0) || ($page > $total_items)) {  
      $page = 1; //default  
}  

//calcuate total pages  
$total_pages     = ceil($total_items / $limit);  
$set_limit          = $page * $limit - ($limit);  



$result = mysql_query("SELECT * FROM comments WHERE type='submitment' ORDER BY id DESC LIMIT $set_limit, $limit");

if(mysql_num_rows($result) != 0) {

while($row = mysql_fetch_array($result))
  {
  
 echo"<div id='tagcontainer'>
<div id='tagtop'><div id='text'><br/>"; 

 echo"<b>- <a href='profile?user=".$row['name']."'>".$row['name']."</a></b>";

  echo"</div></div>
  <div id='tagmid'><div id='text'><br/><br/><b>Kategori:</b> ".$row['page']."<br/><br/>";

echo strcodes($row['message']);



  echo"<br/><br/>";
  echo"Postet: <b>".$row['date']."</b>";
   
   if($user['level'] == "4") {
   
   echo" &#9679; <a href='adminpanel?action=comments&delete_comment=true&id=".$row['id']."'>Slett</a>";
   
   }
   
  echo"</div></div>
   <div id='tagbot'>";
   echo"</div></div>
   
 ";

  }

pagebreak();





$number1=$page-3;
$number2=$page-2;
$number3=$page-1;
$number4=$page;


$prev_page = $page - 1;  

if($prev_page >= 1) {  

  echo("<b>&#171;</b> <a href='?action=magazine_submitments&page=$prev_page'><b>Forrige</b></a> | ");  
     if($number1 == 1 || $number2 == 1 || $number3 == 1 || $number4 == 1) {
   
   } else { echo"<a href='?action=magazine_submitments&page=1'>1</a> ... "; }
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
  echo("<a href='?action=magazine_submitments&page=$a'>$a</a> ");  
     }  }
}  

$number1=$page+3;
$number2=$page+2;
$number3=$page+1;
$number4=$page;

$next_page = $page + 1;  
if($next_page <= $total_pages) {  
   if($number1 == $total_pages || $number2 == $total_pages || $number3 == $total_pages || $number4 == $total_pages) {
   
   } else { echo"... <a href='?action=magazine_submitments&page=$total_pages'>$total_pages</a>"; }
   echo(" | <a href='?action=magazine_submitments&page=$next_page'><b>Neste</a> &#187;</b>");  
}  
  }


}

?>