<?php

if (isset($_POST['message'])) {

$code = $_SESSION['tagwallcode'];

unset($_SESSION['tagwallcode']);

if($code == $_POST['code']) {

if(isset($_POST['type']) && !empty($_POST['message'])) {

 $x5=$settings['latestpostid'];
 $vari5 = $x5+1;

mysql_query("UPDATE latestids SET latestpostid='".$vari5."'"); 

$message = striphtml($_POST['message']);

$sql="INSERT INTO guestbook (id, name, message, date, ip, type) VALUES 
('".$vari5."', '".$user['name']."','".$message."','".strftime("%d.%m.%Y - %H:%M")."','".$_SERVER['REMOTE_ADDR']."','post')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
  
include"includes/questions.php";
  
 $x=$user['tagwallposts'];
 $vari = $x+1;

mysql_query("UPDATE usersystem SET tagwallposts='".$vari."' WHERE username='".$user['name']."'");

 
$x=$user['points'];
$vari = $x+1;


$sql="UPDATE usersystem SET points = '".$vari."'
WHERE username = '".$user['name']."'";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

echo"";

} else {
if(empty($_POST['drop']) && !is_numeric($_POST['drop'])) {
echo"Du m&#229; skrive noe f&#248;r du poster det.<br/><br/>";
}
}
}

if(!empty($_POST['drop']) && is_numeric($_POST['drop']) && $_POST['drop'] > 0  && strlen($_POST['drop']) < 3) {
 
$code = $_SESSION['dropcode'];

unset($_SESSION['dropcode']);

if($code == $_POST['drop_code']) {

$result = mysql_query("SELECT * FROM latestids ");
while($row = mysql_fetch_array($result))
  {
  
// latestids <----------------------------------->
$settings['latestpostid'] = $row['latestpostid'];
// latestids <----------------------------------->


}

 $x5=$settings['latestpostid'];
 $vari5 = $x5+1;
 
 if($user['credits'] >= $_POST['drop']) {
 
 $remove = remove("+", $_POST['drop']);
 
 mysql_query("UPDATE latestids SET latestpostid='".$vari5."'"); 

$message = $remove;

$sql="INSERT INTO guestbook (id, name, message, date, ip, type) VALUES 
('".$vari5."', '".$user['name']."', '".$remove."','".strftime("%d.%m.%Y - %H:%M")."','".$_SERVER['REMOTE_ADDR']."','credits')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
  
 $x=$user['credits'];
 $vari = $x-$remove;
 
  mysql_query("UPDATE usersystem SET credits='".$vari."' WHERE username = '".$user['name']."'"); 
  
  }
  }
  }

}



// <-------------------------------------------------------------->


$mycode = randomtext("aA1", 10);

$_SESSION['tagwallcode'] = $mycode;



$my_row_code = randomtext("aA1", 10);

$_SESSION['dropcode'] = $my_row_code;


if(isset($_GET['report_post']) && ($_GET['id']) && ($user['name'])) {

mysql_query("UPDATE guestbook SET status = 'reported' WHERE id='".$_GET['id']."'");

mysql_query("UPDATE guestbook SET reportedby = '".$user['name']."' WHERE id='".$_GET['id']."'");

echo"Posten er rapportert!<meta http-equiv='refresh' content='1; url=tagwall.php'><br/><br/>";

}

if(isset($_GET['action']) && ($_GET['id']) && ($user['name']) && $_GET['action'] == "catch") {

$result = mysql_query("SELECT * FROM guestbook WHERE id = '".$_GET['id']."' AND type = 'credits' AND status != 'catched'");
 
if(mysql_num_rows($result) > 0) {
 
$row = mysql_fetch_array($result);

if($row['name'] != $user['name']) {

$x=$user['credits'];
$vari3 = $x+$row['message'];

mysql_query("UPDATE guestbook SET status = 'catched' WHERE id = '".$_GET['id']."' AND type = 'credits'");

mysql_query("UPDATE guestbook SET reportedby = '".$user['name']."' WHERE id = '".$_GET['id']."' AND type = 'credits'");

mysql_query("UPDATE usersystem SET credits = '".$vari3."' WHERE username = '".$user['name']."'");

echo"Du har plukket opp <b>".$row['message']."</b> mynt!<br/><br/>";
} else {
echo"Du kan ikke plukke opp myntene du droppet!<br/><br/>";
}
unset($row);

}
}

$t = mysql_query("SELECT * FROM guestbook");
$a                  = mysql_fetch_object($t);  
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

