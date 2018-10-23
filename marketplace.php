<?php

require"main.php";

if(isset($user['name'])) {


if($_GET['action'] == "efel" && !in_array("ese5", $user['itemsx'])) {
mysql_query("UPDATE usersystem SET items = '".$user['items']."ese5,' WHERE username='".$user['name']."'");
die("Du fant p&#229;skeegg nummer 5!");
}

pagetop($settings['site_name']." Bytteplass");
include"includes/subheader.php";
pagemid();

echo"<b style='font-size: 14px;'>Bytteplass</b><br/>Her kan du bytte samleobjekter med andre brukere.<hr/>";
echo"<b><a href='?action=new'>Legg til nytt tilbud &raquo;</a></b><br/>";
echo"<b><a href='?action=my'>Vis mine tilbud &raquo;</a></b><br/>";
echo"<b><a href='marketplace'>Vis alle tilbud &raquo;</a></b><br/>";
if(in_array("es_2", $user['itemsx']) && !in_array("ese5", $user['itemsx'])) {
echo"<b><a href='?action=efel'>Vis mine egg &raquo;</a></b><br/>";
}
echo"<b><a href='?action=chat'>G&#229; til diskusjonsrom &raquo;</a></b><br/>";
echo"<hr/>";
if(isset($_GET['action']) && $_GET['action'] == "new") {

$get = mysql_num_rows(mysql_query("SELECT id FROM marketplace WHERE username = '".$user['name']."'"));

if($get <= 1) {

if(isset($_POST['furniname']) && is_numeric($_POST['price']) && $_POST['price'] > 0 && $_POST['price'] <= 999) {

if(in_array($_POST['furniname'], $user['furnix'])) {

$find = mysql_query("SELECT * FROM marketplace WHERE furniname = '".mysql_real_escape_string($_POST['furniname'])."' AND username = '".$user['name']."'");
if(mysql_num_rows($find) == 0) {

$query = mysql_query("SELECT id FROM marketplace ORDER BY id DESC LIMIT 1");
$latest = mysql_fetch_array($query);
/*
$find2 = mysql_query("SELECT * FROM furni WHERE code = '".mysql_real_escape_string($_POST['furniname'])."'");
$furni = mysql_fetch_array($find2);
if($furni['cost']-($furni['cost']/5) <= 0) {
mysql_query("UPDATE furni SET cost = '".round($furni['cost']-($furni['cost']/5))."' WHERE id = '".$furni['id']."'");
} else {
mysql_query("UPDATE furni SET cost = '".round($furni['cost']-($furni['cost']/5)+1)."' WHERE id = '".$furni['id']."'");
}
*/
mysql_query("INSERT INTO marketplace (id, username, furniname, price, date) VALUES ('".($latest['id']+1)."','".$user['name']."','".striphtml($_POST['furniname'])."','".striphtml($_POST['price'])."','".strftime("%d.%m.%Y - %H:%M")."')");

echo"Samleobjektet ble lagt ut for salg!<br/><br/>";

}
}
}
echo"<form method='post'><b>Samleobjekt:</b><br/><select name='furniname' id='textinput'>\n";

foreach($user['furnix'] as $furni)
{
$find = mysql_query("SELECT * FROM marketplace WHERE furniname = '".$furni."' AND username = '".$user['name']."'");
if(mysql_num_rows($find) == 0) {
if(!empty($furni)) {
echo"<option value='".$furni."'>".$furni."</option>\n";
}
}
}
echo"</select><br/><br/><b>Pris:</b><br/><input type='text' id='textinput' maxlength='3' style='width: 45px;' value='0' name='price'><img src='themes/".THEME."/buttons/money.gif' alt='Mynt' title='Mynt' style='vertical-align:-1px; padding-left:3px;'>
<br/><br/><input type='submit' value='Legg til' id='button'></form>";
} else {
echo"Du kan maks legge til 2 samleobjekter om gangen.";
}

} else {

if(isset($_GET['buy']) && is_numeric($_GET['buy']) && $_GET['action'] != "chat") {

$find = mysql_query("SELECT * FROM marketplace WHERE id = '".$_GET['buy']."'");
if(mysql_num_rows($find) > 0) {

$row = mysql_fetch_array($find);

if($row['username'] != $user['name']) {

if(in_array($row['furniname'], explode(",", $user['furni']))) { 
echo"Du har dette samleobjektet fra f&#248;r.<br/><br/>";
} else { 
if($user['credits'] >= $row['price']) {


 $x=$user['credits'];
 $vari3 = $x-$row['price'];

mysql_query("UPDATE usersystem SET credits = '".$vari3."' WHERE username='".$user['name']."'");

mysql_query("UPDATE usersystem SET furni = '".$user['furni']."".$row['furniname'].",' WHERE username='".$user['name']."'");

$find = mysql_query("SELECT * FROM usersystem WHERE username = '".$row['username']."'");
$newuser = mysql_fetch_array($find);


 $x=$newuser['credits'];
 $vari3 = $x+$row['price'];

mysql_query("UPDATE usersystem SET credits = '".$vari3."' WHERE username='".$newuser['username']."'");


$x=$user['points'];
$vari = $x+2;

$sql="UPDATE usersystem SET points = '".$vari."'
WHERE username = '".$user['name']."'";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

$cleantext = str_replace($row['furniname'].",", NULL, $newuser['furni']);
mysql_query("UPDATE usersystem SET furni = '".$cleantext."' WHERE username = '".$newuser['username']."'");

mysql_query("DELETE FROM marketplace WHERE id='".$row['id']."'");

 $x1=$settings['latestprivatepostid'];
 $vari1 = $x1+1;
mysql_query("UPDATE latestids SET latestprivatepostid='".$vari1."'");

$sql="INSERT INTO post (id, receiver, sender, title, message, date, status) VALUES 
('".$vari1."','".$row['username']."','".$settings['third_bot_name']."'
,'Bytteplass','Hei ".$row['username'].", [b]".$user['name']."[/b] kj&#248;pte samleobjektet [b]".$row['furniname']."[/b] av deg for [b]".$row['price']."[/b] mynt!<br/><br/>[b]- MVH. Tina/bankdirekt&#248;ren.[/b]','".strftime("%d.%m.%Y - %H:%M")."','unread')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

$x=$user['points'];
$vari = $x+3;


$sql="UPDATE usersystem SET points = '".$vari."'
WHERE username = '".$user['name']."'";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
/*
$find = mysql_query("SELECT * FROM furni WHERE code = '".$row['furniname']."'");
$row2 = mysql_fetch_array($find);
if($row2['cost']+($row2['cost']/5) >= 999) {
mysql_query("UPDATE furni SET cost = '999' WHERE id = '".$row2['id']."'");
} else {
mysql_query("UPDATE furni SET cost = '".round($row2['cost']+($row2['cost']/5))."' WHERE id = '".$row2['id']."'");
}
*/
echo"Du har kj&#248;pt <b>".$row['furniname']."</b>!<br/><br/>";
} else {

echo"Du har ikke nok mynter til &#229; kj&#248;pe dette samleobjektet.<br/><br/>";
}
}
}
}
} elseif(isset($_GET['remove']) && is_numeric($_GET['remove']) && $_GET['action'] != "chat") {




$find = mysql_query("SELECT * FROM marketplace WHERE id = '".$_GET['remove']."'");
if(mysql_num_rows($find) > 0) {
$row = mysql_fetch_array($find);

if($row['username'] == $user['name']) {
/*
$find = mysql_query("SELECT * FROM furni WHERE code = '".$row['furniname']."'");
$row2 = mysql_fetch_array($find);
if($row2['cost']+($row2['cost']/5) >= 999) {
mysql_query("UPDATE furni SET cost = '999' WHERE id = '".$row2['id']."'");
} else {
mysql_query("UPDATE furni SET cost = '".round($row2['cost']+($row2['cost']/5))."' WHERE id = '".$row2['id']."'");
}*/
mysql_query("DELETE FROM marketplace WHERE id = '".$_GET['remove']."'");

echo"Salget ble avsluttet!<br/><br/>";
}

}




}


if($_GET['action'] != "chat") {
if(isset($_POST['search'])) {

$t = mysql_query("SELECT * FROM marketplace WHERE furniname LIKE '%".striphtml($_POST['search'])."%'");


} elseif(isset($_GET['action']) && $_GET['action'] == "my") {

$t = mysql_query("SELECT * FROM marketplace WHERE username = '".$user['name']."'");

} else {

$t = mysql_query("SELECT * FROM marketplace");

}

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
}

if($_GET['action'] == "chat") {







if(isset($user['name'])) {

if($user['chat_ban'] >= 1) {

echo"Du har chatban og kan derfor ikke poste i diskusjonsrommet.";


} else {

if(isset($_GET['report_comment']) && ($_GET['comment_id'])) {

mysql_query("UPDATE comments SET status = 'reported' WHERE id='".$_GET['comment_id']."'");

mysql_query("UPDATE comments SET reportedby = '".$user['name']."' WHERE id='".$_GET['comment_id']."'");

echo"Posten er rapportert!<meta http-equiv='refresh' content='1; url=marketplace?action=chat'><br/><br/>";

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
('".$vari5."', '".$user['name']."','".nl2br($message)."','".$id."','".strftime("%d.%m.%Y - %H:%M")."','".$_SERVER['REMOTE_ADDR']."','marketplace')";
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
     


  
echo"";

 


} else {
echo"<br/>Du m&#229; skrive noe f&#248;r du poster det.<br/><br/>";
}
}
}

$mycode = randomtext("aA1", 10);

$_SESSION['tagwallcode'] = $mycode;



echo"
<form action='marketplace?action=chat' method='post' name='comment'>

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
<br/><br/><input type='submit' id='button' value='Post innlegg' /><br/>
";
}
} else {

echo"Du m&#229; logge inn for &#229; skrive i diskusjonsrommet.";

}




$t = mysql_query("SELECT * FROM comments WHERE type='marketplace'");
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



$result = mysql_query("SELECT * FROM comments WHERE type='marketplace' ORDER BY id DESC LIMIT $set_limit, $limit");

if(mysql_num_rows($result) != 0) {
pagebreak();

while($row = mysql_fetch_array($result))
  {
  
 echo"<div id='tagcontainer'>
<div id='tagtop'><div id='text'><br/>"; 

 echo"<b>- <a href='profile?user=".$row['name']."'>".$row['name']."</a></b>";

  echo"</div></div>
  <div id='tagmid'><div id='text'><br/><br/>";

echo strcodes($row['message']);



  echo"<br/><br/>";
  echo"Postet: <b>".$row['date']."</b>";
   if($user['level'] == "2" || $user['level'] == "3" || $user['level'] == "4") {
   
   echo"<br/><br/><a href='marketplace?action=chat&report_comment=true&comment_id=".$row['id']."' onclick='return confirm(\"Er du sikker?\");'>Rapporter</a>"; 
   
   }
   
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

  echo("<b>&#171;</b> <a href='?action=chat&page=$prev_page'><b>Forrige</b></a> | ");  
     if($number1 == 1 || $number2 == 1 || $number3 == 1 || $number4 == 1) {
   
   } else { echo"<a href='?action=chat&page=1'>1</a> ... "; }
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
  echo("<a href='?action=chat&page=$a'>$a</a> ");  
     }  }
}  

