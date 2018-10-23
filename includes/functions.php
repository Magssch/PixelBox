<?php

// MERK: noen disse kodene er tatt fra - eller inneholder koder fra CMS'et php-fusion!

if(!defined("MAIN_SET")) { die("Dette er en systemfil som er skjult for brukere"); }

function removespace($text)
{
$cleantext = str_replace(" ", NULL, $text);
return $cleantext;
}

   // array_search with recursive searching, optional partial matches and optional search by key
    function array_find_r($needle, $haystack, $partial_matches = false, $search_keys = false) {
        if(!is_array($haystack)) return false;
        foreach($haystack as $key=>$value) {
            $what = ($search_keys) ? $key : $value;
            if($needle===$what) return $key;
            else if($partial_matches && @strpos($what, $needle)!==false) return $key;
            else if(is_array($value) && array_find_r($needle, $value, $partial_matches, $search_keys)!==false) return $key;
        }
        return false;
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
		
		if (!$tags && $chars == 43) {
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
return endline($text);
}

function striphtml_r($text)
{
include"includes/striphtml2.php";
return $text;
}

function stripurl($text)
{
include"includes/striphtml.php";
return $text;
}


function striphtmltags($text)
{
$search = array("&", "\"", "'", "<", ">");
$replace = array("", "", "", "", "");
$text = str_replace($search, $replace, $text);
return $text;
}


function remove($word, $text)
{
$cleantext = str_replace($word, NULL, $text);
return $cleantext;
}







/*
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
$smiley_image = "<img src='".$smiley['smiley_image']."' alt='".$smiley['smiley_image']."' onMouseover=\"ddrivetip('".$smiley['smiley_title']."','white')\"; onMouseout=\"hideddrivetip()\" style='vertical-align:middle;' />";
$text = preg_replace("#{$smiley_code}#si", $smiley_image, $text);

}
*/
function strbadges($text)
{
$text = str_replace(",", null, $text);

$result = mysql_query("SELECT * FROM badges ORDER BY id");
while($row = mysql_fetch_array($result))
  {
$badge[] = $row['code'];
$replace[] = "<img src='".$row['image']."' alt='".$row['code']."' onMouseover=\"ddrivetip('".addslashes($row['title'])."','white')\"; onMouseout=\"hideddrivetip()\" style='vertical-align:middle; margin: 7px;' />";
  }

$text = str_replace($badge, $replace, $text);

return $text;

}

function strfbadges($text)
{
$text = str_replace(",", null, $text);

$result = mysql_query("SELECT * FROM badges ORDER BY id");
while($row = mysql_fetch_array($result))
  {
$badge[] = $row['code'];
$replace[] = "<a style='cursor: pointer;' onclick='window.location.href=\"userpanel?setbadge=".$row['code']."\";'><img src='".$row['image']."' alt='".$row['code']."' onMouseover=\"ddrivetip('".addslashes($row['title'])."','white')\"; onMouseout=\"hideddrivetip()\" style='vertical-align:middle; margin: 7px;' border='0' /></a>";
  }

$text = str_replace($badge, $replace, $text);

return $text;

}
/*
function strfurni($text)
{
$text = str_replace(",", null, $text);


$smiley_cache = array();
$result = mysql_query("SELECT * FROM furni");
while($row = mysql_fetch_array($result))
  {
  $smiley_cache[] = array(
	"smiley_code" => $row['code'],
	"smiley_image" => $row['image'],
	"smiley_mimage" => $row['mimage'],
	"smiley_cost" => $row['cost'],
	"smiley_title" => $row['title'],
  );
  }
 
foreach ($smiley_cache as $smiley) {

if(empty($smiley['smiley_mimage'])) {

$mimage = $smiley['smiley_image'];

} else { $mimage = $smiley['smiley_mimage']; }

$title = $smiley['smiley_title'];



$smiley_code = preg_quote($smiley['smiley_code']);

$smiley_image = "<img src='".$smiley['smiley_image']."' border='0' alt='".$smiley['smiley_code']."' style='vertical-align:middle;' 
onMouseover=\"ddrivetip('<b>".$smiley['smiley_code']."</b><br/>".$title."<br/><b>Verdi:</b> ".$smiley['smiley_cost']." <img src=\'themes/".THEME."/buttons/money.gif\' alt=\'mynt.\' style=\'vertical-align:middle;\'>','white')\";
onMouseout=\"hideddrivetip()\" onMouseDown='this.src = \"".$mimage."\"; ' onMouseUp='this.src = \"".$smiley['smiley_image']."\"; ' />&nbsp;";
$text = preg_replace("#{$smiley_code}#si", $smiley_image, $text);

}

return "<table><tr>".$text."</tr></table>";
}
*/
function strfurni($text)
{
$text = str_replace(",", null, $text);

$result = mysql_query("SELECT * FROM furni ORDER BY id");
while($row = mysql_fetch_array($result))
  {
$furni[] = $row['code'];
if(empty($row['mimage'])) {

$mimage = $row['image'];
$ani = "";
$ani2 = " cursor: default;";
} else { $mimage = $row['mimage']; $ani = "<b>Trykkf&#248;lsom</b><br/>"; $ani2 = " cursor: pointer;"; }


$replace[] = "<img src='".$row['image']."' border='0' alt='".$row['code']."' style='vertical-align:middle; margin: 6px; ".$ani2."' 
onMouseover=\"ddrivetip('<b>".$row['code']."</b><br/>".$row['title']."<br/>".$ani."<b>Verdi:</b> ".$row['cost']."<img src=\'themes/".THEME."/buttons/money.gif\' alt=\'mynt.\' style=\'vertical-align:-2px; padding-left:3px;\'>','white')\";
 onMouseDown='this.src = \"".$mimage."\"; ' onMouseout=' hideddrivetip(); this.src = \"".$row['image']."\"; ' />";

  }


$text = str_replace($furni, $replace, $text);

return $text;

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
?> <a onclick="addText('<?php echo $text; ?>', '[img]', '[/img]', '<?php echo $form; ?>');" /><b>[img] - (Legg til bilde i teksten)</b></a><br/> 
 <a onclick="addText('<?php echo $text; ?>', '[url=', '][/url]', '<?php echo $form; ?>');" /><b>[url] - (Legg til hyperlenke i teksten)</b></a><br/>
<?php } ?>

<div style='padding:2px;'></div>
<?php

if(defined("FORUM2")) {
$y=73;
} else {
$y=68;
}
echo"<div style='border: 1px solid #999; background: #CCCCCC; padding-top:4px; padding-bottom:4px; width:".$y."%;'>";



if(defined("FORUM2")) {

?>

<a onclick="addText('<?php echo $text; ?>', '[url=', '][/url]', '<?php echo $form; ?>');" style='cursor: pointer;' /><img src='themes/<?=THEME?>/buttons/bb8.gif' border='0' title='Hyperlenke' style='vertical-align: middle;'></a>

<?php

}
?>
<a onclick="addText('<?php echo $text; ?>', '[b]', '[/b]', '<?php echo $form; ?>');" style='cursor: pointer;' /><img src='themes/<?php echo THEME;?>/buttons/bb1.gif' border='0' title='Fet tekst' style='vertical-align: middle;'></a>
<a onclick="addText('<?php echo $text; ?>', '[s]', '[/s]', '<?php echo $form; ?>');" style='cursor: pointer;' /><img src='themes/<?php echo THEME;?>/buttons/bb7.gif' border='0' title='Gjennomstreket tekst' style='vertical-align: middle;'></a>
<a onclick="addText('<?php echo $text; ?>', '[quote]', '[/quote]', '<?php echo $form; ?>');" style='cursor: pointer;' /><img src='themes/<?php echo THEME;?>/buttons/bb4.gif' border='0' title='Sitat' style='vertical-align: middle;'></a>
<a onclick="addText('<?php echo $text; ?>', '[u]', '[/u]', '<?php echo $form; ?>');" style='cursor: pointer;' /><img src='themes/<?php echo THEME;?>/buttons/bb3.gif' border='0' title='Understreket tekst' style='vertical-align: middle;'></a>

<a onclick="addText('<?php echo $text; ?>', '[i]', '[/i]', '<?php echo $form; ?>');" style='cursor: pointer;' /><img src='themes/<?php echo THEME;?>/buttons/bb2.gif' border='0' title='Italiensk tekst' style='vertical-align: middle;'></a>
<a onclick="addText('<?php echo $text; ?>', '[font=small]', '[/font]', '<?php echo $form; ?>');" style='cursor: pointer;' /><img src='themes/<?php echo THEME;?>/buttons/bb6.gif' border='0' title='Liten skrift' style='vertical-align: middle;'></a>
<a onclick="addText('<?php echo $text; ?>', '[font=big]', '[/font]', '<?php echo $form; ?>');" style='cursor: pointer;' /><img src='themes/<?php echo THEME;?>/buttons/bb5.gif' border='0' title='Stor skrift' style='vertical-align: middle;'></a>

<b><select id="textinput" style='vertical-align: middle;' onchange="addText('<?php echo $text; ?>', this.value, '[/color]', '<?php echo $form; ?>');">
<option id='color'>Farge</option>
<option value="[color=red]" style='color:red;'>R&#248;d</option>
<option value="[color=blue]" style='color:blue;'>Bl&#229;</option>
<option value="[color=pink]" style='color:pink;'>Rosa</option>
<option value="[color=green]" style='color:green;'>Gr&#248;nn</option>
<option value="[color=yellow]" style='color:yellow;'>Gul</option>
<option value="[color=purple]" style='color:purple;'>Lilla</option>
<option value="[color=grey]" style='color:grey;'>Gr&#229;</option>
<option value="[color=gold]" style='color:gold;'>Gull</option>
<option value="[color=brown]" style='color:brown;'>Brun</option>
<option value="[color=orange]" style='color:orange;'>Oransje</option>
</select></b>

<select id="textinput" style='vertical-align: middle;' onchange="addText('<?php echo $text; ?>', this.value, '[/bgcolor]', '<?php echo $form; ?>');">
<option>Bakgrunn</option>
<option value="[bgcolor=rgb(255,48,48)]" style='background-color:rgb(255,48,48);'>R&#248;d</option>
<option value="[bgcolor=rgb(72,118,255)]" style='background-color:rgb(72,118,255);'>Bl&#229;</option>
<option value="[bgcolor=rgb(255,182,193)]" style='background-color:rgb(255,182,193);'>Rosa</option>
<option value="[bgcolor=rgb(50,205,50)]" style='background-color:rgb(50,205,50);'>Gr&#248;nn</option>
<option value="[bgcolor=rgb(238,238,0)]" style='background-color:rgb(238,238,0);'>Gul</option>
<option value="[bgcolor=rgb(186,85,211)]" style='background-color:rgb(186,85,211);'>Lilla</option>
<option value="[bgcolor=rgb(191,191,191)]" style='background-color:rgb(191,191,191);'>Gr&#229;</option>
<option value="[bgcolor=rgb(255,215,0)]" style='background-color:rgb(255,215,0);'>Gull</option>
<option value="[bgcolor=rgb(156,102,31)]" style='background-color:rgb(156,102,31);'>Brun</option>
<option value="[bgcolor=rgb(255,140,0)]" style='background-color:rgb(255,140,0);'>Oransje</option>
</select>
</div>

<img src='images/smileys/smile.gif' border='0' style='vertical-align: middle; cursor: pointer;' onclick="insertText('<?php echo $text; ?>', ':)', '<?php echo $form; ?>');" />
<img src='images/smileys/sad.gif' border='0' style='vertical-align: middle; cursor: pointer;' onclick="insertText('<?php echo $text; ?>', ':(', '<?php echo $form; ?>');" />

<img src='images/smileys/angry.gif' border='0' style='vertical-align: middle; cursor: pointer;' onclick="insertText('<?php echo $text; ?>', 'XO', '<?php echo $form; ?>');" /> 
<img src='images/smileys/confused.gif' border='0' style='vertical-align: middle; cursor: pointer;' onclick="insertText('<?php echo $text; ?>', ':S', '<?php echo $form; ?>');" />
<img src='images/smileys/huffy.gif' border='0' style='vertical-align: middle; cursor: pointer;' onclick="insertText('<?php echo $text; ?>', ':O', '<?php echo $form; ?>');" /> 
<img src='images/smileys/winnerface.gif' border='0' style='vertical-align: middle; cursor: pointer;' onclick="insertText('<?php echo $text; ?>', '#king', '<?php echo $form; ?>');" />
<img src='images/smileys/brokenheart.gif' border='0' style='vertical-align: middle; cursor: pointer;' onclick="insertText('<?php echo $text; ?>', '#brokenheart', '<?php echo $form; ?>');" /> 
<img src='images/smileys/cool.gif' border='0' style='vertical-align: middle; cursor: pointer;' onclick="insertText('<?php echo $text; ?>', 'B)', '<?php echo $form; ?>');" />
<img src='images/smileys/devil.gif' border='0' style='vertical-align: middle; cursor: pointer;' onclick="insertText('<?php echo $text; ?>', '#devil', '<?php echo $form; ?>');" /> 
<img src='images/smileys/dissapointed.gif' border='0' style='vertical-align: middle; cursor: pointer;' onclick="insertText('<?php echo $text; ?>', '#disappointed', '<?php echo $form; ?>');" />
<img src='images/smileys/funnyface.gif' border='0' style='vertical-align: middle; cursor: pointer;' onclick="insertText('<?php echo $text; ?>', '8)', '<?php echo $form; ?>');" /> 
<img src='images/smileys/goodkid.gif' border='0' style='vertical-align: middle; cursor: pointer;' onclick="insertText('<?php echo $text; ?>', '#goodkid', '<?php echo $form; ?>');" />
<img src='images/smileys/grin.gif' border='0' style='vertical-align: middle; cursor: pointer;' onclick="insertText('<?php echo $text; ?>', ':D', '<?php echo $form; ?>');" />
<img src='images/smileys/hungry.gif' border='0' style='vertical-align: middle; cursor: pointer;' onclick="insertText('<?php echo $text; ?>', ':}', '<?php echo $form; ?>');" />
<img src='images/smileys/love.gif' border='0' style='vertical-align: middle; cursor: pointer;' onclick="insertText('<?php echo $text; ?>', '#heart', '<?php echo $form; ?>');" /> 
<img src='images/smileys/nosmile.gif' border='0' style='vertical-align: middle; cursor: pointer;' onclick="insertText('<?php echo $text; ?>', ':|', '<?php echo $form; ?>');" />
<img src='images/smileys/pfft.gif' border='0' style='vertical-align: middle; cursor: pointer;' onclick="insertText('<?php echo $text; ?>', ':P', '<?php echo $form; ?>');" /> 
<img src='images/smileys/shocked.gif' border='0' style='vertical-align: middle; cursor: pointer;' onclick="insertText('<?php echo $text; ?>', ':o', '<?php echo $form; ?>');" />
<img src='images/smileys/sick.gif' border='0' style='vertical-align: middle; cursor: pointer;' onclick="insertText('<?php echo $text; ?>', '+_+', '<?php echo $form; ?>');" /> 
<img src='images/smileys/sleepy.gif' border='0' style='vertical-align: middle; cursor: pointer;' onclick="insertText('<?php echo $text; ?>', '#sleepy', '<?php echo $form; ?>');" />
<img src='images/smileys/smallsad.gif' border='0' style='vertical-align: middle; cursor: pointer;' onclick="insertText('<?php echo $text; ?>', '#sad', '<?php echo $form; ?>');" /> 
<img src='images/smileys/smallsmile.gif' border='0' style='vertical-align: middle; cursor: pointer;' onclick="insertText('<?php echo $text; ?>', '#smile', '<?php echo $form; ?>');" />
<img src='images/smileys/speechless.gif' border='0' style='vertical-align: middle; cursor: pointer;' onclick="insertText('<?php echo $text; ?>', '#speechless', '<?php echo $form; ?>');" /> 
<img src='images/smileys/sunface.gif' border='0' style='vertical-align: middle; cursor: pointer;' onclick="insertText('<?php echo $text; ?>', '#overhappy', '<?php echo $form; ?>');" /> 
<img src='images/smileys/thumbsdown.gif' border='0' style='vertical-align: middle; cursor: pointer;' onclick="insertText('<?php echo $text; ?>', '#thumbsdown', '<?php echo $form; ?>');" /> 
<img src='images/smileys/thumbsup.gif' border='0' style='vertical-align: middle; cursor: pointer;' onclick="insertText('<?php echo $text; ?>', '#thumbsup', '<?php echo $form; ?>');" /> 
<img src='images/smileys/vomity.gif' border='0' style='vertical-align: middle; cursor: pointer;' onclick="insertText('<?php echo $text; ?>', ':{', '<?php echo $form; ?>');" /> 
<img src='images/smileys/wink.gif' border='0' style='vertical-align: middle; cursor: pointer;' onclick="insertText('<?php echo $text; ?>', ';)', '<?php echo $form; ?>');" /> 
<img src='images/smileys/yawn.gif' border='0' style='vertical-align: middle; cursor: pointer;' onclick="insertText('<?php echo $text; ?>', '#yawn', '<?php echo $form; ?>');" /> 
<img src='images/smileys/you-didnt-get-it.gif' border='0' style='vertical-align: middle; cursor: pointer;' onclick="insertText('<?php echo $text; ?>', '-_-', '<?php echo $form; ?>');" /> 
<img src='images/smileys/oddface.gif' border='0' style='vertical-align: middle; cursor: pointer;' onclick="insertText('<?php echo $text; ?>', '#oddface', '<?php echo $form; ?>');" /> 
<img src='images/smileys/updownboy.gif' border='0' style='vertical-align: middle; cursor: pointer;' onclick="insertText('<?php echo $text; ?>', '#updown', '<?php echo $form; ?>');" /> 
<img src='images/smileys/sweet.gif' border='0' style='vertical-align: middle; cursor: pointer;' onclick="insertText('<?php echo $text; ?>', '00_', '<?php echo $form; ?>');" /> 
<img src='images/smileys/monster.gif' border='0' style='vertical-align: middle; cursor: pointer;' onclick="insertText('<?php echo $text; ?>', '#monster', '<?php echo $form; ?>');" /> 
<img src='images/smileys/oo.gif' border='0' style='vertical-align: middle; cursor: pointer;' onclick="insertText('<?php echo $text; ?>', 'o.O', '<?php echo $form; ?>');" /> 
<img src='images/smileys/emokid.gif' border='0' style='vertical-align: middle; cursor: pointer;' onclick="insertText('<?php echo $text; ?>', '*_*', '<?php echo $form; ?>');" /> 
<img src='images/smileys/mm.gif' border='0' style='vertical-align: middle; cursor: pointer;' onclick="insertText('<?php echo $text; ?>', '^^', '<?php echo $form; ?>');" /> 
<img src='images/smileys/scary.gif' border='0' style='vertical-align: middle; cursor: pointer;' onclick="insertText('<?php echo $text; ?>', '#scary', '<?php echo $form; ?>');" /> 
<img src='images/smileys/tophat.gif' border='0' style='vertical-align: middle; cursor: pointer;' onclick="insertText('<?php echo $text; ?>', '#tophat', '<?php echo $form; ?>');" />
<img src='images/smileys/peace.gif' border='0' style='vertical-align: middle; cursor: pointer;' onclick="insertText('<?php echo $text; ?>', '#peace', '<?php echo $form; ?>');" />
<img src='images/smileys/yeh.gif' border='0' style='vertical-align: middle; cursor: pointer;' onclick="insertText('<?php echo $text; ?>', ':L', '<?php echo $form; ?>');" />
<img src='images/smileys/wetface.gif' border='0' style='vertical-align: middle; cursor: pointer;' onclick="insertText('<?php echo $text; ?>', ';\'S', '<?php echo $form; ?>');" />

<?php
}


