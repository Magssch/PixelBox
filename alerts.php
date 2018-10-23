<?php
if(!defined("MAIN_SET")) { die(); }

if(isset($_POST['alert'])) {

mysql_query("UPDATE `usersystem` SET `seen_alert` = '0'");
mysql_query("UPDATE `settings` SET `alert` = '".striphtml($_POST['alert'])."'");
mysql_query("UPDATE `settings` SET `alert_date` = '".strftime("%d.%m.%Y")."'");
echo"Den nye meldingen ble sendt!<br/><br/>";
}

echo"<form method='post' action='adminpanel?action=alerts'>
<b>Melding:</b><br/><textarea id='textinput' name='alert' style=' width: 350px; height: 200px; '></textarea>
<br/><br/><input type='submit' value='Send'>
</form>
";

?>