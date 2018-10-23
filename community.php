<?php

include"main.php";

if(isset($user['name'])) {

if($_GET['action'] == "etre" && !in_array("ese2", $user['itemsx'])) {
mysql_query("UPDATE usersystem SET items = '".$user['items']."ese2,' WHERE username='".$user['name']."'");
die("Du fant p&#229;skeegg nummer 2!");
}

pagetop($settings['site_name']." Community");
include"includes/subheader.php";
pagemid();

$result = mysql_query("SELECT * FROM usersystem WHERE userlevel > 1 AND verified_habbo = 'yes' ORDER BY profile_visited DESC LIMIT 80");
while($row = mysql_fetch_array($result))
  { 
	$spotlight[] = $row['username'];
  }

$choose1 = mt_rand(0,count($spotlight)-1);

$choose2 = mt_rand(0,count($spotlight)-1);

$choose3 = mt_rand(0,count($spotlight)-1);

$choose4 = mt_rand(0,count($spotlight)-1);

$choose5 = mt_rand(0,count($spotlight)-1);

$output[] = $spotlight[$choose1];

$output[] = $spotlight[$choose2];

$output[] = $spotlight[$choose3];

$output[] = $spotlight[$choose4];

$output[] = $spotlight[$choose5];

echo "<b>Tilfeldige brukere:</b><br/>";
$habbos_done = "";
foreach($output as $rand_habbo)
{

if(!in_array($rand_habbo, explode(",", $habbos_done))) {

$result = mysql_query("SELECT * FROM usersystem WHERE username='".$rand_habbo."'");
$row = mysql_fetch_array($result);

if($row['verified_habbo'] == "yes") {
$habboname = $row['habboname'];
} else {
$habboname = "<span style='color:red;'>Ikke verifisert</span>";
}

if(is_online($rand_habbo)) {
$status = "images/habbo_online.gif";
} else {
$status = "images/habbo_offline.gif";
}

echo"<a href='profile?id=".$row['id']."'><img src='http://www.habbo.no/habbo-imaging/avatarimage?user=".$row['habboname']."&amp;action=wav&amp;direction=3&amp;head_direction=3&amp;gesture=sml&amp;size=b' alt='' align='center' border='0' onmouseover=\"ddrivetip('<b>".$row['username']."</b> <img src=\'".$status."\' style=\'vertical-align: middle;\'><br/>Registrert: ".$row['register_date']."<br/>Habbonavn: ".$habboname."','white')\" onmouseout=\"hideddrivetip()\"></a>";

$habbos_done .= $rand_habbo.",";

}

}


echo"<br/><br/><b>Bruker highscore:</b><br/><br/><table cellpadding='0' cellspacing='0' border='0' style='width:100%;text-align:center;'>
<tr><td id='td'>";
echo"<table cellpadding='5' cellspacing='0' border='0' style='text-align:left;margin-left:85px;'>
<tr style='color: #333333;'>

<th>Navn:</th>
<th>Tags:</th>

</tr>
";
$i = 1;
$query = mysql_query("SELECT * FROM usersystem WHERE `userlevel` > 1 ORDER BY tagwallposts DESC LIMIT 10");
while($hiscore = mysql_fetch_array($query))
{

if(!isset($color3)) {
$color3 = "D9D9D9";
} else {
if($color3 == "D9D9D9") {
$color3 = "none";
} else {
$color3 = "D9D9D9";
}

}

echo"<tr><td id='td' style=' background-color: #".$color3.";'>$i. <a href='profile?id=".$hiscore['id']."'>".$hiscore['username']."</a></td><td id='td' style=' background-color: #".$color3.";'>".$hiscore['tagwallposts']."</td></tr>";
$i++;
}
echo"</table></td><td id='td'>";






echo"<table cellpadding='5' cellspacing='0' border='0' style='text-align: left;margin-right:65px;'>
<tr style='color: #333333;'>

<th>Navn:</th>
<th>Poeng:</th>

</tr>
";
$i = 1;
$query = mysql_query("SELECT * FROM `usersystem` WHERE `userlevel` < 4 && `userlevel` > 1 ORDER BY `points` DESC LIMIT 10");
while($hiscore = mysql_fetch_array($query))
{

if(!isset($color2)) {
$color2 = "D9D9D9";
} else {
if($color2 == "D9D9D9") {
$color2 = "none";
} else {
$color2 = "D9D9D9";
}

}

echo"<tr><td id='td' style=' background-color: #".$color2.";'>$i. <a href='profile?id=".$hiscore['id']."'>".$hiscore['username']."</a></td><td id='td' style=' background-color: #".$color2.";'>".$hiscore['points']."</td></tr>";
$i++;
}
echo"</table></td></tr></table>";



echo"<br/><br/><b>Siste forumtr&#229;der:</b><br/><br/>";

echo"<table cellpadding='5' cellspacing='0' border='0' width='100%' style='text-align: left;'>
<tr style='color: #333333;'>

<th>Tr&#229;d:</th>
<th>Poster:</th>
<th>Siste post:</th>

</tr>";
$i = 1;
$query = mysql_query("SELECT * FROM threads ORDER BY latestpost DESC LIMIT 5");
while($thread = mysql_fetch_array($query))
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

echo"<tr><td id='td' style=' background-color: #".$color.";'><a href='forum?action=thread&id=".$thread['id']."'>".$thread['subject']."</a></td><td id='td' style=' background-color: #".$color.";'>".$thread['posts']."</td>
<td id='td' style=' background-color: #".$color.";'>".$thread['latestpostdate']."</td></tr>";
$i++;
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

if(in_array("es_2", $user['itemsx']) && !in_array("ese2", $user['itemsx'])) {
echo"<tr><td id='td' style=' background-color: #".$color.";'><a href='community?action=etre'>P&#229;skeharen!!</a></td><td id='td' style=' background-color: #".$color.";'>1</td>
<td id='td' style=' background-color: #".$color.";'>01.01.0101 - 01:01</td></tr>";
}
echo"</table>";
if(!empty($user['reffered'])) {
echo"<br/><br/><b>Hvem har jeg vervet?</b><br/><br/>".str_replace(",", "\n", $user['reffered']);
} else {
echo"<br/><br/><b>Hvem har jeg vervet?</b><br/><br/>Du har ikke vervet noen enda.";
}
pagebot($settings['footer']);

} else {

echo"<meta http-equiv='refresh' content='0; url=index'>";

}

?>