function strsmileys($text) 
{

$bad_entities = array(":)", ":(", "XO", ":S", ":O", "#king", "#brokenheart", "B)", "#devil", "#disappointed", "8)", "#goodkid", ":D", ":}", "#heart", ":|", ":P", ":o",
"+_+", "#sleepy", "#sad", "#smile", "#speechless", "#overhappy", "#thumbsdown", "#thumbsup", ":{", ";)", "#yawn", "-_-", "#oddface", "#updown", "00_", "#monster", "o.O", "*_*", "^^", "#scary",
"#tophat", "#peace", "d0b", ":L", ";&#39;S");

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
"<img src='images/smileys/doubleup.gif' border='0' style='vertical-align: middle;' />",

"<img src='images/smileys/yeh.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/wetface.gif' border='0' style='vertical-align: middle;' />",

);


$cleantext = str_replace($bad_entities, $safe_entities, $text);

if(isset($_SESSION['username']) && ($_SESSION['password'])) {


$result = mysql_query("SELECT * FROM usersystem WHERE username='".$_SESSION['username']."' AND password='".$_SESSION['password']."'");
$row = mysql_fetch_array($result);
if($row['smileys'] == "on") {
return $cleantext;
} else { return $text; } 

} else {
return $cleantext;
}


}

function struncodes($text) 
{

if(NEWS == "yes" && !defined("RENEWS")) {
$bad_entities= array ('(\[b\](.*?)\[/b\])is', '(\[u\](.*?)\[/u\])is', '(\[s\](.*?)\[/s\])is', '(\[i\](.*?)\[/i\])is', 
 '(\[font=small\](.*?)\[/font\])is', '(\[font=big\](.*?)\[/font\])is', '(\[url=([^]]+)\](.*?)\[/url\])is', '(\[quote=([^]]+)\](.*?)\[/quote\])is', '(\[quote\](.*?)\[/quote\])is', '(\[color=([^]]+)\](.*?)\[/color\])is'
 ,'(\[img\](.*?)\[/img\])is' ,'(\[img=([^]]+)\](.*?)\[/img\])is');
$safe_entities = array ('<b>\\1</b>', '<u>\\1</u>', '<s>\\1</s>', '<i>\\1</i>', '<span style="font-size: 9px;">\\1</span>', '<span style="font-size: 14px;">\\1</span>', '<a href="\\1">\\2</a>'
,'<div id="quote">Siterer: <b><i>\\1</i></b><hr/>\\2</div>', '<div id="quote">\\1</div>', '<span style="color: \\1;">\\2</span>', '<img src="\\1" border="0" alt="bilde">', '<img src="\\2" style="\\1" border="0" alt="bilde">'
);
} else {
$bad_entities= array ('(\[b\](.*?)\[/b\])is', '(\[u\](.*?)\[/u\])is', '(\[s\](.*?)\[/s\])is', '(\[i\](.*?)\[/i\])is', 
 '(\[font=small\](.*?)\[/font\])is', '(\[font=big\](.*?)\[/font\])is', '(\[quote=([^]]+)\](.*?)\[/quote\])is', '(\[quote\](.*?)\[/quote\])is', '(\[color=([^]]+)\](.*?)\[/color\])is'
 , '(\[bgcolor=([^]]+)\](.*?)\[/bgcolor\])is');
$safe_entities = array ('<b>\\1</b>', '<u>\\1</u>', '<s>\\1</s>', '<i>\\1</i>', '<span style="font-size: 9px;">\\1</span>', '<span style="font-size: 14px;">\\1</span>'
,'<div id="quote">Siterer: <b><i>\\1</i></b><hr/>\\2</div>', '<div id="quote">\\1</div>', '<span style="color: \\1;">\\2</span>', '<span style="background: \\1; padding-right:1px; padding-left:1px;">\\2</span>'
);

if(defined("FORUM2")) {
$bad_entities[] = '(\[url=([^]]+)\](.*?)\[/url\])is';
$safe_entities[] = '<a href="\\1">\\2</a>';
}
}
$cleantext = preg_replace($bad_entities, $safe_entities, $text);

if(isset($_SESSION['username']) && ($_SESSION['password'])) {


$result = mysql_query("SELECT * FROM usersystem WHERE username='".$_SESSION['username']."' AND password='".$_SESSION['password']."'");
while($row = mysql_fetch_array($result))
  { 
if($row['smileys'] == "on") {
return strsmileys($cleantext);
} else { return $text; } }
} else {
return strsmileys($cleantext);
}
}

