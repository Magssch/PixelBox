<?php

include"main.php";
include"wysiwyg.php";

database_con();

if($user['level'] >= "4") {


pagetop("".$settings['site_name']." adminpanel");
include"includes/subheader.php";
pagemid();

if(!isset($_SESSION['admin'])) {
if($user['rights'] != "admin") {
if(isset($_POST['admin']) && strtolower($_POST['admin']) == "c3fj48jt83o4t") {
$_SESSION['admin'] = "yes";
echo"Rikig passord! Du blir videresendt...<br/><br/><meta http-equiv='refresh' content='0; url=adminpanel'>";
}
} else {
if(isset($_POST['admin']) && strtolower($_POST['admin']) == "389d4r89okyt3y") {
$_SESSION['admin'] = "yes";
echo"Rikig passord! Du blir videresendt...<br/><br/><meta http-equiv='refresh' content='0; url=".REQUEST_URL."'>";
}
}
echo"<form method='post' action='".REQUEST_URL."'><img src='images/frank_22.gif'><br/><b>Adminpassord:</b><br/>
<input type='password' name='admin' id='textinput'><br/><br/><input type='submit' value='Send' id='button'></form>";

} else {
/*
$beta = "<b>NB! Grunnet at siden er i beta kan poengkodene brukes til<br/> b&#229;de poengkoder og beta-invitasjons koder.</b>";
*/
oB_start();
switch($_GET['action']) {

default:

if($settings['maintenance'] == "yes") {
echo "<font size='4'>Advarsel! Vedlikeholdsmodus er p&#229;.</font><br/><br/><hr/><br/>";
}

echo"<img src='images/frank_22.gif'><br/><br/>";



if($user['rights'] == "admin" || $user['rights'] == "global" || $user['rights'] == "forumglobal") {
if(isset($_POST['admin_notes'])) {

mysql_query("UPDATE settings SET welcome_message='".$_POST['admin_notes']."'");
echo"<meta http-equiv='refresh' content='1; url=adminpanel.php'>";
}
 echo"<b>Admin noteringer</b><br/><form method='post'>
 <textarea name='admin_notes' id='textinput' style='border: 1
 px solid #000000;
color: #000;
font-size: 10px;
background-color : #FFFF66;
font-family: Verdana; width: 350px; height: 150px;'>
".$settings['welcome_message']."</textarea>
<br/><br/><input type='submit' id='button' value='Oppdater noteringer'>
</form><br/><hr/>";
} else {
 echo"<hr/><b>Admin noteringer</b><br/>
 <textarea READONLY name='admin_notes' id='textinput' style='border: 1
 px solid #000000;
color: #000;
font-size: 10px;
background-color : #FFFF66;
font-family: Verdana; width: 350px; height: 150px;'>
".$settings['welcome_message']."</textarea><br/>
<br/><hr/>";
}

echo"<br/><a href='chat'>Pr&#248;v HF nattchat BETA!</a><br/><br/>
<b>".$settings['site_name']." adminpanel.</b><br/><br/>";

if($user['rights'] == "admin") {
echo"<a href='?action=mainsettings'>Hovedinnstillinger</a><br/><br/>";
}

if($user['rights'] == "admin" || $user['rights'] == "global" || $user['rights'] == "forumglobal") {
echo"<a href='?action=settings'>Diverse innstillinger</a><br/><br/>";
}

if($user['rights'] == "admin" || $user['rights'] == "global") {
echo"<a href='?action=alerts'>Sidemeldinger</a><br/><br/>";
}


if($user['rights'] == "admin" || $user['rights'] == "magazine") {
echo"<a href='?action=magazine'>Magazine</a><br/><br/>";
}

if($user['rights'] == "admin" || $user['rights'] == "magazine") {
echo"<a href='?action=magazine_submitments'>Innsendte magazine forslag</a><br/><br/>";
}


if($user['rights'] == "admin" || $user['rights'] == "forumglobal") {
echo"<a href='?action=commands'>Kommandoer</a><br/><br/>";
}


if($user['rights'] == "admin" || $user['rights'] == "global" || $user['rights'] == "forumglobal") {
echo"<a href='?action=slideshow'>Slideshow</a><br/><br/>";
}

if($user['rights'] == "admin" || $user['rights'] == "global" || $user['rights'] == "forumglobal") {
echo"<a href='?action=backgrounds'>Profilbakgrunner</a><br/><br/>";
}

if($user['rights'] == "admin" || $user['rights'] == "global" || $user['rights'] == "forumglobal") {
echo"<a href='?action=update_badges'>Gi/ta skilt fra brukere</a><br/><br/>";
}
if($user['rights'] == "admin" || $user['rights'] == "global" || $user['rights'] == "forumglobal") {
echo"<a href='?action=badges'>Administrer skilt</a><br/><br/>";
}
if($user['rights'] == "admin" || $user['rights'] == "global" || $user['rights'] == "forumglobal") {
echo"<a href='?action=badgelist'>Skiltliste</a><br/><br/>";
}
if($user['rights'] == "admin") {
echo"<a href='?action=update_collectables'>Gi/ta samleobjekter fra brukere</a><br/><br/>";
}
if($user['rights'] == "admin") {
echo"<a href='?action=collectables'>Administrer samleobjekter</a><br/><br/>";
}
if($user['rights'] == "admin") {
echo"<a href='?action=collectablelist'>Samleobjektliste</a><br/><br/>";
}

if($user['rights'] == "admin") {
echo"<a href='?action=update_items'>Gi/ta Butikkvarer fra brukere</a><br/><br/>";
}
if($user['rights'] == "mod" || $user['rights'] == "admin" || $user['rights'] == "global" || $user['rights'] == "forumglobal") {
echo"<a href='?action=tagwall'>Rapporterte tagwallposter</a><br/><br/>";
}
if($user['rights'] == "mod" || $user['rights'] == "admin" || $user['rights'] == "global" || $user['rights'] == "forumglobal") {
echo"<a href='?action=comments'>Rapporterte kommentarer</a><br/><br/>";
}
if($user['rights'] == "mod" || $user['rights'] == "admin" || $user['rights'] == "global" || $user['rights'] == "forumglobal") {
echo"<a href='?action=messages'>N&#248;danrop fra brukere</a><br/><br/>";
}
if($user['rights'] == "admin" || $user['rights'] == "global" || $user['rights'] == "mod" || $user['rights'] == "forumglobal" || $user['rights'] == "forummod") {
echo"<a href='?action=user'>Brukere</a><br/><br/>";
}
if($user['rights'] == "admin") {
echo"<a href='?action=titles'>Brukertitler</a><br/><br/>";
}
if($user['rights'] == "admin" || $user['rights'] == "global") {
echo"<a href='?action=voucher'>Myntkoder</a><br/><br/>";
}
if($user['rights'] == "valuer" || $user['rights'] == "admin" || $user['rights'] == "global" || $user['rights'] == "forumglobal" || $user['rights'] == "articleman&valuer") {
echo"<a href='?action=furnivalues'>M&#248;belverdier</a><br/><br/>";
echo"<a href='?action=furnicategories'>M&#248;belkategorier</a><br/><br/>";
}
if($user['rights'] == "admin" || $user['rights'] == "global" || $user['rights'] == "forumglobal") {
echo"<a href='?action=systembot'>".$settings['bot_name']." funksjoner</a><br/><br/>";
}
if($user['rights'] == "admin" || $user['rights'] == "global" || $user['rights'] == "forumglobal") {
echo"<a href='?action=second_systembot'>".$settings['second_bot_name']." funksjoner</a><br/><br/>";
}
if($user['rights'] == "admin") {
echo"<a href='?action=page'>Egendefinerte sider</a><br/><br/>";
}
if($user['rights'] == "newsman" || $user['rights'] == "admin" || $user['rights'] == "global" || $user['rights'] == "forumglobal") {
echo"<a href='?action=news'>Nyheter</a><br><br/>";
}
if($user['rights'] == "articleman" || $user['rights'] == "admin" || $user['rights'] == "global" || $user['rights'] == "forumglobal" || $user['rights'] == "articleman&valuer") {
echo"<a href='?action=articles'>Anmeldelser</a><br><br/>";
}
if($user['rights'] != "mod") {
echo"<a href='upload'>Filopplasting</a><br><br>";
}

if($user['rights'] == "admin") {
echo"<a href='?action=jobs'>Ansatte</a><br><br>";
}

if($user['rights'] == "admin") {
echo"<a href='?action=showjobs'>Vis ansatte</a><br/><br/>";
}
echo"<hr/><br/><img src='images/pixelboxv4.png'><br/><br/>Siden bruker PixelBox som er et system utviklet av Sumodonut.<br/>Aktuell systemversion: <b>PixelBox rebuild v3.3</b>";

break;

case "alerts";
include"admin_inc/alerts.php";
break;

case "magazine";
include"admin_inc/magazine.php";
break;

case "magazine_submitments";
include"admin_inc/magazine_submitments.php";
break;

case "titles";
if(isset($_POST['username'])) {
mysql_query("UPDATE usersystem SET title='".$_POST['title']."' WHERE username='".$_POST['username']."'");
echo"Tittelen til brukeren ble oppdatert!<br/><br/>";
}
echo"<form method='post'><b>Brukernavn:</b><br/><input type='text' name='username' id='textinput'><br/><br/>
<b>Tittel:</b><br/><input type='text' name='title' id='textinput'><br/><br/><input type='submit' value='Send' id='button'>
</form>";

break;
case "mainsettings";
if($user['rights'] == "admin") {


if(isset($_POST['update'])) {






if(isset($_POST['maintenance'])) {

mysql_query("UPDATE settings SET maintenance = '".$_POST['maintenance']."'");

}

if(isset($_POST['maintenance_reason'])) {

mysql_query("UPDATE settings SET maintenance_reason = '".htmlspecialchars($_POST['maintenance_reason'])."'");

}



if(isset($_POST['footer'])) {

mysql_query("UPDATE settings SET footer = '".$_POST['footer']."'");

}



if(isset($_POST['site_name'])) {

mysql_query("UPDATE settings SET site_name = '".$_POST['site_name']."'");

}


if(isset($_POST['bot_name'])) {

mysql_query("UPDATE settings SET bot_name = '".$_POST['bot_name']."'");

}

if(isset($_POST['bot_habbo'])) {

mysql_query("UPDATE settings SET bot_habbo = '".$_POST['bot_habbo']."'");

}

if(isset($_POST['second_bot_name'])) {

mysql_query("UPDATE settings SET second_bot_name = '".$_POST['second_bot_name']."'");

}

if(isset($_POST['second_bot_habbo'])) {

mysql_query("UPDATE settings SET second_bot_habbo = '".$_POST['second_bot_habbo']."'");

}

if(isset($_POST['third_bot_name'])) {

mysql_query("UPDATE settings SET third_bot_name = '".$_POST['third_bot_name']."'");

}

if(isset($_POST['third_bot_habbo'])) {

mysql_query("UPDATE settings SET third_bot_habbo = '".$_POST['third_bot_habbo']."'");

}


mysql_query("UPDATE settings SET extra_link = '".$_POST['extra_link']."'");


mysql_query("UPDATE settings SET link_goal = '".$_POST['link_goal']."'");




mysql_query("UPDATE settings SET link_access = '".$_POST['link_access']."'");





mysql_query("UPDATE settings SET site_url = '".$_POST['site_url']."'");



mysql_query("UPDATE settings SET hc_value = '".$_POST['hc_value']."'");



if(isset($_POST['deletetags']) && $_POST['deletetags'] == "yes") {

mysql_query("DELETE FROM guestbook");

mysql_query("UPDATE latestids SET latestpostid = '1'");

$sql="INSERT INTO guestbook (id, name, message, date) VALUES
('1', '".$chbot."','Tagwallen har blitt t&#248;mt av administrator.','".strftime("%d.%m.%Y - %H:%M")."')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
  echo"Alle tagwallposter er slettet!<br/><br/>";
}




if(isset($_POST['deletecomments']) && $_POST['deletecomments'] == "yes") {

mysql_query("DELETE FROM comments");

mysql_query("UPDATE latestids SET latestcommentid = '0'");

echo"Alle kommentarer er slettet!<br/><br/>";
}





echo"Hovedinnstillinger er oppdatert!<meta http-equiv='refresh' content='1; url=adminpanel.php?action=mainsettings'><br/><br/>";

}
echo"
<form method='post'><input type='hidden' name='update' value='yes'>
      <b>Vedlikehold p&#229;?</b><br/>

      Ja<input ";
      if($settings['maintenance'] == "yes") {

      echo" CHECKED";

      } else {

      echo" ";
      }
      echo" type='radio' name='maintenance' value='yes'>
       Nei<input
       ";
      if($settings['maintenance'] == "no") {

      echo" CHECKED";

      } else {

      echo" ";
      }
      echo" type='radio' name='maintenance' value='no'>
                         <br/> <br/><hr/><b>Vedlikeholds grunn:</b><br/><textarea id='textinput' name='maintenance_reason' style=' width: 400px; height: 300px; '>".$settings['maintenance_reason']."</textarea>
       <br/> <br/><hr/><b>Footer tekst:</b><br/><input type='text' id='textinput' name='footer' value='".$settings['footer']."' style=' width: 400px ' >
       <br/> <br/><hr/><b>Sidenavn:</b><br/><input type='text' id='textinput' name='site_name' value='".$settings['site_name']."' style=' width: 200px ' >
       <br/> <br/><hr/><b>SideURL:</b> (NB! Husk mappene siden ligger i og.)<br/><input type='text' id='textinput' name='site_url'";
       if($settings['site_url'] == "") {

       echo" value='http://-DIN-URL-/' ";

       } else {


       echo" value='".$settings['site_url']."' ";

       }

       echo" style=' width: 400px ' >

              <br/> <br/><hr/><b>Tag-bot nr.1 navn:</b><br/><input type='text' id='textinput' name='bot_name' value='".$settings['bot_name']."' style=' width: 200px ' >
              <br/> <br/><hr/><b>Tag-bot nr.1 habbo:</b><br/><input type='text' id='textinput' name='bot_habbo' value='".$settings['bot_habbo']."' style=' width: 200px ' >
              <br/> <br/><hr/><b>Tag-bot nr.2 navn:</b><br/><input type='text' id='textinput' name='second_bot_name' value='".$settings['second_bot_name']."' style=' width: 200px ' >
              <br/> <br/><hr/><b>Tag-bot nr.2 habbo:</b><br/><input type='text' id='textinput' name='second_bot_habbo' value='".$settings['second_bot_habbo']."' style=' width: 200px ' >
              <br/> <br/><hr/><b>Bank-bot navn:</b><br/><input type='text' id='textinput' name='third_bot_name' value='".$settings['third_bot_name']."' style=' width: 200px ' >
              <br/> <br/><hr/><b>Bank-Bot habbo:</b><br/><input type='text' id='textinput' name='third_bot_habbo' value='".$settings['third_bot_habbo']."' style=' width: 200px ' >
              <br/> <br/><hr/><b>Ekstralink-tekst:</b><br/><input type='text' id='textinput' name='extra_link' value='".$settings['extra_link']."' style=' width: 200px ' >
              <br/> <br/><hr/><b>Ekstralink-m&#229;l:</b><br/><input type='text' id='textinput' name='link_goal' value='".$settings['link_goal']."' style=' width: 200px ' >
              <br/> <br/><hr/><b>Ekstralink-tilgangsn&#248;kkel:</b><br/><input type='text' id='textinput' name='link_access' value='".$settings['link_access']."' style=' width: 200px ' >
              <br/> <br/><hr/><b>Hvor mange mynt er 1 hc verdt?</b><br/><input type='text' id='textinput' name='hc_value' value='".$settings['hc_value']."' >";
      echo"<br/><br/><hr/><b>Slette alle tagwallposter?</b><br/>
      Ja<input type='radio' name='deletetags' value='yes' > Nei<input CHECKED type='radio' name='deletetags' value='no' >
       <br/><br/><hr/>";


      echo"<b>Slette alle kommentarer?</b><br/>
      Ja<input type='radio' name='deletecomments' value='yes' > Nei<input CHECKED type='radio' name='deletecomments' value='no' >
       ";

 echo"

       <br/><br/><hr/>
    <input type='submit' id='button' value='Oppdater innstillinger'>


<br/>";
}
break;


case "settings";
if($user['rights'] == "admin" || $user['rights'] == "global" || $user['rights'] == "forumglobal") {


if(isset($_POST['update'])) {


mysql_query("UPDATE settings SET bad_words = '".$_POST['bad_words']."'");


if(isset($_POST['campaign_active'])) {
if($_POST['campaign_active'] == $settings['campaign_active']) {
mysql_query("UPDATE settings SET campaign_active = '".$_POST['campaign_active']."'");
} else {

mysql_query("UPDATE settings SET campaign_active = '".$_POST['campaign_active']."'");

 $x5=$settings['latestpostid'];
 $vari5 = $x5+1;

 mysql_query("UPDATE latestids SET latestpostid='".$vari5."'");
if($_POST['campaign_active'] == 1) {
$sql="INSERT INTO guestbook (id, name, message, date) VALUES
('".$vari5."', '".$settings['bot_name']."','Det har nettopp blitt opprettet en ny butikkampanje!
','".strftime("%d.%m.%Y - %H:%M")."')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
} else {
$sql="INSERT INTO guestbook (id, name, message, date) VALUES
('".$vari5."', '".$settings['bot_name']."','Butikkampanjen er n&#229; avsluttet.
','".strftime("%d.%m.%Y - %H:%M")."')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
}
}
}

if(isset($_POST['campaign_exp'])) {

mysql_query("UPDATE settings SET campaign_exp = '".htmlspecialchars($_POST['campaign_exp'])."'");

}


echo"Innstillinger er oppdatert!<meta http-equiv='refresh' content='1; url=adminpanel.php?action=settings'><br/><br/>";

}
echo"
<form method='post'><input type='hidden' name='update' value='yes'>
      <b>Kampanje aktiv?</b><br/>

      Ja<input ";
      if($settings['campaign_active'] == "1") {

      echo" CHECKED";

      } else {

      echo" ";
      }
      echo" type='radio' name='campaign_active' value='1'>
       Nei<input
       ";
      if($settings['campaign_active'] == "0") {

      echo" CHECKED";

      } else {

      echo" ";
      }
      echo" type='radio' name='campaign_active' value='0'>
                         <br/> <br/><hr/><b>Kampanje tekst:</b><br/><textarea id='textinput' name='campaign_exp' style=' width: 400px; height: 300px; '>".$settings['campaign_exp']."</textarea>
       <br/><br/><hr/>
<b>Ordfilter:</b> (Separer ordene med komma.)<br/><textarea id='textinput' name='bad_words' style=' width: 340px; height: 200px; '>".$settings['bad_words']."</textarea>
       <br/><br/><hr/>
    <input type='submit' id='button' value='Oppdater innstillinger'>


<br/>";
}
break;




case "slideshow";

if($user['rights'] == "admin" || $user['rights'] == "global" || $user['rights'] == "forumglobal") {

if(isset($_GET['update']) && $_GET['update'] == "true") {
if(isset($_GET['id'])) {

$result = mysql_query("SELECT * FROM slideshow WHERE id ='".$_GET['id']."' ");
if(mysql_num_rows($result) > 0) {

$row = mysql_fetch_array($result);

  if(isset($_POST['image'])) {
  if($_POST['delete'] == "yes") {
mysql_query("DELETE FROM slideshow WHERE id='".$_GET['id']."'");

  echo"Bildet er slettet!<meta http-equiv='refresh' content='1; url=adminpanel?action=slideshow&update=true'><br/><br/>";
} else {
mysql_query("UPDATE slideshow SET image = '".$_POST['image']."' WHERE id='".$_GET['id']."'");

mysql_query("UPDATE slideshow SET link = '".$_POST['link']."' WHERE id='".$_GET['id']."'");

mysql_query("UPDATE slideshow SET text = '".$_POST['text']."' WHERE id='".$_GET['id']."'");

 echo"Bildet ble oppdatert!<br/><br/>";

  }
  }
echo"<form method='post'>
<b>BildeURL:</b><br/><input type='text' name='image' value='".$row['image']."' id='textinput'><br/>Ikke bruk bilder fra andre sider<br/> men last opp bildet via filopplasting.<br/><br/>
<b>Link:</b><br/><input type='text' name='link' value='".$row['link']."' id='textinput'><br/><br/>
<b>Tekst:</b><br/><input type='text' name='text' value='".$row['text']."' id='textinput'><br/><br/>
<b>Slett bilde?</b><br/><input type='checkbox' name='delete' value='yes'><br/><br/>
<input type='submit' value='Oppdater bilde' id='button'>
</form>";

} else {
echo"<meta http-equiv='refresh' content='0; url=index'>";
}
} else {
echo"<b>Velg et bilde:</b>";
$result = mysql_query("SELECT * FROM slideshow");
while($row = mysql_fetch_array($result))
  {
  echo"<br/><br/><a href='adminpanel?action=slideshow&update=true&id=".$row['id']."'>".$row['id'].". ".$row['link']."</a>";
  }
}



} else {


if(isset($_POST['link']) && ($_POST['image'])) {


$result = mysql_query("SELECT * FROM slideshow ORDER BY id DESC LIMIT 1");
while($row = mysql_fetch_array($result))
  {
  $id=$row['id']+1;
  }
$sql="INSERT INTO slideshow (id, link, image, text) VALUES
('".$id."', '".striphtml($_POST['link'])."','".$_POST['image']."', '".striphtml($_POST['text'])."')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
  echo"Bildet er lagt til!<meta http-equiv='refresh' content='1; url=adminpanel.php?action=slideshow'><br/><br/>";
  }

echo"<b><a href='adminpanel?action=slideshow&update=true'>Oppdater eksisterende bilder</a></b><br/><br/><form method='post'>
<b>BildeURL:</b><br/><input type='text' name='image' id='textinput'><br/>Ikke bruk bilder fra andre sider<br/> men last opp bildet via filopplasting.<br/><br/>
<b>Link:</b><br/><input type='text' name='link' id='textinput'><br/><br/>
<b>Tekst:</b><br/><input type='text' name='text' id='textinput'><br/><br/>
<input type='submit' value='Legg til' id='button'>
</form>";
}
}
break;






case "backgrounds";

if($user['rights'] == "admin" || $user['rights'] == "global" || $user['rights'] == "forumglobal") {

if(isset($_GET['update']) && $_GET['update'] == "true") {
if(isset($_GET['id'])) {

$result = mysql_query("SELECT * FROM backgrounds WHERE id ='".$_GET['id']."' ");
if(mysql_num_rows($result) > 0) {

$row = mysql_fetch_array($result);

  if(isset($_POST['name'])) {
  if($_POST['delete'] == "yes") {
mysql_query("DELETE FROM backgrounds WHERE id='".$_GET['id']."'");

  echo"Bakgrunnen er slettet!<meta http-equiv='refresh' content='1; url=adminpanel?action=backgrounds&update=true'><br/><br/>";
} else {

mysql_query("UPDATE backgrounds SET name = '".$_POST['name']."' WHERE id='".$_GET['id']."'");
mysql_query("UPDATE backgrounds SET inshop = '".$_POST['inshop']."' WHERE id='".$_GET['id']."'");
mysql_query("UPDATE backgrounds SET cost = '".$_POST['cost']."' WHERE id='".$_GET['id']."'");
mysql_query("UPDATE backgrounds SET campaign_cost = '".$_POST['campaign_cost']."' WHERE id='".$_GET['id']."'");
 echo"Bakgrunnen ble oppdatert!<br/><br/>";

  }
  }
echo"<form method='post'>
<b>Navn:</b><br/><input type='text' name='name' value='".$row['name']."' id='textinput'><br/><br/>
<b>Kostnad: (hvis den skal v&#230;re i butikken)</b><br/><input type='text' name='cost' value='".$row['cost']."' id='textinput'><br/><br/>
<b>Kampanjepris: (hvis den skal v&#230;re i butikken og v&#230;re p&#229; tilbud)</b><br/><input type='text' name='campaign_cost' value='".$row['campaign_cost']."' id='textinput'><br/><br/>
<b>Skal den v&#230;re i butikken?</b><br/><b>Ja</b><input type='radio'";
      if($row['inshop'] == "1") {

      echo" CHECKED";

      } echo" name='inshop' value='1'> <b>Nei</b><input type='radio' ";
      if($row['inshop'] == "0") {

      echo" CHECKED";

      } echo"  name='inshop' value='0'><br/><br/><b>Slett bakgrunn?</b><br/><input type='checkbox' name='delete' value='yes'><br/><br/>
<input type='submit' value='Oppdater bakgrunn' id='button'>
</form>";

} else {
echo"<meta http-equiv='refresh' content='0; url=index'>";
}
} else {
echo"<b>Velg en bakgrunn:</b>";
$result = mysql_query("SELECT * FROM backgrounds");
while($row = mysql_fetch_array($result))
  {
  echo"<br/><br/><a href='adminpanel?action=backgrounds&update=true&id=".$row['id']."'>".$row['id'].". ".$row['name']."</a>";
  }
}



} else {


if(isset($_POST['code']) && ($_POST['name'])) {

$result = mysql_query("SELECT * FROM backgrounds WHERE code = '".$_POST['code']."'");
if(mysql_num_rows($result) == 0) {

$result = mysql_query("SELECT * FROM backgrounds ORDER BY id DESC LIMIT 1");
while($row = mysql_fetch_array($result))
  {
  $id=$row['id']+1;
  }
$sql="INSERT INTO backgrounds (id, code, name, inshop, cost, campaign_cost) VALUES
('".$id."', '".striphtml($_POST['code'])."','".striphtml($_POST['name'])."','".$_POST['inshop']."','".$_POST['cost']."','".$_POST['campaign_cost']."')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
  echo"Bakgrunnen er lagt til!<meta http-equiv='refresh' content='1; url=adminpanel.php?action=backgrounds'><br/><br/>";
  }
}
echo"<b><a href='adminpanel?action=backgrounds&update=true'>Oppdater eksisterende bakgrunner</a></b><br/><br/><form method='post'>
<b>Navn:</b><br/><input type='text' name='name' id='textinput'><br/><br/>
<b>Kode:</b><br/><input type='text' name='code' id='textinput'><br/><br/>
<b>Kostnad: (hvis den skal v&#230;re i butikken)</b><br/><input type='text' name='cost' id='textinput'><br/><br/>
<b>Kampanjepris: (hvis den skal v&#230;re i butikken og v&#230;re p&#229; tilbud)</b><br/><input type='text' name='campaign_cost' id='textinput'><br/><br/>
<b>Skal den v&#230;re i butikken?</b><br/><b>Ja</b><input type='radio' name='inshop' value='1'> <b>Nei</b><input type='radio' CHECKED name='inshop' value='0'><br/><br/>
<input type='submit' value='Legg til' id='button'>
</form>";
}
}
break;







case "badges";

if($user['rights'] == "admin" || $user['rights'] == "global" || $user['rights'] == "forumglobal") {

if(isset($_GET['update']) && $_GET['update'] == "true") {
if(isset($_GET['id'])) {

$result = mysql_query("SELECT * FROM badges WHERE id ='".$_GET['id']."' ");
if(mysql_num_rows($result) > 0) {

$row = mysql_fetch_array($result);

  if(isset($_POST['image'])) {
  if($_POST['delete'] == "yes") {
mysql_query("DELETE FROM badges WHERE id='".$_GET['id']."'");

  echo"Skiltet er slettet!<meta http-equiv='refresh' content='1; url=adminpanel?action=badges&update=true'><br/><br/>";
} else {
mysql_query("UPDATE badges SET image = '".$_POST['image']."' WHERE id='".$_GET['id']."'");

mysql_query("UPDATE badges SET title = '".$_POST['title']."' WHERE id='".$_GET['id']."'");

mysql_query("UPDATE badges SET inshop = '".$_POST['inshop']."' WHERE id='".$_GET['id']."'");
mysql_query("UPDATE badges SET cost = '".$_POST['cost']."' WHERE id='".$_GET['id']."'");
mysql_query("UPDATE badges SET campaign_cost = '".$_POST['campaign_cost']."' WHERE id='".$_GET['id']."'");
 echo"Skiltet ble oppdatert!<br/><br/>";

  }
  }
echo"<form method='post'>
<b>SkiltbildeURL:</b><br/><input type='text' name='image' value='".$row['image']."' id='textinput'><br/>Ikke bruk bilder fra andre sider<br/> men last opp bildet via filopplasting.<br/><br/>
<b>Grunn:</b><br/><input type='text' name='title' value='".$row['title']."' id='textinput'><br/><br/><b>Kostnad: (hvis den skal v&#230;re i butikken)</b><br/><input type='text' name='cost' value='".$row['cost']."' id='textinput'><br/><br/>
<b>Kampanjepris: (hvis den skal v&#230;re i butikken og v&#230;re p&#229; tilbud)</b><br/><input type='text' name='campaign_cost' value='".$row['campaign_cost']."' id='textinput'><br/><br/>
<b>Skal den v&#230;re i butikken?</b><br/><b>Ja</b><input type='radio'";
      if($row['inshop'] == "yes") {

      echo" CHECKED";

      } echo" name='inshop' value='yes'> <b>Nei</b><input type='radio' ";
      if($row['inshop'] == "no") {

      echo" CHECKED";

      } echo"  name='inshop' value='no'><br/><br/><b>Slett skilt?</b><br/><input type='checkbox' name='delete' value='yes'><br/><br/>
<input type='submit' value='Oppdater skilt' id='button'>
</form>";

} else {
echo"<meta http-equiv='refresh' content='0; url=index'>";
}
} else {
echo"<b>Velg et skilt:</b>";
$result = mysql_query("SELECT * FROM badges ORDER BY id");
while($row = mysql_fetch_array($result))
  {
  echo"<br/><br/><a href='adminpanel?action=badges&update=true&id=".$row['id']."'>".$row['id'].". ".$row['code']."</a>";
  }
}



} else {


if(isset($_POST['code']) && ($_POST['image'])) {

$result = mysql_query("SELECT * FROM badges WHERE code = '".$_POST['code']."'");
if(mysql_num_rows($result) == 0) {

$result = mysql_query("SELECT * FROM badges ORDER BY id DESC LIMIT 1");
while($row = mysql_fetch_array($result))
  {
  $id=$row['id']+1;
  }
$sql="INSERT INTO badges (id, code, image, title, inshop, cost, campaign_cost) VALUES
('".$id."', '".striphtml($_POST['code'])."','".$_POST['image']."', '".striphtml($_POST['title'])."','".$_POST['inshop']."','".$_POST['cost']."','".$_POST['campaign_cost']."')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
  echo"Skiltet er lagt til!<meta http-equiv='refresh' content='1; url=adminpanel.php?action=badges'><br/><br/>";
  }
}
echo"<b><a href='adminpanel?action=badges&update=true'>Oppdater eksisterende skilt</a></b><br/><br/><form method='post'>
<b>Skiltkode:</b><br/><input type='text' name='code' id='textinput' maxlength='3'>
<br/><br/><b>SkiltbildeURL:</b><br/><input type='text' name='image' id='textinput'><br/>Ikke bruk bilder fra andre sider<br/> men last opp bildet via filopplasting.<br/><br/>
<b>Grunn:</b><br/><input type='text' name='title' id='textinput'><br/><br/><b>Kostnad: (hvis den skal v&#230;re i butikken)</b><br/><input type='text' name='cost' id='textinput'><br/><br/>
<b>Kampanjepris: (hvis den skal v&#230;re i butikken og v&#230;re p&#229; tilbud)</b><br/><input type='text' name='campaign_cost' id='textinput'><br/><br/>
<b>Skal den v&#230;re i butikken?</b><br/><b>Ja</b><input type='radio' name='inshop' value='yes'> <b>Nei</b><input type='radio' CHECKED name='inshop' value='no'><br/><br/>
<input type='submit' value='Legg til' id='button'>
</form>";
}
}
break;



case"badgelist";
if($user['rights'] == "admin" || $user['rights'] == "global" || $user['rights'] == "forumglobal") {
echo"<b>Skiltliste:</b>";

$result = mysql_query("SELECT * FROM badges");
while($row = mysql_fetch_array($result))
  {
  echo"<br/><br/><img src='".$row['image']."' alt='".$row['code']."' onMouseover=\"ddrivetip('".$row['title']."','white')\";
onMouseout=\"hideddrivetip()\" style='vertical-align:middle;' /><br/>".$row['code'];
  }
}

break;




case "update_badges";
if($user['rights'] == "admin" || $user['rights'] == "global" || $user['rights'] == "forumglobal") {
if(isset($_POST['name']) && ($_POST['badgecode'])) {
$result = mysql_query("SELECT * FROM usersystem WHERE username='".$_POST['name']."'");
while($row = mysql_fetch_array($result))
  {
  if($_POST['type'] == "give") {
mysql_query("UPDATE usersystem SET badges = '".$row['badges'].$_POST['badgecode'].",' WHERE username = '".$_POST['name']."'");
} else {
$cleantext = str_replace($_POST['badgecode'].",", NULL, $row['badges']);
mysql_query("UPDATE usersystem SET badges = '".$cleantext."' WHERE username = '".$_POST['name']."'");
}
  }
  echo"Innstillinger er oppdatert<br/><br/>";
}
echo"<form method='post'>
<b>Brukernavn:</b><br/><input type='text' name='name' id='textinput'>
<br/><br/><b>Skiltkode:</b><br/><input type='text' name='badgecode' id='textinput'><br/><br/>
    <b>Type:</b><br/><select id='textinput' name='type'>
    <option value='give'>Gi skilt</option>
        <option value='take'>Ta skilt</option>
    </select>
    <br/><br/><input type='submit' value='Send' id='button'>
</form>";
  }
break;






case "collectables";
if($user['rights'] == "admin") {





if(isset($_GET['update']) && $_GET['update'] == "true") {
if(isset($_GET['id'])) {

$result = mysql_query("SELECT * FROM furni WHERE id ='".$_GET['id']."' ");
if(mysql_num_rows($result) > 0) {

while($row = mysql_fetch_array($result))
  {
  $image = $row['image'];
  $code = $row['code'];
  $title = $row['title'];
  $mimage = $row['mimage'];
  $inshop = $row['inshop'];
  $cost = $row['cost'];
  $campaign_cost = $row['campaign_cost'];
  }
  if(isset($_POST['image'])) {
  if($_POST['delete'] == "yes") {
mysql_query("DELETE FROM furni WHERE id='".$_GET['id']."'");

  echo"M&#248;belen er slettet!<meta http-equiv='refresh' content='1; url=adminpanel.php?action=collectables&update=true'><br/><br/>";
} else {
mysql_query("UPDATE furni SET image = '".$_POST['image']."' WHERE id='".$_GET['id']."'");

// mysql_query("UPDATE furni SET code = '".$_POST['code']."' WHERE id='".$_GET['id']."'");

mysql_query("UPDATE furni SET title = '".$_POST['title']."' WHERE id='".$_GET['id']."'");

mysql_query("UPDATE furni SET mimage = '".$_POST['mimage']."' WHERE id='".$_GET['id']."'");

mysql_query("UPDATE furni SET inshop = '".$_POST['inshop']."' WHERE id='".$_GET['id']."'");
mysql_query("UPDATE furni SET cost = '".$_POST['cost']."' WHERE id='".$_GET['id']."'");
mysql_query("UPDATE furni SET campaign_cost = '".$_POST['campaign_cost']."' WHERE id='".$_GET['id']."'");
 echo"M&#248;belen ble oppdatert!<br/><br/>";

  }
  }
echo"<form method='post' action='adminpanel.php?action=collectables&update=true&id=".$_GET['id']."'>
";
// echo"<b>M&#248;belnavn:</b><br/><input type='text' name='code' id='textinput' value='".$code."' maxlength='50'><br/><br/>";
echo"
<b>M&#248;belbildeURL:</b><br/><input type='text' value='".$image."' name='image' id='textinput'><br/>Ikke bruk bilder fra andre sider<br/> men last opp bildet via filopplasting.<br/><br/>
<b>M&#248;belbildeURL: </b>(n&#229;r den trykkes p&#229;)<br/><input type='text' value='".$mimage."' name='mimage' id='textinput'><br/>Ikke bruk bilder fra andre sider<br/> men last opp bildet via filopplasting.<br/><br/>
<b>Beskrivelse:</b><br/><input value='".$title."' type='text' name='title' id='textinput'><br/><br/>
<b>Kostnad/Verdi:</b><br/><input value='".$cost."' type='text' name='cost' id='textinput'><br/><br/>
<b>Kampanjepris: (hvis den skal v&#230;re p&#229; tilbud)</b><br/><input type='text' name='campaign_cost' value='".$campaign_cost."' id='textinput'><br/><br/>
<b>Skal den v&#230;re i butikken?</b><br/><b>Ja</b><input type='radio'";
      if($inshop == "yes") {

      echo" CHECKED";

      } echo" name='inshop' value='yes'> <b>Nei</b><input type='radio' ";
      if($inshop == "no") {

      echo" CHECKED";

      } echo"  name='inshop' value='no'><br/><br/>
<b>Slett m&#248;bel?</b><br/><input type='checkbox' name='delete' value='yes'><br/><br/>
<input type='submit' value='Oppdater' id='button'></form>";
} else {
echo"<meta http-equiv='refresh' content='0; url=index.php'>";
}
} else {
echo"<b>Velg en m&#248;bel:</b>";
$result = mysql_query("SELECT * FROM furni ORDER BY id");
while($row = mysql_fetch_array($result))
  {
  echo"<br/><br/><a href='adminpanel.php?action=collectables&update=true&id=".$row['id']."'>".$row['id'].". ".$row['code']."</a>";
  }
}



} else {




if(isset($_POST['code']) && ($_POST['image'])) {

$result = mysql_query("SELECT * FROM furni WHERE code = '".$_POST['code']."'");
if(mysql_num_rows($result) == 0) {

$result = mysql_query("SELECT * FROM furni ORDER BY id DESC LIMIT 1");
while($row = mysql_fetch_array($result))
  {
  $id=$row['id']+1;
  }
$sql="INSERT INTO furni (id, code, image, title, mimage, inshop, cost, campaign_cost) VALUES
('".$id."', '".$_POST['code']."','".$_POST['image']."', '".$_POST['title']."','".$_POST['mimage']."','".$_POST['inshop']."','".$_POST['cost']."','".$_POST['campaign_cost']."')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
  echo"M&#248;belen er lagt til!<meta http-equiv='refresh' content='1; url=adminpanel?action=collectables'><br/><br/>";
  }
}
echo"<b><a href='adminpanel.php?action=collectables&update=true'>Oppdater eksisterende m&#248;bler</a></b><br/><br/><form method='post'>
<b>M&#248;belnavn:</b><br/><input type='text' name='code' id='textinput' maxlength='50'>
<br/><br/><b>M&#248;belbildeURL:</b><br/><input type='text' name='image' id='textinput'><br/>Ikke bruk bilder fra andre sider<br/> men last opp bildet via filopplasting.<br/><br/>
<b>M&#248;belbildeURL: </b>(n&#229;r den trykkes p&#229;)<br/><input type='text' name='mimage' id='textinput'><br/>Ikke bruk bilder fra andre sider<br/> men last opp bildet via filopplasting.<br/><br/>
<b>Beskrivelse:</b><br/><input type='text' name='title' id='textinput'><br/><br/>
<b>Kostnad/Verdi:</b><br/><input type='text' name='cost' id='textinput'><br/><br/>
<b>Kampanjepris: (hvis den skal v&#230;re p&#229; tilbud)</b><br/><input type='text' name='campaign_cost' id='textinput'><br/><br/>
<b>Skal den v&#230;re i butikken?</b><br/><b>Ja</b><input type='radio' CHECKED name='inshop' value='yes'> <b>Nei</b><input type='radio' CHECKED name='inshop' value='no'><br/><br/>
<input type='submit' value='Legg til' id='button'>
</form>";
}
}
break;

case"collectablelist";
if($user['rights'] == "admin") {
echo"<b>M&#248;belliste:</b><br/><br/>";

$result = mysql_query("SELECT * FROM furni");
while($row = mysql_fetch_array($result))
  {

  echo"<img src='".$row['image']."' border='0' alt='".$row['code']."' style='vertical-align:middle;'
onMouseover=\"ddrivetip('<b>".$row['code']."</b><br/>".$row['title']."<br/><b>Verdi:</b> ".$row['cost']." mynt.','white')\";
onMouseout=\"hideddrivetip()\"/>";

  }
}

break;
case "update_collectables";
if($user['rights'] == "admin") {
if(isset($_POST['name']) && ($_POST['badgecode'])) {
$result = mysql_query("SELECT * FROM usersystem WHERE username='".$_POST['name']."'");
while($row = mysql_fetch_array($result))
  {
  if($_POST['type'] == "give") {
mysql_query("UPDATE usersystem SET furni = '".$row['furni'].$_POST['badgecode'].",' WHERE username = '".$_POST['name']."'");
} else {
$cleantext = str_replace($_POST['badgecode'].",", NULL, $row['furni']);
mysql_query("UPDATE usersystem SET furni = '".$cleantext."' WHERE username = '".$_POST['name']."'");
}
  }
  echo"Innstillinger er oppdatert<br/><br/>";
}
echo"<form method='post'>
<b>Brukernavn:</b><br/><input type='text' name='name' id='textinput'>
<br/><br/><b>M&#248;belnavn:</b><br/><input type='text' name='badgecode' id='textinput'><br/><br/>
    <b>Type:</b><br/><select id='textinput' name='type'>
    <option value='give'>Gi m&#248;bel</option>
        <option value='take'>Ta m&#248;bel</option>
    </select>
    <br/><br/><input type='submit' value='Send' id='button'>
</form>";
  }
break;








case "update_items";
if($user['rights'] == "admin") {
if(isset($_POST['name']) && ($_POST['itemcode'])) {
$result = mysql_query("SELECT * FROM usersystem WHERE username='".$_POST['name']."'");
while($row = mysql_fetch_array($result))
  {
  if($_POST['type'] == "give") {
mysql_query("UPDATE usersystem SET items = '".$row['items'].$_POST['itemcode'].",' WHERE username = '".$_POST['name']."'");
} else {
$cleantext = str_replace($_POST['itemcode'].",", NULL, $row['items']);
mysql_query("UPDATE usersystem SET items = '".$cleantext."' WHERE username = '".$_POST['name']."'");
}
  }
  echo"Innstillinger er oppdatert<br/><br/>";
}
echo"<form method='post'>
<b>Brukernavn:</b><br/><input type='text' name='name' id='textinput'>
<br/><br/><b>Varekode:</b><br/><input type='text' name='itemcode' id='textinput'><br/><br/>
    <b>Type:</b><br/><select id='textinput' name='type'>
    <option value='give'>Gi vare</option>
        <option value='take'>Ta vare</option>
    </select>
    <br/><br/><input type='submit' value='Send' id='button'>
</form>";
}
break;

case "furnicategories";

if($user['rights'] == "valuer" || $user['rights'] == "admin" || $user['rights'] == "global" || $user['rights'] == "forumglobal" || $user['rights'] == "articleman&valuer") {
if(isset($_GET['update']) && $_GET['update'] == "true") {
if(isset($_GET['id'])) {

$result = mysql_query("SELECT * FROM furnicategories WHERE id ='".$_GET['id']."' ");
if(mysql_num_rows($result) > 0) {

while($row = mysql_fetch_array($result))
  {
  $image = $row['image'];
  $categories = $row['categories'];
  }
  if(isset($_POST['name'])) {
  if($_POST['delete'] == "yes") {
mysql_query("DELETE FROM furnicategories WHERE id='".$_GET['id']."'");

  echo"Kategorien er slettet!<meta http-equiv='refresh' content='1; url=adminpanel.php?action=furnivalues&update=true'><br/><br/>";
} else {
mysql_query("UPDATE furnicategories SET image= '".striphtml($_POST['image'])."' WHERE id='".$_GET['id']."'");

mysql_query("UPDATE furnicategories SET categories= '".striphtml($_POST['name'])."' WHERE id='".$_GET['id']."'");

mysql_query("UPDATE furnivalues SET category= '".striphtml($_POST['name'])."' WHERE category= '".$categories."'");
 if($_POST['categories'] != $categories) {
 echo"Kategorien ble oppdatert!<br/><br/><meta http-equiv='refresh' content='1; url=adminpanel.php?action=furnicategories&update=true'>";
 } else {
 echo"Kategorien ble oppdatert!<br/><br/>";
 }
  }
  }
echo"<b>Navn:</b><br/><form method='post' action='adminpanel.php?action=furnicategories&update=true&id=".$_GET['id']."'>
<input type='text' name='name' value='".$categories."' id='textinput'><br/><br/>
<b>BildeURL:</b><br/><input type='text' name='image' value='".$image."' id='textinput'><br/><br/><b>Slette kategori?</b><br/><input type='checkbox' name='delete' value='yes'><br/><br/>
<input type='submit' value='Oppdater kategori' id='button'></form>";
} else {
echo"<meta http-equiv='refresh' content='0; url=index.php'>";
}
} else {
echo"<b>Velg en kategori</b>";
$result = mysql_query("SELECT * FROM furnicategories");
while($row = mysql_fetch_array($result))
  {
  echo"<br/><br/><a href='adminpanel.php?action=furnicategories&update=true&id=".$row['id']."'>".$row['id'].". ".$row['categories']."</a>";
  }
}
} else {

if(isset($_POST['name']) && $_POST['name'] != "") {

$result = mysql_query("SELECT * FROM furnicategories ORDER BY id DESC LIMIT 1");
while($row = mysql_fetch_array($result))
  {
  $id=$row['id']+1;
  }
$sql="INSERT INTO furnicategories (id, categories, image) VALUES
('".$id."','".striphtml($_POST['name'])."','".striphtml($_POST['image'])."')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
  echo"Kategorien ble lagt til!<br/><br/>";
  }
  echo"<b><a href='adminpanel.php?action=furnicategories&update=true'>Oppdater eksisterende kategorier</a></b><br/><br/>";
echo"<b>Ny kategori:</b><br/><form method='post'><input type='text' name='name' id='textinput'><br/><br/>
<b>BildeURL:</b><br/><input type='text' name='image' id='textinput'><br/><br/>
<input type='submit' value='Lag kategori' id='button'></form>";
}
}

break;

case "furnivalues";
if($user['rights'] == "valuer" || $user['rights'] == "admin" || $user['rights'] == "global" || $user['rights'] == "forumglobal" || $user['rights'] == "articleman&valuer") {
if($_GET['update'] == "true") {

if(isset($_GET['category'])) {

if(isset($_GET['name'])) {
if(isset($_POST['image']) && ($_POST['name']) && ($_POST['value'])) {

if($_POST['delete_message'] == "yes") {
mysql_query("DELETE FROM furnivalues WHERE name='".$_GET['name']."' AND category='".$_GET['category']."'");

  echo"M&#248;belverdien er slettet!<meta http-equiv='refresh' content='1; url=adminpanel.php?action=furnivalues&update=true&category=".$_GET['category']."'><br/><br/>";
} else {

	$bad_entities = array("HC", "hc", "Hc", "hC", " ");
	$safe_entities = array("", "", "", "", "");
	$cleantext = str_replace($bad_entities, $safe_entities, $_POST['value']);

mysql_query("UPDATE furnivalues SET image= '".striphtml($_POST['image'])."' WHERE name='".striphtml($_GET['name'])."' AND category='".$_GET['category']."'");

mysql_query("UPDATE furnivalues SET name= '".striphtml($_POST['name'])."' WHERE name='".striphtml($_GET['name'])."' AND category='".$_GET['category']."'");

mysql_query("UPDATE furnivalues SET value= '".striphtml($cleantext)."' WHERE name='".striphtml($_GET['name'])."' AND category='".$_GET['category']."'");

mysql_query("UPDATE furnivalues SET status= '".$_POST['status']."' WHERE name='".striphtml($_GET['name'])."' AND category='".$_GET['category']."'");

mysql_query("UPDATE furnivalues SET lastupdate= '".strftime("%d.%m.%Y - %H:%M")."' WHERE name='".striphtml($_GET['name'])."' AND category='".$_GET['category']."'");
mysql_query("UPDATE furnivalues SET time = '".time()."' WHERE name='".striphtml($_GET['name'])."' AND category='".$_GET['category']."'");


  echo"M&#248;belverdien er oppdatert!<meta http-equiv='refresh' content='1; url=adminpanel.php?action=furnivalues&update=true'><br/><br/>";
  } }
$result = mysql_query("SELECT * FROM furnivalues WHERE category='".striphtml($_GET['category'])."' AND name='".striphtml($_GET['name'])."'");
while($row = mysql_fetch_array($result))
  {
  echo "<form method='post'><b>M&#248;bel bilde:</b><br/><input type='text' name='image' id='textinput' style='width: 400px;' value='".$row['image']."'><br/><br/>";


  echo "<b>M&#248;bel navn:</b><br/><input type='text' name='name' id='textinput' style='width: 250px;' value='".$row['name']."'><br/><br/>";


  echo "<b>M&#248;bel verdi:</b><br/><input type='text' name='value' id='textinput' style='width: 100px;' value='".$row['value']."'><br/><br/>";

    echo "<b>Status:</b><br/><select name='status' id='textinput'>";

  echo"<option value='medium'>Ingen endring</option>";
  echo"<option value='low'>Synkende</option>";
  echo"<option value='high'>Stigende</option>";

  echo"</select><br/><br/>";

  echo "<b>Kategori:</b><br/><table><select name='category' DISABLED id='textinput'>";

  echo"<option value='".$row['category']."'>".$row['category']."</option>";

echo"</select></table><br/><br/><b>Slett m&#248;belverdien?</b><br/><input type='checkbox' value='yes' name='delete_message'><br/><br/><input type='submit' value='Oppdater m&#248;belverdi' id='button'>";
}
} else {
echo"<b>Velg en m&#248;belverdi:</b>";
$result = mysql_query("SELECT * FROM furnivalues WHERE category='".$_GET['category']."'");
while($row = mysql_fetch_array($result))
  {
  echo"<br/><br/><a href='adminpanel.php?action=furnivalues&update=true&category=".$_GET['category']."&name=".$row['name']."'>".$row['name']."</a>";
  }

}
} else {
echo"<b>Velg en kategori:</b><br/><form action='adminpanel.php' method='get'><input type='hidden' name='action' value='furnivalues'><input type='hidden' name='update' value='true'>
<select name='category' id='textinput'>";

$result = mysql_query("SELECT categories FROM furnicategories");
while($row = mysql_fetch_array($result))
  {
  echo"<option value='".$row['categories']."'>".$row['categories']."</option>";
  }
echo"</select><br/><br/><input type='submit' value='G&#229;' id='textinput'>"; }
} else {

if(isset($_POST['image']) && ($_POST['name']) && ($_POST['value']) && ($_POST['category'])) {


	$bad_entities = array("HC", "hc", "Hc", "hC");
	$safe_entities = array("", "", "", "");
	$cleantext = str_replace($bad_entities, $safe_entities, $_POST['value']);


$sql="INSERT INTO furnivalues (image, name, value, lastupdate, status, category, time) VALUES
('".striphtml($_POST['image'])."','".striphtml($_POST['name'])."','".striphtml($cleantext)."'
,'".strftime("%d.%m.%Y - %H:%M")."','".$_POST['status']."','".striphtml($_POST['category'])."','".time()."')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
  echo"M&#248;belverdien er lagt til!<br/><br/>";
  }
echo"<b><a href='adminpanel.php?action=furnivalues&update=true'>Oppdater eksisterende m&#248;belverdier</a></b><br/><br/>";
  echo "<form method='post'><b>M&#248;bel bilde:</b><br/><input type='text' name='image' style='width: 400px;' id='textinput'><br/><br/>";


  echo "<b>M&#248;bel navn:</b><br/><input type='text' name='name' style='width: 250px;' id='textinput'><br/><br/>";


  echo "<b>M&#248;bel verdi:</b><br/><input type='text' name='value' style='width: 100px;' value='1' id='textinput'><br/><br/>";

  echo "<b>Velg en status:</b><br/><select name='status' id='textinput'>";

  echo"<option value='medium'>Ingen endring</option>";
  echo"<option value='low'>Synkende</option>";
  echo"<option value='high'>Stigende</option>";

  echo"</select><br/><br/>";


  echo "<b>Velg en kategori:</b><br/><select name='category' id='textinput'>";

$result = mysql_query("SELECT categories FROM furnicategories");
while($row = mysql_fetch_array($result))
  {
  echo"<option value='".$row['categories']."'>".$row['categories']."</option>";
  }
echo"</select><br/><br/><input type='submit' value='Legg til m&#248;belverdi' id='button'>";
}
}

break;


case "messages";
if($user['rights'] == "mod" || $user['rights'] == "admin" || $user['rights'] == "global" || $user['rights'] == "forumglobal") {
if(isset($_GET['delete_message']) && ($_GET['user']) && ($_GET['title'])) {


 $x=$settings['messages'];
 $vari = $x-1;


mysql_query("UPDATE latestids SET messages='".$vari."'");


mysql_query("DELETE FROM messages WHERE username='".$_GET['user']."' AND name='".$_GET['title']."'");

echo"Meldingen er slettet!<meta http-equiv='refresh' content='1; url=adminpanel.php?action=messages'><br/><br/>";

}
echo"<b>N&#248;danrop fra brukere:</b><hr/>";
$result = mysql_query("SELECT * FROM messages");
while($row = mysql_fetch_array($result))
  {

 echo"
<div id='tagcontainer'><div id='tagtop'><div id='text'><br/>";

 echo"<b>Brukernavn: <a href='profile.php?user=".$row['username']."'>".$row['username']."</a>, Tittel: ".$row['name']."</b>";

  echo"</div></div>
  <div id='tagmid'><div id='text'><br/><br/>".$row['message']."<br/><br/>";
  echo"Postet: <b>".$row['date']."</b><br/><br/>";
   echo"<a href='adminpanel.php?action=messages&delete_message=true&user=".$row['username']."&title=".$row['name']."'>Slett</a> &#9679;
   <a href='post.php?action=new&sendTo=".$row['username']."&title=Svar%20p%E5%20anrop:'>Svar</a>";

  echo"</div></div>
   <div id='tagbot'>";
   echo"</div></div>
 ";

  }

}
break;


case "tagwall";
if($user['rights'] == "mod" || $user['rights'] == "admin" || $user['rights'] == "global" || $user['rights'] == "forumglobal") {

if(isset($_GET['delete_post']) && ($_GET['id'])) {

mysql_query("DELETE FROM guestbook WHERE id = '".$_GET['id']."'");

echo"Posten er slettet!<meta http-equiv='refresh' content='1; url=tagwall.php'><br/><br/>";

}

if(isset($_GET['unreport_post']) && ($_GET['id'])) {

mysql_query("UPDATE guestbook SET status = 'unreported' WHERE id='".$_GET['id']."'");

echo"Posten er avrapportert!<br/><br/>";

}

echo"<b>Rapporterte poster</b><hr/>";
 $result = mysql_query("SELECT * FROM guestbook WHERE status='reported' ORDER BY id DESC ");
while($row = mysql_fetch_array($result))
  {

 echo"
<div id='tagcontainer'><div id='tagtop'><div id='text'><br/>";

 if($row['name'] == $settings['bot_name']) {

 echo"<b style='color: #FF3300;'>- ".$row['name']."</b>";

 } else {

 echo"<b>- <a href='profile.php?user=".$row['name']."'>".$row['name']."</a>";

 }
  echo", Rapportert av: <a href='profile.php?user=".$row['reportedby']."'>".$row['reportedby']."</a></b></div></div>
  <div id='tagmid'><div id='text'><br/><br/>".$row['message']."<br/><br/>";
echo"Postet: <b>".$row['date']."</b><br/><br/>";
   echo"<a href='adminpanel.php?action=tagwall&unreport_post=true&id=".$row['id']."'>Avrapporter</a> &#9679; <a href='adminpanel.php?action=tagwall&delete_post=true&id=".$row['id']."'>Slett</a>";

  echo"</div></div>
   <div id='tagbot'>";
   echo"</div></div>
 ";
  }



}
break;



case "comments";
if($user['rights'] == "mod" || $user['rights'] == "admin" || $user['rights'] == "global" || $user['rights'] == "forumglobal") {


if(isset($_GET['delete_comment']) && ($_GET['id'])) {

mysql_query("DELETE FROM comments WHERE id='".$_GET['id']."'");

echo"Posten er slettet!<br/><br/>";

}

if(isset($_GET['unreport_comment']) && ($_GET['id'])) {

mysql_query("UPDATE comments SET status = 'unreported' WHERE id='".$_GET['id']."'");

echo"Posten er avrapportert!<br/><br/>";

}

echo"<b>Rapporterte kommentarer</b><hr/>";
 $result = mysql_query("SELECT * FROM comments WHERE status='reported' ORDER BY id DESC ");
while($row = mysql_fetch_array($result))
  {

 echo"
<div id='tagcontainer'><div id='tagtop'><div id='text'><br/>";

 echo"<b>- <a href='profile.php?user=".$row['name']."'>".$row['name']."</a>, Rapportert av: <a href='profile.php?user=".$row['reportedby']."'>".$row['reportedby']."</a></b>";

  echo"</div></div>
  <div id='tagmid'><div id='text'><br/><br/>".$row['message']."<br/><br/>";

   echo"<a href='adminpanel.php?action=comments&unreport_comment=true&id=".$row['id']."'>Avrapporter</a> &#9679; <a href='adminpanel.php?action=comments&delete_comment=true&id=".$row['id']."'>Slett</a>";

  echo"</div></div>
   <div id='tagbot'>";
   echo"</div></div>
 ";
  }

 }
break;



case "user";
if($user['rights'] == "admin" || $user['rights'] == "global" || $user['rights'] == "mod" || $user['rights'] == "forumglobal" || $user['rights'] == "forummod") {
if(isset($_POST['update'])) {
if($user['rights'] == "admin") {
if(isset($_POST['update_user_rank'])) {


if(!is_numeric($_POST['update_user_rank'])) {
mysql_query("UPDATE usersystem SET rights='".$_POST['update_user_rank']."' WHERE username='".$_POST['update_user']."' ");

mysql_query("UPDATE usersystem SET userlevel='4' WHERE username='".$_POST['update_user']."' ");

} else {

mysql_query("UPDATE usersystem SET userlevel='".$_POST['update_user_rank']."' WHERE username='".$_POST['update_user']."' ");
mysql_query("UPDATE usersystem SET rights='' WHERE username='".$_POST['update_user']."' ");

}

}
} else {
if(isset($_POST['update_user_rank'])) {
$result = mysql_query("SELECT * FROM usersystem WHERE username='".$_POST['update_user']."'");
while($row = mysql_fetch_array($result))
  {
  $userlevel=$row['userlevel'];
  }
if($userlevel >= $user['level']) {  } else {

if($_POST['update_user_rank'] == "2" || $_POST['update_user_rank'] == "1") {

mysql_query("UPDATE usersystem SET userlevel='".$_POST['update_user_rank']."' WHERE username='".$_POST['update_user']."' ");
mysql_query("UPDATE usersystem SET rights='' WHERE username='".$_POST['update_user']."' ");
}
}

}
}

if(!empty($_POST['banreason'])) {

mysql_query("UPDATE usersystem SET banreason = '".$_POST['banreason']."' WHERE username = '".$_POST['update_user']."'");

}


if(!empty($_POST['banreason']) && $_POST['letindate'] != "choose") {

mysql_query("UPDATE usersystem SET letindate = '".$_POST['letindate']."' WHERE username = '".$_POST['update_user']."'");

}

if($user['rights'] == "admin") {
if(!empty($_POST['ip'])) {
if($_POST['iptype'] == "ban") {
mysql_query("INSERT INTO ipbans (ip) VALUES ('".$_POST['ip']."')");
} else {
mysql_query("DELETE FROM ipbans WHERE ip='".$_POST['ip']."'");
}
}
}


if(!empty($_POST['chatban_user']))
{

mysql_query("UPDATE usersystem SET chat_ban = '".$_POST['cbtype']."' WHERE username = '".$_POST['chatban_user']."'");

}


if(isset($_POST['givecreditsname']) && ($_POST['amount']) && ($_POST['type'])) {



$result = mysql_query("SELECT * FROM usersystem WHERE username='".$_POST['givecreditsname']."'");

while($row = mysql_fetch_array($result))
  {

if($_POST['type'] == "+") {

$n=$_POST['amount'];
$x=$row['credits'];
$vari = $x + $n;

} else {

$n=$_POST['amount'];
$x=$row['credits'];
$vari = $x - $n;

}

}

mysql_query("UPDATE usersystem SET credits = '".$vari."'
WHERE username = '".$_POST['givecreditsname']."'");



}





echo"Bruker innstillinger er oppdatert!<br/><br/>";

}


      echo"

      <form method='post'><input type='hidden' name='update' value='yes'>

    <b>  Brukernavn: </b>
    <br/><input type='text' id='textinput' name='update_user'><br/><br/>
    <b>Ny rank:</b><br/><select id='textinput' name='update_user_rank'>";
    if($user['rights'] == "admin") {
    echo"<option value='2'>Bruker</option>
    <option value='admin'>Administrator</option>
    <option value='global'>Global moderator</option>
    <option value='articleman&valuer'>Anmelder og M&#248;belverdisetter</option>
    <option value='mod'>Moderator</option>
    <option value='magazine'>Magazine</option>
    <option value='uploader'>Opplaster</option>
    <option value='newsman'>Nyhetsskriver</option>
    <option value='forummod'>Forummoderator</option>
    <option value='forumglobal'>Global-forummoderator</option>
    <option value='articleman'>Anmelder</option>
    <option value='valuer'>M&#248;belverdisetter</option>
    <option value='3'>VIP</option>
    <option value='1'>Utestengt</option>";
    } else {
echo"<option value='2'>Bruker</option>
    <option value='1'>Utestengt</option>";
    }
    echo"</select>
    <br/><br/>
    <b>Utesteng i:</b> (bare hvis en bruker skal utestenges.)<br/>

<select id='textinput' name='letindate'>\n";
    echo"<option value='choose'>Velg</option>\n";
    echo"<option value='".strftime("%y%m%d", time()+1*24*3600)."||".strftime("%d.%m.%Y", time()+1*24*3600)."'>1 dag</option>\n";
    echo"<option value='".strftime("%y%m%d", time()+2*24*3600)."||".strftime("%d.%m.%Y", time()+2*24*3600)."'>2 dager</option>\n";
    echo"<option value='".strftime("%y%m%d", time()+3*24*3600)."||".strftime("%d.%m.%Y", time()+3*24*3600)."'>3 dager</option>\n";
    echo"<option value='".strftime("%y%m%d", time()+5*24*3600)."||".strftime("%d.%m.%Y", time()+5*24*3600)."'>5 dager</option>\n";
    echo"<option value='".strftime("%y%m%d", time()+7*24*3600)."||".strftime("%d.%m.%Y", time()+7*24*3600)."'>1 uke</option>\n";
    echo"<option value='".strftime("%y%m%d", time()+14*24*3600)."||".strftime("%d.%m.%Y", time()+14*24*3600)."'>2 uker</option>\n";
    echo"<option value='".strftime("%y%m%d", time()+21*24*3600)."||".strftime("%d.%m.%Y", time()+21*24*3600)."'>3 uker</option>\n";
    echo"<option value='".strftime("%y%m%d", time()+30*24*3600)."||".strftime("%d.%m.%Y", time()+30*24*3600)."'>1 m&#229;ned (30 dager)</option>\n";
    echo"<option value='".strftime("%y%m%d", time()+90*24*3600)."||".strftime("%d.%m.%Y", time()+90*24*3600)."'>3 m&#229;neder (90 dager)</option>\n";
    echo"<option value='".strftime("%y%m%d", time()+180*24*3600)."||".strftime("%d.%m.%Y", time()+180*24*3600)."'>Et halvt &#229;r (180 dager)</option>\n";
    echo"<option value='200101||01.01.2020'>Permanent utestengelse (01.01.2020)</option>\n";

    echo"</select>

    <br/><br/>
        <b> Utestengings-Grunn:</b> (bare hvis en bruker skal utestenges.)

    <br/><textarea id='textinput' name='banreason' style=' width: 300px; height: 130px;  font-family: Verdana;
  font-size: 10px;
  font-weight: normal;
  color: #000000;'></textarea>
";
  if($user['rights'] == "admin" || $user['rights'] == "global") {
  echo"<br/> <br/><hr/>
  <b>  Oppdater mynt til:</b> (brukernavn)
    <br/><input type='text' id='textinput' name='givecreditsname'><br/><br/>  <b>  Mengde:</b><br/><input type='text' id='textinput' name='amount'>
    <br/><br/>
    <b>Type:</b><br/><select id='textinput' name='type'>
    <option value='+'>Pluss</option>
        <option value='-'>minus</option>
    </select>";
     }

  if($user['rights'] == "admin") {
echo"
    <br/> <br/><hr/>
    <b>ip:</b><br/><input type='text' name='ip' id='textinput'><br/><br/><select id='textinput' name='cbtype'>
    <option value='ban'>Utesteng</option>
        <option value='letin'>Slipp inn</option>";

echo"
    </select><br/><br/>";
}

   if($user['rights'] == "admin") {
       echo"<table border='0' width='100%'>";
echo"<tr  style='

font-family: Verdana;
font-size: 11px;
font-weight: normal;
color: #000000;
border: 1px solid #999;

' height='10'>
<th style='border: 1px solid #999;'>Utestengte ip'er</th>

</tr>";
$result = mysql_query("SELECT * FROM ipbans");
while($row = mysql_fetch_array($result))
  {
  echo"<tr><td id='td' align='center'>".$row['ip']."</td></tr>";
  }
 echo"</table>";
 }
echo"<br/><br/><hr/><b>Brukernavn:</b><br/><input type='text' id='textinput' name='chatban_user'><br/><br/>
    <b>Type:</b><br/><select id='textinput' name='cbtype'>
    <option value='1'>Gi chatban</option>
        <option value='0'>Opphev chatban</option>
    </select>";
     echo"<br/><br/><hr/><input type='submit' id='button' value='Oppdater innstillinger'><br/>";
}
break;

case "voucher";
if($user['rights'] == "admin" || $user['rights'] == "global") {
if(isset($_POST['voucher']) && ($_POST['value']) && $_POST['voucher'] != "" && $_POST['value'] != "") {

if(strlen($_POST['voucher']) == "10") {

$sql="INSERT INTO vouchers (value, code, name) VALUES
('".$_POST['value']."','".$_POST['voucher']."','".$user['name']."')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
  }
echo"Myntkoden er lagt til!<meta http-equiv='refresh' content='1; url=?action=voucher'><br/><br/>";
  }

echo $beta."<br/><br/><form method='post'>
<b>Myntkode:</b> (Myntkoden M&#197; v&#230;re p&#229; 10 tegn)<br/><input type='text' id='textinput' name='voucher' maxlength='10' style=' width: 300px; '><br/><br/>
     <b>Verdi:</b><br/><input type='text' id='textinput' name='value' maxlength='3' style=' width: 32px; '><br/><br/><b>Eksisterende koder:</b><hr/>";



$result = mysql_query("SELECT * FROM vouchers");
while($row = mysql_fetch_array($result))
  {

  echo "<table border='1' cellspacing='0,8' cellpadding='5' width='90%' style=' background-color: #FFFFFF ' id='button'><br/><tr id='button'>";



  echo "<td style='

font-family: Verdana;
font-size: 11px;
font-weight: normal;
color: #000000;

' id='button'><b>Verdi:</b> " . $row['value'] . "</td>";




  echo "<td style='

font-family: Verdana;
font-size: 11px;
font-weight: normal;
color: #000000;

' width='400' id='button'><b>Kode:</b> " . $row['code'] . "</td>";


  echo "<td style='

font-family: Verdana;
font-size: 11px;
font-weight: normal;
color: #000000;

' id='button'><b>Lager:</b> " . $row['name'] . "</td>";


  echo "</tr>";
  }
echo "</table>";

    echo"
       <br/><br/><hr/><input type='submit' id='button' value='Legg til Myntkode'><br/>";
}
break;

case "systembot";
if($user['rights'] == "admin" || $user['rights'] == "global" || $user['rights'] == "forumglobal") {
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

$message = stripurl($_POST['music']);

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
/*
	$output = "";
	$chars = "1234";
	for ($i = 0; $i < 2; $i++) {
		$output .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
	}
*/

	$one = rand(1, 4);
	$two = rand(1, 9);
	$output = $one.$two;

$done = "plus";

 $x5=$latestpost;
 $vari5 = $x5+1;

 mysql_query("UPDATE latestids SET latestpostid='".$vari5."'");

$sql="INSERT INTO guestbook (id, name, message, status, date, type) VALUES
('".$vari5."', '".$settings['bot_name']."','Her er en myntkode, v&#230;r kjapp! <b>".$string."</b>
','".$string."','".strftime("%d.%m.%Y - %H:%M")."', 'voucher')";
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
<b>Post en tilfeldig myntkode i tagwallen?</b><br/><input type='checkbox' value='yes' name='random_voucher'><br/>
       <br/><hr/>
    <input type='submit' id='button' value='Post'><br/>


";
}
break;








case"second_systembot";
if($user['rights'] == "admin" || $user['rights'] == "global" || $user['rights'] == "forumglobal") {
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

$message = stripurl($_POST['music']);

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
/*
	$output = "";
	$chars = "1234";
	for ($i = 0; $i < 2; $i++) {
		$output .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
	}
*/

	$one = rand(1, 4);
	$two = rand(1, 9);
	$output = $one.$two;

$done = "plus";

 $x5=$latestpost;
 $vari5 = $x5+1;


 mysql_query("UPDATE latestids SET latestpostid='".$vari5."'");

$sql="INSERT INTO guestbook (id, name, message, status, date, type) VALUES
('".$vari5."', '".$settings['second_bot_name']."','Folkens, her har dere en myntkode! <b>".$string."</b>
','".$string."','".strftime("%d.%m.%Y - %H:%M")."', 'voucher')";
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
<b>Post en tilfeldig myntkode i tagwallen?</b><br/><input type='checkbox' value='yes' name='random_voucher'><br/>
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
/* if($_POST['delete_message'] == "yes") {
mysql_query("DELETE FROM pages WHERE id='".$_GET['id']."'");

  echo"Siden er slettet!<meta http-equiv='refresh' content='1; url=adminpanel.php?action=page&update=true'>";
} else {
*/
mysql_query("UPDATE pages SET title = '".$_POST['title']."' WHERE id='".$_GET['id']."' ");

mysql_query("UPDATE pages SET content = '".addslashes($_POST['content'])."' WHERE id='".$_GET['id']."' ");

mysql_query("UPDATE pages SET subheader = '".$_POST['subheader']."' WHERE id='".$_GET['id']."' ");

echo"Siden er Oppdatert! <br/>link: <a href='page.php?id=".$_GET['id']."'>page.php?id=".$_GET['id']."</a><br/><br/>";
//}
}

$result = mysql_query("SELECT * FROM pages WHERE id='".$_GET['id']."' ");
while($row = mysql_fetch_array($result))
  {



echo"

<form method='post'>
<b>Tittel:</b><br/><input type='text' id='textinput' name='title' style=' width: 200px; ' value='".$row['title']."' ><br/><br/>
<b>Subheader:</b><br/><input type='text' value='".$row['subheader']."' id='textinput' name='subheader' style=' width: 200px; ' ><br/><br/>


<b>Innhold:</b><br/><textarea id='textinput' name='content' style=' width: 400px; height: 400px; '>".stripslashes($row['content'])."</textarea>


";
// echo"<br/><br/><b>Slett siden?</b><br/><input type='checkbox' value='yes' name='delete_message'>";
echo"
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
('".$vari."','".$_POST['title']."','".addslashes($_POST['content'])."','".$_POST['subheader']."')";
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
if($user['rights'] == "admin") {
echo"<div style='background-color: rgb(217, 217, 217);'> <b style='font-size:14px;'>Ledelsen:</b></div>";
$fetch = mysql_query("SELECT * from `employes` WHERE cat = 1");
while($arne = mysql_fetch_assoc($fetch)){


$myuser = mysql_fetch_array(mysql_query("SELECT head, habboname FROM usersystem WHERE habboname = '".$arne['username']."'"));


echo "
<div id='tagcontainer'>
<div id='tagtop'><div id='text'><br/><b>- <a href='profile.php?user=".$arne['username']."'>".$arne['username']."</a></b></div></div>
  <div id='tagmid'><div id='text'><br/><br/>Stilling: <b>".$arne['rank']."</b><br/>
  <div style='float:right; margin-top:-46px;'><a href='http://www.habbo.no/home/".$myuser['habboname']."'><img src='fancenter/tools/head/head.php?habbo=".$myuser['habboname']."&gesture=".$myuser['head']."' alt='".$myuser['habboname']."' border='0'></a></div>
<br/>

  ".$arne['description']."<br/><br/>";
	unset($myuser);
echo"
</div></div>
   <div id='tagbot'></div></div>
 ";


}

echo"<div style='background-color: rgb(217, 217, 217);'> <b style='font-size:14px;'>Driftsansvarlige:</b></div>";

$fetch = mysql_query("SELECT * from `employes` WHERE cat = 2");
while($arne = mysql_fetch_assoc($fetch)){


$myuser = mysql_fetch_array(mysql_query("SELECT head, habboname FROM usersystem WHERE habboname = '".$arne['username']."'"));


echo "
<div id='tagcontainer'>
<div id='tagtop'><div id='text'><br/><b>- <a href='profile.php?user=".$arne['username']."'>".$arne['username']."</a></b></div></div>
  <div id='tagmid'><div id='text'><br/><br/>Stilling: <b>".$arne['rank']."</b><br/>
  <div style='float:right; margin-top:-46px;'><a href='http://www.habbo.no/home/".$myuser['habboname']."'><img src='fancenter/tools/head/head.php?habbo=".$myuser['habboname']."&gesture=".$myuser['head']."' alt='".$myuser['habboname']."' border='0'></a></div>
<br/>

  ".$arne['description']."<br/><br/>";
	unset($myuser);
echo"
</div></div>
   <div id='tagbot'></div></div>
 ";


}



echo"<div style='background-color: rgb(217, 217, 217);'> <b style='font-size:14px;'>Ansatte:</b></div>";

$fetch = mysql_query("SELECT * from `employes` WHERE cat = 3");
while($arne = mysql_fetch_assoc($fetch)){


$myuser = mysql_fetch_array(mysql_query("SELECT head, habboname FROM usersystem WHERE habboname = '".$arne['username']."'"));


echo "
<div id='tagcontainer'>
<div id='tagtop'><div id='text'><br/><b>- <a href='profile.php?user=".$arne['username']."'>".$arne['username']."</a></b></div></div>
  <div id='tagmid'><div id='text'><br/><br/>Stilling: <b>".$arne['rank']."</b><br/>
  <div style='float:right; margin-top:-46px;'><a href='http://www.habbo.no/home/".$myuser['habboname']."'><img src='fancenter/tools/head/head.php?habbo=".$myuser['habboname']."&gesture=".$myuser['head']."' alt='".$myuser['habboname']."' border='0'></a></div>
<br/>

  ".$arne['description']."<br/><br/>";
	unset($myuser);
echo"
</div></div>
   <div id='tagbot'></div></div>
 ";


}




echo"<div style='background-color: rgb(217, 217, 217);'> <b style='font-size:14px;'>Hjelpesentralansatte:</b></div>";

$fetch = mysql_query("SELECT * from `employes` WHERE cat = 4");
while($arne = mysql_fetch_assoc($fetch)){


$myuser = mysql_fetch_array(mysql_query("SELECT head, habboname FROM usersystem WHERE habboname = '".$arne['username']."'"));


echo "
<div id='tagcontainer'>
<div id='tagtop'><div id='text'><br/><b>- <a href='profile.php?user=".$arne['username']."'>".$arne['username']."</a></b></div></div>
  <div id='tagmid'><div id='text'><br/><br/>Stilling: <b>".$arne['rank']."</b><br/>
  <div style='float:right; margin-top:-46px;'><a href='http://www.habbo.no/home/".$myuser['habboname']."'><img src='fancenter/tools/head/head.php?habbo=".$myuser['habboname']."&gesture=".$myuser['head']."' alt='".$myuser['habboname']."' border='0'></a></div>
<br/>

  ".$arne['description']."<br/><br/>";
	unset($myuser);
echo"
</div></div>
   <div id='tagbot'></div></div>
 ";


}




}
break;

case "jobs";
if($user['rights'] == "admin") {

if(isset($_GET['update']) && $_GET['update'] == "true") {
if(isset($_GET['id'])) {

$result = mysql_query("SELECT * FROM `employes` WHERE id ='".$_GET['id']."' LIMIT 1");
if(mysql_num_rows($result) > 0) {

while($row = mysql_fetch_array($result))
  {
  $name = $row['username'];
  $job = $row['rank'];
  $desc = $row['description'];
  $cat = $row['cat'];
  }

	if(isset($_POST['worker_name']) && isset($_POST['job_name'])){
	  if($_POST['delete'] == "yes") {
mysql_query("DELETE FROM `employes` WHERE id='".$_GET['id']."'");

  echo"Den ansatte er slettet!<meta http-equiv='refresh' content='1; url=adminpanel?action=jobs&update=true'><br/><br/>";
} else {

mysql_query("UPDATE employes SET username = '".striphtml($_POST['worker_name'])."' WHERE id='".$_GET['id']."'");

mysql_query("UPDATE employes SET rank = '".striphtml($_POST['job_name'])."' WHERE id='".$_GET['id']."'");

mysql_query("UPDATE employes SET description = '".striphtml($_POST['desc'])."' WHERE id='".$_GET['id']."'");

mysql_query("UPDATE employes SET cat = '".striphtml($_POST['cat'])."' WHERE id='".$_GET['id']."'");

	echo "Den ansatte ble oppdatert!<br/><br/>";
	}
	}

echo "
<form action='' method='post'>
<b>Navn p&#229; den ansatte:</b><br/>
<input type='text' id='textinput' name='worker_name' value='".$name."'><br><br/>
<b>Stilling:</b><br><input type='text' id='textinput' name='job_name' value='".$job."'><br><br/>
<b>Portofolio:</b><br> <textarea id='textinput' style='width: 400px; height: 300px;' name='desc'>".$desc."</textarea><br><br/>
<b>Kategori:</b><br/><select name='cat' id='textinput'>";

if($cat == "1") {
echo"<option SELECTED value='1'>Ledelsen</option>";
} else {
echo"<option value='1'>Ledelsen</option>";
}

if($cat == "2") {
echo"<option SELECTED value='2'>Driftsansvarlige</option>";
} else {
echo"<option value='2'>Driftsansvarlige</option>";
}

if($cat == "3") {
echo"<option SELECTED value='3'>Ansatte</option>";
} else {
echo"<option value='3'>Ansatte</option>";
}

if($cat == "4") {
echo"<option SELECTED value='4'>Hjelpesentralansatte</option>";
} else {
echo"<option value='4'>Hjelpesentralansatte</option>";
}

echo"
</select>
<br/><br/><b>Slette ansatt?</b><br/><input type='checkbox' name='delete' value='yes'><br/><br/><input type='submit' name='jobs' id='button' ></form>";





} else {
echo"<meta http-equiv='refresh' content='0; url=adminpanel?action=jobs&update=true'>";
}




} else {
echo"<b>Velg en ansatt.</b>";
$result = mysql_query("SELECT * FROM `employes` ORDER BY id DESC");
while($row = mysql_fetch_array($result))
  {
  echo"<br/><br/><a href='adminpanel?action=jobs&update=true&id=".$row['id']."'>".$row['id'].". ".$row['username']."</a>";
  }
}
} else {

if($_POST['jobs']){
$fetch = mysql_query("SELECT * FROM `employes` ORDER BY id DESC LIMIT 1");
$id = mysql_fetch_array($fetch);
$id['id']++;

	if(!empty($_POST['worker_name']) && !empty($_POST['job_name'])){
		$add = mysql_query("INSERT INTO `employes` (id, username, rank, description, cat) VALUES ('".$id['id']."','".striphtml($_POST['worker_name'])."' , '".striphtml($_POST['job_name'])."' , '".nl2br(striphtml($_POST['desc']))."','".striphtml($_POST['cat'])."')") or die(mysql_error());

	echo "Den nye ansatte ble lagt til!<br/><br/>";
	}

}
  echo"<b><a href='adminpanel?action=jobs&update=true'>Oppdater eksisterende ansatte</a></b><br/><br/>";
echo "
<form action='' method='post'>
<b>Navn p&#229; den ansatte:</b><br/>
<input type='text' id='textinput' name='worker_name'><br><br/>
<b>Stilling:</b><br><input type='text' id='textinput' name='job_name'><br><br/>
<b>Portofolio:</b><br> <textarea id='textinput' style='width: 400px; height: 300px;' name='desc'>
</textarea><br><br/>
<b>Kategori:</b><br/><select name='cat' id='textinput'>
<option value='1'>Ledelsen</option>
<option value='2'>Driftsledere</option>
<option value='3'>Ansatte</option>
<option value='4'>Hjelpesentralansatte</option>
</select>
<br/><br/>
<input type='submit' name='jobs' id='button' ></form>";
}
}
break;





case "news";
if($user['rights'] == "newsman" || $user['rights'] == "admin" || $user['rights'] == "global" || $user['rights'] == "forumglobal") {
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

$result = mysql_query("SELECT * FROM news WHERE id='".$_GET['id']."' ");
$newsy = mysql_fetch_array($result);

mysql_query("DELETE FROM news WHERE id='".$_GET['id']."'");

  echo"Nyheten er slettet!<meta http-equiv='refresh' content='1; url=adminpanel.php?action=news&update=true'>";

$sql="INSERT INTO securitylog3 (news_moding) VALUES
('user: ".$user['name'].", ip: ".$_SERVER['REMOTE_ADDR'].", date: ".strftime("%d.%m.%Y-%H:%M").", deleted the newsarticle: ".$newsy['name']."')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

} else {

$result = mysql_query("SELECT * FROM news WHERE id='".$_GET['id']."' ");
$newsy = mysql_fetch_array($result);


mysql_query("UPDATE news SET name = '".$_POST['name']."' WHERE id='".$_GET['id']."' ");


mysql_query("UPDATE news SET content = '".nl2br($_POST['content'])."' WHERE id='".$_GET['id']."' ");

  $time =  time()+(+9*3600);


mysql_query("UPDATE news SET contest_active = '".striphtml($_POST['contest_active'])."' WHERE id='".$_GET['id']."' ");



$sql="INSERT INTO securitylog3 (news_moding) VALUES
('user: ".$user['name'].", ip: ".$_SERVER['REMOTE_ADDR'].", date: ".strftime("%d.%m.%Y-%H:%M").", edited the newsarticle: ".$newsy['name']."')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

echo"Nyheten er Oppdatert! <br/>link: <a href='news.php?id=".$_GET['id']."'>news.php?id=".$_GET['id']."</a><br/><br/>";
}
}



$result = mysql_query("SELECT * FROM news WHERE id='".$_GET['id']."' LIMIT 1");
$row = mysql_fetch_array($result);



echo"

<form method='post' name='update_news'>
<b>Navn:</b><br/><input type='text' id='textinput' name='name' style=' width: 200px; ' value='".$row['name']."' ><br/><br/>
";
echo"<b>Kategori:</b><br/><select DISABLED name='category'>";

echo"<option value='".$row['category']."'>".$row['category']."</option>";

echo"</select><br/><br/>
<b>Innhold:</b><br/><textarea id='textinput' name='content' style=' width: 400px; height: 400px; '>"; echo solvebr($row['content']); echo"</textarea>


<br/>";
echo showcodes("content", "update_news");
echo"<br/><br/><b>Slett nyheten?</b><br/><input type='checkbox' value='yes' name='delete_message'>
<br/><br/><b>Skal man kunne sende inn svar?</b><br/><input type='checkbox' value='1' "; if($row['contest_active'] > 0) {echo"CHECKED";} echo" name='contest_active'><br/><hr/>
    <input type='submit' id='button' value='Send'>


";


$result = mysql_query("SELECT * FROM contests WHERE article_id='".striphtml($_GET['id'])."' AND type='news' ");
if(mysql_num_rows($result) > 0) {
echo"<hr/><b>Innsendte svar:</b><br/>";
while($row = mysql_fetch_array($result))
{



 echo"<div id='tagcontainer'>
<div id='tagtop'><div id='text'><br/>";

 echo"<b>- <a href='profile?user=".$row['username']."'>".$row['username']."</a></b>";

  echo"</div></div>
  <div id='tagmid'><div id='text'><br/><br/>";

echo nl2br(strcodes($row['content']));


  echo"<br/><br/>";
  echo"Postet: <b>".$row['date']."</b>";

  echo"</div></div>
   <div id='tagbot'>";
   echo"</div></div>

 ";





}


}

  }

} else {


  if(isset($_POST['content']) && $_POST['content'] != "" && $_POST['name'] != "") {

$x=$settings['latestnewsid'];
$vari = $x+1;

$time =  time()+(+9*3600);

$sql="INSERT INTO news (id, name, content, date, composer, contest_active, category) VALUES
('".$vari."','".$_POST['name']."','".nl2br($_POST['content'])."','".strftime("%d.%m.%Y - %H:%M")."','".$user['name']."','".striphtml($_POST['contest_active'])."','".striphtml($_POST['category'])."')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }



mysql_query("UPDATE latestids SET latestnewsid='".$vari."'");

 $x5=$settings['latestpostid'];
 $vari5 = $x5+1;


mysql_query("UPDATE latestids SET latestpostid='".$vari5."'");



if($ch == 1) {
$t="En nyhet med navnet <b>".$_POST['name']."</b> ble nettopp publisert!";
} else {
$t="Det ble nettopp publisert en nyhet med navnet <b>".$_POST['name']."</b>!";
}

$sql="INSERT INTO guestbook (id, name, message, date) VALUES
('".$vari5."', '".$chbot."','".$t."','".strftime("%d.%m.%Y - %H:%M")."')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }



$sql="INSERT INTO securitylog3 (news_moding) VALUES
('user: ".$user['name'].", ip: ".$_SERVER['REMOTE_ADDR'].", date: ".strftime("%d.%m.%Y-%H:%M").", created the newsarticle: ".$_POST['name']."')";
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
";
echo"<b>Kategori:</b><br/><select name='category'>";

$result = mysql_query("SELECT * FROM newscategories");
while($row = mysql_fetch_array($result))
{
echo"<option value='".$row['name']."'>".$row['name']."</option>";
}
echo"</select><br/><br/><b>Innhold:</b><br/><textarea id='textinput' name='content' style=' width: 400px; height: 400px; '></textarea>


<br/>";
echo showcodes("content", "news");
echo"<br/><br/><b>Skal man kunne sende inn svar?</b><br/><input type='checkbox' value='1' name='contest_active'><br/><hr/>
    <input type='submit' id='button' value='Send'>


";

}
}
unset($news);
break;


case "articles";
if($user['rights'] == "articleman" || $user['rights'] == "admin" || $user['rights'] == "global" || $user['rights'] == "forumglobal" || $user['rights'] == "articleman&valuer") {
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

  echo"<br/><br/><a href='?action=articles&update=true&id=".$i."'>".$i.". ".$row['name']."</a>";

  }

  $i--;

  }

  } else {

  if(isset($_POST['content']) && $_POST['content'] != "" && $_POST['name'] != "") {


if($_POST['delete_message'] == "yes") {

$result = mysql_query("SELECT * FROM articles WHERE id='".$_GET['id']."' ");
$newsy = mysql_fetch_array($result);

mysql_query("DELETE FROM articles WHERE id='".$_GET['id']."'");

  echo"Anmeldelsen er slettet!<meta http-equiv='refresh' content='1; url=adminpanel.php?action=articles&update=true'>";



$sql="INSERT INTO securitylog3 (news_moding) VALUES
('user: ".$user['name'].", ip: ".$_SERVER['REMOTE_ADDR'].", date: ".strftime("%d.%m.%Y-%H:%M").", deleted the reviewarticle: ".$newsy['name']."')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }


} else {
$result = mysql_query("SELECT * FROM articles WHERE id='".$_GET['id']."' ");
$newsy = mysql_fetch_array($result);

mysql_query("UPDATE articles SET name = '".$_POST['name']."' WHERE id='".$_GET['id']."' ");


mysql_query("UPDATE articles SET content = '".nl2br($_POST['content'])."' WHERE id='".$_GET['id']."' ");

  $time =  time()+(+9*3600);


mysql_query("UPDATE articles SET name = '".$_POST['name']."' WHERE id='".$_GET['id']."' ");



$sql="INSERT INTO securitylog3 (news_moding) VALUES
('user: ".$user['name'].", ip: ".$_SERVER['REMOTE_ADDR'].", date: ".strftime("%d.%m.%Y-%H:%M").", edited the reviewarticle: ".$newsy['name']."')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

echo"Anmeldelsen er Oppdatert! <br/>link: <a href='articles?id=".$_GET['id']."'>articles?id=".$_GET['id']."</a><br/><br/>";



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
if($ch == 1) {
$t="Det har nettopp blitt opprettet en anmeldelse med navnet <b>".$_POST['name']."</b>!";
} else {
$t="En anmeldelse med navnet <b>".$_POST['name']."</b> ble nettopp opprettet!";
}
$sql="INSERT INTO guestbook (id, name, message, date) VALUES
('".$vari5."', '".$chbot."','".$t."','".strftime("%d.%m.%Y - %H:%M")."')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

$sql="INSERT INTO securitylog3 (news_moding) VALUES
('user: ".$username.", ip: ".$_SERVER['REMOTE_ADDR'].", date: ".strftime("%d.%m.%Y-%H:%M").", created the reviewarticle: ".$_POST['name']."')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }


mysql_query("UPDATE latestids SET latestarticleid = '".$vari."'");


  echo"Anmeldelsen er Opprettet! <br/>link: <a href='articles?id=".$vari."'>articles?id=".$vari."</a><br/><br/>";
}
echo"
<b><a href='adminpanel.php?action=articles&update=true'>Oppdater eksisterende Anmeldelser</a></b><br/><br/>
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

case"commands";

include"admin_inc/commands.php";

break;


}

}
pagebot($settings['footer']);


} else {

echo"<meta http-equiv='refresh' content='0; url=index.php'>";

}


?>
