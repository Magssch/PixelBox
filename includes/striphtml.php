<?php

if(!defined("MAIN_SET")) { die("Dette er en systemfil som er skjult for brukere"); }

$search = array("&", "\"", "'", "<", ">");
$replace = array("&amp;", "&quot;", "&#39;", "&lt;", "&gt;");
$text = str_replace($search, $replace, $text);

?>