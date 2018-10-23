<?php

// MERK: noen disse kodene er tatt fra - eller inneholder koder fra CMS'et php-fusion!

if(!defined("MAIN_SET")) { die("Dette er en systemfil som er skjult for brukere"); }

function removespace($text)
{
$cleantext = str_replace(" ", NULL, $text);
return $cleantext;
}

function endline($text) {
	
	$i = 0; $tags = 0; $chars = 0; $res = "";
	
	$str_len = strlen($text);
	
	for ($i = 0; $i < $str_len; $i++) {
		$chr = substr($text, $i, 1);
		if ($chr == "<") {
			if (substr($text, ($i + 1), 6) == "a href" || substr($text, ($i + 1), 3) == "img") {
				$chr = " ".$chr;
				$chars = 0;
			}
			$tags++;
		} elseif ($chr == "&") {
			if (substr($text, ($i + 1), 5) == "quot;") {
				$chars = $chars - 5;
			} elseif (substr($text, ($i + 1), 4) == "amp;" || substr($text, ($i + 1), 4) == "#39;" || substr($text, ($i + 1), 4) == "#92;") {
				$chars = $chars - 4;
			} elseif (substr($text, ($i + 1), 3) == "lt;" || substr($text, ($i + 1), 3) == "gt;") {
				$chars = $chars - 3;
			}
		} elseif ($chr == ">") {
			$tags--;
		} elseif ($chr == " ") {
			$chars = 0;
		} elseif (!$tags) {
			$chars++;
		}
		
		if (!$tags && $chars == 40) {
			$chr .= "<br />";
			$chars = 0;
		}
		$res .= $chr;
	}
	
	return $res;
}

function striphtml($text)
{
include"includes/striphtml.php";
return $text;
}


function stripurl($url)
{
include"includes/striphtml.php";
return urlencode($url);
}


function striphtmltags($text)
{
$search = array("<", ">", "&", ";");
$replace = array("", "", "", "");
$text = str_replace($search, $replace, $text);
return $text;
}


function remove($word, $text)
{
$cleantext = str_replace($word, NULL, $text);
return $cleantext;
}


function strbadges($text)
{
$text = str_replace(",", " ", $text);

$smiley_cache = array();
$result = mysql_query("SELECT * FROM badges");
while($row = mysql_fetch_array($result))
  {
  $smiley_cache[] = array(
	"smiley_code" => $row['code'],
	"smiley_image" => $row['image'],
	"smiley_title" => $row['title']
  );
  }
 
foreach ($smiley_cache as $smiley) {

$smiley_code = preg_quote($smiley['smiley_code']);
$smiley_image = "<img src='".$smiley['smiley_image']."' alt='".$smiley['smiley_code']."'
 onMouseover=\"ddrivetip('".$smiley['smiley_title']."','white')\";
onMouseout=\"hideddrivetip()\" style='vertical-align:middle;' />";
$text = preg_replace("#{$smiley_code}#si", $smiley_image, $text);

}

return $text;
}

function strfurni($text)
{
$text = str_replace(",", " ", $text);

$smiley_cache = array();
$result = mysql_query("SELECT * FROM furni");
while($row = mysql_fetch_array($result))
  {
  $smiley_cache[] = array(
	"smiley_code" => $row['code'],
	"smiley_image" => $row['image'],
	"smiley_mimage" => $row['mimage'],
	"smiley_title" => $row['title']
  );
  }
 
foreach ($smiley_cache as $smiley) {
if(empty($smiley['smiley_mimage'])) {
$mimage = $smiley['smiley_image'];
} else { $mimage = $smiley['smiley_mimage']; }
$title = $smiley['smiley_title'];
$smiley_code = preg_quote($smiley['smiley_code']);
$smiley_image = "<img src='".$smiley['smiley_image']."' border='0' alt='".$smiley['smiley_code']."' style='vertical-align:middle;' 
onMouseover=\"ddrivetip('<b>".$smiley['smiley_code']."</b><br/>".$title."','white')\";
onMouseout=\"hideddrivetip()\" onMouseDown='this.src = \"".$mimage."\"; ' onMouseUp='this.src = \"".$smiley['smiley_image']."\"; ' />&nbsp;";
$text = preg_replace("#{$smiley_code}#si", $smiley_image, $text);

}

return "<table><tr>".$text."</tr></table>";
}

function shortenlink($text, $length)
{
if(strlen($text) >= $length) {
$text = substr($text, 0, ($length-3))."...";
}
return $text;
}

