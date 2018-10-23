<?php
if(isset($user)) {
if(isset($_POST['message'])) {

$code = $_SESSION['submitcode'];

unset($_SESSION['submitcode']);

if($code == $_POST['code']) {

if(!empty($_POST['message'])) {

 $x5=$settings['latestcommentid'];
 $vari5 = $x5+1;

mysql_query("UPDATE latestids SET latestcommentid='".$vari5."'"); 

$message = striphtml($_POST['message']);


$sql="INSERT INTO comments (id, name, page, message, page_id, date, ip, type) VALUES 
('".$vari5."', '".$user['name']."','".striphtml($_POST['page'])."','".nl2br($message)."','0','".strftime("%d.%m.%Y - %H:%M")."','".$_SERVER['REMOTE_ADDR']."','submitment')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

 
$x=$user['points'];
$vari = $x+3;


$sql="UPDATE usersystem SET points = '".$vari."'
WHERE username = '".$user['name']."'";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

echo"Forslaget ble sendt!<br/><br/>";

} else {

echo"Du m&#229; skrive noe f&#248;r du sender det.<br/><br/>";

}
}


}



// <-------------------------------------------------------------->


$mycode = randomtext("aA1", 10);

$_SESSION['submitcode'] = $mycode;



echo"
<form action='".REQUEST_URL."' method='post' name='submit_form'>
<input type='hidden' name='code' value='".$mycode."'>
<b>Kategori:</b><br/><select name='page'>
<option value='Forslag til spalter'>Forslag til spalter</option>
<option value='Ukens Diskusjon'>Ukens Diskusjon</option>
<option value='Forslag'>Forslag</option>
<option value='Ukens Fortelling'>Ukens Fortelling</option>
<option value='Ukens G&#229;te'>Ukens G&#229;te</option>
<option value='Ukens Habbo'>Ukens Habbo</option>
<option value='Ukens Morsomhet'>Ukens Morsomhet</option>
<option value='Ukens Motto'>Ukens Motto</option>
<option value='Ukens vits'>Ukens vits</option>
</select>
<br/><br/>
";


echo"<b>Send inn ditt forslag:</b><br/>
<textarea style='height: 140px; width: 400px;  
  font-family: Verdana;
  font-size: 11px;
  font-weight: normal;
  color: #000000;
' name='message' maxlength='50' cols='40' rows='15' id='textinput'></textarea>
<br/>"; 

showcodes("message", "submit_form");

echo "<br/><br/><input type='submit' id='button' value='Send forslag' /><br/>
";



} else {

echo"Du m&#229; logge inn for &#229; sende inn forslag.";


}
?>