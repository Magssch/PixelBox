<?php

if(isset($_POST['text'])) {

echo"Krypter tekst:<br/><br/>".md5($_POST['text'])."<br/><hr/>";

}

echo"Her kan du kryptere passord og lignende.<hr/><b>Tekst du vil kryptere:</b><br/>
<form method='post'>
<input type='text' style='width: 400px;' name='text'><br/><br/><input type='submit' value='Krypter'>";

?>