function randomtext($charset, $length)
{
$search = array("A", "a", "1");
$replace = array("ABCDEFGHIJKLMNOPQRSTUVWXYZ", "abcdefghijklmnopqrstuvwxyz", "0123456789");
$str = str_replace($search, $replace, $charset);
$string = "";
$chars = $str;
for ($i = 0; $i < $length; $i++) {
$string .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);


}
return $string;
}

function solvebr($text)
{
$bad_entities = array("<br/>", "<br>", "<br />");
$safe_entities = array("", "", "");
$cleantext = str_replace($bad_entities, $safe_entities, $text);
return $cleantext; 
}


function showcodes($text, $form)
{
if(isset($_SESSION['username'])) {
$result = mysql_query("SELECT * FROM usersystem WHERE username='".$_SESSION['username']."' AND password='".$_SESSION['password']."'");
while($row = mysql_fetch_array($result))
  {
  $user['level'] = $row['userlevel'];
  }
}
if($user['level'] > "3" && !defined("RENEWS") && NEWS == "yes") {
?> <a onclick="addText('<?php echo $text; ?>', '[img]', '[/img]', '<?php echo $form; ?>');" /><b>[img] - (Legg til bilde i teksten)</b></a><br/> <?php
}
?>


<?php /*

<a onclick="addText('<?php echo $text; ?>', '[b]', '[/b]', '<?php echo $form; ?>');" /><b>B</b></a>
<a onclick="addText('<?php echo $text; ?>', '[q]', '[/q]', '<?php echo $form; ?>');" /><span style='border: 1px solid #999999; background-color: #CECEBA;' />Sitat</span></a>
<a onclick="addText('<?php echo $text; ?>', '[u]', '[/u]', '<?php echo $form; ?>');" /><u>U</u></a>
<a onclick="addText('<?php echo $text; ?>', '[s]', '[/s]', '<?php echo $form; ?>');" /><s>S</s></a>
<a onclick="addText('<?php echo $text; ?>', '[i]', '[/i]', '<?php echo $form; ?>');" /><i>I</i></a>
<a onclick="addText('<?php echo $text; ?>', '[font=small]', '[/font]', '<?php echo $form; ?>');" /><span style='font-size: 9px;'>a</span></a>
<a onclick="addText('<?php echo $text; ?>', '[font=big]', '[/font]', '<?php echo $form; ?>');" /><span style='font-size: 14px;'>A</span></a>
<!--
<select id='textinput'>
<option>Farge</option>
<option onchange="addText('<?php echo $text; ?>', '[color=red]', '[/color]', '<?php echo $form; ?>');" style='color:red;'>R&#248;d</option>
<option onchange="addText('<?php echo $text; ?>', '[color=blue]', '[/color]', '<?php echo $form; ?>');" style='color:blue;'>Bl&#229;</option>
<option onchange="addText('<?php echo $text; ?>', '[color=green]', '[/color]', '<?php echo $form; ?>');" style='color:green;'>Gr&#248;nn</option>
<option onchange="addText('<?php echo $text; ?>', '[color=yellow]', '[/color]', '<?php echo $form; ?>');" style='color:yellow;'>Gul</option>
<option onchange="addText('<?php echo $text; ?>', '[color=purple]', '[/color]', '<?php echo $form; ?>');" style='color:purple;'>Lilla</option>
<option onchange="addText('<?php echo $text; ?>', '[color=grey]', '[/color]', '<?php echo $form; ?>');" style='color:grey;'>Gr&#229;</option>
<option onchange="addText('<?php echo $text; ?>', '[color=gold]', '[/color]', '<?php echo $form; ?>');" style='color:gold;'>Gull</option>
<option onchange="addText('<?php echo $text; ?>', '[color=brown]', '[/color]', '<?php echo $form; ?>');" style='color:brown;'>Brun</option>
<option onchange="addText('<?php echo $text; ?>', '[color=orange]', '[/color]', '<?php echo $form; ?>');" style='color:orange;'>Oransje</option>
</select>
-->
<select id="textinput" onchange="addText('<?php echo $text; ?>', this.value, '[/color]', '<?php echo $form; ?>');">
<option>Farge</option>
<option value="[color=red]" style='color:red;'>R&#248;d</option>
<option value="[color=blue]" style='color:blue;'>Bl&#229;</option>
<option value="[color=green]" style='color:green;'>Gr&#248;nn</option>
<option value="[color=yellow]" style='color:yellow;'>Gul</option>
<option value="[color=purple]" style='color:purple;'>Lilla</option>
<option value="[color=grey]" style='color:grey;'>Gr&#229;</option>
<option value="[color=gold]" style='color:gold;'>Gull</option>
<option value="[color=brown]" style='color:brown;'>Brun</option>
<option value="[color=orange]" style='color:orange;'>Oransje</option>
</select>


*/ ?>


<img src='images/smileys/smile.gif' border='0' style='vertical-align: middle;' onclick="insertText('<?php echo $text; ?>', ':)', '<?php echo $form; ?>');" />
<img src='images/smileys/sad.gif' border='0' style='vertical-align: middle;' onclick="insertText('<?php echo $text; ?>', ':(', '<?php echo $form; ?>');" />
<img src='images/smileys/angry.gif' border='0' style='vertical-align: middle;' onclick="insertText('<?php echo $text; ?>', 'XO', '<?php echo $form; ?>');" /> 
<img src='images/smileys/confused.gif' border='0' style='vertical-align: middle;' onclick="insertText('<?php echo $text; ?>', ':S', '<?php echo $form; ?>');" />
<img src='images/smileys/huffy.gif' border='0' style='vertical-align: middle;' onclick="insertText('<?php echo $text; ?>', ':O', '<?php echo $form; ?>');" /> 
<img src='images/smileys/winnerface.gif' border='0' style='vertical-align: middle;' onclick="insertText('<?php echo $text; ?>', '#king', '<?php echo $form; ?>');" />
<img src='images/smileys/brokenheart.gif' border='0' style='vertical-align: middle;' onclick="insertText('<?php echo $text; ?>', '#brokenheart', '<?php echo $form; ?>');" /> 
<img src='images/smileys/cool.gif' border='0' style='vertical-align: middle;' onclick="insertText('<?php echo $text; ?>', 'B)', '<?php echo $form; ?>');" />
<img src='images/smileys/devil.gif' border='0' style='vertical-align: middle;' onclick="insertText('<?php echo $text; ?>', '#devil', '<?php echo $form; ?>');" /> 
<img src='images/smileys/dissapointed.gif' border='0' style='vertical-align: middle;' onclick="insertText('<?php echo $text; ?>', '#disappointed', '<?php echo $form; ?>');" />
<img src='images/smileys/funnyface.gif' border='0' style='vertical-align: middle;' onclick="insertText('<?php echo $text; ?>', '8)', '<?php echo $form; ?>');" /> 
<img src='images/smileys/goodkid.gif' border='0' style='vertical-align: middle;' onclick="insertText('<?php echo $text; ?>', '#goodkid', '<?php echo $form; ?>');" />
<img src='images/smileys/grin.gif' border='0' style='vertical-align: middle;' onclick="insertText('<?php echo $text; ?>', ':D', '<?php echo $form; ?>');" />
<img src='images/smileys/hungry.gif' border='0' style='vertical-align: middle;' onclick="insertText('<?php echo $text; ?>', ':}', '<?php echo $form; ?>');" />
<img src='images/smileys/love.gif' border='0' style='vertical-align: middle;' onclick="insertText('<?php echo $text; ?>', '#heart', '<?php echo $form; ?>');" /> 
<img src='images/smileys/nosmile.gif' border='0' style='vertical-align: middle;' onclick="insertText('<?php echo $text; ?>', ':|', '<?php echo $form; ?>');" />
<img src='images/smileys/pfft.gif' border='0' style='vertical-align: middle;' onclick="insertText('<?php echo $text; ?>', ':P', '<?php echo $form; ?>');" /> 
<img src='images/smileys/shocked.gif' border='0' style='vertical-align: middle;' onclick="insertText('<?php echo $text; ?>', ':o', '<?php echo $form; ?>');" />
<img src='images/smileys/sick.gif' border='0' style='vertical-align: middle;' onclick="insertText('<?php echo $text; ?>', '+_+', '<?php echo $form; ?>');" /> 
<img src='images/smileys/sleepy.gif' border='0' style='vertical-align: middle;' onclick="insertText('<?php echo $text; ?>', '#sleepy', '<?php echo $form; ?>');" />
<img src='images/smileys/smallsad.gif' border='0' style='vertical-align: middle;' onclick="insertText('<?php echo $text; ?>', '#sad', '<?php echo $form; ?>');" /> 
<img src='images/smileys/smallsmile.gif' border='0' style='vertical-align: middle;' onclick="insertText('<?php echo $text; ?>', '#smile', '<?php echo $form; ?>');" />
<img src='images/smileys/speechless.gif' border='0' style='vertical-align: middle;' onclick="insertText('<?php echo $text; ?>', '#speechless', '<?php echo $form; ?>');" /> 
<img src='images/smileys/sunface.gif' border='0' style='vertical-align: middle;' onclick="insertText('<?php echo $text; ?>', '#overhappy', '<?php echo $form; ?>');" /> 
<img src='images/smileys/thumbsdown.gif' border='0' style='vertical-align: middle;' onclick="insertText('<?php echo $text; ?>', '#thumbsdown', '<?php echo $form; ?>');" /> 
<img src='images/smileys/thumbsup.gif' border='0' style='vertical-align: middle;' onclick="insertText('<?php echo $text; ?>', '#thumbsup', '<?php echo $form; ?>');" /> 
<img src='images/smileys/vomity.gif' border='0' style='vertical-align: middle;' onclick="insertText('<?php echo $text; ?>', ':{', '<?php echo $form; ?>');" /> 
<img src='images/smileys/wink.gif' border='0' style='vertical-align: middle;' onclick="insertText('<?php echo $text; ?>', ';)', '<?php echo $form; ?>');" /> 
<img src='images/smileys/yawn.gif' border='0' style='vertical-align: middle;' onclick="insertText('<?php echo $text; ?>', '#yawn', '<?php echo $form; ?>');" /> 
<img src='images/smileys/you-didnt-get-it.gif' border='0' style='vertical-align: middle;' onclick="insertText('<?php echo $text; ?>', '-_-', '<?php echo $form; ?>');" /> 
<img src='images/smileys/oddface.gif' border='0' style='vertical-align: middle;' onclick="insertText('<?php echo $text; ?>', '#oddface', '<?php echo $form; ?>');" /> 
<img src='images/smileys/updownboy.gif' border='0' style='vertical-align: middle;' onclick="insertText('<?php echo $text; ?>', '#updown', '<?php echo $form; ?>');" /> 
<img src='images/smileys/sweet.gif' border='0' style='vertical-align: middle;' onclick="insertText('<?php echo $text; ?>', '00_', '<?php echo $form; ?>');" /> 
<img src='images/smileys/monster.gif' border='0' style='vertical-align: middle;' onclick="insertText('<?php echo $text; ?>', '#monster', '<?php echo $form; ?>');" /> 
<img src='images/smileys/oo.gif' border='0' style='vertical-align: middle;' onclick="insertText('<?php echo $text; ?>', 'o.O', '<?php echo $form; ?>');" /> 
<img src='images/smileys/emokid.gif' border='0' style='vertical-align: middle;' onclick="insertText('<?php echo $text; ?>', '*_*', '<?php echo $form; ?>');" /> 
<img src='images/smileys/mm.gif' border='0' style='vertical-align: middle;' onclick="insertText('<?php echo $text; ?>', '^^', '<?php echo $form; ?>');" /> 
<img src='images/smileys/scary.gif' border='0' style='vertical-align: middle;' onclick="insertText('<?php echo $text; ?>', '#scary', '<?php echo $form; ?>');" /> 
<img src='images/smileys/tophat.gif' border='0' style='vertical-align: middle;' onclick="insertText('<?php echo $text; ?>', '#tophat', '<?php echo $form; ?>');" /> 
<img src='images/smileys/peace.gif' border='0' style='vertical-align: middle;' onclick="insertText('<?php echo $text; ?>', '#peace', '<?php echo $form; ?>');" /> 

<?php
}

