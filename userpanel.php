<?php
define("USERPANEL", TRUE);
include"main.php";

database_con();

if($settings['maintenance'] == "yes" && $user['level'] != "4") {
die("<meta http-equiv='refresh' content='0; url=maintenance.php'>"); }

if(isset($user['name']) && ($user['password'])) {
pagetop("".$settings['site_name']." brukerinnstillinger");
include"includes/subheader.php";
pagemid();
if(isset($_GET['setbadge'])) {
if($_GET['setbadge'] == "VIP" && $user['level'] == "3") {
mysql_query("UPDATE usersystem SET favourite_badge = '".striphtml($_GET['setbadge'])."' WHERE username='".$user['name']."'");
echo"Du har satt et nytt favorittskilt!";
} elseif($_GET['setbadge'] == "VPP" && $user['level'] == "3" && in_array("gold_vip", explode(",", $user['items']))) {
mysql_query("UPDATE usersystem SET favourite_badge = '".striphtml($_GET['setbadge'])."' WHERE username='".$user['name']."'");
echo"Du har satt et nytt favorittskilt!";
} elseif($_GET['setbadge'] == "ADM" && $user['level'] >= "4") {
mysql_query("UPDATE usersystem SET favourite_badge = '".striphtml($_GET['setbadge'])."' WHERE username='".$user['name']."'");
echo"Du har satt et nytt favorittskilt!";
} else {
if(in_array($_GET['setbadge'], $user['badgesx'])) {
mysql_query("UPDATE usersystem SET favourite_badge = '".striphtml($_GET['setbadge'])."' WHERE username='".$user['name']."'");
echo"Du har satt et nytt favorittskilt!";
}
}
} else {
if($_GET['action'] == "verify_user" && $user['verified_habbo'] != "yes") {

$bad_entities = array(":", "@");
$safe_entities = array("%3A", "%40");
$cleantext = str_replace($bad_entities, $safe_entities, $user['habbo']);

        $motto = explode('">'.$user['habbo'].'</a>
			</div>
			<p>', file_get_contents("http://www.habbo.no/home/".$cleantext."/"));
        $motto = explode('</p>
		</div>
		<div class="guestbook-cleaner">&nbsp;</div>
', $motto[1]);
        $motto = trim($motto[0]);
        $motto = str_replace('', '', $motto);
	$output = removespace(strtolower($motto));
	
 if($output == "hf-".$user['id']."") {
mysql_query("UPDATE usersystem SET verified_habbo = 'yes' WHERE username='".$user['name']."'");

echo"Ditt habbonavn ble verifisert! Slett hilsenen for sikkerhetsskyld.<meta http-equiv='refresh' content='2; url=userpanel'><br/><br/>";
 } else {
echo"Fant ikke hilsen, hvis du har siden din skjult virker ikke dette.<br/>Sjekk at du har stavet habbonavnet riktig med <b>store og sm&#229; bokstaver</b>.<br/>
Du b&#248;r ogs&#229; v&#230;re sikker p&#229; at hilsenen er <b>&#248;verst i gjesteboken</b>.
<br/><br/>";
 }  


}

if(isset($_POST['update'])) {


if(isset($_POST['password'])) {

if(sumohash(md5($_POST['password'])) == $user['password']) {


if(isset($_POST['newpassword'])) {

if(sumohash(md5($_POST['newpassword'])) == $user['password']) {

echo" ";

} else {


if($_POST['newpassword'] == "") {

echo" ";

} else {

mysql_query("UPDATE usersystem SET password = '".sumohash(md5($_POST['newpassword']))."' WHERE username='".$user['name']."'");
if(!isset($_SESSION['swaped_password'])) {
mysql_query("UPDATE usersystem SET points = '".($user['points']+0)."' WHERE username = '".$user['name']."'");
$_SESSION['swaped_password'] = "yes";
}

if($user['swaped_password'] < 1) {
mysql_query("UPDATE usersystem SET points = '".($user['points']+15)."' WHERE username = '".$user['name']."'");
}
}
}
}

if(isset($_POST['email'])) {

if($_POST['email'] == "") {

echo" ";

} else {

$email = striphtml($_POST['email']);

mysql_query("UPDATE usersystem SET email = '".$email."' WHERE username='".$user['name']."'");

}
}

if(isset($_POST['habboname'])) {

if($_POST['habboname'] == $user['habbo']) {

echo" ";

} else {

$habboname = striphtml($_POST['habboname']);

mysql_query("UPDATE usersystem SET habboname = '".$habboname."' WHERE username='".$user['name']."'");

mysql_query("UPDATE usersystem SET verified_habbo = 'no' WHERE username='".$user['name']."'");

}
}

if(isset($_POST['embed'])) {

if($_POST['embed'] == $user['embed']) {

echo" ";

} else {

$embed = $_POST['embed'];

mysql_query("UPDATE usersystem SET embed = '".stripurl($embed)."' WHERE username='".$user['name']."'");

}
}


if(isset($_POST['freetext'])) {

if($_POST['freetext'] == "") {

echo" ";

} else {
if($user['verified_habbo'] == "yes") {
$freetext = striphtml($_POST['freetext']);

mysql_query("UPDATE usersystem SET freetext = '".nl2br($freetext)."' WHERE username='".$user['name']."'");
}
}
}

mysql_query("UPDATE usersystem SET smileys = '".striphtml($_POST['smileys'])."' WHERE username='".$user['name']."'");

// mysql_query("UPDATE usersystem SET snow = '".striphtml($_POST['snow'])."' WHERE username='".$user['name']."'");


if(isset($_POST['head'])) {




if($_POST['head'] == "agr") {
if(in_array("avatar_pack_two", explode(",", $user['items']))) {  
mysql_query("UPDATE usersystem SET head = '".$_POST['head']."' WHERE username='".$user['name']."'");
}
}
elseif($_POST['head'] == "sad") {
if(in_array("avatar_pack_one", explode(",", $user['items']))) {  
mysql_query("UPDATE usersystem SET head = '".$_POST['head']."' WHERE username='".$user['name']."'");
}
}
elseif($_POST['head'] == "eyb") {
if(in_array("avatar_pack_three", explode(",", $user['items']))) {  
mysql_query("UPDATE usersystem SET head = '".$_POST['head']."' WHERE username='".$user['name']."'");
}
}
elseif($_POST['head'] == "srp" || $_POST['head'] == "spk") {
if($user['level'] >= "3") { 
mysql_query("UPDATE usersystem SET head = '".$_POST['head']."' WHERE username='".$user['name']."'");
}
} 
elseif($_POST['head'] == "std" || $_POST['head'] == "sml") {
mysql_query("UPDATE usersystem SET head = '".$_POST['head']."' WHERE username='".$user['name']."'");
} else {

}
}

if(isset($_POST['body']) && $_POST['body'] != "lay" && $_POST['body'] != "lie") {

mysql_query("UPDATE usersystem SET body = '".striphtml($_POST['body'])."' WHERE username='".$user['name']."'");

}

if((isset($_POST['background'])) && ($_POST['background'] == "bg_bars" || $_POST['background'] == "bg_wooden")) {

if($user['level'] >= 3) {
mysql_query("UPDATE usersystem SET background = '".striphtml($_POST['background'])."' WHERE username='".$user['name']."'");
}
} else {
if(in_array($_POST['background'], $user['itemsx'])) {
mysql_query("UPDATE usersystem SET background = '".striphtml($_POST['background'])."' WHERE username='".$user['name']."'");
}
}


}
if(isset($_POST['avatar_bg'])) {
if($_POST['avatar_bg'] == "avatar_bg_rock_concert" && $user['level'] >= 3) {
mysql_query("UPDATE usersystem SET avatar_bg = '".striphtml($_POST['avatar_bg'])."' WHERE username='".$user['name']."'");
} else {
if(in_array($_POST['avatar_bg'], $user['itemsx'])) {
mysql_query("UPDATE usersystem SET avatar_bg = '".striphtml($_POST['avatar_bg'])."' WHERE username='".$user['name']."'");
}}

}

if(isset($_POST['delete_guestbook'])) {

mysql_query("DELETE FROM comments WHERE page_id = '".$user['id']."' AND type = 'profile'");

}


if(isset($_POST['newpassword'])) {

if($_POST['newpassword'] == "") {

echo"Innstillinger er oppdatert!<meta http-equiv='refresh' content='1; url=userpanel.php'><br/><br/>";

} else {


echo"Innstillinger er oppdatert! Du blir n&#229; logget ut.<meta http-equiv='refresh' content='1; url=logout.php'><br/><br/>";
}
} else {
echo"Innstillinger er oppdatert!<meta http-equiv='refresh' content='2; url=userpanel.php'><br/><br/>";
}
echo"";

} else {

echo"Feil passord!<br/><br/>";

}
}

if($user['verified_habbo'] != "yes") {
echo"<b>Viktig melding! Les alt som st&#229;r!</b><br/><div style='text-align: left;'>For at vi skal vite at det Habbonavnet du bruker virkelig er ditt, m&#229; du verifisere habboen din.
For &#229; gj&#248;re dette, skriver du en hilsen i <b>din egen gjestebok p&#229; Habbo</b>. Hilsenen m&#229; <u>kun</u> inneholde dette: <b>HF-".$user['id']."</b>.
Deretter klikker du p&#229; linken under for &#229; verifisere. N&#229;r du har verifisert brukeren din, Vil du f&#229; tilgang til resten av siden.</div><br/><b><a href='?action=verify_user'>Trykk her for &#229; verifisere Habboen din! &#187;</a></b><br/><br/><b><a href='help'>Problemer med &#229; verifisere? &#187;</a></b><br/><hr/>";
}

echo"<form name='update_form' action='userpanel.php' method='post'>
<input type='hidden' name='update' value='yes'>
 <span style=' color: red; '>*</span><b>Passord: </b><br/><input type='password' id='textinput' name='password' maxlength='70'><br/><br/>
<b>Nytt passord: </b><br/><input type='password' id='textinput' name='newpassword' maxlength='70'><br/>IKKE bruk ditt Habbopassord.<br/>Passordet kan inneholde max 15 tegn.<br/><br/>
<span style=' color: red; '>*</span><b>Epost:</b> <br/><input type='text' id='textinput' name='email' value='".$user['email']."' maxlength='70'>
<br/><br/>

 
<b>Habbonavn:</b> <br/><input type='text' id='textinput' name='habboname' maxlength='25' value='".$user['habbo']."'><br/><br/>
<b>URL til profilmusikk:</b> <br/><input type='text' id='textinput' name='embed' maxlength='80' value='".urldecode($user['embed'])."'><br/><br/>
"; 
if($user['verified_habbo'] == "yes") {
echo"
<b>Fritekst:</b><br/>

<textarea id='textinput' name='freetext' style=' height: 150px; width: 400px;   font-family: Verdana;
  font-size: 10px;
  font-weight: normal;
  color: #000000;'>"; echo solvebr($user['text']); echo"</textarea><br/>
  ";
  echo showcodes("freetext", "update_form");
  echo"<br/>
<br/>";
}

  echo"
        <b>Vise smileys og bb-koder?</b><br/> 

      Ja<input "; 
      if($user['smileys'] == "on") {
      
      echo" CHECKED";
      
      } else {
      
      echo" ";
      }
      echo" type='radio' name='smileys' value='on'>
       Nei<input
       ";
      if($user['smileys'] == "off") {
      
      echo" CHECKED";
      
      } else {
      
      echo" ";
      }
      echo" type='radio' name='smileys' value='off'><br/>Merk: hvis du sl&#229;r av dette vil alle <br/> smileys og bb-koder bli vist som tekst
    <br/><br/>"; 
    /*
      echo"
  
        <b>Vil du ha sn&#248; p&#229; siden?</b><br/> 

      Ja<input "; 
      if($user['snow'] == "on") {
      
      echo" CHECKED";
      
      } else {
      
      echo" ";
      }
      echo" type='radio' name='snow' value='on'>
       Nei<input
       ";
      if($user['snow'] == "off") {
      
      echo" CHECKED";
      
      } else {
      
      echo" ";
      }
      echo" type='radio' name='snow' value='off'>
    <br/><br/>"; 
    */
    if(in_array("guestbook", explode(",", $user['items']))) {
    echo"<b>T&#248;m Gjesteboken?</b><br/> <input type='checkbox' name='delete_guestbook' value='yes'><br/>Merk: hvis du krysser av for dette<br/> vil alle innleggene i gjesteboken din bli slettet.<br/><br/>";
    }
    echo"
Felter merket med <span style=' color: red; '>*</span> m&#229; v&#230;re utfylt.<br/>For &#229; endre noe, m&#229; du skrive inn ditt passord.
<br/><br/><hr/>

<table width='110' height='50' border='0' align='center' cellpadding='6'>

<td><div align='center'><span style='   width: 911px;
  margin: auto;
  font-family: Verdana;
  font-size: 10px;
  font-weight: normal;
  color: #000000; '><b>Ansikt:</b></span><br />
        <select name='head' id='textinput'>
        
      <option ";      
        if($user['head'] == 'std') {
        echo"SELECTED";
        }
      echo" value='std'>Normal</option>
        
              <option ";      
        if($user['head'] == 'sml') {
        echo"SELECTED";
        }
      echo" value='sml'>Smile</option>";
      
        
        
        
      if(in_array("avatar_pack_one", explode(",", $user['items']))) {  
                  echo"  <option ";      
        if($user['head'] == 'sad') {
        echo"SELECTED"; 
        }
      echo" value='sad'>Trist</option>";


        }
        
        
        
      if(in_array("avatar_pack_two", explode(",", $user['items']))) {          
                     echo"<option ";      
        if($user['head'] == 'agr') {
        echo"SELECTED"; 
         }
      echo" value='agr'>Sint</option>";

 }
 
       if(in_array("avatar_pack_three", explode(",", $user['items']))) {          
                     echo"<option ";      
        if($user['head'] == 'eyb') {
        echo"SELECTED"; 
         }
      echo" value='eyb'>Lukkede &#248;yne</option>";

 }
 
      
      if($user['level'] >= "3") { 
      
                  echo" <option ";      
        if($user['head'] == 'spk') {
        echo"SELECTED";
        }
      echo" value='spk'>Snakk</option>
      
      ";
      
      echo"
              <option ";      
        if($user['head'] == 'srp') {
        echo"SELECTED";
        }
      echo" value='srp'>Forbauset</option>  
      "; 
      }
       echo"
        </select>
  </div></td>
  
<td><div align='center'><span style=' width: 911px;
  margin: auto;
  font-family: Verdana;
  font-size: 10px;
  font-weight: normal;
  color: #000000; '><b>Handling:</b></span><br />
        <select name='body' id='textinput'>
              <option ";      
        if($user['body'] == 'std') {
        echo"SELECTED";
        }
      echo" value='std'>Normal</option>
        
              <option ";      
        if($user['body'] == 'wlk') {
        echo"SELECTED";
        }
        
      echo" value='wlk'>G&#229;</option>
              <option ";      
        if($user['body'] == 'sit') {
        echo"SELECTED";
        }
      echo" value='sit'>Sitt</option>
              <option ";      
        if($user['body'] == 'wav') {
        echo"SELECTED";
        }
      echo" value='wav'>Vink</option>
              <option ";      
        if($user['body'] == 'crr=1') {
        echo"SELECTED";
        }
      echo" value='crr=1'>Brus</option>";
                         echo" <option ";      
        if($user['body'] == 'crr=3') {
        echo"SELECTED";
        }
      echo" value='crr=3'>Iskrem</option>";

      
      
      
      if(in_array("avatar_pack_one", explode(",", $user['items']))) {     

                         echo" <option ";      
        if($user['body'] == 'crr=42') {
        echo"SELECTED";
        }
      echo" value='crr=42'>Japansk te</option>";
                echo" <option ";      
        if($user['body'] == 'crr=44') {
        echo"SELECTED";
        }
      echo" value='crr=44'>Gr&#248;nn brus</option>"; 
                echo" <option ";      
        if($user['body'] == 'crr=43') {
        echo"SELECTED";
        }
        echo" value='crr=43'>R&#248;d brus</option>"; 
        }
        
      if(in_array("avatar_pack_two", explode(",", $user['items']))) {  

       echo"
                    <option ";      
        if($user['body'] == 'crr=2') {
        echo"SELECTED";
        }
      echo" value='crr=2'>Gulrot</option>    ";

      
            echo" <option ";      
        if($user['body'] == 'crr=5') {
        echo"SELECTED";
        }
      echo" value='crr=5'>HabboCola</option>";
           
                               echo"<option ";      
        if($user['body'] == 'crr=6') {
        echo"SELECTED";
        }
      echo" value='crr=6'>Kaffe</option>   ";          
      }
      
            if(in_array("avatar_pack_three", explode(",", $user['items']))) {  

       echo"<option ";      
        if($user['body'] == 'crr,wav') {
        echo"SELECTED";
        }
      echo" value='crr,wav'>Pogo-mogo</option>    ";
     
          echo"<option ";      
        if($user['body'] == 'hoverboard') {
        echo"SELECTED";
        }
      echo" value='hoverboard'>Hoverboard</option>";  
      
      }
      
      
      if($user['level'] >= "3") {       
             echo"<option ";      
        if($user['body'] == 'crr=33') {
        echo"SELECTED";
        }
      echo" value='crr=33'>Calippo</option>    ";
                
                 echo"   <option ";      
        if($user['body'] == 'crr') {
        echo"SELECTED";
        }
      echo" value='crr'>???</option>";
      
                        echo" <option ";      
        if($user['body'] == 'crr=9') {
        echo"SELECTED";
        }
      echo" value='crr=9'>Kj&#230;rlighets drikk</option>";
                        
      echo"<option ";      
        if($user['body'] == 'crr=667') {
        echo"SELECTED";
        }
      echo" value='crr=667'>Gammel HabboCola</option>";

      }
       echo"
        </select>
  </div></td>  </table><div align='center'><span style=' width: 911px;
  margin: auto;
  font-family: Verdana;
  font-size: 10px;
  font-weight: normal;
  color: #000000; '><b>Avatar bakgrunn:</b></span><br />
        <select name='avatar_bg' id='textinput'>";
         echo"<option ";      
        if($user['avatar_bg'] == 'blank') {
        echo"SELECTED";
        }
      echo" value='blank'>Blank</option>";
      
        if($user['rights'] == "admin" || in_array("avatar_bg_green", explode(",", $user['items']))) {
      echo"<option ";      
        if($user['avatar_bg'] == 'avatar_bg_green') {
        echo"SELECTED";
        }
          echo" value='avatar_bg_green'>Gr&#248;nn</option>";
          }
                 
        if($user['rights'] == "admin" || in_array("avatar_bg_red", explode(",", $user['items']))) {
      echo"<option ";      
        if($user['avatar_bg'] == 'avatar_bg_red') {
        echo"SELECTED";
        }
        
          echo" value='avatar_bg_red'>R&#248;d</option>";
          }
                  
        if($user['rights'] == "admin" || in_array("avatar_bg_blue", explode(",", $user['items']))) {
      echo"<option ";      
        if($user['avatar_bg'] == 'avatar_bg_blue') {
        echo"SELECTED";
        }
        
          echo" value='avatar_bg_blue'>Bl&#229;</option>";
          }
          
                  if($user['level'] >= "3") {
      echo"<option ";      
        if($user['avatar_bg'] == 'avatar_bg_rock_concert') {
        echo"SELECTED";
        }
        
          echo" value='avatar_bg_rock_concert'>Rockekonsert</option>";
          }
   echo"        </select>
  </div>
  
<br/>Her kan du velge hvordan avataren din skal se ut.
  
  <hr/>";
  echo"<br/><b>Bakgrunn:</b></span><br />
        <select name='background' id='textinput'>
        ";
        echo"<option ";      
        if($user['background'] == 'standard') {
        echo"SELECTED";
        }
      echo" value='standard'>Standard</option>";

      if(in_array("xmas_bgpattern_gifts", explode(",", $user['items']))) {
      echo"<option ";      
        if($user['background'] == 'xmas_bgpattern_gifts') {
        echo"SELECTED";
        }
      echo" value='xmas_bgpattern_gifts'>Pakker</option>";
}
      if(in_array("xmas_bgpattern_starsky", explode(",", $user['items']))) {
      echo"<option ";      
        if($user['background'] == 'xmas_bgpattern_starsky') {
        echo"SELECTED";
        }
              echo" value='xmas_bgpattern_starsky'>Julenatt</option>";
}

      if($user['level'] >= 3) {
      echo"<option ";      
        if($user['background'] == 'bg_bars') {
        echo"SELECTED";
        }
              echo" value='bg_bars'>Gullbarrer</option>";
}

      if($user['level'] >= 3) {
      echo"<option ";      
        if($user['background'] == 'bg_wooden') {
        echo"SELECTED";
        }
              echo" value='bg_wooden'>Tregulv</option>";
}

$q=mysql_query("SELECT * FROM backgrounds ORDER BY id");
while($row = mysql_fetch_array($q))
{

      if(in_array($row['code'], explode(",", $user['items']))) {
      echo"<option ";      
        if($user['background'] == $row['code']) {
        echo"SELECTED";
        }
              echo" value='".$row['code']."'>".$row['name']."</option>";
}

}

       echo"
        </select>
<br/><br/>Her kan du velge hvordan bakgrunnen p&#229; profilen din skal se ut.<hr/>";
  echo"

Tjen poeng ved &#229; invitere venner til ".$settings['site_name']."!<br/><br/>
<b>Invitasjonslenke</b><br/>


<input type='text' id='textinput' READONLY onFocus=' this.select(); ' 
value='".$settings['site_url']."/register?source=invitation&refferId=".$user['id']."' style=' width: 400px '>
";

echo"<br/><br/>
";

echo"<hr /><input type='submit' id='button' value='Oppdater bruker'><br/><br/><hr/><b>Velg favorittskilt:</b><br/>";
if($user['level'] == "4") {
echo"<a href='userpanel?setbadge=ADM'><img src='uploads/gfx/ADM.gif' border='0' style='vertical-align: middle; margin: 3px;' onMouseover=\"ddrivetip('For &#229; v&#230;re ansatt p&#229; ".$settings['site_name'].".','white')\";
onMouseout=\"hideddrivetip()\" border='0' /></a>";
} 
elseif($user['level'] == "3") {

if(in_array("gold_vip", explode(",", $user['items']))) {
echo"<a href='userpanel?setbadge=VPP'><img src='uploads/gfx/VPP.gif' border='0' style='vertical-align: middle; margin: 3px;'  onMouseover=\"ddrivetip('For &#229; v&#230;re Gull-VIP p&#229; ".$settings['site_name'].".','white')\";
onMouseout=\"hideddrivetip()\" border='0' /></a>";
} else {
echo"<a href='userpanel?setbadge=VIP'><img src='uploads/gfx/VIP.gif' border='0' style='vertical-align: middle; margin: 3px;'  onMouseover=\"ddrivetip('For &#229; v&#230;re VIP p&#229; ".$settings['site_name'].".','white')\";
onMouseout=\"hideddrivetip()\" border='0' /></a>";
}
} else {
echo"";
}
echo strfbadges($user['badges']);
}




pagebot($settings['footer']);

} else {

die("<meta http-equiv='refresh' content='0; url=index.php'>");

}



?>