<?php

/***************************\
| - DucePHP library.        |
| - Developed by sumodonut. |
\***************************/

// Custom error handler.
if($user['level'] > 3) {
function fetch_error($errno, $errstr, $errfile, $errline)
{
echo"<b>PHP error:</b> \"$errstr\" (Error-level: <b>$errno</b>)<br/>";
echo"Error was triggered at line <b>$errline</b> in <b>$errfile</b><br/>";
exit;
}
} else {
function fetch_error($errno, $errstr, $errfile, $errline)
{
echo"<b>Oisann! Det oppstod en feil i v&#229;re systemer!<br/>Teknisk ansvarlig er blitt varslet og vil pr&#248;ve &#229; rette opp feilen p&#229; kortest mulig tid.</b>";
//mail("sumodonut@wuax.net", "PHP Error", "PHP error: \"$errstr\" (Error-level: $errno) Error was triggered at line $errline in $errfile", "From: @Error-reporting <error-reporting@wuax.net>");
exit;
}
}

// set the error handler to use the custom error function
// and report all errors except from notices.
set_error_handler("fetch_error", E_ALL ^ E_NOTICE);

// Checks wheter the given array is in the text.
function isstr($array, $text)
{
if(strpos($text, $array) === false) {
return false;
} else {
return true;
}
}

// Find the root-folder of a given link.
function basedir($link)
{
$link = str_replace("http://", null, $link);
if(isstr("/", $link)) {
$link = explode("/", $link);
$result = $link[0];
} else { $result = $link; }
return"http://".$result;
}

// This functions shortens the array if it is too long.
function maxlength($text, $max, $shorten=true)
{
if(strlen($text) >= $max) {
if($shorten) {
$text = substr($text, 0, ($max-3))."...";
} else {
$text = substr($text, 0, ($max));
} }
return $text;
}

// This calculates the folder-level, it requires a file to look for.
function calculate_folder_level($file)
{
$dir = ""; $count = 0;
while(!file_exists($dir.$file)) {
$dir .= "../"; $count++;
if($count > 5) {
return false;
}
}
define("DIR_LEVEL", $dir, true);
}


// This will make a encryption of a given text and make it impossible to read.
/*
function sumohash($array)
{
$array = strtolower(str_replace(" ", null, $array));
$array = str_split($array);
$ini = "";
foreach($array as $hash)
{
$ini .= str_rot13(strrev(sha1(soundex($hash))));
}
$ini = substr($ini, floor(strlen($ini) / 2));
$ini = hash('sha256', base64_encode($ini));
$array = strrev(substr($ini, floor(strlen($ini) / 2)));
return $array;
}
*/
function sumohash($array)
{
$ini = strtolower(str_replace(" ", null, $array));
$ini = hash('sha256', base64_encode($ini));
$array = strrev(substr($ini, floor(strlen($ini) / 2)));
return $array;
}


// Has the same function of wordwrap() except from that it only breaks long words.
function breakword($array)
{
$array = explode(" ", $array);

foreach($array as $word)
{
$wrap = 0; $i = 0;
while($i < strlen($word)) {
if($wrap >= 45) {
$word = wordwrap($word, 45, "<br/>", true);
$wrap = 0;
}
$i++; $wrap++;
}
$text[] = $word;
}
$array = implode(" ", $text);
return $array;
}


// Defines the url in the adrress bar.
define("BROWSER_URL", $_SERVER['REQUEST_URI'], true);

?>