function strcodes($text, $chars=false) 
{
if($chars) {
include"includes/chars.php"; }
return struncodes($text);
}


function is_online($user)
{

$query = mysql_query("SELECT last_active FROM usersystem WHERE username = '".$user."'");
$db = mysql_fetch_array($query);

if($db['last_active'] + 240 >= time()) {
return(true);
} else {
return(false);
}

}

function get_forum_level($posts)
{

if($posts >= "7000") {
$forum_level = "10";

} elseif($posts >= "4000") {
$forum_level = "9";

} elseif($posts >= "2000") {
$forum_level = "8";

} elseif($posts >= "1337") {
$forum_level = "7";

} elseif($posts >= "900") {
$forum_level = "6";

} elseif($posts >= "500") {
$forum_level = "5";

} elseif($posts >= "300") {
$forum_level = "4";

} elseif($posts >= "150") {
$forum_level = "3";

} elseif($posts >= "50") {
$forum_level = "2";

} elseif($posts >= "20") {
$forum_level = "1";

} elseif($posts >= "0") {
$forum_level = "0";
}
return $forum_level;
}

function get_forum_rank($posts)
{

/*
$level = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "10");
$rank = array("Nybegynner", "Innflytter", "Praktikant", "Saksbehandler", "Politiker", "Borger", "Hertug", "Eliteposter", "Keiser", "Konge", "Legende");
$forum_rank = str_replace($level, $rank, $posts);
*/

if($posts >= "7000") {
$forum_rank = "Legende";

} elseif($posts >= "4000") {
$forum_rank = "Konge";

} elseif($posts >= "2000") {
$forum_rank = "Keiser";

} elseif($posts >= "1337") {
$forum_rank = "Eliteposter";

} elseif($posts >= "900") {
$forum_rank = "Hertug";

} elseif($posts >= "500") {
$forum_rank = "Borger";

} elseif($posts >= "300") {
$forum_rank = "Politiker";

} elseif($posts >= "150") {
$forum_rank = "Praktikant";

} elseif($posts >= "50") {
$forum_rank = "Saksbehandler";

} elseif($posts >= "20") {
$forum_rank = "Innflytter";

} elseif($posts >= "0") {
$forum_rank = "Nybegynner";
}

$numbers = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
$null = array(null, null, null, null, null, null, null, null, null, null);
$forum_rank = str_replace($numbers, $null, $forum_rank);

return $forum_rank;
}

function is_censor_valid($string)
{
$query = mysql_query("SELECT bad_words FROM settings");
$db = mysql_fetch_array($query);

$bad_words = explode(",", str_replace("\n", null, str_replace(" ", null,  $db['bad_words'])));

$i=0;
foreach($bad_words as $bad)
{
if($bad != "") {
if(isstr($bad, $string)) {
$i++;
} } }
if($i > 0) { return false;
} else { return true; }
}



?>