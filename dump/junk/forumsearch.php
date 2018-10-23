<?php

include"main.php";

database_con();

if($settings['maintenance'] == "yes" && $user['level'] != "4") {
die("<meta http-equiv='refresh' content='0; url=maintenance.php'>"); } 

pagetop("Badge Scanner");
include"includes/subheader.php";
pagemid();
if(isset($_POST['habboname'])) {


    $i=1;
while($i<=9)
  {

       $badges = explode('<div class="topiclist-row-content">', file_get_contents("http://www.habbo.no/groups/habbonytt/discussions/page/".$i.""));
       $badges = explode('<div class="topiclist-footer clearfix">', $badges[1]);
       $badges = trim($badges[0]);
       $post = $_POST['habboname'];
       if(preg_match('#(\<a class="topiclist-link " href="/groups/habbonytt/discussions/(.*?)/id"\>$post\</a\>)#si', $badges)) {
       echo $badges;
       }
       
    //   $bad_entities = array('<li style="background-image: url(', ');"></li>', ')');
    //   $safe_entities = array(' <img src="', '', '');
    //   $badges = str_replace($bad_entities, $safe_entities, $badges);

  $i++;
  
  }
}
echo"<form method='post'><b>Habbonavn:</b><br/><input type='text' value='".$_POST['habboname']."' id='textinput' name='habboname'><br/><br/><input type='submit' id='button' value='Send'><br/><br/>laget av sumodonut.";

pagebot($settings['footer']);

?>