$result = mysql_query("SELECT * FROM guestbook ORDER BY id DESC LIMIT $set_limit, $limit");
while($row = mysql_fetch_array($result))
  {
 if($row['type'] == "music") {
 echo"<div id='tagcontainer'><div id='tagtop'><div id='text'><br/>"; 
      echo $settings['bot_name'].' har postet ett lydspor.';


  echo"</div></div>
  <div id='tagmid'><div id='text'><br/><br/>";
echo"<script type='text/javascript' src='includes/swfobject.js'></script>

<div id='mediaspace'>Lydspor</div>

<script type='text/javascript'>
  var so = new SWFObject('includes/player.swf','ply','400','19','9','#000000');
  so.addParam('allowfullscreen','true');
  so.addParam('allowscriptaccess','always');
  so.addParam('wmode','opaque');
  so.addVariable('file','".$row['message']."');
  so.write('mediaspace');
</script><br/>";
   echo"Postet: <b>".$row['date']."</b><br/><br/>";

   echo"<a>Rapporter</a>";

   
   if($user['level'] > 3 && ($user['rights'] == "admin" || $user['rights'] == "mod" || $user['rights'] == "global")) {
   
   echo" &#9679; <a href='adminpanel?action=tagwall&delete_post=true&id=".$row['id']."'>Slett</a>";
}
   
  echo"</div></div>
   <div id='tagbot'>";
   echo"</div></div>
 ";
 
 } elseif($row['type'] == "credits") {
 
  echo"<div id='tagcontainer'><div id='tagtop'><div id='text'><br/>".$row['name']." har droppet mynter."; 
  echo"</div></div>
  <div id='tagmid'><div id='text'><br/><br/>";
  if($row['status'] == "catched") {
  if($row['message'] > 1) {
echo"<b>".$row['reportedby']." plukket opp de ".$row['message']." myntene!</b><br/><br/>";
} else { echo"<b>".$row['reportedby']." plukket opp ".$row['message']." mynt!</b><br/><br/>"; }
  } else {
  if(isset($user['name'])) {
  if($row['name'] != $user['name']) {
echo"<a href='?action=catch&id=".$row['id']."'><b>Plukk opp ".$row['message']." mynt!</b></a><br/><br/>";
} else { echo"<b>Du droppet ".$row['message']." mynt.</b><br/><br/>"; } } else {
echo"<b>Du m&#229; v&#230;re innlogget for &#229; plukke opp mynter.</b><br/><br/>";
} }
echo"<img src='images/toolbar_03.gif' style='float:right;' /> ";
   echo"Postet: <b>".$row['date']."</b><br/><br/>";
      

   echo"<a>Rapporter</a>";

   
   if($user['level'] > 3 && ($user['rights'] == "admin" || $user['rights'] == "mod" || $user['rights'] == "global")) {
   
   echo" &#9679; <a href='adminpanel?action=tagwall&delete_post=true&id=".$row['id']."'>Slett</a>";
   
   }
   
  echo"</div></div>
   <div id='tagbot'>";
   echo"</div></div>
 ";
 } elseif($row['type'] == "voucher") {
 echo"
<div id='tagcontainer'><div id='tagtop'><div id='text'><br/>"; 
 
$myuser = mysql_fetch_array(mysql_query("SELECT head, userlevel, habboname FROM usersystem WHERE username = '".$row['name']."'"));

 if($row['name'] == $settings['bot_name'] || $row['name'] == $settings['second_bot_name']) {
 
 echo"<b style='color: #FF0000;'>- ".$row['name']."</b>";
 // #FF3300
 } elseif($myuser['userlevel'] > 3) {
 
 echo"<b style='color: #009900'>- <a href='profile?user=".$row['name']."' style='color: #009900;'>".$row['name']."</a></b>";
 
  } elseif($myuser['userlevel'] == 3) {
 
 echo"<b style='color: #0033CC'>- <a href='profile?user=".$row['name']."' style='color: #0033CC;'>".$row['name']."</a></b>";
 
 } else {
  
echo"<b>- <a href='profile?user=".$row['name']."'>".$row['name']."</a></b>";

 }

  echo"</div></div>
  <div id='tagmid'><div id='text'><br/><br/>";

  if(empty($row['reportedby'])) {
   echo strcodes($row['message'])."<br/><br/>";
   } else {
   echo "Myntkoden ble tatt av <b>".$row['reportedby']."</b>.<br/><br/>";
   }
    if($row['name'] == $settings['bot_name']) { echo"<img src='uploads/gfx/BOT.gif' style='float:right;'><img src='".$settings['bot_image']."' style='float:right;'>
"; }
   elseif($row['name'] == $settings['second_bot_name']) { echo"<img src='uploads/gfx/BOT.gif' style='float:right;'><img src='".$settings['second_bot_image']."' style='float:right;'>"; }
   else { 
   if(!empty($myuser['head'])) {
   echo"<div style='float:right;'><img src='fancenter/tools/head/head.php?habbo=".$myuser['habboname']."&gesture=".$myuser['head']."' alt='".$myuser['habboname']."'></div>";
    } else { echo"<div style='float:right;'><img src='fancenter/tools/head/head.php?habbo=".$myuser['habboname']."&gesture=sml' alt='".$myuser['habboname']."'></div>"; }
    } 
unset($myuser);

echo"Postet: <b>".$row['date']."</b><br/><br/>";
     

   echo"<a>Rapporter</a>";
 
   
   if($user['level'] > 3 && ($user['rights'] == "admin" || $user['rights'] == "mod" || $user['rights'] == "global")) {
   
   echo" &#9679; <a href='adminpanel?action=tagwall&delete_post=true&id=".$row['id']."'>Slett</a>";
   
   }
   
  echo"</div></div>
   <div id='tagbot'>";
   echo"</div></div>
 ";
  }
  else {
 echo"
<div id='tagcontainer'><div id='tagtop'><div id='text'><br/>"; 
 
$myuser = mysql_fetch_array(mysql_query("SELECT head, habboname, userlevel FROM usersystem WHERE username = '".$row['name']."'"));

 if($row['name'] == $settings['bot_name'] || $row['name'] == $settings['second_bot_name']) {
 
 echo"<b style='color: #FF0000;'>- ".$row['name']."</b>";
 // #FF3300
 } elseif($myuser['userlevel'] > 3) {
 
 echo"<b style='color: #009900'>- <a href='profile?user=".$row['name']."' style='color: #009900;'>".$row['name']."</a></b>";
 
  } elseif($myuser['userlevel'] == 3) {
 
 echo"<b style='color: #0033CC'>- <a href='profile?user=".$row['name']."' style='color: #0033CC;'>".$row['name']."</a></b>";
 
 } else {
  
echo"<b>- <a href='profile?user=".$row['name']."'>".$row['name']."</a></b>";

 }

  echo"</div></div>
  <div id='tagmid'><div id='text'><br/><br/>";


   echo strcodes($row['message'])."<br/><br/>"; if($row['name'] == $settings['bot_name']) { echo"<img src='uploads/gfx/BOT.gif' style='float:right;'><img src='".$settings['bot_image']."' style='float:right;'>
"; }
   elseif($row['name'] == $settings['second_bot_name']) { echo"<img src='uploads/gfx/BOT.gif' style='float:right;'><img src='".$settings['second_bot_image']."' style='float:right;'>"; }
   else { 
   if(!empty($myuser['head'])) {
   echo"<div style='float:right;'><img src='fancenter/tools/head/head.php?habbo=".$myuser['habboname']."&gesture=".$myuser['head']."' alt='".$myuser['habboname']."'></div>";
    } else { echo"<div style='float:right;'><img src='fancenter/tools/head/head.php?habbo=".$myuser['habboname']."&gesture=sml' alt='".$myuser['habboname']."'></div>"; }
    } 
unset($myuser);

echo"Postet: <b>".$row['date']."</b><br/><br/>";
     
   if(isset($user['name'])) {
   if($row['name'] == $settings['bot_name'] || $row['name'] == $settings['second_bot_name']) {
    echo"<a>Rapporter</a>";

   } else { echo"<a href='tagwall?report_post=true&id=".$row['id']."'>Rapporter</a>"; }
   } else { echo"<a>Rapporter</a>"; }
   
   if($user['level'] > 3 && ($user['rights'] == "admin" || $user['rights'] == "mod" || $user['rights'] == "global")) {
   
   echo" &#9679; <a href='adminpanel?action=tagwall&delete_post=true&id=".$row['id']."'>Slett</a>";
   
   }
   
  echo"</div></div>
   <div id='tagbot'>";
   echo"</div></div>
 ";
  }
  }


pagebreak();
// echo"<b><< <a href='?page=h'>Den etter der</a></b> ";
$number1=$page-3;
$number2=$page-2;
$number3=$page-1;
$number4=$page;
$number5=$page-4;
$number6=$page-5;

$prev_page = $page - 1;  

if($prev_page >= 1) {  

  echo("<b><<</b> <a href='?page=$prev_page'><b>Forrige</b></a> | ");  
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
   echo(" | <a href='?page=$next_page'><b>Neste</a> >></b>");  
}

?>