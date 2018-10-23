<?php

include"main.php";

database_con();

if($settings['maintenance'] == "yes" && $user['level'] != "4") {
die("<meta http-equiv='refresh' content='0; url=maintenance.php'>"); } 

pagetop("ID Scanner");
include"includes/subheader_fancenter.php";
pagemid();
if(isset($_POST['habboname'])) {
       $id = explode('<b>', file_get_contents("http://www.habbo.no/habblet/ajax/habboid?countryId=1&paymentMethodId=2.0&habboIdName=".$_POST['habboname']));
       $id = explode('</b>', $id[1]);
       $id = trim($id[0]);
       
       $registerdate = explode('<div class="birthday date">', file_get_contents("http://www.habbo.no/home/".$_POST['habboname']));
       $registerdate = explode('</div>', $registerdate[1]);
       $registerdate = trim($registerdate[0]);

if(empty($registerdate)) {
$registerdate="Skjult";
}

	if($id) {

       echo $_POST['habboname']."s ID-kode er: <b>$id</b><br/>";
       echo $_POST['habboname']."s registreringsdato er: <b>$registerdate</b><br/><br/>";
       
       } else { echo"Habboen fins ikke.<br/><br/>"; }
}

echo"<form method='post'><b>Habbonavn:</b><br/><input type='text' value='".$_POST['habboname']."' id='textinput' name='habboname'><br/><br/><input type='submit' id='button' value='Send'><br/><br/>laget av sumodonut.";

pagebot($settings['footer']);

?>