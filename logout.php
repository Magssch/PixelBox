<?php

session_start();


if(isset($_SESSION['username']) && ($_SESSION['password'])) {
$username = $_SESSION['username'];
$password = $_SESSION['password'];


setcookie("remember", "yes", time()-60*60*24*100, "/");
setcookie("cusername", $username, time()-60*60*24*100, "/");
setcookie("cpassword", $password, time()-60*60*24*100, "/");

session_destroy();

echo"<title>Logger ut</title>";

echo"<p style=' font-family: Verdana;
  font-size: 10px;
  font-weight: normal;
  color: #000000; '>Logger av ".$username." <img src='images/progress_bubbles.gif'></p><meta http-equiv='refresh' content='0; url=index.php'>";

} else {

echo"<meta http-equiv='refresh' content='0; url=index.php'>";

}

?>