$number1=$page+3;
$number2=$page+2;
$number3=$page+1;
$number4=$page;

$next_page = $page + 1;  
if($next_page <= $total_pages) {  
   if($number1 == $total_pages || $number2 == $total_pages || $number3 == $total_pages || $number4 == $total_pages) {
   
   } else { echo"... <a href='?action=chat&page=$total_pages'>$total_pages</a>"; }
   echo(" | <a href='?action=chat&page=$next_page'><b>Neste</a> &#187;</b>");  
}  
  

}





} else {

if(isset($_POST['search'])) {
$query = mysql_query("SELECT * FROM marketplace WHERE furniname LIKE '%".striphtml($_POST['search'])."%' ORDER BY price LIMIT $set_limit, $limit");
} elseif(isset($_GET['action']) && $_GET['action'] == "my") {

$query = mysql_query("SELECT * FROM marketplace WHERE username = '".$user['name']."' ORDER BY price LIMIT $set_limit, $limit");

} else {

$query = mysql_query("SELECT * FROM marketplace ORDER BY price LIMIT $set_limit, $limit");

}

if(mysql_num_rows($query) > 0) {
while($db = mysql_fetch_array($query))
{
echo"<div id='tagcontainer'><div id='tagtop'><div id='text'><br/>"; 
      echo"<b>- ".$db['furniname']."</b>";


  echo"</div></div>
  <div id='tagmid'><div id='text' style='text-align:center;'><br/><br/>";

$furni = mysql_fetch_array(mysql_query("SELECT * FROM furni WHERE code = '".$db['furniname']."'"));
if(empty($furni['mimage'])) {
$mimage = $furni['image'];
$ani = "";
$ani2 = " cursor: default;";
} else { $mimage = $furni['mimage']; $ani = "<b>Trykkf&#248;lsom</b><br/>"; $ani2 = " cursor: pointer;"; }

   // echo"<img src='fancenter/tools/shop/price/".$db['price'].".gif' alt='".$db['price']."'><br/><br/>";
   
    echo"<img src='".$furni['image']."' border='0' style='".$ani2."' alt='".$furni['code']."' onMouseDown='this.src = \"".$mimage."\"; ' onMouseOut='this.src = \"".$furni['image']."\"; ' /><br/>".$furni['title']."<br/><br/>";

echo"<b>Selger:</b> <a href='profile?user=".$db['username']."'>".$db['username']."</a><br/>";
echo"".$ani."";
echo"<b>Pris:</b> ".$db['price']."<img src='themes/".THEME."/buttons/money.gif' alt='mynt' style='vertical-align:-2px; padding-left:3px;'><br/>";
echo"<b>Lagt til:</b> ".$db['date']."<br/><br/>"; 
if($db['username'] != $user['name']) {
echo"<a href='?buy=".$db['id']."' onclick='return confirm(\"Er du sikker?\");'>Kj&#248;p n&#229;!</a>";
} else { echo"<a href='?remove=".$db['id']."' onclick='return confirm(\"Er du sikker?\");'>Avbryt salg</a>"; }
  echo"</div></div>
   <div id='tagbot'>";
   echo"</div></div>
 ";
}
} else {
echo"Fant ingen samleobjekter.<br/><br/>";
}


pagebreak();


$number1=$page-3;
$number2=$page-2;
$number3=$page-1;
$number4=$page;
$number5=$page-4;
$number6=$page-5;

$prev_page = $page - 1;  

if($prev_page >= 1) {  

  echo("<b>&#171;</b> <a href='?page=$prev_page'><b>Forrige</b></a> | ");  
     if($number1 == 1 || $number2 == 1 || $number3 == 1 || $number4 == 1 || $number5 == 1 || $number6 == 1) {
   
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
$number7=$page-4;
$number8=$page+4;
$number9=$page-5;
$number10=$page+5;


if($a == $number1 || $a == $number2 || $a == $number3 || $a == $number4 || $a == $page || $a == $number5 || $a == $number6 || $a == $number7 || $a == $number8 || $a == $number9 || $a == $number10) {
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
$number5=$page+4;
$number6=$page+5;

$next_page = $page + 1;  
if($next_page <= $total_pages) {  
   if($number1 == $total_pages || $number2 == $total_pages || $number3 == $total_pages || $number4 == $total_pages || $number5 == $total_pages || $number6 == $total_pages) {
   
   } else { echo"... <a href='?page=$total_pages'>$total_pages</a>"; }
   echo(" | <a href='?page=$next_page'><b>Neste</a> &#187;</b>");  
}  
if(mysql_num_rows($query) != 0) {
echo"<br/><br/>"; } echo"
<form method='post'><b>S&#248;k: </b><input type='text' id='textinput' name='search' style='width:200px;'> <input type='submit' id='button' value='S&#248;k'>
</form>";
}

}
pagebot($settings['footer']);
} else {

echo"<meta http-equiv='refresh' content='0; url=index'>";

}
?>