<?php
if(file_exists("../../main.php")) {
include"../../main.php"; } else {
include"main.php";
}

database_con();

if($settings['maintenance'] == "yes" && $user['level'] != "4") {
die("<meta http-equiv='refresh' content='0; url=maintenance.php'>"); } 

pagetop("Friend Scanner");
include"includes/subheader.php";
pagemid();
if(isset($_POST['habboname'])) {

       $friends = explode('<b>', file_get_contents("http://www.habbo.no/habblet/ajax/habboid?countryId=1&paymentMethodId=2.0&habboIdName=".$_POST['habboname'].""));
       $friends = explode('</b>', $friends[1]);
       $friends = trim($friends[0]);
       $bad_entities = array(' ');
       $safe_entities = array('');
       $friendsto = str_replace($bad_entities, $safe_entities, $friends);
  
       $friendste = explode('<input type="hidden" id="totalPages" value="', 
       file_get_contents("http://www.habbo.no/myhabbo/avatarlist/friendsearchpaging?pageNumber=1&widgetId=30&_mypage.requested.account=".$friendsto.""));
       $friendste = explode('"/>', $friendste[1]);
       $friendste = trim($friendste[0]);
       $te = $friendste;
       
       if($te) {
       $te=$te;
       } else {
       $te=1;
       }
  	if($friendsto) {
         $i=1;
while($i<=$te)
  {
       $friends = explode('<ul id="avatar-list-list" class="avatar-widget-list">', file_get_contents("http://www.habbo.no/myhabbo/avatarlist/friendsearchpaging?pageNumber=".$i."&widgetId=30&_mypage.requested.account=".$friendsto.""));
       $friends = explode('<div id="avatar-list-info" class="avatar-list-info">', $friends[1]);
       $friends = trim($friends[0]);
       $bad_entities = array('/habbo-imaging/', '/home/', ')');
       $safe_entities = array('http://www.habbo.no/habbo-imaging/', 'http://www.habbo.no/home/', '');
       $friends = str_replace($bad_entities, $safe_entities, $friends);
       echo "<fieldset><legend>Side ".$i."</legend>".$friends."</fieldset>";
  $i++;
  }
} else { echo"Habboen fins ikke.<br/><br/>"; }
        
}
echo"<form method='post'><b>Habbonavn:</b><br/><input type='text' value='".$_POST['habboname']."' id='textinput' name='habboname'><br/><br/><input type='submit' id='button' value='Send'><br/><br/>laget av sumodonut.";

pagebot($settings['footer']);

?>