function showparsedcodes($text, $form)
{
/*
?>

<a onclick="addText('<?php echo $text; ?>', '[b]', '[/b]', '<?php echo $form; ?>');" /><b>B</b></a> 
<a onclick="addText('<?php echo $text; ?>', '[q]', '[/q]', '<?php echo $form; ?>');" /><span style='border: 1px solid #999999; background-color: #CECEBA;' />Sitat</span></a> 
<a onclick="addText('<?php echo $text; ?>', '[u]', '[/u]', '<?php echo $form; ?>');" /><u>U</u></a> 
<a onclick="addText('<?php echo $text; ?>', '[s]', '[/s]', '<?php echo $form; ?>');" /><s>S</s></a> 
<a onclick="addText('<?php echo $text; ?>', '[i]', '[/i]', '<?php echo $form; ?>');" /><i>I</i></a> 
<a onclick="addText('<?php echo $text; ?>', '[font=small]', '[/font]', '<?php echo $form; ?>');" /><span style='font-size: 9px;'>a</span></a> 
<a onclick="addText('<?php echo $text; ?>', '[font=big]', '[/font]', '<?php echo $form; ?>');" /><span style='font-size: 14px;'>A</span></a> 

<?php
*/
}
/*
function parsecodes($text)
{

if(preg_match("#(\[q\](.*?)\[/q\])#si", $text)) {
$bad_entities = array(
"[color=red]", "[color=blue]", "[color=green]", "[color=yellow]", 
"[color=purple]", "[color=grey]", "[color=gold]", "[color=brown]", "[color=orange]", "[/color]", 
 "[b]", "[/b]", "[u]", "[/u]", 
"[s]", "[/s]", "[i]", "[/i]", "[font=small]", "[font=big]", "[/font]", "[q]", "[/q]");

$safe_entities = array("<span style='color: red;'>","<span style='color: blue;'>", "<span style='color: green;'>", 
"<span style='color: yellow;'>", "<span style='color: purple;'>", 
"<span style='color: grey;'>", "<span style='color: gold;'>", "<span style='color: brown;'>", "<span style='color: orange;'>", "</span>",
 "<b>", "</b>", "<u>", "</u>", "<s>", "</s>", 
 "<i>", "</i>", "<span style='font-size: 9px;'>", "<span style='font-size: 14px;'>", "</span>"
 , "<div id='quote' />", "</div>");
} else {
$bad_entities = array(
"[color=red]", "[color=blue]", "[color=green]", "[color=yellow]", 
"[color=purple]", "[color=grey]", "[color=gold]", "[color=brown]", "[color=orange]", "[/color]", 
 "[b]", "[/b]", "[u]", "[/u]", 
"[s]", "[/s]", "[i]", "[/i]", "[font=small]", "[font=big]", "[/font]");

$safe_entities = array("<span style='color: red;'>","<span style='color: blue;'>", "<span style='color: green;'>", 
"<span style='color: yellow;'>", "<span style='color: purple;'>", 
"<span style='color: grey;'>", "<span style='color: gold;'>", "<span style='color: brown;'>", "<span style='color: orange;'>", "</span>",
 "<b>", "</b>", "<u>", "</u>", "<s>", "</s>", 
 "<i>", "</i>", "<span style='font-size: 9px;'>", "<span style='font-size: 14px;'>", "</span>"
);
}
$cleantext = str_replace($bad_entities, $safe_entities, $text);

if(isset($_SESSION['username']) && ($_SESSION['password'])) {


$result = mysql_query("SELECT * FROM usersystem WHERE username='".$_SESSION['username']."' AND password='".$_SESSION['password']."'");
while($row = mysql_fetch_array($result))
  { 
if($row['smileys'] == "on") {
echo $cleantext;
} else { echo $text; } }
} else {
echo $cleantext;
}
echo"</span></a></b></u></s></i>";


echo $text;
}
*/

