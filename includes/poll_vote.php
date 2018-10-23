<?php
if(file_exists("../main.php")) {
include"../main.php";
} else {

}
$vote = $_REQUEST['vote'];

$result = mysql_query("SELECT * FROM `poll` ORDER BY `poll_id` DESC LIMIT 1");
$poll = mysql_fetch_array($result);

if(isset($user['name'])) {
if ($vote == 'a1')
  {
  $poll['a1_votes']++;
  mysql_query("UPDATE `poll` SET a1_votes = '".$poll['a1_votes']."' WHERE poll_id='".$poll['poll_id']."'");
  mysql_query("UPDATE `poll` SET users_voted = '".$poll['users_voted']."".$user['name'].",' WHERE poll_id='".$poll['poll_id']."'");
  }
if ($vote == 'a2')
  {
  $poll['a2_votes']++;
  mysql_query("UPDATE `poll` SET a2_votes = '".$poll['a2_votes']."' WHERE poll_id='".$poll['poll_id']."'");
  mysql_query("UPDATE `poll` SET users_voted = '".$poll['users_voted']."".$user['name'].",' WHERE poll_id='".$poll['poll_id']."'");
  }
if ($vote == 'a3')
  {
  $poll['a3_votes']++;
  mysql_query("UPDATE `poll` SET a3_votes = '".$poll['a3_votes']."' WHERE poll_id='".$poll['poll_id']."'");
  mysql_query("UPDATE `poll` SET users_voted = '".$poll['users_voted']."".$user['name'].",' WHERE poll_id='".$poll['poll_id']."'");
  }



unset($poll);

$result = mysql_query("SELECT * FROM `poll` ORDER BY `poll_id` DESC LIMIT 1");
$poll = mysql_fetch_array($result);

}
?>

<b><?php echo cleanchars($poll['query']); ?></b><br/><br/>
&nbsp;<?php echo cleanchars($poll['a1']); ?>:<div style='height: 15px; padding-top:1px; padding-left:1px; background: url(images/bar_container_b.gif); width:181px; text-align:left;'>
<div style='height: 14px; background: url(images/bar_fill_b.gif); width: <?php echo(100*round($poll['a1_votes']/($poll['a1_votes']+$poll['a2_votes']+$poll['a3_votes']),2)); ?>%;' align='left'>&nbsp;<?php echo(100*round($poll['a1_votes']/($poll['a1_votes']+$poll['a2_votes']+$poll['a3_votes']),2)); ?>%</div></div><br/>

&nbsp;<?php echo cleanchars($poll['a2']);?>:<div style='height: 15px; padding-top:1px; padding-left:1px; background: url(images/bar_container_b.gif); width:181px; text-align:left;'>
<div style='height: 14px; background: url(images/bar_fill_b.gif); width: <?php echo(100*round($poll['a2_votes']/($poll['a1_votes']+$poll['a2_votes']+$poll['a3_votes']),2)); ?>%;' align='left'>&nbsp;<?php echo(100*round($poll['a2_votes']/($poll['a1_votes']+$poll['a2_votes']+$poll['a3_votes']),2)); ?>%</div></div><br/>

&nbsp;<?php echo cleanchars($poll['a3']); ?>:<div style='height: 15px; padding-top:1px; padding-left:1px; background: url(images/bar_container_b.gif); width:181px; text-align:left;'>
<div style='height: 14px; background: url(images/bar_fill_b.gif); width: <?php echo(100*round($poll['a3_votes']/($poll['a1_votes']+$poll['a2_votes']+$poll['a3_votes']),2)); ?>%;' align='left'>&nbsp;<?php echo(100*round($poll['a3_votes']/($poll['a1_votes']+$poll['a2_votes']+$poll['a3_votes']),2)); ?>%</div></div><br/>

<?php
if(!isset($user['name'])) {
echo"Du m&#229; v&#230;re innlogget for &#229; stemme.";
}
?>