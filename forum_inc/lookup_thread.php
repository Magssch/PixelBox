<?php

if(!defined("MAIN_SET")) { die("Dette er en systemfil som er skjult for brukere"); }

$query = mysql_query("SELECT * FROM threads WHERE id = '".$_GET['id']."'");

if(mysql_num_rows($query) > 0) {

$thread = mysql_fetch_array($query);

pagetop($settings['site_name']." forum - tr&#229;d - ".$thread['subject']."");
include("includes/subheader.php");
pagemidcustom();

$t = mysql_query("SELECT * FROM forum_posts WHERE thread_id = '".$_GET['id']."'");
$a                  = mysql_fetch_object($t);  
$total_items      = mysql_num_rows($t);  
$limit            = $_GET['limit'];  
$type             = $_GET['type'];  
$page             = $_GET['page'];

//set default if: $limit is empty, non numerical, less than 10, greater than 50  
if((!$limit)  || (is_numeric($limit) == false) || ($limit < 10) || ($limit > 50)) {  
     $limit = 10; //default  
}  

//set default if: $page is empty, non numerical, less than zero, greater than total available  
if((!$page) || (is_numeric($page) == false) || ($page < 0) || ($page > $total_items)) {  
      $page = 1; //default  
}  

//calcuate total pages  
$total_pages     = ceil($total_items / $limit);  
$set_limit          = $page * $limit - ($limit);  

mysql_query("UPDATE threads SET views = '".($thread['views']+1)."' WHERE id = '".$thread['id']."'");


$h=explode(",",$user['threads']);


if(!in_array("".$thread['id']."||".$thread['latestpost']."", $h) && ($thread['latestpost']+3*24*3600) >= time()) {

if(isstr($thread['id'].'||', $user['threads'])) {

$y=array_find_r($thread['id'].'||', $h, true);
$h[$y] = "".$thread['id']."||".$thread['latestpost']."";
$te=implode(",", $h);
} else {
$te=implode(",", $h);
$te .= "".$thread['id']."||".$thread['latestpost'].",";
}

mysql_query("UPDATE usersystem SET threads = '".$te."' WHERE id = '".$user['id']."'");

}

echo"<div style='padding-bottom:1px;'><text style='float:left;'>";

if($thread['locked'] > 0) {
echo"<b><text class='nou'><span style='font-size: 11px; float:left; color: #FF0000;'>L&#229;st tr&#229;d</span></text></b>
 <b><text class='nou'><span style='font-size: 11px; margin-left:135px;'><a href='?action=forum&id=".$thread['forum_id']."' style='color: #3D3D3D;'>&#171; Tilbake</a></span></text></b>
<br/><br/>";
} else {
echo"<b><text class='nou'><span style='font-size: 11px; float:left;'><a href='?action=create_post&thread_id=".$thread['id']."&page=".$total_pages."' style='color: #3D3D3D;'><img src='images/newpost.png' border='0' style='vertical-align: middle; padding-right:4px;'>Post svar</a></span></text></b>
 <b><text class='nou'><span style='font-size: 11px; margin-left:135px;'><a href='?action=forum&id=".$thread['forum_id']."' style='color: #3D3D3D;'>&#171; Tilbake</a></span></text></b>
<br/><br/>";
}
echo"</text>";
//echo"<b><text class='nou' style='float:right;'><span style='font-size: 11px; float:right;'><a href='?action=forum&id=".$thread['forum_id']."' style='color: #3D3D3D;'>Tilbake</a></span></text></b>";

if($total_items > 0) {
echo"<text style='float:right;'>Side: ";

$number1=$page-3;
$number2=$page-2;
$number3=$page-1;
$number4=$page;


$prev_page = $page - 1;  

if($prev_page >= 1) {  

     if($number1 == 1 || $number2 == 1 || $number3 == 1 || $number4 == 1) {
   
   } else { echo"<a href='?action=thread&id=".$_GET['id']."&page=1'>1</a> ... "; }
}  

for($a = 1; $a <= $total_pages; $a++)  
{  
$number1=$page-1;
$number2=$page-2;
$number3=$page+1;
$number4=$page+2;
$number5=$page-3;
$number6=$page+3;


if($a == $number1 || $a == $number2 || $a == $number3 || $a == $number4 || $a == $page || $a == $number5 || $a == $number6 ) {
   if($a == $page) {  
      echo("<b>$a</b> "); //no link  
     } else {  
  echo("<a href='?action=thread&id=".$_GET['id']."&page=$a'>$a</a> ");  
     }  }
}  

$number1=$page+3;
$number2=$page+2;
$number3=$page+1;
$number4=$page;

$next_page = $page + 1;  
if($next_page <= $total_pages) {  
   if($number1 == $total_pages || $number2 == $total_pages || $number3 == $total_pages || $number4 == $total_pages) {
   
   } else { echo"... <a href='?action=thread&id=".$_GET['id']."&page=$total_pages'>$total_pages</a>"; }

} 
echo"</text></div><br/><br/>";
}

echo"<table cellpadding='5' cellspacing='0' border='0' style='width:100%;'>";

if($total_items > 0) {

$newest_id = mysql_fetch_array(mysql_query("SELECT id FROM forum_posts WHERE thread_id = '".$thread['id']."' ORDER BY id LIMIT 1"));

$query = mysql_query("SELECT * FROM forum_posts WHERE thread_id = '".$thread['id']."' ORDER BY id LIMIT $set_limit, $limit");
while($post = mysql_fetch_array($query))
{

if(!isset($color)) {
$color = "D9D9D9";
} else {
if($color == "D9D9D9") {
$color = "none";
} else {
$color = "D9D9D9";
}
}


$habbo = mysql_fetch_array(mysql_query("SELECT habboname, head, id, userlevel, title, register_date, favourite_badge FROM usersystem WHERE username = '".$post['author']."'"));

$user_threads = mysql_num_rows(mysql_query("SELECT * FROM forum_posts WHERE author = '".$post['author']."'"));

$bad_entities= array ('(\[b\](.*?)\[/b\])is', '(\[u\](.*?)\[/u\])is', '(\[s\](.*?)\[/s\])is', '(\[i\](.*?)\[/i\])is', 
 '(\[font=small\](.*?)\[/font\])is', '(\[font=big\](.*?)\[/font\])is', '(\[quote=([^]]+)\](.*?)\[/quote\])is', '(\[quote\](.*?)\[/quote\])is', '(\[color=([^]]+)\](.*?)\[/color\])is'
 , '(\[bgcolor=([^]]+)\](.*?)\[/bgcolor\])is');
$safe_entities = array ('<b>\\1</b>', '<u>\\1</u>', '<s>\\1</s>', '<i>\\1</i>', '<span style="font-size: 9px;">\\1</span>', '<span style="font-size: 14px;">\\1</span>'
,'<div id="quote">Siterer: <b><i>\\1</i></b><hr/>\\2</div>', '<div id="quote">\\1</div>', '<span style="color: \\1;">\\2</span>', '<span style="background: \\1; padding-right:1px; padding-left:1px;">\\2</span>'
);

if(defined("FORUM2")) {
$bad_entities[] = '(\[url=([^]]+)\](.*?)\[/url\])is';
$safe_entities[] = '<a href="\\1">\\2</a>';
}

$bad_entities2 = array(":)", ":(", "XO", ":S", ":O", "#king", "#brokenheart", "B)", "#devil", "#disappointed", "8)", "#goodkid", ":D", ":}", "#heart", ":|", ":P", ":o",
"+_+", "#sleepy", "#sad", "#smile", "#speechless", "#overhappy", "#thumbsdown", "#thumbsup", ":{", ";)", "#yawn", "-_-", "#oddface", "#updown", "00_", "#monster", "o.O", "*_*", "^^", "#scary",
"#tophat", "#peace", "d0b", ":L", ";&#39;S");

$safe_entities2 = array(
"<img src='images/smileys/smile.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/sad.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/angry.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/confused.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/huffy.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/winnerface.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/brokenheart.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/cool.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/devil.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/dissapointed.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/funnyface.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/goodkid.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/grin.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/hungry.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/love.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/nosmile.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/pfft.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/shocked.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/sick.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/sleepy.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/smallsad.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/smallsmile.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/speechless.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/sunface.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/thumbsdown.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/thumbsup.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/vomity.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/wink.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/yawn.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/you-didnt-get-it.gif' border='0' style='vertical-align: middle;' />",
 "<img src='images/smileys/oddface.gif' border='0' style='vertical-align: middle;' />",
 
"<img src='images/smileys/updownboy.gif' border='0' style='vertical-align: middle;' />", "<img src='images/smileys/sweet.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/monster.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/oo.gif' border='0' style='vertical-align: middle;' />",

 "<img src='images/smileys/emokid.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/mm.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/scary.gif' border='0' style='vertical-align: middle;' />",

"<img src='images/smileys/tophat.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/peace.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/doubleup.gif' border='0' style='vertical-align: middle;' />",


"<img src='images/smileys/yeh.gif' border='0' style='vertical-align: middle;' />",
"<img src='images/smileys/wetface.gif' border='0' style='vertical-align: middle;' />",

);

if(is_online($post['author'])) {
$status = "images/habbo_online.gif";
} else {
$status = "images/habbo_offline.gif";
}

if(empty($habbo['head'])) {
$habbo['head'] = "sml";
}

if(isset($_GET['page']) && $_GET['page'] != 1) {
$first = "RE: ";
}

echo"<tr><div id='post-".$post['id']."'><td id='td' style=' background-color: #".$color."; width: 30%; text-align: center;'>
<a href='profile?id=".$habbo['id']."'>".$post['author']."</a> <img src='".$status."' style='vertical-align: middle;'><br/>
<img src='http://www.habbo.no/habbo-imaging/avatarimage?user=".$habbo['habboname']."&action=std&direction=2&head_direction=2&gesture=".$habbo['head']."&size=b' alt='".$habbo['habboname']."'>";
if(!empty($habbo['favourite_badge'])) {

$result = mysql_query("SELECT * FROM badges WHERE code = '".$habbo['favourite_badge']."'");
$row = mysql_fetch_array($result);

echo"<img src=\"".$row['image']."\" border=\"0\" style='vertical-align:32px;'>"; 

}
$habbo['register_date'] = explode(" ", $habbo['register_date']);

echo"<div align='left'><b>Poster:</b>&nbsp;".$user_threads."
<br/><b>Registrert:</b>&nbsp;".str_replace(" ", "&nbsp;", $habbo['register_date'] [0])."

<br/><div style='border: 1px solid #474747; height: 13px; background: #F5F5F5;'>
<div style='height: 13px; background: #FFD700; width: ".(get_forum_level($user_threads)*10)."%;' align='left'>&nbsp;".get_forum_rank($user_threads)."</div></div></div>"; 
echo"
</td><td id='td' style='background-color: #".$color."; width: 70%; vertical-align:top;'><b style='font-size: 12px;'>".$first.$thread['subject']."</b><text style='float: right; vertical-align: top;' class='nou'>"; 
if($post['author'] == $user['name'] && $post['deleted'] != 1 && $thread['locked'] != 1) {
echo"<a href='?action=edit_post&id=".$post['id']."' style='color: #999999;'><img src='images/edit.png' border='0' style='vertical-align: middle; padding-right:3px;'>Endre</a>&nbsp;&nbsp;"; 
}
if($post['deleted'] != 1 && $thread['locked'] != 1) {
echo"
<a href='?action=create_post&thread_id=".$thread['id']."&page=".$total_pages."&quote_id=".$post['id']."' style='color: #999999;'>
<img src='images/quote.png' border='0' style='vertical-align: middle; padding-right:3px;'>Sitat</a>
"; 
}
echo"</text><br/><span style='color: #999999;'>".$post['date']."
</span><br/><br/>"; 

if($post['edited'] > 0) {

echo"<b>Endret siste gang:</b><br/>";

}

echo preg_replace($bad_entities, $safe_entities, str_replace($bad_entities2, $safe_entities2, $post['message']))."<br/><br/>

"; 
if($user['level'] >= 4 && ($user['rights'] == "admin" || $user['rights'] == "forummod" || $user['rights'] == "forumglobal") && $post['deleted'] < 1) {
echo"<a href='?action=delete_post&id=".$post['id']."' onclick='return confirm(\"Er du sikker?\");'>Slett</a><br/>"; 
}
if($user['level'] >= 4 && ($user['rights'] == "admin" || $user['rights'] == "forummod" || $user['rights'] == "forumglobal") && !isset($first) && $newest_id['id'] == $post['id']) {
echo"<a href='?action=delete_thread&id=".$thread['id']."' onclick='return confirm(\"Er du sikker?\");'>Slett tr&#229;d</a><br/>"; 
}
if($user['level'] >= 4 && ($user['rights'] == "admin" || $user['rights'] == "forummod" || $user['rights'] == "forumglobal") && $thread['locked'] < 1 && !isset($first) && $newest_id['id'] == $post['id']) {
echo"<a href='?action=close_thread&id=".$thread['id']."' onclick='return confirm(\"Er du sikker?\");'>L&#229;s tr&#229;d</a><br/>"; 
}
if($user['level'] >= 4 && ($user['rights'] == "admin" || $user['rights'] == "forummod" || $user['rights'] == "forumglobal") && $thread['locked'] == 1 && !isset($first) && $newest_id['id'] == $post['id']) {
echo"<a href='?action=unlock_thread&id=".$thread['id']."' onclick='return confirm(\"Er du sikker?\");'>L&#229;s opp tr&#229;d</a><br/>"; 
}
if($user['level'] >= 4 && ($user['rights'] == "admin" || $user['rights'] == "forummod" || $user['rights'] == "forumglobal") && $thread['sticky'] < 1 && !isset($first) && $newest_id['id'] == $post['id']) {
echo"<a href='?action=sticky_thread&id=".$thread['id']."' onclick='return confirm(\"Er du sikker?\");'>L&#229;s tr&#229;d til toppen</a>"; 
}
if($user['level'] >= 4 && ($user['rights'] == "admin" || $user['rights'] == "forummod" || $user['rights'] == "forumglobal") && $thread['sticky'] == 1 && !isset($first) && $newest_id['id'] == $post['id']) {
echo"<a href='?action=unsticky_thread&id=".$thread['id']."' onclick='return confirm(\"Er du sikker?\");'>L&#248;sne fra toppen</a>"; 
}
echo"</td></div></tr>";

if(!isset($first)) {
$first = "RE: ";
}

unset($habbo);
unset($user_threads);
unset($bad_entities);
unset($safe_entities);


}

} else {
echo"Det er ikke blitt postet noe i denne tr&#229;den.";
}
echo"</table>";
echo"<br/><text style='float:left;'>";
if($thread['locked'] > 0) {
echo"<b><text class='nou'><span style='font-size: 11px; float:left; color: #FF0000;'>L&#229;st tr&#229;d</span></text></b><br/><br/>";
} else {
echo"<b><text class='nou'><span style='font-size: 11px; float:left;'><a href='?action=create_post&thread_id=".$thread['id']."&page=".$total_pages."' style='color: #3D3D3D;'><img src='images/newpost.png' border='0' style='vertical-align: middle; padding-right:4px;'>Post svar</a></span></text></b><br/><br/>";
}
echo"</text>";
if($total_items > 0) {

echo"<text style='float:right;'>Side: ";

$number1=$page-3;
$number2=$page-2;
$number3=$page-1;
$number4=$page;


$prev_page = $page - 1;  

if($prev_page >= 1) {  

     if($number1 == 1 || $number2 == 1 || $number3 == 1 || $number4 == 1) {
   
   } else { echo"<a href='?action=thread&id=".$_GET['id']."&page=1'>1</a> ... "; }
}  

for($a = 1; $a <= $total_pages; $a++)  
{  
$number1=$page-1;
$number2=$page-2;
$number3=$page+1;
$number4=$page+2;
$number5=$page-3;
$number6=$page+3;


if($a == $number1 || $a == $number2 || $a == $number3 || $a == $number4 || $a == $page || $a == $number5 || $a == $number6 ) {
   if($a == $page) {  
      echo("<b>$a</b> "); //no link  
     } else {  
  echo("<a href='?action=thread&id=".$_GET['id']."&page=$a'>$a</a> ");  
     }  }
}  

$number1=$page+3;
$number2=$page+2;
$number3=$page+1;
$number4=$page;

$next_page = $page + 1;  
if($next_page <= $total_pages) {  
   if($number1 == $total_pages || $number2 == $total_pages || $number3 == $total_pages || $number4 == $total_pages) {
   
   } else { echo"... <a href='?action=thread&id=".$_GET['id']."&page=$total_pages'>$total_pages</a>"; }

} 
echo"</text>";
}

pagebot($settings['footer']);

} else {
include("forum_inc/forumlist.php");
}

?>