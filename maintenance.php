<?php

define("MAINTEN", true);

include"main.php";
if($settings['maintenance'] == "yes") {
pagetop($settings['site_name']." er under vedlikehold!");
include"includes/subheader.php";
pagemid();


echo $settings['maintenance_reason'];

pagebot($settings['footer']);
} else {
echo"<meta http-equiv='refresh' content='0; url=index'>";
}
?>