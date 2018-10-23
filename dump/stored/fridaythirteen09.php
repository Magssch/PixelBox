<?php

/*
Fredag den 13. historien for 2009: BotaX har kommet tilbake p&#229; en visit og brukerene
m&#229; finne en kommentar han ikke liker. Etter eventen bli BotaX ansatt p&#229; fasttid.
*/

include"main.php";
database_con();

if($settings['maintenance'] == "yes" && $user['level'] != "4") {
die("<meta http-equiv='refresh' content='0; url=maintenance.php'>"); } 

pagetop("Fredag den 13...");
include"includes/subheader.php";
pagemid();

if(isset($_POST['friday'])) {
if(strtolower($_POST['friday']) == "botax er rar") {
mysql_query("UPDATE usersystem SET halloween='yes' WHERE username='".$_POST['username']."'");
echo"<b>Huff da slike kommentarer liker jeg ikke :(</b><br/><br/>";
} else {
echo"okey?<br/><br/>";
}
}
echo"<form method='post'><b>Tror du at du har kommentaren som BotaX ikke liker? Skriv inn her!</b>";
echo"<br/><input type='text' id='textinput' name='friday'><br/><br/><input type='submit' value='Send til BotaX' id='button'></form>";

pagebot($settings['footer']);
?>