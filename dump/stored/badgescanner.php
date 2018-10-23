<?php

if(file_exists("../../main.php")) {
include"../../main.php"; } else {
include"main.php";
}


database_con();

if($settings['maintenance'] == "yes" && $user['level'] != "4") {
die("<meta http-equiv='refresh' content='0; url=maintenance.php'>"); } 

pagetop("Badge Scanner");
// if(file_exists("../../includes/subheader.php")) {
include"../../includes/subheader.php"; // } else {
/* include"includes/subheader.php";
} */

pagemid();
if(isset($_POST['habboname'])) {

       $badges = explode('<b>', file_get_contents("http://www.habbo.no/habblet/ajax/habboid?countryId=1&paymentMethodId=2.0&habboIdName=".$_POST['habboname'].""));
       $badges = explode('</b>', $badges[1]);
       $badges = trim($badges[0]);
       $bad_entities = array(' ');
       $safe_entities = array('');
       $badgesto = str_replace($bad_entities, $safe_entities, $badges);
  
       $badgeste = explode('<input type="hidden" id="badgeListTotalPages" value="', 
       file_get_contents("http://www.habbo.no/myhabbo/badgelist/badgepaging?pageNumber=1&widgetId=30&_mypage.requested.account=".$badgesto.""));
       $badgeste = explode('"/>', $badgeste[1]);
       $badgeste = trim($badgeste[0]);
       $te = $badgeste;
       
       if($te) {
       $te=$te;
       } else {
       $te=1;
       }
  if($badgesto) {
         $i=1;
while($i<=$te)
  {
       $badges = explode('<ul class="clearfix">', file_get_contents("http://www.habbo.no/myhabbo/badgelist/badgepaging?pageNumber=".$i."&widgetId=30&_mypage.requested.account=".$badgesto.""));
       $badges = explode('</ul>', $badges[1]);
       $badges = trim($badges[0]);
       $bad_entities = array('<li style="background-image: url(', ');"></li>', ')');
       $safe_entities = array(' <img src="', '', '');
       $badges = str_replace($bad_entities, $safe_entities, $badges);
       echo "<fieldset><legend>Side ".$i."</legend>".$badges."</fieldset>";
  $i++;
  }
} else { echo"Habboen fins ikke.<br/><br/>"; }
        
}
echo"<form method='post'><b>Habbonavn:</b><br/><input type='text' value='".$_POST['habboname']."' id='textinput' name='habboname'><br/><br/><input type='submit' id='button' value='Send'><br/><br/>laget av sumodonut.";

pagebot($settings['footer']);

?>