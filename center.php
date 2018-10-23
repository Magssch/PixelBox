<?php

include"main.php";

database_con();

if($settings['maintenance'] == "yes" && $user['level'] != "4") {
die("<meta http-equiv='refresh' content='0; url=maintenance.php'>"); }

if(isset($user['name']) && ($user['password'])) {

pagetop("".$settings['site_name']." banken");
include"includes/subheader.php";
pagemid();
// if($user['level'] > 3) {

oB_start();
switch($_GET['action']) {

default:
echo"Velkommen til ".$settings['site_name']." sin offisielle Bank!<br/>
Jeg heter <b>".$settings['third_bot_name']."</b> og jeg er direkt&#248;ren her.<br/></b>Du har <b>".$user['points']."</b> Poeng og <b>".$user['credits']."</b> Mynter.<br/>
<br/><b><a href='center?action=games'>Spill &#187; </a></b>
<br/><br/><b><a href='center?action=voucher'>L&#248;s inn myntkode &#187; </a></b>
<br/><br/><b><a href='shop'>Shoppingsenter &#187; </a></b>";
echo"<br/><br/><b><a href='center?action=send'>Overf&#248;ring &#187; </a></b>";

echo"<br/><br/><b><a href='center?action=credits'>Konvertering &#187; </a></b><br/>"; 


echo"<br/><img src='http://www.habbo.no/habbo-imaging/avatarimage?user=".$settings['third_bot_habbo']."&action=crr=3&direction=2&head_direction=1&gesture=srp&size=b' style='vertical-align:top;'><img src='images/rich_credits.gif'>";
break;

case("credits");
if(isset($_POST['amount']) && is_numeric($_POST['amount']) && $_POST['amount'] > 1) {
if($user['points'] >= $_POST['amount']) {


 $x=$user['points'];
 $vari3 = $x-$_POST['amount'];

mysql_query("UPDATE usersystem SET points = '".$vari3."' WHERE username='".$user['name']."'");

 $y = $_POST['amount']/2;
 $do = round($y);

 $x=$user['credits'];
 $vari3 = $x+$do;

mysql_query("UPDATE usersystem SET credits = '".$vari3."' WHERE username='".$user['name']."'");


echo"Du har konvertert ".$_POST['amount']." poeng til ".$do." mynt!<br/><br/>";

} else {
echo"Du har ikke nok poeng til &#229; fullf&#248;re denne transaksjonen!<br/><br/>";
}
}
echo"<div style='text-align: left;'>Her kan du konvertere poengene dine til mynter. Du f&#229;r kun halvparten s&#229; mange mynt av poengene du konverterer og du kan ikke konvertere tilbake.
</div><hr/>
<form method='post' action='center?action=credits'>
<b>Mengde:</b><br/><input type='text' name='amount' id='textinput'><br/><br/><input type='submit' value='Konverter' id='button'></form>";

break;

case("games");
if($_GET['name'] == "dice") {

if(isset($_POST['dice_number'])) {

if($user['credits'] >= "5") {





	$randomq[] = "1";
	$randomq[] = "2";
	$randomq[] = "3";
	$randomq[] = "4";
	$randomq[] = "5";
	$randomq[] = "6";




srand ((double) microtime() * 1000000);
$choose = rand(0,count($randomq)-1);

$output = $randomq[$choose];

echo"Nummeret ble... <b>".$output."</b>!<br/>
";

if($output == $_POST['dice_number']) {

 $x=$user['credits'];
 $vari3 = $x+30;


mysql_query("UPDATE usersystem SET credits = '".$vari3."' WHERE username='".$user['name']."'");

mysql_query("UPDATE usersystem SET dice_wins = '".($user['dice_wins']+1)."' WHERE username='".$user['name']."'");
$x=$row['points'];
$vari = $x+3;

mysql_query("UPDATE usersystem SET points = '".$vari."'
WHERE username = '".$row['username']."'");

echo"<span style='color: gold;'><b>Gratulerer du vant!</b></span><br/><img src='http://www.habbo.no/habbo-imaging/avatarimage?user=".$user['habbo']."&action=wav&direction=3&head_direction=3&gesture=sml&size=b'>
<br/><br/><a href='center.php?action=games&name=dice'>Spille igjen?</a>";

} else {

 $x=$user['credits'];
 $vari3 = $x-5;

mysql_query("UPDATE usersystem SET credits = '".$vari3."' WHERE username='".$user['name']."'");

echo"<span style='color: red;'><b>Sorry du tapte.</b></span><br/><img src='http://www.habbo.no/habbo-imaging/avatarimage?user=".$user['habbo']."&action=std&direction=3&head_direction=3&gesture=sad&size=b'>
<br/><br/><a href='center.php?action=games&name=dice'>Spille igjen?</a>";

}


} else {


}

} else {


echo"<div style='text-align: left;'>Terningkast g&#229;r ut p&#229; at du skal satse ett nummer. Vinner du - f&#229;r du 30 mynt, taper du - mister du 5 mynter.</div><hr/><br/><form method='post' action='center.php?action=games&name=dice'>
<b>Ditt nummer:</b><br/><select id='textinput' name='dice_number'>
<option value='1'>1</option>
<option value='2'>2</option>
<option value='3'>3</option>
<option value='4'>4</option>
<option value='5'>5</option>
<option value='6'>6</option>
</select><br/><br/><input type='submit' id='button' value='Kast'>";

echo"<br/><br/><b>Highscore:</b><br/><table cellpadding='5' cellspacing='0' border='0'>";
$i = 1;
$query = mysql_query("SELECT * FROM usersystem ORDER BY dice_wins DESC LIMIT 5");
while($hiscore = mysql_fetch_array($query))
{

if(!isset($color2)) {
$color2 = "D9D9D9";
} else {
if($color2 == "D9D9D9") {
$color2 = "none";
} else {
$color2 = "D9D9D9";
}

}

echo"<tr><td id='td' style=' background-color: #".$color2.";'>$i. ".$hiscore['username']."</td><td id='td' style=' background-color: #".$color2.";'>Vunnet <b>".$hiscore['dice_wins']."</b> ganger.</td></tr>";
$i++;
}
echo"</table>";
}

} elseif($_GET['name'] == "wheel") {


if(isset($_POST['wheel_color'])) {

if($user['credits'] >= "10") {


	$randomq[] = "red";
	$randomq[] = "orange";
	$randomq[] = "green";
	$randomq[] = "yellow";
	$randomq[] = "purple";
	$randomq[] = "red";
	$randomq[] = "orange";
	$randomq[] = "green";
	$randomq[] = "yellow";
	$randomq[] = "purple";




srand ((double) microtime() * 1000000);
$choose = rand(0,count($randomq)-1);

$output = $randomq[$choose];

	$search = array("red", "green", "orange", "yellow", "purple");
	$replace = array("r&#248;d", "gr&#248;nn", "oransje", "gul", "lilla");
	$text = str_replace($search, $replace, $output);


echo"Fargen ble... <span style='color: ".$output.";'><b>".$text."</b></span>!<br/>
";

if($output == $_POST['wheel_color']) {

 $x=$user['credits'];
 $vari3 = $x+50;


mysql_query("UPDATE usersystem SET credits = '".$vari3."' WHERE username='".$user['name']."'");

mysql_query("UPDATE usersystem SET wheel_wins = '".($user['wheel_wins']+1)."' WHERE username='".$user['name']."'");
$x=$row['points'];
$vari = $x+3;

mysql_query("UPDATE usersystem SET points = '".$vari."'
WHERE username = '".$row['username']."'");


echo"<span style='color: gold;'><b>Gratulerer du vant!</b></span><br/><img src='http://www.habbo.no/habbo-imaging/avatarimage?user=".$user['habbo']."&action=wav&direction=3&head_direction=3&gesture=sml&size=b'>
<br/><br/><a href='center.php?action=games&name=wheel'>Spille igjen?</a>";

} else {

 $x=$user['credits'];
 $vari3 = $x-10;

mysql_query("UPDATE usersystem SET credits = '".$vari3."' WHERE username='".$user['name']."'");

echo"<span style='color: red;'><b>Sorry du tapte.</b></span><br/><img src='http://www.habbo.no/habbo-imaging/avatarimage?user=".$user['habbo']."&action=std&direction=3&head_direction=3&gesture=sad&size=b'>
<br/><br/><a href='center.php?action=games&name=wheel'>Spille igjen?</a>";

}

} else {
}
} else {

echo"<div style='text-align: left;'>Lykkehjul g&#229;r ut p&#229; at du skal velge en farge. Vinner du - f&#229;r du 50 mynt, taper du - mister du 10 mynt.</div>
<hr/>
<br/><form method='post' action='center.php?action=games&name=wheel'>
<b>Din farge:</b><br/><select id='textinput' name='wheel_color'>
<option value='yellow' style='color: yellow;'>Gul</option>
<option value='orange' style='color: orange;'>Oransje</option>
<option value='red' style='color: red;'>R&#248;d</option>
<option value='purple' style='color: purple;'>Lilla</option>
<option value='green' style='color: green;'>Gr&#248;nn</option>
</select><br/><br/><input type='submit' id='button' value='Spin' >";


echo"<br/><br/><b>Highscore:</b><br/><table cellpadding='5' cellspacing='0' border='0'>";
$i = 1;
$query = mysql_query("SELECT * FROM usersystem ORDER BY wheel_wins DESC LIMIT 5");
while($hiscore = mysql_fetch_array($query))
{

if(!isset($color2)) {
$color2 = "D9D9D9";
} else {
if($color2 == "D9D9D9") {
$color2 = "none";
} else {
$color2 = "D9D9D9";
}

}

echo"<tr><td id='td' style=' background-color: #".$color2.";'>$i. ".$hiscore['username']."</td><td id='td' style=' background-color: #".$color2.";'>Vunnet <b>".$hiscore['wheel_wins']."</b> ganger.</td></tr>";
$i++;
}
echo"</table>";

}


} elseif($_GET['name'] == "battleships") {

if($user['level'] > 3) {
include"includes/battleships2.php";
} else {
echo"Battleships undergår en stor oppdatering og er derfor stengt inntil videre.";
}
} else {
?>
<b><a href='center?action=games&name=dice'><img src='uploads/img/terningkast.png'
   onMouseOver='this.src = "uploads/img/terningkast_light.png"; ' onMouseOut='this.src = "uploads/img/terningkast.png"; ' border='0' alt='Terningkast'></a></b>
<br/><br/><b><a href='center?action=games&name=wheel'><img src='uploads/img/lykkehjul.png'
   onMouseOver='this.src = "uploads/img/lykkehjul_light.png"; ' onMouseOut='this.src = "uploads/img/lykkehjul.png"; ' border='0' alt='Lykkehjul'></a></b>
<br/><br/><br/><b><a href='center?action=games&name=battleships'><img src='images/battleshipsreloaded.gif'
   onMouseOver='this.src = "images/battleshipsreloaded_light.gif"; ' onMouseOut='this.src = "images/battleshipsreloaded.gif"; ' border='0' alt='Battleships Reloaded'></a></b>

<?php
}
break;

case("voucher");


if(isset($_POST['voucher'])) {

if($_POST['voucher'] != "") {

$result = mysql_query("SELECT * FROM vouchers WHERE code='".mysql_real_escape_string($_POST['voucher'])."' LIMIT 1");

if(mysql_num_rows($result) > 0) {

while($row = mysql_fetch_array($result))
  {
  $value=$row['value'];
  $code=$row['code'];
  $type=$row['type'];
  }

$x=$user['credits'];
$vari = $x+$value;


$sql="UPDATE usersystem SET credits = '".$vari."' WHERE username = '".$user['name']."'";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
  
$sql="UPDATE guestbook SET reportedby = '".$user['name']."' WHERE status = '".$code."'";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

mysql_query("DELETE FROM vouchers WHERE code='".$code."' AND value='".$value."'");


  echo"Du har f&#229;tt <b>".$value."</b> mynter!<br/><br/>";



  } else {

echo"Feil myntkode.<br/><br/>";

}


}
}
echo"<form method='post'>
<b>L&#248;s inn myntkode:</b><br/><input type='text' id='textinput' name='voucher' maxlength='10' style=' width: 300px; '>
<input type='submit' id='button' value='Send'>
";


break;





case("send");
if(isset($_POST['amount']) && is_numeric($_POST['amount']) && $_POST['amount'] > 0) {
if($user['credits'] >= $_POST['amount']) {


 $x=$user['credits'];
 $vari3 = $x-$_POST['amount'];

mysql_query("UPDATE usersystem SET credits = '".$vari3."' WHERE username='".$user['name']."'");


$result = mysql_query("SELECT credits FROM usersystem WHERE username='".mysql_real_escape_string($_POST['receiver'])."'");
$row = mysql_fetch_array($result);
  
 $x=$row['credits'];
 $vari3 = $x+$_POST['amount'];

mysql_query("UPDATE usersystem SET credits = '".$vari3."' WHERE username='".mysql_real_escape_string($_POST['receiver'])."'");

unset($row);


 $x1=$settings['latestprivatepostid'];
 $vari1 = $x1+1;
mysql_query("UPDATE latestids SET latestprivatepostid='".$vari1."'");

$sql="INSERT INTO post (id, receiver, sender, title, message, date, status) VALUES 
('".$vari1."','".$_POST['receiver']."','".$settings['third_bot_name']."'
,'".$user['name']." har sendt mynt!','Hei ".$_POST['receiver'].", [b]".$user['name']."[/b] har overf&#248;rt [b]".$_POST['amount']."[/b] mynt til deg!

<br/><br/>[b]- MVH. Tina/bankdirekt&#248;ren.[/b]','".strftime("%d.%m.%Y - %H:%M")."','unread')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

echo"Du har overf&#248;rt <b>".$_POST['amount']."</b> mynt til <b>".$_POST['receiver']."</b>!<br/><br/>";
} else {
echo"Du har ikke s&#229; mange mynt!<br/><br/>";
}
}
echo"<div style='text-align: left;'>Her kan du overf&#248;re mynt til en annen bruker.</div>
<hr/><form method='post' action='center?action=send'><br/><b>Mottaker:</b><br/><table><select name='receiver' id='textinput' style='font-size: 10px; width: 200px;'>
";
$result = mysql_query("SELECT username FROM usersystem ORDER BY username");
while($row = mysql_fetch_array($result))
  { 
  if($row['username'] != $user['name']){
  echo"<option value='".$row['username']."' id='textinput' style='font-size: 10px;'>".$row['username']."</option>";
  }
  }
echo"</select></table><br/>
<b>Mengde:</b><br/><input type='text' name='amount' id='textinput'><br/><br/><input type='submit' value='Send' id='button'></form>";

break;


}
/*
} else {
echo"Banken er midlertidig stengt for oppussing.";
}
*/
pagebot($settings['footer']);

} else {

echo"<meta http-equiv='refresh' content='0; url=index.php'>";

}

?>