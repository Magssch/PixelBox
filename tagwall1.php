<?php
// http://www.webmasterforums.com/databases-mysql-sql-oracle-access-others/1740-mysql-php-limit-number-results-per.html
include_once"main.php";

/*
if($_GET['page'] == "h") {
die("&#198;sj, du fant den! Her er koden til modul 1: <b>module.swap(happy)</b>");
}
*/

if(isset($user['name'])) {

pagetop("".$settings['site_name']." tagwall");
include"includes/subheader.php";
pagemid();

if(isset($user['name']) && ($user['password'])) {


// <-------------------------------------------------------------->

if($user['chat_ban'] >= 1) {

echo"Du har chatban og kan derfor ikke poste i tagwallen.";
pagebreak();

} else {


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
  if(isstr(strtolower(removespace($settings['bot_name'])), strtolower(removespace($message)))) {
  include"includes/questions.php";

  } elseif(isstr(strtolower(removespace($settings['second_bot_name'])), strtolower(removespace($message)))) {
  include"includes/second_questions.php";

  } else {
  include"includes/questions.php";

  }
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

if(isset($_POST['drop']) && is_numeric($_POST['drop']) && strlen($_POST['drop']) < 3 && $_POST['drop'] <= 99) {

if($_POST['drop'] <= 0) {
if($user['level'] > 3 && $user['rights'] == "admin") {
$ok=true;
}
} else {

$k=str_split($_POST['drop']);
if($k[0] != 0) {

$ok=true;
}
}
if($ok) {

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
 
 $remove = remove("+", remove(".", $_POST['drop']));
 
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

}



// <-------------------------------------------------------------->


$mycode = randomtext("aA1", 10);

$_SESSION['tagwallcode'] = $mycode;



$my_row_code = randomtext("aA1", 10);

$_SESSION['dropcode'] = $my_row_code;


if(isset($_GET['report_post']) && ($_GET['id']) && ($user['name'])) {

mysql_query("UPDATE guestbook SET status = 'reported' WHERE id='".$_GET['id']."'");

mysql_query("UPDATE guestbook SET reportedby = '".$user['name']."' WHERE id='".$_GET['id']."'");

echo"Posten er rapportert!<br/><br/>";

}

if($user['level'] > 3 && ($user['rights'] == "mod" || $user['rights'] == "admin" || $user['rights'] == "global" || $user['rights'] == "forumglobal")) {

if(isset($_GET['delete_post']) && ($_GET['id'])) {

mysql_query("DELETE FROM guestbook WHERE id = '".$_GET['id']."'");

echo"Posten er slettet!<br/><br/>";
}
}

if(isset($_GET['action']) && ($_GET['id']) && ($user['name']) && $_GET['action'] == "catch") {

$result = mysql_query("SELECT * FROM guestbook WHERE id = '".$_GET['id']."' AND type = 'credits' AND status = ''");
 
if(mysql_num_rows($result) > 0) {
 
$row = mysql_fetch_array($result);

if($row['name'] != $user['name']) {

$do=rand(1,10);

if($do < 9) {

$x=$user['credits'];
$vari3 = $x+$row['message'];

mysql_query("UPDATE guestbook SET status = 'catched' WHERE id = '".$_GET['id']."' AND type = 'credits'");

mysql_query("UPDATE guestbook SET reportedby = '".$user['name']."' WHERE id = '".$_GET['id']."' AND type = 'credits'");

mysql_query("UPDATE usersystem SET credits = '".$vari3."' WHERE username = '".$user['name']."'");

echo"Du har plukket opp <b>".$row['message']."</b> mynt!<br/><br/>";
} else {

$randomq[] = "Heisann! Du fumlet med myntene s&#229; de datt og ble borte, bedre lykke neste gang!";

$randomq[] = "Oi, du plukker opp men ser at det er falske mynter. Du vil ikke bli sett med disse, så du kaster dem bort.";

$randomq[] = "Du plukker opp myntene, men i neste øyeblikk er de stjålet av en mystisk tyv...";

$randomq[] = "Du f&#229;r ikke myntene l&#248;s, de er tydeligvis limt fast for moro skyld.";

$choose = rand(0,count($randomq)-1);
$j=$randomq[$choose];

mysql_query("UPDATE guestbook SET status = 'dropped' WHERE id = '".$_GET['id']."' AND type = 'credits'");

mysql_query("UPDATE guestbook SET reportedby = '".$user['name']."' WHERE id = '".$_GET['id']."' AND type = 'credits'");

echo"".$j."<br/><br/>";
}
} else {
echo"Du kan ikke plukke opp myntene du droppet!<br/><br/>";
}
unset($row);

}
}



echo"<a href='?ajax'><b>Dynamisk tagwall &#187;</b></a><br/><br/>";

$lol=mysql_query("SELECT * FROM guestbook ORDER BY id DESC LIMIT 1");
$tek = mysql_fetch_array($lol);

$lol2=mysql_query("SELECT * FROM guestbook WHERE id != ".$tek['id']." ORDER BY id DESC LIMIT 1");
$tek2 = mysql_fetch_array($lol2);

$lol3=mysql_query("SELECT * FROM guestbook WHERE id != ".$tek2['id']." AND id != ".$tek['id']." ORDER BY id DESC LIMIT 1");
$tek3 = mysql_fetch_array($lol3);

if($tek['name'] == $user['name'] && $tek2['name'] == $user['name'] && $tek3['name'] == $user['name']) {
echo"<b>Du kan ikke poste mer enn 3 ganger p&aring; rad...</b>";
} else {
 echo "
<form method='post' name='tagwall_form'>
<input type='hidden' name='name' value='".$user['name']."'>
<input type='hidden' name='code' value='".$mycode."'>
<input type='hidden' name='drop_code' value='".$my_row_code."'>
<input type='hidden' name='type' value='message'>
";



echo"
<textarea style='height: 140px; width: 400px;  
  font-family: Verdana;
  font-size: 11px;
  font-weight: normal;
  color: #000000;
' name='message' cols='40' rows='15' id='textinput'></textarea>
<br/>"; 

showcodes("message", "tagwall_form");
echo"<br/><br/><b>Dropp mynt:</b><br/><input type='text' name='drop' id='textinput' maxlength='2'>";
echo "<br/><br/><input type='submit' id='button' value='Post melding' /><br/>
";

}

pagebreak();
}
} else {

echo"Du m&#229; logge inn for &#229; poste i tagwallen.";
 pagebreak();

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

if($row['name'] == $settings['bot_name'] || $row['name'] == $settings['second_bot_name']) {
$h="b";
} else {
$h="";
}

 if($row['type'] == "music") {

 echo"<div id='tagcontainer'><div id='tagtop".$h."'><div id='text'><br/>"; 
      echo $row['name'].' har postet ett lydspor.';


  echo"</div></div>
  <div id='tagmid".$h."'><div id='text'><br/><br/>";
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
   echo"Postet: <b>".$row['date']."</b>";


   
   if($user['level'] > 3 && ($user['rights'] == "admin" || $user['rights'] == "mod" || $user['rights'] == "global")) {
   
   echo"<br/><br/><a href='tagwall?delete_post=true&id=".$row['id']."'>Slett</a>";
}
   
  echo"</div></div>
   <div id='tagbot".$h."'>";
   echo"</div></div>
 ";
 
 } elseif($row['type'] == "credits") {
 
  echo"<div id='tagcontainer'><div id='tagtopg'><div id='text'><br/>".$row['name']." har droppet mynt."; 
  echo"</div></div>
  <div id='tagmidg'><div id='text'><br/>";
  if($row['status'] == "catched") {
  if($row['message'] > 1) {
echo"<br><b style='font-size: 12px;'>".$row['reportedby']." plukket opp de ".$row['message']." myntene!</b><br/>";
} else { echo"<br/><b style='font-size: 12px;'>".$row['reportedby']." plukket opp ".$row['message']." mynt!</b><br/>"; }
 } elseif($row['status'] == "dropped") {
  
  if($row['message'] > 1) {
echo"<br/><b style='font-size: 12px;'>".$row['reportedby']." mistet de ".$row['message']." myntene!</b><br/>";
} else { echo"<br/><b style='font-size: 12px;'>".$row['reportedby']." mistet ".$row['message']." mynt!</b><br/>"; }  
  
  } else {
  if(isset($user['name'])) {
  if($row['name'] != $user['name']) {
echo"<br/><a href='?action=catch&id=".$row['id']."'><b style='font-size: 13px;'>Plukk opp ".$row['message']." mynt!</b></a><br/>";
} else { echo"<br/><b style='font-size: 12px;'>Du droppet ".$row['message']." mynt.</b><br/>"; } } else {
echo"<br/><b style='font-size: 12px;'>Du m&#229; v&#230;re innlogget for &#229; plukke opp mynter.</b><br/>";
} }
   if($user['level'] > 3 && ($user['rights'] == "admin" || $user['rights'] == "mod" || $user['rights'] == "global")) {
echo"<img src='images/toolbar_03.gif' style='float:right; margin-top: -27px; margin-right: +8px;' /> ";
} else {
echo"<img src='images/toolbar_03.gif' style='float:right; margin-top: -27px; margin-right: +8px;' /> ";
}
     


echo"<br/>";

   /*
   if($user['level'] > 3 && ($user['rights'] == "admin" || $user['rights'] == "mod" || $user['rights'] == "global")) {
   
   echo"<br/><a href='tagwall?delete_post=true&id=".$row['id']."'>Slett</a>";
   
   }
   */
  echo"</div></div>
   <div id='tagbotg'>";
   echo"</div></div>
 ";
 }
  else {
 echo"
<div id='tagcontainer'><div id='tagtop".$h."'><div id='text'><br/>"; 
 
$myuser = mysql_fetch_array(mysql_query("SELECT * FROM usersystem WHERE username = '".$row['name']."'"));

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
  <div id='tagmid".$h."'><div id='text'><br/><br/>";

if($row['type'] != "voucher") {

   echo strcodes($row['message'])."<br/><br/>"; if($row['name'] == $settings['bot_name']) { echo"<div style='float:right; margin-top: -20px;'><img src='uploads/gfx/BOT.gif' onmouseover=\"this.style.opacity=1;\" onmouseout=\"this.style.opacity=0.6;\" border=\"0\" style='opacity:0.6;margin-bottom:3px;'><img src='images/invisible.gif' style='background: url(http://www.habbo.no/habbo-imaging/avatarimage?user=".$settings['bot_habbo']."&action=crr=3&direction=3&head_direction=3&gesture=sml&size=b); width: 70px; height: 60px;'></div>
"; }
   elseif($row['name'] == $settings['second_bot_name']) { echo"<div style='float:right; margin-top: -20px;''><img src='uploads/gfx/BOT.gif' onmouseover=\"this.style.opacity=1;\" onmouseout=\"this.style.opacity=0.6;\" border=\"0\" style='opacity:0.6;margin-bottom:3px;'><img src='images/invisible.gif' style='background: url(http://www.habbo.no/habbo-imaging/avatarimage?user=".$settings['second_bot_habbo']."&action=crr=3&direction=3&head_direction=3&gesture=sml&size=b); width: 70px; height: 60px;'></div>"; }
   else { 
   

   echo"<div style='float:right; margin-top: -19px;'>"; 
   if(!empty($myuser['favourite_badge'])) {

$go = mysql_query("SELECT * FROM badges WHERE code = '".$myuser['favourite_badge']."'");
$get = mysql_fetch_array($go);

echo"<img src=\"".$get['image']."\" onmouseover=\"this.style.opacity=1;\" onmouseout=\"this.style.opacity=0.6;\" border=\"0\" style='opacity:0.6;margin-bottom:3px;'>"; 
} 
   echo"<img src='images/invisible.gif' style='background: url(http://www.habbo.no/habbo-imaging/avatarimage?user=".$myuser['habboname']."&action=std&direction=3&head_direction=3&gesture=".$myuser['head']."&size=b); width: 70px; height: 60px;'></div>";

    
    } 
    } else {
      if(empty($row['reportedby'])) {
   echo strcodes($row['message'])."<br/><br/>";
   } else {
   echo "Myntkoden ble tatt av <b>".$row['reportedby']."</b>.<br/><br/>";
   }
 if($row['name'] == $settings['bot_name']) { echo"<div style='float:right; margin-top: -20px;''><img src='uploads/gfx/BOT.gif' onmouseover=\"this.style.opacity=1;\" onmouseout=\"this.style.opacity=0.6;\" border=\"0\" style='margin-right:-3px;opacity:0.6;'><img src='images/invisible.gif' style='background: url(http://www.habbo.no/habbo-imaging/avatarimage?user=".$settings['bot_habbo']."&action=crr=3&direction=3&head_direction=3&gesture=sml&size=b); width: 70px; height: 60px;'></div>
"; }
   elseif($row['name'] == $settings['second_bot_name']) { echo"<div style='float:right; margin-top: -20px;'><img src='uploads/gfx/BOT.gif' onmouseover=\"this.style.opacity=1;\" onmouseout=\"this.style.opacity=0.6;\" border=\"0\" style='margin-right:-3px;opacity:0.6;'><img src='images/invisible.gif' style='background: url(http://www.habbo.no/habbo-imaging/avatarimage?user=".$settings['second_bot_habbo']."&action=crr=3&direction=3&head_direction=3&gesture=sml&size=b); width: 70px; height: 60px;'></div>"; }
   else { } 
    }
unset($myuser);

echo"Postet: <b>".$row['date']."</b><br/><br/>";
     
   if(isset($user['name'])) {

   echo"<a href='tagwall?report_post=true&id=".$row['id']."' onclick='return confirm(\"Er du sikker?\");'>Rapporter</a>";
   } else {
echo"Rapporter";
}
   
   if($user['level'] > 3 && ($user['rights'] == "admin" || $user['rights'] == "mod" || $user['rights'] == "global")) {
   
   echo" &#9679; <a href='tagwall?delete_post=true&id=".$row['id']."'>Slett</a>";
   
   }
   
  echo"</div></div>
   <div id='tagbot".$h."'>";
   echo"</div></div>
 ";
  }
  }


pagebreak();
echo"";
// echo"<b><< <a href='?page=h'>Den etter der</a></b> ";
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
echo"";

pagebot($settings['footer']);

} else {
echo"<meta http-equiv='refresh' content='0; url=index'>";
}



?> 