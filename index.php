<?php

include"main.php";

database_con();
/*
if($_GET['action'] == "h") {
die("&#198;sj, du fant den! Her er koden til modul 3: <b>module.swap(sad)</b>");
}
*/
/*
if($settings['maintenance'] == "yes" && $user['level'] != "4") {
die("<meta http-equiv='refresh' content='0; url=maintenance.php'>"); }

*/
$result = mysql_query("SELECT * FROM pages WHERE id='1'");
while($row = mysql_fetch_array($result))
  {
$content = stripslashes($row['content']);
  }


        $motto = explode('    <ul class="tag-list">
', file_get_contents("http://habbo.no/community/"));
        $motto = explode('    </ul>
', $motto[1]);
        $motto = trim($motto[0]);
        $bad_entities = array("<li>", "</li>", 'class="tag"');
$safe_entities = array("", "", 'class="tag" target="_blank"');
        $motto = str_replace($bad_entities, $safe_entities, $motto);
        $habbos_like = $motto;

pagetop("".$settings['site_name']." forside");
include"includes/subheader.php";
pagemid();

echo strcodes($content);

pagebreak();
?>

<p id="rssOutput">
<img src='images/progress_bubbles.gif'></p>

<?php

pagebreak();
if($motto){
echo"<b>Habboer liker...</b><br/>";
echo $habbos_like;
} else {
echo"<b>Tags&#248;ket mislyktes</b>";
}
pagebot($settings['footer']);

?>
