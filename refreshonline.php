<?php
require"main.php";

if(isset($user['name'])) {

if(strftime("%H") >= 0 && strftime("%H") <= 7) {

?>	
	<p class="welcome">Brukere i chat: <b> <?php echo"<a style='cursor:pointer;' onclick='return alert(\"Brukere i chat: ";
$result=mysql_query("SELECT * FROM `usersystem` WHERE `last_chat_active` + 50 >= ".time()."");
 while($row = mysql_fetch_array($result)) { echo $row['username']." "; } echo" \");'>";?><?php echo mysql_num_rows(mysql_query("SELECT * FROM `usersystem` WHERE `last_chat_active` + 50 >= ".time()."")); ?></b></a></p>
		<p class="logout"><a href="index"><b>Tilbake</b></a></p>
		<div style="clear:both"></div>
<?php } } ?>