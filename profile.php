<?php

if(isset($_GET['id']) || isset($_GET['user'])) {


include"main.php";

$result = mysql_query("SELECT * FROM usersystem WHERE id='".striphtml($_GET['id'])."' OR username='".striphtml($_GET['user'])."' LIMIT 1");
 
if(mysql_num_rows($result) > 0) {

$result = mysql_query("SELECT * FROM usersystem WHERE id='".striphtml($_GET['id'])."' OR username='".striphtml($_GET['user'])."' LIMIT 1");
$ro = mysql_fetch_array($result);

$id = $ro['id'];
$ip = $ro['ip'];
$uname = $ro['username'];
$email = $ro['email'];
$habbo = $ro['habboname'];
$userlevel = $ro['userlevel'];
$points = $ro['points'];
$items = $ro['items'];
$furni = $ro['furni'];
$tagwallposts = $ro['tagwallposts'];
$battleships_sentence = $ro['battleships_sentence'];
$head = $ro['head'];
$body = $ro['body'];
$lastlogin = $ro['logdate'];
$letindate = explode("||", $ro['letindate']);
$banreason = $ro['banreason'];
$freetext = $ro['freetext'];
$last_active = $ro['last_active'];
$rights = $ro['rights'];
$register_date = $ro['register_date'];
$verified_habbo = $ro['verified_habbo'];
$badges = $ro['badges'];
$embed = $ro['embed'];
$credits = $ro['credits'];
$title = $ro['title'];
$profile_visited = $ro['profile_visited'];
$background = $ro['background'];
$avatar_bg = $ro['avatar_bg'];
$guest_msg = $ro['guest_msg'];
 
  unset($ro);
if(!empty($background)) { define("BACKGROUND", $background); define("PROFILE", true); }
  
 if($userlevel == "1") {
 if($user['level'] > "3") {
 } else {
 die("<meta http-equiv='refresh' content='0; url=index.php'>");
 }
 }
 
 if($verified_habbo == "yes") {
        $motto = explode('		<div class="birthday text">
			Habboen ble laget:
		</div>
		<div class="birthday date">
', file_get_contents("http://habbo.no/home/".$habbo."/"));
        $motto = explode('		</div>

		<br class="clear" />

', $motto[0]);
        $motto = trim($motto[1]);
	$output = $motto;
}


  
pagetop("".$settings['site_name']." profil for ".$uname."");
include"includes/subheader.php";
pagemid();

if(isset($user['name'])) {
if(!in_array($id, $user['visited_profilesx'])) {
mysql_query("UPDATE `usersystem` SET `visited_profiles` = '".$user['visited_profiles']."".$id.",' WHERE `username` = '".$user['name']."' LIMIT 1");
mysql_query("UPDATE `usersystem` SET `profile_visited` = '".($profile_visited+1)."' WHERE `username` = '".$uname."' LIMIT 1");
}
}



 echo"<div id='tagcontainer2'>
<div id='tagtop'>"; 

  echo"</div>
  <div id='tagmid'><center>";

echo"

<table cellpadding='0' width='85%' cellspacing='0' style='text-align:center;'><tr>
<td><a href='profile?id=".$id."'><img src='images/buttons/console_inactive.gif' onmouseover='this.src=\"images/buttons/console_active.gif\";' onmouseout='this.src=\"images/buttons/console_inactive.gif\";' border='0' title='Profil' style='padding-side: 15px; vertical-align:middle;'></a></td>

<td style='padding-left:15px;'><a href='profile?id=".$id."&guestbook'><img src='images/buttons/text_no.gif' onmouseover='this.src=\"images/buttons/text.gif\";' onmouseout='this.src=\"images/buttons/text_no.gif\";'  border='0' title='Gjestebok' style='padding-side: 15px; vertical-align:middle;'></a></td>

<td><a href='showroom?id=".$id."'><img src='images/buttons/room_icon_closed.gif' onmouseover='this.src=\"images/buttons/room_icon_open.gif\";' onmouseout='this.src=\"images/buttons/room_icon_closed.gif\";'  border='0' title='Samlerom' style='padding-side: 15px; vertical-align:middle;'></a></td>


<td><a href='blog?id=".$id."'><img src='images/buttons/groupboard_Sticky.gif' onmouseover='this.src=\"images/buttons/groupboard_Sticky_on.gif\";' onmouseout='this.src=\"images/buttons/groupboard_Sticky.gif\";'  border='0' title='Blogg' style='padding-side: 15px; vertical-align:middle; margin-bottom:3px;'></a></td>

"; 

echo"
</tr></table>";

  echo"</center></div>
   <div id='tagbot'>";
   echo"</div></div>
   
 ";

 echo"<hr/>";



if(!isset($_GET['guestbook'])) {
if($verified_habbo != "yes"){
echo"<span style='color: red;'>NB! Denne brukeren har ikke verifisert
 sin Habbo og det er ikke<br/> sikkert denne brukeren
er den Habboen den utgir seg som.</span>";
echo"<hr/>";
}









  echo"<center><table border='1' cellspacing='0' cellpadding='6' align='center' width='100%' style='border: #999999;'>";

  echo "<tr>";
 
  echo "<td id='td' width='50'><b>Brukernavn:</b></td><td id='td'>" . $uname ."</td></tr><tr>";

  echo "<td id='td' width='50'><b>Status:</b></td>";


 if($last_active + 800 >= time() ) {

echo"<td id='td'><span style='color: #00FF00;'>Online</span></td></tr><tr>";

} else {


echo"<td id='td'><span style='color: red;'>Offline</span></td></tr><tr>";

}


echo"
<td id='td' width='50'><b>Bruker id:</b></td><td id='td'>" . $id . "</td></tr><tr>";

if($user['level'] >= "4" && ($user['rights'] == "admin" || $user['rights'] == "global")) {
echo"<td id='td' width='50'><b>Bruker ip:</b></td><td id='td'>" . $ip . "</td></tr><tr>";
}
if($verified_habbo == "yes" || $user['level'] >= 4) {
  echo "<td id='td' width='50'><b>Habbonavn:</b></td><td id='td'><a href='http://www.habbo.no/home/".$habbo."' target='_blank'>" . $habbo . "</a></td></tr><tr>";
}
if($userlevel < 2 && ($user['rights'] == "admin" || $user['rights'] == "mod" || $user['rights'] == "global")) {
echo"
<td id='td' width='50'><b>Utestengt til:</b></td><td id='td' style='width: 130px;'>".$letindate[1]."</td></tr><tr>
<td id='td' width='50'><b>Utestengelsesgrunn:</b></td><td id='td' style='width: 130px;'>".$banreason."</td></tr><tr>
";
}

if($verified_habbo == "yes") {
if(!empty($output)) {

echo"
<td id='td' width='50'><b>Habbostatus:</b></td><td id='td' style='width: 130px;'>".$output."</td></tr><tr>
";
}
}

echo"
<td id='td' width='50'><b>Registrert:</b></td><td id='td'>" . $register_date . "</td></tr>";
 if(empty($title)) {
  echo "<td id='td' width='70'><b>Rank:</b></td><td id='td'>";
$bad_entities = array("1", "2", "3", "4");
$safe_entities = array("Utestengt", "Bruker", "VIP", "Administrator");
$userlevel1 = str_replace($bad_entities, $safe_entities, $userlevel);
echo $userlevel1; 
echo"</td></tr><tr>";
} else {

  echo "<td id='td' width='50'><b>Rank:</b></td><td id='td'>";

if(in_array("gold_vip", explode(",", $items)) && $title = "VIP") {
$title="Gull-VIP";
}

echo $title; 
echo"</td></tr><tr>";
}

if(!empty($rights)) {
  echo "<td id='td' width='50'><b>Rettigheter:</b></td><td id='td'>" . $rights . "</td></tr><tr>";
}
  echo "<td id='td' width='50'><b>Poeng:</b></td><td id='td'>" . $points . "</td></tr><tr>";
  echo "<td id='td' width='50'><b>Mynter:</b></td><td id='td'>" . $credits . "</td></tr><tr>";
  echo "<td id='td' width='50'><b>Tagwall poster:</b></td><td id='td'>" . $tagwallposts . "</td></tr><tr>";
echo"
<td id='td' width='50'><b>Sist logget inn:</b></td><td id='td'>" . $lastlogin . "</td></tr>";
if(in_array("pr_visi", explode(",", $items))) {
echo"
<tr><td id='td' width='50'><b>Profilbes&#248;k:</b></td><td id='td'>" . $profile_visited . "</td></tr>";
}
if(!empty($battleships_sentence)) {
echo"<tr><td id='td' width='50'><b>Battleships tekst:</b></td><td id='td'>" . $battleships_sentence . "</td></tr>";
}

echo"</table><br/><b><a href='post.php?action=new&sendTo=".$uname."' style='font-size: 13px;'>Send post</a></b><br/>";
/*
 if($verified_habbo == "yes") {
 
 if ($habbo == "") {
 echo" ";

 } else {
 echo"
<table style=' margin-top: -190px; margin-left: +20px; ' align='left'><tr><td>
 <img src='http://www.habbo.no/habbo-imaging/avatarimage?user=".$habbo."&action=".$body."&direction=2&head_direction=3&gesture=".$head."&size=b
 ' alt=' '></td></tr></table>";  


 
 }   
}
*/
if($verified_habbo == "yes") {
 if ($habbo == "") {
 echo" ";

 } else {
 if(empty($avatar_bg) || $avatar_bg == "blank") {
echo"<hr/>";
if($body != "hoverboard") {
echo" <img src='http://www.habbo.no/habbo-imaging/avatarimage?user=".$habbo."&action=".$body."&direction=2&head_direction=3&gesture=".$head."&size=b' alt='".$habboname."' ><br/><br/>";
} else {
echo" <img src='fancenter/tools/fx_imager/hoverboard?d=2&head=".$head."&hd=3&habbo=".$habbo."' align='center' alt='".$habboname."' ><br/><br/>";
}
 } else {
 echo"<hr/><br/>";
echo"<div style=' width: 104px; height: 120px;
background-image: url(images/".$avatar_bg.".gif);'>";
if($body != "hoverboard") {
echo" <img src='http://www.habbo.no/habbo-imaging/avatarimage?user=".$habbo."&action=".$body."&direction=2&head_direction=3&gesture=".$head."&size=b' align='center' alt='".$habboname."' ></div><br/><br/>";
} else {
echo"<img src='fancenter/tools/fx_imager/hoverboard?d=2&head=".$head."&hd=3&habbo=".$habbo."' align='center' alt='".$habboname."' ></div><br/><br/>";
}
 }
 }
 }
 
if($embed != "") {
echo"<hr/>";
echo"<script type='text/javascript' src='includes/swfobject.js'></script>

<div id='mediaspace'>Lydspor</div>
<script type='text/javascript'>
  var so = new SWFObject('includes/player.swf','ply','400','19','9','#000000');
  so.addParam('allowfullscreen','true');
  so.addParam('allowscriptaccess','always');
  so.addParam('wmode','opaque');
  so.addVariable('file','".urldecode($embed)."');
  so.write('mediaspace');
</script>
";

}
 
if($userlevel >= "3") {


echo"<hr/><b>Skilt:</b><br/>";

if($userlevel == "4") {
echo"<img src='uploads/gfx/ADM.gif' border='0' style='vertical-align: middle; margin: 3px;' onMouseover=\"ddrivetip('For &#229; v&#230;re ansatt p&#229; ".$settings['site_name'].".','white')\";
onMouseout=\"hideddrivetip()\" border='0' />";
} 
elseif($userlevel == "3") {
if(in_array("gold_vip", explode(",", $items))) {
echo"<img src='uploads/gfx/VPP.gif' border='0' style='vertical-align: middle; margin: 3px;'  onMouseover=\"ddrivetip('For &#229; v&#230;re Gull-VIP p&#229; ".$settings['site_name'].".','white')\";
onMouseout=\"hideddrivetip()\" border='0' />";
} else {
echo"<img src='uploads/gfx/VIP.gif' border='0' style='vertical-align: middle; margin: 3px;'  onMouseover=\"ddrivetip('For &#229; v&#230;re VIP p&#229; ".$settings['site_name'].".','white')\";
onMouseout=\"hideddrivetip()\" border='0' />";
}
} else {
echo"";
}

echo strbadges($badges);


} else {

if($badges != "") {

echo"<hr/><b>Skilt:</b><br/>";

echo strbadges($badges);

}
}

$usernamep=str_split($uname);
$g=count($usernamep)-1;
if($usernamep[$g] == "s") {
$end2="'";
} else {
$end2="s";
}

echo"<hr/><b>Fritekst:</b><br/>";
echo"<div align='left'>"; echo strcodes($freetext); 

echo"</div>";

// echo"<b><a href='showroom?id=".$id."'>".$uname.$end2." m&#248;bler</a></b>";
/*
if(!empty($furni)) {
?>
<hr/>
<div id="masterdiv">

	<div class="menutitle" onclick="SwitchMenu('sub1')"><?php echo $uname.$end2; ?> samleobjekter &#187;</div>
	<span class="submenu" id="sub1">
<?php

echo strfurni($furni);

?>
	</span>
</div>

<?php
}
*/
} else {
if(in_array("guestbook", explode(",", $items))) {

echo"<b>Gjestebok (".mysql_num_rows(mysql_query("SELECT * FROM comments WHERE page_id='".$id."' AND type='profile'"))."):</b><br/>";



if($id == $user['id']) {
mysql_query("UPDATE `usersystem` SET `guest_msg` = '0' WHERE `username` = '".$uname."' LIMIT 1");
}





if(isset($user['name'])) {

if($user['chat_ban'] >= 1) {

echo"Du har chatban og kan derfor ikke poste i gjesteb&#248;ker.";


} else {

if(isset($_GET['report_comment']) && ($_GET['comment_id'])) {

mysql_query("UPDATE comments SET status = 'reported' WHERE id='".mysql_real_escape_string($_GET['comment_id'])."'");

mysql_query("UPDATE comments SET reportedby = '".$user['name']."' WHERE id='".mysql_real_escape_string($_GET['comment_id'])."'");

echo"Posten er rapportert!<br/><br/>";

}
if (isset($_POST['message'])) {

$code = $_SESSION['tagwallcode'];

unset($_SESSION['tagwallcode']);

if($code == $_POST['code']) {


if (isset($_POST['type']) && ($_POST['message'])) {

 $x5=$settings['latestcommentid'];
 $vari5 = $x5+1;

mysql_query("UPDATE latestids SET latestcommentid='".$vari5."'");


 $message = striphtml($_POST['message']);


$sql="INSERT INTO comments (id, name, message, page_id, date, ip, type) VALUES 
('".$vari5."', '".$user['name']."','".nl2br($message)."','".$id."','".strftime("%d.%m.%Y - %H:%M")."','".$_SERVER['REMOTE_ADDR']."','profile')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

mysql_query("UPDATE `usersystem` SET `guest_msg` = '".($guest_msg+1)."' WHERE `username` = '".$uname."' LIMIT 1");


$x=$user['points'];
$vari = $x+0;

$sql="UPDATE usersystem SET points = '".$vari."'
WHERE username = '".$user['name']."'";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
     


  
echo"";

 


} else {
echo"<br/>Du m&#229; skrive noe f&#248;r du poster det.<br/><br/>";
}
}
}

$mycode = randomtext("aA1", 10);

$_SESSION['tagwallcode'] = $mycode;



echo"
<form action='profile?id=".$id."&guestbook' method='post' name='comment'>

<input type='hidden' name='name' value='".$user['name']."'>
<input type='hidden' name='type' value='comment'>
<input type='hidden' name='code' value='".$mycode."'>

<textarea style='height: 140px; width: 400px; 
  font-family: Verdana;
  font-size: 11px;
  font-weight: normal;
  color: #000000;
' name='message' id='textinput'></textarea>
  <br/>";
  echo showcodes("message", "comment");
  echo"
<br/><br/><input type='submit' id='button' value='Post innlegg' /><br/>
";
}
} else {

echo"Du m&#229; logge inn for &#229; skrive i gjesteb&#248;ker.";

}




$t = mysql_query("SELECT * FROM comments WHERE page_id='".$id."' AND type='profile'");
$a                  = mysql_fetch_object($t);  
$total_items      = mysql_num_rows($t);  
$limit            = $_GET['limit'];  
$type             = $_GET['type'];  
$page             = $_GET['page'];

//set default if: $limit is empty, non numerical, less than 10, greater than 50  
if((!$limit)  || (is_numeric($limit) == false) || ($limit < 10) || ($limit > 50)) {  
     $limit = 7; //default  
}  

//set default if: $page is empty, non numerical, less than zero, greater than total available  
if((!$page) || (is_numeric($page) == false) || ($page < 0) || ($page > $total_items)) {  
      $page = 1; //default  
}  

//calcuate total pages  
$total_pages     = ceil($total_items / $limit);  
$set_limit          = $page * $limit - ($limit);  



$result = mysql_query("SELECT * FROM comments WHERE page_id='".$id."' AND type='profile' ORDER BY id DESC LIMIT $set_limit, $limit");

if(mysql_num_rows($result) != 0) {
pagebreak();

while($row = mysql_fetch_array($result))
  {
  
 echo"<div id='tagcontainer'>
<div id='tagtop'><div id='text'><br/>"; 

 echo"<b>- <a href='profile.php?user=".$row['name']."'>".$row['name']."</a></b>";

  echo"</div></div>
  <div id='tagmid'><div id='text'><br/><br/>";

echo strcodes($row['message']);



  echo"<br/><br/>";
  echo"Postet: <b>".$row['date']."</b>";
   if($user['level'] == "2" || $user['level'] == "3" || $user['level'] == "4") {
   
   echo"<br/><br/><a href='profile.php?id=".$_GET['id']."&report_comment=true&comment_id=".$row['id']."' onclick='return confirm(\"Er du sikker?\");'>Rapporter</a>"; 
   
   }
   
   if($user['level'] == "4") {
   
   echo" &#9679; <a href='adminpanel.php?action=comments&delete_comment=true&id=".$row['id']."'>Slett</a>";
   
   }
   
  echo"</div></div>
   <div id='tagbot'>";
   echo"</div></div>
   
 ";

  }

pagebreak();





$number1=$page-3;
$number2=$page-2;
$number3=$page-1;
$number4=$page;


$prev_page = $page - 1;  

if($prev_page >= 1) {  

  echo("<b>&#171;</b> <a href='?id=".$id."&page=$prev_page'><b>Forrige</b></a> | ");  
     if($number1 == 1 || $number2 == 1 || $number3 == 1 || $number4 == 1) {
   
   } else { echo"<a href='?id=".$id."&page=1'>1</a> ... "; }
}  

for($a = 1; $a <= $total_pages; $a++)  
{  
$number1=$page-1;
$number2=$page-2;
$number3=$page+1;
$number4=$page+2;
$number5=$page-3;
$number6=$page+3;


if($a == $number1 || $a == $number2 || $a == $number3 || $a == $number4 || $a == $page || $a == $number5 || $a == $number6 ) {
   if($a == $page) {  
      echo("<b>$a</b> "); //no link  
     } else {  
  echo("<a href='?id=".$id."&page=$a'>$a</a> ");  
     }  }
}  

$number1=$page+3;
$number2=$page+2;
$number3=$page+1;
$number4=$page;

$next_page = $page + 1;  
if($next_page <= $total_pages) {  
   if($number1 == $total_pages || $number2 == $total_pages || $number3 == $total_pages || $number4 == $total_pages) {
   
   } else { echo"... <a href='?id=".$id."&page=$total_pages'>$total_pages</a>"; }
   echo(" | <a href='?id=".$id."&page=$next_page'><b>Neste</a> &#187;</b>");  
}  
  

}
} else {
echo"Denne brukeren har ingen gjestebok.";
}
}


pagebot($settings['footer']);

} else {

echo"<meta http-equiv='refresh' content='0; url=index.php'>";

}





} else {
echo"<meta http-equiv='refresh' content='0; url=members.php'>";

}


?>