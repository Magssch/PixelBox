<?php

/*
Halloween historien for 2009: Brukerene m&#229; hjelpe til &#229; avsl&#248;re BotaX sin hemmelige identitet -
dette gj&#248;res ved &#229; stokke om p&#229; ett ord (weur aobxt ud bto?) og poste det her for &#229; f&#229; svaret.
*/

include"main.php";
database_con();

if($settings['maintenance'] == "yes" && $user['level'] != "4") {
die("<meta http-equiv='refresh' content='0; url=maintenance.php'>"); } 

pagetop("Halloween");
include"includes/subheader.php";
pagemid();

if(isset($_POST['halloween'])) {
if(strtolower($_POST['halloween']) == "botax er du wubot?") {
mysql_query("UPDATE usersystem SET halloween='yes' WHERE username='".$_POST['username']."'");
echo"<b>Ja jeg er er wubot</b><br/><br/>";
} else {
echo"Feil svar!<br/><br/>";
}
}
echo"<form method='post'><b>Tror du at du har l&#248;sningen p&#229; BotaX sin g&#229;te? Skriv inn her!</b>";
echo"<br/><input type='text' id='textinput' name='halloween'><br/><br/><input type='submit' value='Send til BotaX' id='button'></form>";

pagebot($settings['footer']);
?>