/*
function strcodes($text) 
{

if(isset($_SESSION['username'])) {
$result = mysql_query("SELECT * FROM usersystem WHERE username='".$_SESSION['username']."' AND password='".$_SESSION['password']."'");
while($row = mysql_fetch_array($result))
  {
  $user['level'] = $row['userlevel'];
  }
}
if(NEWS == "yes" && !defined("RENEWS") && preg_match("#(\[img\](.*?)\[/img\])#si", $text)) {
if(preg_match("#(\[q\](.*?)\[/q\])#si", $text)) {
$bad_entities = array(":)", ":(", "XO", ":S", ":O", "#king", "#brokenheart", "B)", "#devil", "#disappointed", "8)", "#goodkid", ":D", ":}", "#heart", ":|", ":P", ":o",
"+_+", "#sleepy", "#sad", "#smile", "#speechless", "#overhappy", "#thumbsdown", "#thumbsup", ":{", ";)", "#yawn", "-_-", "#oddface", "#updown", "00_", "#monster", "o.O", "*_*", "^^", "#scary",
"#tophat", "#peace",
"[color=red]", "[color=blue]", "[color=green]", "[color=yellow]", 
"[color=purple]", "[color=grey]", "[color=gold]", "[color=brown]", "[color=orange]", "[/color]", 
 "[b]", "[/b]", "[u]", "[/u]", 
"[s]", "[/s]", "[i]", "[/i]", "[font=small]", "[font=big]", "[/font]", "[img]", "[/img]", "[q]", "[/q]");
} else {
$bad_entities = array(":)", ":(", "XO", ":S", ":O", "#king", "#brokenheart", "B)", "#devil", "#disappointed", "8)", "#goodkid", ":D", ":}", "#heart", ":|", ":P", ":o",
"+_+", "#sleepy", "#sad", "#smile", "#speechless", "#overhappy", "#thumbsdown", "#thumbsup", ":{", ";)", "#yawn", "-_-", "#oddface", "#updown", "00_", "#monster", "o.O", "*_*", "^^", "#scary",
"#tophat", "#peace",
"[color=red]", "[color=blue]", "[color=green]", "[color=yellow]", 
"[color=purple]", "[color=grey]", "[color=gold]", "[color=brown]", "[color=orange]", "[/color]", 
 "[b]", "[/b]", "[u]", "[/u]", 
"[s]", "[/s]", "[i]", "[/i]", "[font=small]", "[font=big]", "[/font]", "[img]", "[/img]");
}
} else {
if(preg_match("#(\[q\](.*?)\[/q\])#si", $text)) {
$bad_entities = array(":)", ":(", "XO", ":S", ":O", "#king", "#brokenheart", "B)", "#devil", "#disappointed", "8)", "#goodkid", ":D", ":}", "#heart", ":|", ":P", ":o",
"+_+", "#sleepy", "#sad", "#smile", "#speechless", "#overhappy", "#thumbsdown", "#thumbsup", ":{", ";)", "#yawn", "-_-", "#oddface", "#updown", "00_", "#monster", "o.O", "*_*", "^^", "#scary",
"#tophat", "#peace",
"[color=red]", "[color=blue]", "[color=green]", "[color=yellow]", 
"[color=purple]", "[color=grey]", "[color=gold]", "[color=brown]", "[color=orange]", "[/color]",
 "[b]", "[/b]", "[u]", "[/u]", 
"[s]", "[/s]", "[i]", "[/i]", "[font=small]", "[font=big]", "[/font]", "[q]", "[/q]");
} else {
$bad_entities = array(":)", ":(", "XO", ":S", ":O", "#king", "#brokenheart", "B)", "#devil", "#disappointed", "8)", "#goodkid", ":D", ":}", "#heart", ":|", ":P", ":o",
"+_+", "#sleepy", "#sad", "#smile", "#speechless", "#overhappy", "#thumbsdown", "#thumbsup", ":{", ";)", "#yawn", "-_-", "#oddface", "#updown", "00_", "#monster", "o.O", "*_*", "^^", "#scary",
"#tophat", "#peace",
"[color=red]", "[color=blue]", "[color=green]", "[color=yellow]", 
"[color=purple]", "[color=grey]", "[color=gold]", "[color=brown]", "[color=orange]", "[/color]",
 "[b]", "[/b]", "[u]", "[/u]", 
"[s]", "[/s]", "[i]", "[/i]", "[font=small]", "[font=big]", "[/font]");
}
}

if(NEWS == "yes" && !defined("RENEWS") && preg_match("#(\[img\](.*?)\[/img\])#si", $text)) {
if(preg_match("#(\[q\](.*?)\[/q\])#si", $text)) {
$safe_entities = array(
"<img src='images/smileys/smile.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/sad.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/angry.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/confused.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/huffy.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/winnerface.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/brokenheart.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/cool.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/devil.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/dissapointed.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/funnyface.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/goodkid.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/grin.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/hungry.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/love.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/nosmile.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/pfft.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/shocked.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/sick.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/sleepy.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/smallsad.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/smallsmile.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/speechless.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/sunface.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/thumbsdown.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/thumbsup.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/vomity.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/wink.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/yawn.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/you-didnt-get-it.gif' border='0' style='vertical-align: middle;' />",
 "<img src='images/smileys/oddface.gif' border='0' style='vertical-align: middle;' />",
 
"<img src='images/smileys/updownboy.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/sweet.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/monster.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/oo.gif' border='0' style='vertical-align: middle;' />",

 "<img src='images/smileys/emokid.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/mm.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/scary.gif' border='0' style='vertical-align: middle;' />",

"<img src='images/smileys/tophat.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/peace.gif' border='0' style='vertical-align: middle;' />",


"<span style='color: red;'>","<span style='color: blue;'>", "<span style='color: green;'>", 
"<span style='color: yellow;'>", "<span style='color: purple;'>", 
"<span style='color: grey;'>", "<span style='color: gold;'>", "<span style='color: brown;'>", "<span style='color: orange;'>", "</span>",
 "<b>", "</b>", "<u>", "</u>", "<s>", "</s>", 
 "<i>", "</i>", "<span style='font-size: 9px;'>", "<span style='font-size: 14px;'>", "</span>", "<img src='", "' border='0', alt='bilde'>"
 , "<div id='quote' />", "</div>"
);
} else {
$safe_entities = array(
"<img src='images/smileys/smile.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/sad.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/angry.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/confused.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/huffy.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/winnerface.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/brokenheart.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/cool.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/devil.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/dissapointed.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/funnyface.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/goodkid.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/grin.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/hungry.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/love.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/nosmile.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/pfft.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/shocked.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/sick.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/sleepy.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/smallsad.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/smallsmile.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/speechless.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/sunface.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/thumbsdown.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/thumbsup.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/vomity.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/wink.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/yawn.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/you-didnt-get-it.gif' border='0' style='vertical-align: middle;' />",
 "<img src='images/smileys/oddface.gif' border='0' style='vertical-align: middle;' />",
 
"<img src='images/smileys/updownboy.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/sweet.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/monster.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/oo.gif' border='0' style='vertical-align: middle;' />",

 "<img src='images/smileys/emokid.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/mm.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/scary.gif' border='0' style='vertical-align: middle;' />",

"<img src='images/smileys/tophat.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/peace.gif' border='0' style='vertical-align: middle;' />",

"<span style='color: red;'>","<span style='color: blue;'>", "<span style='color: green;'>", 
"<span style='color: yellow;'>", "<span style='color: purple;'>", 
"<span style='color: grey;'>", "<span style='color: gold;'>", "<span style='color: brown;'>", "<span style='color: orange;'>", "</span>",
 "<b>", "</b>", "<u>", "</u>", "<s>", "</s>", 
 "<i>", "</i>", "<span style='font-size: 9px;'>", "<span style='font-size: 14px;'>", "</span>", "<img src='", "' border='0', alt='bilde'>"

);
}
} else {
if(preg_match("#(\[q\](.*?)\[/q\])#si", $text)) {
$safe_entities = array(
"<img src='images/smileys/smile.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/sad.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/angry.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/confused.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/huffy.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/winnerface.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/brokenheart.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/cool.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/devil.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/dissapointed.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/funnyface.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/goodkid.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/grin.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/hungry.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/love.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/nosmile.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/pfft.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/shocked.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/sick.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/sleepy.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/smallsad.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/smallsmile.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/speechless.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/sunface.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/thumbsdown.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/thumbsup.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/vomity.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/wink.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/yawn.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/you-didnt-get-it.gif' border='0' style='vertical-align: middle;' />",
 "<img src='images/smileys/oddface.gif' border='0' style='vertical-align: middle;' />",
 
"<img src='images/smileys/updownboy.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/sweet.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/monster.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/oo.gif' border='0' style='vertical-align: middle;' />",

 "<img src='images/smileys/emokid.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/mm.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/scary.gif' border='0' style='vertical-align: middle;' />",

"<img src='images/smileys/tophat.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/peace.gif' border='0' style='vertical-align: middle;' />",

"<span style='color: red;'>","<span style='color: blue;'>", "<span style='color: green;'>", 
"<span style='color: yellow;'>", "<span style='color: purple;'>", 
"<span style='color: grey;'>", "<span style='color: gold;'>", "<span style='color: brown;'>", "<span style='color: orange;'>", "</span>",
 "<b>", "</b>", "<u>", "</u>", "<s>", "</s>", 
 "<i>", "</i>", "<span style='font-size: 9px;'>", "<span style='font-size: 14px;'>", "</span>"
 , "<div id='quote' />", "</div>"
);
} else {
$safe_entities = array(
"<img src='images/smileys/smile.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/sad.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/angry.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/confused.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/huffy.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/winnerface.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/brokenheart.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/cool.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/devil.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/dissapointed.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/funnyface.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/goodkid.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/grin.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/hungry.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/love.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/nosmile.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/pfft.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/shocked.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/sick.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/sleepy.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/smallsad.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/smallsmile.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/speechless.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/sunface.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/thumbsdown.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/thumbsup.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/vomity.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/wink.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/yawn.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/you-didnt-get-it.gif' border='0' style='vertical-align: middle;' />",
 "<img src='images/smileys/oddface.gif' border='0' style='vertical-align: middle;' />",
 
"<img src='images/smileys/updownboy.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/sweet.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/monster.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/oo.gif' border='0' style='vertical-align: middle;' />",

 "<img src='images/smileys/emokid.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/mm.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/scary.gif' border='0' style='vertical-align: middle;' />",

"<img src='images/smileys/tophat.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/peace.gif' border='0' style='vertical-align: middle;' />",

"<span style='color: red;'>","<span style='color: blue;'>", "<span style='color: green;'>", 
"<span style='color: yellow;'>", "<span style='color: purple;'>", 
"<span style='color: grey;'>", "<span style='color: gold;'>", "<span style='color: brown;'>", "<span style='color: orange;'>", "</span>",
 "<b>", "</b>", "<u>", "</u>", "<s>", "</s>", 
 "<i>", "</i>", "<span style='font-size: 9px;'>", "<span style='font-size: 14px;'>", "</span>"

);
}
}
$cleantext = str_replace($bad_entities, $safe_entities, $text);

if(isset($_SESSION['username']) && ($_SESSION['password'])) {


$result = mysql_query("SELECT * FROM usersystem WHERE username='".$_SESSION['username']."' AND password='".$_SESSION['password']."'");
while($row = mysql_fetch_array($result))
  { 
if($row['smileys'] == "on") {
echo $cleantext;
} else { echo $text; } }
} else {
echo endline($cleantext);
}
echo"</span></a></b></u></s></i>";
}

echo $text;
}
*/


