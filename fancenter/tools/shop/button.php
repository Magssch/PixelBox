<?php

if(isset($_GET['t'])) {
$text = addslashes($_GET['t']);
} else {
$text = 0;
}

if(isset($_GET['f']) && is_numeric($_GET['f']) && $_GET['f'] > 0 && $_GET['f'] < 6) {
$font = $_GET['f'];
} else {
$font = 3;
}

$my_img = imagecreatefromgif("bg.gif");

$text_colour = imagecolorallocate($my_img, 0, 0, 0);

$text_width = imagefontwidth(3)*strlen($text);
$center = ceil(55 / 2);
$x = $center - (ceil($text_width/2));

imagestring($my_img, $font, $x, 6, $text, $text_colour);

header("Content-type: image/png");

imagegif($my_img);
imagedestroy($my_img);

?>