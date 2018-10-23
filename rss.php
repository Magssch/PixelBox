<?php 
include"main.php";
header("Content-type: text/xml; Charset: ISO-8859-1;");
echo'<?xml version="1.0" encoding="ISO-8859-1"?>
<rss version="2.0">
<channel>

<title>HabboFix RSS feed</title>
<description>Her kan du lese siste nytt fra HabboFix!</description>
<link>http://wuax.net</link>';

$to=mysql_query("SELECT * FROM news ORDER BY id DESC LIMIT 15");
while($row=mysql_fetch_array($to))
{
echo"
<item>
<title>".$row['name']."</title>
<description>".maxlength(htmlspecialchars(strip_tags($row['content'])),140)."</description>
<link>http://www.habbofix.no/news?id=".$row['id']."</link>
</item>
";
}
echo'
</channel>
</rss>
';
?>