function parsecodes($text)
{
/*
if(preg_match("#(\[q\](.*?)\[/q\])#si", $text)) {
$bad_entities = array(
"[color=red]", "[color=blue]", "[color=green]", "[color=yellow]", 
"[color=purple]", "[color=grey]", "[color=gold]", "[color=brown]", "[color=orange]", "[/color]", 
 "[b]", "[/b]", "[u]", "[/u]", 
"[s]", "[/s]", "[i]", "[/i]", "[font=small]", "[font=big]", "[/font]", "[q]", "[/q]");

$safe_entities = array("<span style='color: red;'>","<span style='color: blue;'>", "<span style='color: green;'>", 
"<span style='color: yellow;'>", "<span style='color: purple;'>", 
"<span style='color: grey;'>", "<span style='color: gold;'>", "<span style='color: brown;'>", "<span style='color: orange;'>", "</span>",
 "<b>", "</b>", "<u>", "</u>", "<s>", "</s>", 
 "<i>", "</i>", "<span style='font-size: 9px;'>", "<span style='font-size: 14px;'>", "</span>"
 , "<div id='quote' />", "</div>");
} else {
$bad_entities = array(
"[color=red]", "[color=blue]", "[color=green]", "[color=yellow]", 
"[color=purple]", "[color=grey]", "[color=gold]", "[color=brown]", "[color=orange]", "[/color]", 
 "[b]", "[/b]", "[u]", "[/u]", 
"[s]", "[/s]", "[i]", "[/i]", "[font=small]", "[font=big]", "[/font]");

$safe_entities = array("<span style='color: red;'>","<span style='color: blue;'>", "<span style='color: green;'>", 
"<span style='color: yellow;'>", "<span style='color: purple;'>", 
"<span style='color: grey;'>", "<span style='color: gold;'>", "<span style='color: brown;'>", "<span style='color: orange;'>", "</span>",
 "<b>", "</b>", "<u>", "</u>", "<s>", "</s>", 
 "<i>", "</i>", "<span style='font-size: 9px;'>", "<span style='font-size: 14px;'>", "</span>"
);
}
$cleantext = str_replace($bad_entities, $safe_entities, $text);

if(isset($_SESSION['username']) && ($_SESSION['password'])) {


$result = mysql_query("SELECT * FROM usersystem WHERE username='".$_SESSION['username']."' AND password='".$_SESSION['password']."'");
while($row = mysql_fetch_array($result))
  { 
if($row['smileys'] == "on") {
echo $cleantext;
} else { echo $text; } }
} else {
echo $cleantext;
}
*/
echo $text;
}



