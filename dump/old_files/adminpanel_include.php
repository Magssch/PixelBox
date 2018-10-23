<?php


if(!defined("MAIN_SET")) { die("Dette er en systemfil som er skjult for brukere"); }

case "systembot";
if($user['rights'] == "admin" || $user['rights'] == "global") {
if(isset($_POST['update'])) {



  $latestpost = $settings['latestpostid'];

if($_POST['systembot'] != "") {


 $x5=$latestpost;
 $vari5 = $x5+1;

 mysql_query("UPDATE latestids SET latestpostid='".$vari5."'");

$message = striphtml($_POST['systembot']);

$sql="INSERT INTO guestbook (id, name, message, date) VALUES 
('".$vari5."', '".$settings['bot_name']."','".$message."','".strftime("%d.%m.%Y - %H:%M")."')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

  $latestpost = $vari5;
  
} 

if($_POST['music'] != "") {


 $x5=$latestpost;
 $vari5 = $x5+1;

 mysql_query("UPDATE latestids SET latestpostid='".$vari5."'");

$message = striphtml($_POST['music']);

$sql="INSERT INTO guestbook (id, name, message, date, type) VALUES 
('".$vari5."', '".$settings['bot_name']."','".$message."','".strftime("%d.%m.%Y - %H:%M")."','music')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

  $latestpost = $vari5;
  
} 

if($_POST['spam_warning'] == "yes") {

 $x5=$latestpost;
 $vari5 = $x5+1;

 mysql_query("UPDATE latestids SET latestpostid='".$vari5."'");

$sql="INSERT INTO guestbook (id, name, message, date) VALUES 
('".$vari5."', '".$settings['bot_name']."','<b>Advarsel! Det er for mye spam i tagwallen, ro ned litt.</b>
','".strftime("%d.%m.%Y - %H:%M")."')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

  $latestpost = $vari5;
}

 
if($_POST['random_voucher'] == "yes") {


 	$string = ""; $encode = "";
	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	for ($i = 0; $i < 10; $i++) {
		$string .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
	}
	for ($i = 0; $i < 31; $i++) {
		$encode .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
	}
	
	$output = "";
	$chars = "1234";
	for ($i = 0; $i < 2; $i++) {
		$output .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
	}

 	$randomq[] = "-";
	$randomq[] = "+";

srand ((double) microtime() * 1000000);
$choose = rand(0,count($randomq)-1);

$done = $randomq[$choose];

 $x5=$latestpost;
 $vari5 = $x5+1;

 mysql_query("UPDATE latestids SET latestpostid='".$vari5."'");

$sql="INSERT INTO guestbook (id, name, message, date) VALUES 
('".$vari5."', '".$settings['bot_name']."','Her er en poengkode, v&#230;r kjapp! <b>".$string."</b>
','".strftime("%d.%m.%Y - %H:%M")."')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

  
$sql="INSERT INTO vouchers (value, code, name, type) VALUES 
('".$output."','".$string."','".$user['name']."','".$done."')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
}

echo"Innstillinger er oppdatert!<br/><br/>";  
}

echo"
<form method='post'><input type='hidden' name='update' value='yes'><b>Egendefinert ".$settings['bot_name']."-melding:</b><br/><input type='text' id='textinput' name='systembot' style=' width: 400px ' >
<br/><br/>
<b>Post lydspor i tagwallen:</b><br/><input type='text' id='textinput' name='music' style=' width: 400px ' >
<br/><br/>
<b>Post en spam-advarsel i tagwallen?</b><br/><input type='checkbox' value='yes' name='spam_warning'><br/>
       <br/>
<b>Post en random poengkode i tagwallen?</b><br/><input type='checkbox' value='yes' name='random_voucher'><br/>
       <br/><hr/>
    <input type='submit' id='button' value='Post'><br/>


";
}
break;








case "second_systembot";
if($user['rights'] == "admin" || $user['rights'] == "global") {
if(isset($_POST['update'])) {



  $latestpost = $settings['latestpostid'];

if($_POST['systembot'] != "") {


 $x5=$latestpost;
 $vari5 = $x5+1;

 mysql_query("UPDATE latestids SET latestpostid='".$vari5."'");

$message = striphtml($_POST['systembot']);

$sql="INSERT INTO guestbook (id, name, message, date) VALUES 
('".$vari5."', '".$settings['second_bot_name']."','".$message."','".strftime("%d.%m.%Y - %H:%M")."')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

  $latestpost = $vari5;
  
} 

if($_POST['music'] != "") {


 $x5=$latestpost;
 $vari5 = $x5+1;

 mysql_query("UPDATE latestids SET latestpostid='".$vari5."'");

$message = striphtml($_POST['music']);

$sql="INSERT INTO guestbook (id, name, message, date, type) VALUES 
('".$vari5."', '".$settings['bot_name']."','".$message."','".strftime("%d.%m.%Y - %H:%M")."','music')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

  $latestpost = $vari5;
  
} 

if($_POST['spam_warning'] == "yes") {

 $x5=$latestpost;
 $vari5 = $x5+1;

 mysql_query("UPDATE latestids SET latestpostid='".$vari5."'");

$sql="INSERT INTO guestbook (id, name, message, date) VALUES 
('".$vari5."', '".$settings['second_bot_name']."','<b>Hey folkens! Det er for mye spam her, slapp av litt.</b>
','".strftime("%d.%m.%Y - %H:%M")."')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

  $latestpost = $vari5;
}

 
if($_POST['random_voucher'] == "yes") {


 	$string = ""; $encode = "";
	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	for ($i = 0; $i < 10; $i++) {
		$string .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
	}
	for ($i = 0; $i < 31; $i++) {
		$encode .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
	}
	
	$output = "";
	$chars = "1234";
	for ($i = 0; $i < 2; $i++) {
		$output .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
	}
 	$randomq[] = "-";
	$randomq[] = "+";

srand ((double) microtime() * 1000000);
$choose = rand(0,count($randomq)-1);

$done = $randomq[$choose];

 $x5=$latestpost;
 $vari5 = $x5+1;

 mysql_query("UPDATE latestids SET latestpostid='".$vari5."'");

$sql="INSERT INTO guestbook (id, name, message, date) VALUES 
('".$vari5."', '".$settings['second_bot_name']."','Her er en poengkode, v&#230;r kjapp! <b>".$string."</b>
','".strftime("%d.%m.%Y - %H:%M")."')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

  
$sql="INSERT INTO vouchers (value, code, name, type) VALUES 
('".$output."','".$string."','".$user['name']."','".$done."')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
}

echo"Innstillinger er oppdatert!<br/><br/>";  
}

echo"
<form method='post'><input type='hidden' name='update' value='yes'><b>Egendefinert ".$settings['second_bot_name']."-melding:</b><br/><input type='text' id='textinput' name='systembot' style=' width: 400px ' >
<br/><br/>
<b>Post lydspor i tagwallen:</b><br/><input type='text' id='textinput' name='music' style=' width: 400px ' >
<br/><br/>
<b>Post en spam-advarsel i tagwallen?</b><br/><input type='checkbox' value='yes' name='spam_warning'><br/>
       <br/>
<b>Post en random poengkode i tagwallen?</b><br/><input type='checkbox' value='yes' name='random_voucher'><br/>
       <br/><hr/>
    <input type='submit' id='button' value='Post'><br/>


";
}
break;









case "page";
if($user['rights'] == "admin") {
if(isset($_GET['update'])) {

if(!isset($_GET['id'])) {

echo"<b>Velg siden du vil forandre p&#229;.</b>";

$result = mysql_query("SELECT * FROM latestids ");

while($row = mysql_fetch_array($result))
  {
  
  $latestpageid=$row['latestpageid'];
  
  }

$i=$latestpageid;

while($i>=1)
  {
  

$result = mysql_query("SELECT * FROM pages WHERE id='".$i."' ");
while($row = mysql_fetch_array($result))
  {

  echo"<br/><br/><a href='?action=page&update=true&id=".$i."'>".$i.". ".$row['title']."</a>";
  
  }
  
  $i--;

  }
  
  } else {
  
  
  if(isset($_POST['content']) && $_POST['title'] != "" && $_POST['content'] != "") {

mysql_query("UPDATE pages SET title = '".$_POST['title']."' WHERE id='".$_GET['id']."' ");

mysql_query("UPDATE pages SET content = '".$_POST['content']."' WHERE id='".$_GET['id']."' ");
  
mysql_query("UPDATE pages SET subheader = '".$_POST['subheader']."' WHERE id='".$_GET['id']."' ");
  
echo"Siden er Oppdatert! <br/>link: <a href='page.php?id=".$_GET['id']."'>page.php?id=".$_GET['id']."</a><br/><br/>";  
} 


$result = mysql_query("SELECT * FROM pages WHERE id='".$_GET['id']."' ");
while($row = mysql_fetch_array($result))
  {



echo"

<form method='post'>
<b>Tittel:</b><br/><input type='text' id='textinput' name='title' style=' width: 200px; ' value='".$row['title']."' ><br/><br/>
<b>Subheader:</b><br/><input type='text' value='".$row['subheader']."' id='textinput' name='subheader' style=' width: 200px; ' ><br/><br/>

<b>Innhold:</b><br/><textarea id='textinput' name='content' style=' width: 400px; height: 400px; '>".$row['content']."</textarea>


<br/>
       <br/><hr/>
    <input type='submit' id='button' value='Send'>


";

}
  
  }
  
} else {


if(isset($_POST['content']) && $_POST['title'] != "" && $_POST['content'] != "") {

$x=$settings['latestpageid'];
$vari = $x+1;


$sql="INSERT INTO pages (id, title, content, subheader) VALUES 
('".$vari."','".$_POST['title']."','".$_POST['content']."','".$_POST['subheader']."')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

mysql_query("UPDATE latestids SET latestpageid = '".$vari."'");


  echo"Siden er opprettet! <br/>link: <a href='page.php?id=".$vari."'>page.php?id=".$vari."</a><br/><br/>";  
} 
echo"
<b><a href='adminpanel.php?action=page&update=true'>Oppdater eksisterende sider</a></b><br/><br/>
<form method='post'>
<b>Tittel:</b><br/><input type='text' id='textinput' name='title' style=' width: 200px; ' ><br/><br/>
<b>Subheader:</b><br/><input type='text' value='subheader.php' id='textinput' name='subheader' style=' width: 200px; ' ><br/><br/>

<b>Innhold:</b><br/><textarea id='textinput' name='content' style=' width: 400px; height: 400px; '></textarea>


<br/>
       <br/><hr/>
    <input type='submit' id='button' value='Send'>


";

}
}
break;

case "showjobs";

$fetch = mysql_query("SELECT * from `employes`");
while($arne = mysql_fetch_assoc($fetch)){



echo "
<div id='tagcontainer'>
<div id='tagtop'><div id='text'><br/><b>- <a href='profile.php?user=".$arne['username']."'>".$arne['username']."</a><br><br></b></div></div>
  <div id='tagmid'><div id='text'><br/><br><br>Stilling:  ".$arne['rank']."<br/><br />
  ".$arne['description']."
	

</div></div>
   <div id='tagbot'></div></div>
 ";


}

break;


case "jobs";

if($_POST['jobs']){

/* TODO:
- Legg til validate av input /enties
- Gj&#248;r boksen ferdig (dunno hvordan dere skal ha den)
- Evt. en side hvor man kan endre p&#229; tidligere lagde, fetch via ID .. simple greier */
	if( !empty($_POST['worker_name']) && !empty($_POST['job_name'])){
		$add = mysql_query("INSERT into `employes` (username, rank, description) VALUES ('".$_SESSION['username']."' , '".$_POST['job_name']."' , '".$_POST['desc']."' )") or die(mysql_error());
	
	echo "Den nye ansatte ble postet<br/><br/>";
	}
		
}

echo "
<form action='' method='post'>
<center>Navn p&#229; den ansatte:<br>
<input type='text' id='textinput' name='worker_name'><br>
Stilling:<br><input type='text' id='textinput' name='job_name'><br>
Portofolio:<br> <textarea id='textinput' name='desc'>
</textarea><br>
<input type='submit' name='jobs' id='button' ></form>";

break;




case "news";
if($user['rights'] == "newsman" || $user['rights'] == "admin" || $user['rights'] == "global") {
define("NEWS", "yes");
if(isset($_GET['update'])) {

if(!isset($_GET['id'])) {

echo"<b>Velg nyheten du vil forandre p&#229;.</b>";

$result = mysql_query("SELECT * FROM latestids ");
while($row = mysql_fetch_array($result))
  {
  
  $latestnewsid=$row['latestnewsid'];
  
  }

$i=$latestnewsid;

while($i>=1)
  {
  

$result = mysql_query("SELECT * FROM news WHERE id='".$i."' ");
while($row = mysql_fetch_array($result))
  {

  echo"<br/><br/><a href='?action=news&update=true&id=".$i."'>".$i.". ".$row['name']."</a>";
  
  }
  
  $i--;

  }
  
  } else {
  
  
  if(isset($_POST['content']) && $_POST['content'] != "" && $_POST['name'] != "") {
  
  
if($_POST['delete_message'] == "yes") {
mysql_query("DELETE FROM news WHERE id='".$_GET['id']."'");

  echo"Nyheten er slettet!<meta http-equiv='refresh' content='1; url=adminpanel.php?action=news&update=true'>";
} else {

mysql_query("UPDATE news SET name = '".$_POST['name']."' WHERE id='".$_GET['id']."' ");


mysql_query("UPDATE news SET content = '".nl2br($_POST['content'])."' WHERE id='".$_GET['id']."' ");
  
  $time =  time()+(+9*3600);


mysql_query("UPDATE news SET name = '".$_POST['name']."' WHERE id='".$_GET['id']."' ");
  
mysql_query("UPDATE comments SET page = '".$_POST['name']."' WHERE page_id='".$_GET['id']."' ");
  
echo"Nyheten er Oppdatert! <br/>link: <a href='news.php?id=".$_GET['id']."'>news.php?id=".$_GET['id']."</a><br/><br/>";  
}
} 



$result = mysql_query("SELECT * FROM news WHERE id='".$_GET['id']."' ");
while($row = mysql_fetch_array($result))
  {



echo"

<form method='post' name='update_news'>
<b>Navn:</b><br/><input type='text' id='textinput' name='name' style=' width: 200px; ' value='".$row['name']."' ><br/><br/>


<b>Innhold:</b><br/><textarea id='textinput' name='content' style=' width: 400px; height: 400px; '>"; echo solvebr($row['content']); echo"</textarea>


<br/>"; 
echo showcodes("content", "update_news");
echo"<br/><br/><b>Slett nyheten?</b><br/><input type='checkbox' value='yes' name='delete_message'><br/><hr/>
    <input type='submit' id='button' value='Send'>


";

}
  
  }
  
} else {


  if(isset($_POST['content']) && $_POST['content'] != "" && $_POST['name'] != "") {

$x=$settings['latestnewsid'];
$vari = $x+1;

$time =  time()+(+9*3600);

$sql="INSERT INTO news (id, name, content, date, composer) VALUES 
('".$vari."','".$_POST['name']."','".nl2br($_POST['content'])."','".strftime("%d.%m.%Y - %H:%M")."','".$user['name']."')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
mysql_query("UPDATE latestids SET latestnewsid='".$vari."'");  
   
 $x5=$settings['latestpostid'];
 $vari5 = $x5+1;


mysql_query("UPDATE latestids SET latestpostid='".$vari5."'");

$sql="INSERT INTO guestbook (id, name, message, date) VALUES 
('".$vari5."', '".$settings['bot_name']."','En nyhet med navnet <b>".$_POST['name']."</b> ble nettopp publisert!','".strftime("%d.%m.%Y - %H:%M")."')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }


mysql_query("UPDATE latestids SET latestnewsid = '".$vari."'");


  echo"Nyheten er Opprettet! <br/>link: <a href='news.php?id=".$vari."'>news.php?id=".$vari."</a><br/><br/>";  
} 
echo"
<b><a href='adminpanel.php?action=news&update=true'>Oppdater eksisterende Nyheter</a></b><br/><br/>
<form method='post' name='news'>
<b>Navn:</b><br/><input type='text' id='textinput' name='name' style=' width: 200px; ' ><br/><br/>


<b>Innhold:</b><br/><textarea id='textinput' name='content' style=' width: 400px; height: 400px; '></textarea>


<br/>"; 
echo showcodes("content", "news");
echo"<br/>
       <br/><hr/>
    <input type='submit' id='button' value='Send'>


";

}
}
unset($news);
break;


case "reviews";
if($user['rights'] == "articleman" || $user['rights'] == "admin" || $user['rights'] == "global" || $user['rights'] == "articleman&valuer") {
define("NEWS", "yes");
if(isset($_GET['update'])) {

if(!isset($_GET['id'])) {

echo"<b>Velg Anmeldelsen du vil forandre p&#229;.</b>";

$result = mysql_query("SELECT * FROM latestids ");
while($row = mysql_fetch_array($result))
  {
  
  $latestarticleid=$row['latestarticleid'];
  
  }

$i=$latestarticleid;

while($i>=1)
  {
  

$result = mysql_query("SELECT * FROM articles WHERE id='".$i."' ");
while($row = mysql_fetch_array($result))
  {

  echo"<br/><br/><a href='?action=reviews&update=true&id=".$i."'>".$i.". ".$row['name']."</a>";
  
  }
  
  $i--;

  }
  
  } else {
  
  
  if(isset($_POST['content']) && $_POST['content'] != "" && $_POST['name'] != "") {
  
  
if($_POST['delete_message'] == "yes") {
mysql_query("DELETE FROM articles WHERE id='".$_GET['id']."'");

  echo"Anmeldelsen er slettet!<meta http-equiv='refresh' content='1; url=adminpanel.php?action=articles&update=true'>";
} else {

mysql_query("UPDATE articles SET name = '".$_POST['name']."' WHERE id='".$_GET['id']."' ");


mysql_query("UPDATE articles SET content = '".nl2br($_POST['content'])."' WHERE id='".$_GET['id']."' ");
  
  $time =  time()+(+9*3600);


mysql_query("UPDATE articles SET name = '".$_POST['name']."' WHERE id='".$_GET['id']."' ");
  
mysql_query("UPDATE comments SET page = '".$_POST['name']."' WHERE page_id='".$_GET['id']."' ");
  
echo"Anmeldelsen er Oppdatert! <br/>link: <a href='review.php?id=".$_GET['id']."'>review.php?id=".$_GET['id']."</a><br/><br/>";  
}
} 



$result = mysql_query("SELECT * FROM articles WHERE id='".$_GET['id']."' ");
while($row = mysql_fetch_array($result))
  {



echo"

<form method='post' name='update_articles'>
<b>Navn:</b><br/><input type='text' id='textinput' name='name' style=' width: 200px; ' value='".$row['name']."' ><br/><br/>


<b>Innhold:</b><br/><textarea id='textinput' name='content' style=' width: 400px; height: 400px; '>"; echo solvebr($row['content']); echo"</textarea>


<br/>"; 
echo showcodes("content", "update_articles");
echo"<br/><br/><b>Slett Anmeldelsen?</b><br/><input type='checkbox' value='yes' name='delete_message'><br/><hr/>
    <input type='submit' id='button' value='Send'>


";

}
  
  
  }
  
} else {


  if(isset($_POST['content']) && $_POST['content'] != "" && $_POST['name'] != "") {

$x=$settings['latestarticleid'];
$vari = $x+1;

$time =  time()+(+9*3600);

$sql="INSERT INTO articles (id, name, content, date, composer) VALUES 
('".$vari."','".$_POST['name']."','".nl2br($_POST['content'])."','".strftime("%d.%m.%Y - %H:%M")."','".$user['name']."')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
mysql_query("UPDATE latestids SET latestarticleid='".$vari."'");  
   
 $x5=$settings['latestpostid'];
 $vari5 = $x5+1;

mysql_query("UPDATE latestids SET latestpostid='".$vari5."'");

$sql="INSERT INTO guestbook (id, name, message, date) VALUES 
('".$vari5."', '".$settings['second_bot_name']."','Det har nettopp blitt opprettet en anmeldelse med navnet <b>".$_POST['name']."</b>!','".strftime("%d.%m.%Y - %H:%M")."')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }


  

mysql_query("UPDATE latestids SET latestarticleid = '".$vari."'");


  echo"Anmeldelsen er Opprettet! <br/>link: <a href='review.php?id=".$vari."'>review.php?id=".$vari."</a><br/><br/>";  
} 
echo"
<b><a href='adminpanel.php?action=reviews&update=true'>Oppdater eksisterende Anmeldelser</a></b><br/><br/>
<form method='post' name='articles'>
<b>Navn:</b><br/><input type='text' id='textinput' name='name' style=' width: 200px; ' ><br/><br/>


<b>Innhold:</b><br/><textarea id='textinput' name='content' style=' width: 400px; height: 400px; '></textarea>


<br/>"; 
echo showcodes("content", "articles");
echo"<br/>
       <br/><hr/>
    <input type='submit' id='button' value='Send'>


";

}
}
unset($news);
break;
?>