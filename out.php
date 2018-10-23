<?php

include"includes/duce_functions.php";

$url = str_replace("http://", null, $_GET['url']);

if(isset($url)) {

$url = "http://".$url;


echo("<html><head><title>Ut</title>
<style type='text/css'>

   A: { 
  text-decoration: underline; 
  color:#000000;
} 
   A:link { 
  text-decoration: underline; 
  color:#333333;
} 
  A:visited { 
  text-decoration: none; 
  color:#000000;
}
  A:hover { 
  text-decoration: underline; 
  color:#FF9900;
}
a:active {
text-decoration: none;
color: #000000;
}
</style></head><body>
<center><div style='background-color:white; font-family: Verdana, Geneva, Arial, Helvetica, sans-serif; font-size: 10px;'>
<br/>Du bes&#248;ker n&#229; et omr&#229;de utenfor WuaX. Vi har intet ansvar for innholdet p&#229; denne siden.<br/>
<br/>| <a href='".$url."'><b>Lukk</b></a> |<br/><hr/></div></center></body></html>
");


echo'<iframe src="'.$url.'" width="100%" height="100%" frameborder="0" allowtransparency="0" scrolling="0">Laster...</iframe>';

} else { header("Location:index"); }

?>