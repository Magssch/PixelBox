<?php

include"main.php";

database_con();

if($settings['maintenance'] == "yes" && $user['level'] != "4") {
die("<meta http-equiv='refresh' content='0; url=maintenance.php'>"); }

pagetop($settings['site_name']." m&#248;belverdier");
include"includes/subheader.php";
pagemid();

if(isset($_GET['categoryId'])) {

echo "<b>Vis verdiene i:</b><br/><select name=\"status\" id=\"textinput\" onchange=\"window.location.href=this.value\">";

echo"<option"; if($_GET['value'] == "hc") { echo" SELECTED"; } echo" value=\"?categoryId=".striphtml($_GET['categoryId'])."&value=hc\">HC verdi</option>";
echo"<option"; if($_GET['value'] == "credits") { echo" SELECTED"; } echo"  value=\"?categoryId=".striphtml($_GET['categoryId'])."&value=credits\">Mynter</option>";
echo"</select><br/><br/><table border='0' width='100%'>
<tr style='

font-family: Verdana; 
font-size: 11px; 
font-weight: normal; 
color: #000000;
border: 1px solid #999;

' height='10'>
<th style='border: 1px solid #999;'>Bilde</th>
<th style='border: 1px solid #999;'>Navn</th>
<th style='border: 1px solid #999;'>Verdi</th>
<th style='border: 1px solid #999;'>Status</th>
<th style='border: 1px solid #999;'>Sist oppdatert</th>
</tr>
";


$result = mysql_query("SELECT * FROM furnicategories WHERE id = '".mysql_real_escape_string($_GET['categoryId'])."' LIMIT 1");

if(mysql_num_rows($result) > 0) {
while($row = mysql_fetch_array($result))
  {
$category = $row['categories'];
  }
} else {
$category = 0;
}

$result = mysql_query("SELECT * FROM furnivalues WHERE category='".striphtml($category)."' ORDER BY name");
while($row = mysql_fetch_array($result))
  {

  echo "<tr>
  <td style='

font-family: Verdana; 
font-size: 11px; 
font-weight: normal; 
color: #000000;

' width='20' id='button' align='center'><img src='" . $row['image'] . "' alt=''></td>";


  echo "<td style='

font-family: Verdana; 
font-size: 11px; 
font-weight: normal; 
color: #000000;

' width='100' id='button'><div id='furni-" . $row['name'] . "'>" . $row['name'] . "</div></td>";

if(isset($_GET['value']) && $_GET['value'] == "credits") {
  echo "<td style='

font-family: Verdana; 
font-size: 11px; 
font-weight: normal; 
color: #000000;

' width='53' id='button'>" . round($row['value']*$settings['hc_value']) . " <span style='float:right;'><img src='themes/".THEME."/buttons/money.gif'>&nbsp;</span></td>";
} else {
  echo "<td style='

font-family: Verdana; 
font-size: 11px; 
font-weight: normal; 
color: #000000;

' width='53' id='button'>" . $row['value'] . " <span style='float:right;'><img src='uploads/img/hc.gif'>&nbsp;</span></td>";
}

if($row['status'] == "low") {
  echo "<td style='

font-family: Verdana; 
font-size: 11px; 
font-weight: normal; 
color: #000000;

' width='25' id='button' align='center'><img src='uploads/img/v20_9.gif'></td>";
} elseif($row['status'] == "high") {
  echo "<td style='

font-family: Verdana; 
font-size: 11px; 
font-weight: normal; 
color: #000000;

' width='25' id='button' align='center'><img src='uploads/img/v20_8.gif'></td>";
} else {
  echo "<td style='

font-family: Verdana; 
font-size: 11px; 
font-weight: normal; 
color: #000000;

' width='25' id='button' align='center'><img src='uploads/img/v20_7.gif'></td>";
}

  echo "<td style='

font-family: Verdana; 
font-size: 11px; 
font-weight: normal; 
color: #000000;

' width='80' id='button'>" . str_replace(" ", "&nbsp;", $row['lastupdate']) . "</td>";

  echo "</tr>";
  }
echo "</table>";

} else {
if(isset($_GET['search'])) {


echo "<b>Vis verdiene i:</b><br/><select name=\"status\" id=\"textinput\" onchange=\"window.location.href=this.value\">";

echo"<option"; if($_GET['value'] == "hc") { echo" SELECTED"; } echo" value=\"?search=".striphtml($_GET['search'])."&value=hc\">HC verdi</option>";
echo"<option"; if($_GET['value'] == "credits") { echo" SELECTED"; } echo"  value=\"?search=".striphtml($_GET['search'])."&value=credits\">Mynter</option>";
echo"</select><br/><br/><table border='0' width='100%'>
<tr style='

font-family: Verdana; 
font-size: 11px; 
font-weight: normal; 
color: #000000;
border: 1px solid #999;

' height='10'>
<th style='border: 1px solid #999;'>Bilde</th>
<th style='border: 1px solid #999;'>Navn</th>
<th style='border: 1px solid #999;'>Verdi</th>
<th style='border: 1px solid #999;'>Status</th>
<th style='border: 1px solid #999;'>Sist oppdatert</th>
</tr>
";

$result = mysql_query("SELECT * FROM furnivalues WHERE name LIKE '%".striphtml($_GET['search'])."%' ORDER BY name");
while($row = mysql_fetch_array($result))
  {
  echo "<tr>
  <td style='

font-family: Verdana; 
font-size: 11px; 
font-weight: normal; 
color: #000000;

' width='20' id='button' align='center'><img src='" . $row['image'] . "' alt=''></td>";


  echo "<td style='

font-family: Verdana; 
font-size: 11px; 
font-weight: normal; 
color: #000000;

' width='100' id='button'><div id='furni-" . $row['name'] . "'>" . $row['name'] . "</div></td>";

if(isset($_GET['value']) && $_GET['value'] == "credits") {
  echo "<td style='

font-family: Verdana; 
font-size: 11px; 
font-weight: normal; 
color: #000000;

' width='53' id='button'>" . round($row['value']*$settings['hc_value']) . " <span style='float:right;'><img src='themes/".THEME."/buttons/money.gif'>&nbsp;</span></td>";
} else {
  echo "<td style='

font-family: Verdana; 
font-size: 11px; 
font-weight: normal; 
color: #000000;

' width='53' id='button'>" . $row['value'] . " <span style='float:right;'><img src='uploads/img/hc.gif'>&nbsp;</span></td>";
}
if($row['status'] == "low") {
  echo "<td style='

font-family: Verdana; 
font-size: 11px; 
font-weight: normal; 
color: #000000;

' width='25' id='button' align='center'><img src='uploads/img/v20_9.gif'></td>";
} elseif($row['status'] == "high") {
  echo "<td style='

font-family: Verdana; 
font-size: 11px; 
font-weight: normal; 
color: #000000;

' width='25' id='button' align='center'><img src='uploads/img/v20_8.gif'></td>";
} else {
  echo "<td style='

font-family: Verdana; 
font-size: 11px; 
font-weight: normal; 
color: #000000;

' width='25' id='button' align='center'><img src='uploads/img/v20_7.gif'></td>";
}

  echo "<td style='

font-family: Verdana; 
font-size: 11px; 
font-weight: normal; 
color: #000000;

' width='80' id='button'>" . str_replace(" ", "&nbsp;", $row['lastupdate']) . "</td>";

  echo "</tr>";
  }
echo "</table>";

} else {
echo"<b>S&#248;k i m&#248;belpriser:<br/><form method='get'><input type='text' id='textinput' name='search' style='width:200px;'> <input type='submit' id='button' value='S&#248;k'>
</form><hr width='80%' />
</b><b>Velg en kategori:</b>";
$result = mysql_query("SELECT * FROM furnicategories");
while($row = mysql_fetch_array($result))
  {
  echo"<br/><br/><div align='left'><a href='values?categoryId=".$row['id']."'><img src='".$row['image']."' border='0' alt='".$row['categories']."'></a></a></div>";
  }
}
}

pagebot($settings['footer']); 



?>