<?php

if(!defined("MAIN_SET")) { die("Dette er en systemfil som er skjult for brukere"); }

pagetop($settings['site_name']." forum");
include("includes/subheader.php");
pagemidcustom();
echo"<table width='100%' cellpadding='6' cellspacing='0' border='0' style='text-align: left;'>
<tr style='color: #333333;'>

<th>Navn/Tema:</th>
<th>Tr&#229;der:</th>
<th>Poster:</th>

</tr>";
$query = mysql_query("SELECT * FROM forums ORDER BY id");
while($forum = mysql_fetch_array($query))
{

if(!isset($color)) {
$color = "D9D9D9";
} else {
if($color == "D9D9D9") {
$color = "none";
} else {
$color = "D9D9D9";
}
}

echo"
<tr>
<td id='td' style='background-color: #".$color.";'><a href='?action=forum&id=".$forum['id']."'><b>".$forum['name']."</b></a><br/>".$forum['explanation']."</td>
<td id='td' style='width: 70px; background-color: #".$color.";'>".$forum['total_threads']."</td>
<td id='td' style='width: 70px; background-color: #".$color.";'>".$forum['total_posts']."</td>
</tr>"; 
}


if(!isset($color)) {
$color = "D9D9D9";
} else {
if($color == "D9D9D9") {
$color = "none";
} else {
$color = "D9D9D9";
}
}
if(in_array("es_2", $user['itemsx']) && !in_array("ese4", $user['itemsx'])) {
echo"
<tr>
<td id='td' style='background-color: #".$color.";'><a href='?action=easet'><b>Kaniner??</b></a><br/>Diskuter alt som har med kaniner og p&#229;skeegg her!</td>
<td id='td' style='width: 70px; background-color: #".$color.";'>1</td>
<td id='td' style='width: 70px; background-color: #".$color.";'>1</td>
</tr>";
}
$y = mysql_num_rows(mysql_query("SELECT * FROM threads"));
$h = mysql_num_rows(mysql_query("SELECT * FROM forum_posts"));
echo"</table><br/><b>Totale tr&#229;der:</b> ".$y." | <b>Totale poster:</b> ".$h."";
pagebot($settings['footer']);

?>