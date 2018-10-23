<?php

include"main.php";

database_con();

if($settings['maintenance'] == "yes" && $user['level'] != "4") {
die("<meta http-equiv='refresh' content='0; url=maintenance.php'>"); } 

pagetop("Leet-speak oversetter");
include"includes/subheader_fancenter.php";
pagemid();

if(isset($_POST['text'])) {

$text = strtolower(stripslashes($_POST['text']));

$leet = array("0", "(", "|<", "|)", "1", "2", "3", "4", "5", "6", "7", "8", "9", "|-|", "!", "><", "/\\/\\", "|\\|", "\\/\\/");
$nor = array("o", "c", "k", "d", "l", "r", "e", "a", "s", "g", "t", "b", "p", "h", "i", "x", "m", "n", "w");
if($_POST['type'] != "nor-leet") {
$do = str_replace($leet, $nor, $text);
} else {
$do = str_replace($nor, $leet, $text);
}
echo "<b>Oversatt tekst:</b><br/><br/>".striphtml($do)."<hr/>";
}

echo"<form method='post'><b>Oversett Leet-speak tekst:</b><br/><textarea id='textinput' name='text' style=' width: 400px; height: 300px; '>
".stripslashes($_POST['text'])."</textarea><br/><br/><select name='type' id='textinput'>
";
echo"
<option "; if($_POST['type'] == "leet-nor") { echo"SELECTED"; } echo" value='leet-nor'>Leet-speak til Norsk</option>
<option "; if($_POST['type'] == "nor-leet") { echo"SELECTED"; } echo"  value='nor-leet'>Norsk til Leet-speak*</option>
";
echo"
</select>
<br/><br/><input type='submit' id='button' value='Send'><br/><br/>*Virker kun med sm&#229; bokstaver.<br/><br/>laget av sumodonut.";

pagebot($settings['footer']);

?>