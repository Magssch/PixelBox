<?php

if(!defined("MAIN_SET")) { die(); }

if($user['rights'] == "admin" || $user['rights'] == "magazine") {


if(isset($_POST['update'])) {


mysql_query("UPDATE magazine SET weekly_employ = '".$_POST['weekly_employ']."'");
mysql_query("UPDATE magazine SET weekly_discussion = '".$_POST['weekly_discussion']."'");
mysql_query("UPDATE magazine SET suggestments = '".$_POST['suggestments']."'");
mysql_query("UPDATE magazine SET weekly_tale = '".$_POST['weekly_tale']."'");
mysql_query("UPDATE magazine SET weekly_riddle = '".$_POST['weekly_riddle']."'");
mysql_query("UPDATE magazine SET weekly_habbo = '".$_POST['weekly_habbo']."'");
mysql_query("UPDATE magazine SET weekly_funny = '".$_POST['weekly_funny']."'");
mysql_query("UPDATE magazine SET weekly_motto = '".$_POST['weekly_motto']."'");
mysql_query("UPDATE magazine SET weekly_joke = '".$_POST['weekly_joke']."'");
mysql_query("UPDATE magazine SET panel = '".$_POST['panel']."'");

echo"Magazine er oppdatert!<meta http-equiv='refresh' content='1; url=adminpanel?action=magazine'><br/><br/>";

}
echo"
<form method='post' name='mag'><input type='hidden' name='update' value='yes'>
<b>Ukens ansatt:</b><br/><textarea id='textinput' name='weekly_employ' style=' width: 350px; height: 200px; '>".$magazine['weekly_employ']."</textarea>

       <br/><br/><hr/>
<b>Ukens diskusjon:</b><br/><textarea id='textinput' name='weekly_discussion' style=' width: 350px; height: 200px; '>".$magazine['weekly_discussion']."</textarea>
<br/><br/><hr/>
<b>Forslag:</b><br/><textarea id='textinput' name='suggestments' style=' width: 350px; height: 200px; '>".$magazine['suggestments']."</textarea>
<br/><br/><hr/>
<b>Ukens fortelling:</b><br/><textarea id='textinput' name='weekly_tale' style=' width: 350px; height: 200px; '>".$magazine['weekly_tale']."</textarea>
<br/><br/><hr/>
<b>Ukens g&#229;te:</b><br/><textarea id='textinput' name='weekly_riddle' style=' width: 350px; height: 200px; '>".$magazine['weekly_riddle']."</textarea>
<br/><br/><hr/>
<b>Ukens habbo:</b><br/><textarea id='textinput' name='weekly_habbo' style=' width: 350px; height: 200px; '>".$magazine['weekly_habbo']."</textarea>
<br/><br/><hr/>
<b>Ukens morsomhet:</b><br/><textarea id='textinput' name='weekly_funny' style=' width: 350px; height: 200px; '>".$magazine['weekly_funny']."</textarea>
<br/><br/><hr/>
<b>Ukens motto:</b><br/><textarea id='textinput' name='weekly_motto' style=' width: 350px; height: 200px; '>".$magazine['weekly_motto']."</textarea>
<br/><br/><hr/>
<b>Ukens vits:</b><br/><textarea id='textinput' name='weekly_joke' style=' width: 350px; height: 200px; '>".$magazine['weekly_joke']."</textarea>
<br/><br/><hr/>
<b>Magazine panel:</b><br/><textarea id='textinput' name='panel' style=' width: 350px; height: 200px; '>".$magazine['panel']."</textarea>
<br/><br/><hr/>

    <input type='submit' id='button' value='Oppdater magazine'>


<br/>";
}

?>