<?php


 $url="http://www.habbo.no/habbo-imaging/avatarimage?user=sumodonut&action=crr=5&direction=2&head_direction=3&gesture=srp&size=b&img_format=gif";
 
 $url2="http://www.habbo.no/habbo-imaging/avatarimage?user=xgitta&action=lay&direction=2&head_direction=3&gesture=srp&size=b&img_format=gif";

  $habbo = imagecreatefromgif($url);

  $head = imagecreatefromgif("http://wuax.net/v1/images/invisible.gif");

  $white = imagecolorallocate($head, 255, 255, 255);

  $purple = imagecolorallocate($head, 200, 0, 200);



  imagefilledrectangle($head, 0, 0, 55, 50, $purple);

  imagecopy($head, $habbo, 0, 0, 5, 7, 64, 150);
  
  imagecolortransparent($head, $purple);


  header("Content-type: image/gif");

  imagegif($head);

?>