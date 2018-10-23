<?php

error_reporting(0);

if(isset($_GET['habbo'])) {
$habbo = addslashes($_GET['habbo']);
} else {
$habbo = 0;
}

if(isset($_GET['head'])) {
$head = addslashes($_GET['head']);
} else {
$head = "std";
}

if(isset($_GET['hd'])) {
$hd = addslashes($_GET['hd']);
} else {
$hd = 2;
}

if(isset($_GET['d']) && is_numeric($_GET['d']) && $_GET['d'] > 0 && $_GET['d'] < 5) {
$dir = $_GET['d'];
} else {
$dir = 1;
}
if($dir == 1) {
$habbo = imagecreatefromgif("http://www.habbo.no/habbo-imaging/avatarimage?user=$habbo&action=std&direction=4&head_direction=$hd&size=b&gesture=$head&img_format=gif");
} elseif($dir == 2) {
$habbo = imagecreatefromgif("http://www.habbo.no/habbo-imaging/avatarimage?user=$habbo&action=std&direction=2&head_direction=$hd&size=b&gesture=$head&img_format=gif");
} elseif($dir == 3) {
$habbo = imagecreatefromgif("http://www.habbo.no/habbo-imaging/avatarimage?user=$habbo&action=std&direction=0&head_direction=$hd&size=b&gesture=$head&img_format=gif");
} else {
$habbo = imagecreatefromgif("http://www.habbo.no/habbo-imaging/avatarimage?user=$habbo&action=std&direction=6&head_direction=$hd&size=b&gesture=$head&img_format=gif");
}
if($habbo) {

$hoverboard = imagecreatefromgif("board_".$dir.".gif");

if($dir == 1) {
imagecopy($hoverboard, $habbo, 0, 0, -2, 4, 64, 111);
} elseif($dir == 2) {
imagecopy($hoverboard, $habbo, 0, 0, 2, 4, 64, 111);
} elseif($dir == 3) {
imagecopy($hoverboard, $habbo, 0, 0, 2, 4, 64, 111);
} else {
imagecopy($hoverboard, $habbo, 0, 0, -2, 4, 64, 111);
}

header("Content-type: image/png");

imagegif($hoverboard);
imagedestroy($hoverboard);
} else {
echo("Habboen eksisterer ikke!");
}
?>