function strcodes($text) 
{

$bad_entities = array(":)", ":(", "XO", ":S", ":O", "#king", "#brokenheart", "B)", "#devil", "#disappointed", "8)", "#goodkid", ":D", ":}", "#heart", ":|", ":P", ":o",
"+_+", "#sleepy", "#sad", "#smile", "#speechless", "#overhappy", "#thumbsdown", "#thumbsup", ":{", ";)", "#yawn", "-_-", "#oddface", "#updown", "00_", "#monster", "o.O", "*_*", "^^", "#scary",
"#tophat", "#peace");

$safe_entities = array(
"<img src='images/smileys/smile.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/sad.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/angry.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/confused.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/huffy.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/winnerface.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/brokenheart.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/cool.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/devil.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/dissapointed.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/funnyface.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/goodkid.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/grin.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/hungry.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/love.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/nosmile.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/pfft.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/shocked.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/sick.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/sleepy.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/smallsad.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/smallsmile.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/speechless.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/sunface.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/thumbsdown.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/thumbsup.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/vomity.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/wink.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/yawn.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/you-didnt-get-it.gif' border='0' style='vertical-align: middle;' />",
 "<img src='images/smileys/oddface.gif' border='0' style='vertical-align: middle;' />",
 
"<img src='images/smileys/updownboy.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/sweet.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/monster.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/oo.gif' border='0' style='vertical-align: middle;' />",

 "<img src='images/smileys/emokid.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/mm.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/scary.gif' border='0' style='vertical-align: middle;' />",

"<img src='images/smileys/tophat.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/peace.gif' border='0' style='vertical-align: middle;' />",

);


$cleantext = str_replace($bad_entities, $safe_entities, $text);

if(isset($_SESSION['username']) && ($_SESSION['password'])) {


$result = mysql_query("SELECT * FROM usersystem WHERE username='".$_SESSION['username']."' AND password='".$_SESSION['password']."'");
while($row = mysql_fetch_array($result))
  { 
if($row['smileys'] == "on") {
echo $cleantext;
} else { echo $text; } }
} else {
echo endline($cleantext);
}


}
?>