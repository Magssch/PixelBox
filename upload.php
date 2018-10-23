<?php

include"main.php";

database_con();

if($user['level'] >= "4" && ($user['rights'] != "mod")) {

pagetop($settings['site_name']." filopplasting");
include"includes/subheader.php";
pagemid();

if(isset($_POST['directory'])) {

if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/png")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/bmp")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "audio/aac")
|| ($_FILES["file"]["type"] == "audio/x-aac")
|| ($_FILES["file"]["type"] == "audio/mpeg")
|| ($_FILES["file"]["type"] == "application/zip")
|| ($_FILES["file"]["type"] == "application/x-zip-compressed")
|| ($_FILES["file"]["type"] == "audio/x-mpeg"))
&& ($_FILES["file"]["size"] < 10000000))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Error: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {
    echo "Filnavn: " . $_FILES["file"]["name"] . "<br />";
    echo "Type: " . $_FILES["file"]["type"] . "<br />";
    echo "St&#248;rrelse: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    if (file_exists("".$_POST['directory']."/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " Fins allerede. <br/><br/>";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"], "".$_POST['directory']."/".$_FILES["file"]["name"]);
      echo "Plassert i: <a href='" . "".$_POST['directory']."/" . $_FILES["file"]["name"]."'>" . "".$_POST['directory']."/" . $_FILES["file"]["name"]."</a><br/><br/>";
      }
    }
  }
else
  {
  echo "Filtypen er ikke tillat eller filen er for stor.<br/><br/>";
  }

}

echo"
<form method='post' enctype='multipart/form-data'>
<b>Filnavn:</b><br/>
<input type='file' name='file' width='150%'>
<br /><br/><b>Mappe den skal lastes plasseres i:</b><br/><b>uploads/img/</b> (Bilder)<input type='radio' CHECKED  name='directory' value='uploads/img'><br/>
 <b>uploads/gfx/</b> (Skilt)<input type='radio' name='directory' value='uploads/gfx'><br/> <b>uploads/fni/</b> (M&#248;bler)<input type='radio' name='directory' value='uploads/fni'><br/> <b>uploads/aud/</b> (Musikk)
 <input type='radio' name='directory' value='uploads/aud'><br/> <b>images/backgrounds/</b> (Bakgrunner)
 <input type='radio' name='directory' value='images/backgrounds'>
<br/><br/>
<input type='submit' value='Last opp' />
</form>
<br/>Du kan kun laste opp bilder.
";



pagebot($settings['footer']);

} else {

echo"<meta http-equiv='refresh' content='0; url=index.php'>";

}

?>