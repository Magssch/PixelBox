<?php

require"config.php";

$con = mysql_connect($host,$username,$password);
if (!$con)
  {
  die('Tilkoblingsfeil: ' . mysql_error() . '<br/><br/><a href="http://'.SERVER.'/">Til root-index.</a>');
  }
mysql_select_db($database, $con);

$result = mysql_query("SELECT totallock FROM settings");
$row = mysql_fetch_array($result);

$totallock=$row['totallock'];

unset($row);



if(isset($_POST['totallock'])) {

mysql_query("UPDATE settings SET totallock = '".$_POST['totallock']."'");

}
echo"<center>
<form method='post'>
      <b>Totalstenging av siden p&#229;?</b><br/> 

      Ja<input "; 
      if($totallock == "yes") {
      
      echo" CHECKED";
      
      } else {
      
      echo" ";
      }
      echo" type='radio' name='totallock' value='yes'>
       Nei<input
       ";
      if($totallock == "no") {
      
      echo" CHECKED";
      
      } else {
      
      echo" ";
      }
      echo" type='radio' name='totallock' value='no'>
                         <br/> <br/><hr/>    <input type='submit' id='button' value='Oppdater innstillinger'></center>
";                 
?>