<?php
define("HELP", true);
include"main.php";

database_con();

if(isset($user['name'])) {

pagetop($settings['site_name']." Hjelp");
include"includes/subheader.php";
pagemid();

if(isset($_POST['message']) && ($_POST['name']) && $_POST['message'] != "" && $_POST['name'] != "") {

   
 $x=$settings['messages'];
 $vari = $x+1;


mysql_query("UPDATE latestids SET messages='".$vari."'");
 

$sql="INSERT INTO messages (name, username, message, date) VALUES 
('".striphtml($_POST['name'])."', '".$user['name']."','".nl2br(striphtml($_POST['message']))."', '".strftime("%d.%m.%Y - %H:%M")."')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
  echo"Meldingen er sendt!<br/><br/>";
  }

echo "<div style='text-align: left;'>Her kan du sende ett n&oslash;danrop til staff hvis du har problemer med noe, funnet en bug eller du vil rapportere en bruker.</div><hr/>
<b>Navn p&aring; meldingen:</b><br/>
<form method='post'>
<input type='text' name='name' id='textinput'><br/><br/>
<b>Melding:</b><br/>
<textarea style='width: 400px; height: 300px;' name='message' id='textinput'></textarea><br/><br/><input type='submit' id='button' value='Send'>
";



pagebot($settings['footer']);

} else {

echo"<meta http-equiv='refresh' content='0; url=index.php'>";

}

?>