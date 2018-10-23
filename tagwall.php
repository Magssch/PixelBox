<?php
// http://www.webmasterforums.com/databases-mysql-sql-oracle-access-others/1740-mysql-php-limit-number-results-per.html
include_once"main.php";

if(($user['tagwall'] == "normal" || isset($_GET['normal'])) && !isset($_GET['ajax'])) {
if(isset($user['name'])) {
mysql_query("UPDATE usersystem SET tagwall = 'normal' WHERE username = '".$user['name']."'");
}

include"tagwall1.php";

} else {

if(!isset($user['name'])) {

include"tagwall1.php";
} else {


database_con();
/*
if($_GET['page'] == "h") {
die("&#198;sj, du fant den! Her er koden til modul 1: <b>module.swap(happy)</b>");
}
*/

if(isset($user['name'])) {
mysql_query("UPDATE usersystem SET tagwall = 'ajax' WHERE username = '".$user['name']."'");
}

if(isset($user['name'])) {

pagetop("".$settings['site_name']." tagwall");
include"includes/subheader.php";
pagemid();

if(isset($user['name']) && ($user['password'])) {

if($user['chat_ban'] >= 1) {

echo"Du har chatban og kan derfor ikke poste i tagwallen.";
 pagebreak();

} else {

// <-------------------------------------------------------------->



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

if(!empty($_POST['drop']) && is_numeric($_POST['drop']) && $_POST['drop'] > 0  && strlen($_POST['drop']) < 3 && $_POST['drop'] <= 99) {

$k=str_split($_POST['drop']);

if($k[0] != 0) {

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


$mycode = randomtext("aA1", 15);

$_SESSION['tagwallcode'] = $mycode;



$my_row_code = randomtext("aA1", 15);

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



echo"<a href='?normal'><b>Normal tagwall &#187;</b></a><br/><br/>";


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
?>
<script type="text/javascript">
function Ajax(){
var xmlHttp;
	try{	
		xmlHttp=new XMLHttpRequest();// Firefox, Opera 8.0+, Safari
	}
	catch (e){
		try{
			xmlHttp=new ActiveXObject("Msxml2.XMLHTTP"); // Internet Explorer
		}
		catch (e){
		    try{
				xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch (e){
				alert("Din browser har ikke Ajax. Vi anbefaler deg &#229; laste ned FireFox :)");
				return false;
			}
		}
	}

xmlHttp.onreadystatechange=function(){
	if(xmlHttp.readyState==4){
		document.getElementById("ReloadThis").innerHTML=xmlHttp.responseText;
		setTimeout('Ajax()', 500);
	};
}
<?php
if(!empty($_GET['page']))
{
 echo "xmlHttp.open(\"GET\",\"get_tags.php?page=".$_GET['page']."\",true);
";
}
else
{
 echo "xmlHttp.open(\"GET\",\"get_tags.php\",true);
";
}
?>

xmlHttp.send(null);
}

window.onload=function(){
	setTimeout('Ajax()',100);
};
</script>
<?php

echo"<text id='ReloadThis'><br/><img src='images/loading.gif' alt='Laster inn...'><br/><br/>Dersom den ikke slutter &#229; laste, skift til Normal tagwall.</text>";

pagebot($settings['footer']);
} else {
echo"<meta http-equiv='refresh' content='0; url=index'>";
}
}
}


?> 