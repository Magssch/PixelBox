<?php

if (isset($_REQUEST['email']))
//if "email" is filled out, send email
  {
  //send email
  echo htmlentities($_REQUEST['email']);
  }
else
//if "email" is not filled out, display the form
  {
  echo "<form method='post'>
  Habbonavn:<br> <input name='habbonavn' type='text' /><br /><br>
  Epostadresse:<br> <input name='email' type='text' /><br /><br>
  Melding:<br />
  <textarea name='message' rows='15' cols='40'>
  </textarea><br /><br>
  <input type='submit' />
  </form>";
  echo strftime("%y%m%d");
  echo"<br/><br/><div class='pagenav'>
Page  1 of 37: <span><strong>1</strong></span><a href='news.php?rowstart=3'>2</a><a href='news.php?rowstart=6'>3</a><a href='news.php?rowstart=9'>4</a>...<a href='news.php?rowstart=108'>37</a>
</div>
";
  }

?>