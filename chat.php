<?php
include"main.php";


function encodechar($text)
{
include"includes/chars.php";
return $text;
}


if(isset($user['name'])) {

mysql_query("UPDATE `usersystem` SET `last_chat_active` = '".time()."' WHERE `id` = '".$user['id']."' LIMIT 1");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>WuaX nattchat</title>
<link type="text/css" rel="stylesheet" href="includes/chat_style.css" />
</head>
<?php
if(!isset($user['name'])){

}
else{
?>
<div id="wrapper">
<?php
if((strftime("%H", time()) == 22 || strftime("%H", time()) == 23) || (strftime("%H", time()) >= 0 && strftime("%H", time()) <= 7)) {
?>
	<div id="menu">
<p class="welcome">Brukere i chat: <b> <?php echo"<a style='cursor:pointer;' onclick='return alert(\"";
$result=mysql_query("SELECT * FROM `usersystem` WHERE `last_chat_active` + 30 >= ".time()."");
 while($row = mysql_fetch_array($result)) {  if(isset($first)) { echo","; } echo " ".$row['username'].""; $first=true; } echo" \");'>";?><?php echo mysql_num_rows(mysql_query("SELECT * FROM `usersystem` WHERE `last_chat_active` + 50 >= ".time()."")); ?></b></a></p>
		<p class="logout"><a href="index"><b>Tilbake</b></a></p>
		<div style="clear:both"></div>
	</div>	
		<div id="chatbox"><?php

$q = mysql_query("SELECT * FROM `chat` ORDER BY id LIMIT 50");

while($row = mysql_fetch_array($q))
{
echo"<div class='msgln' style='padding-bottom:4px;'><b>".encodechar($row['username'])."</b>: ".encodechar($row['content'])." (".$row['time'].")<br /></div>";
}

	
	?></div>

	<?php if($user['chat_ban'] != 1) { ?>
	<form name="message" method='get' action="">
		<input name="usermsg" type="text" id="usermsg" size="63" />
		<input name="submitmsg" type="submit"  id="submitmsg" class="button" value="Send" /><br/>

	</form>
<?php } else {
echo"Du har chatban og kan derfor ikke skrive noe.";
}

} else {
echo"<br/><br/>Kom tilbake kl. 22:00 for en ny kveld med nattchat!".strftime("%H:%M", time()+3600*7);
}

 ?>
</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
<script type="text/javascript">
// jQuery Document
$(document).ready(function(){
});


	$("#submitmsg").click(function(){	
		var clientmsg = $("#usermsg").val();
		$.post("mypost.php", {text: clientmsg});				
		$("#usermsg").attr("value", "");
		return false;
	});
	


	function loadLog(){		
		var oldscrollHeight = $("#chatbox").attr("scrollHeight") - 20;
		$.ajax({
			url: "refreshchat.php",
			cache: false,
			success: function(html){		
				$("#chatbox").html(html);			
				var newscrollHeight = $("#chatbox").attr("scrollHeight") - 20;
				if(newscrollHeight > oldscrollHeight){
					$("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal');
				}				
		  	},
		});
	}
	setInterval (loadLog, 2500);
	



	function loadOn(){		
		var oldscrollHeight = $("#onlineusers").attr("scrollHeight") - 20;
		$.ajax({
			url: "refreshonline.php",
			cache: false,
			success: function(html){		
				$("#menu").html(html);			
				var newscrollHeight = $("#menu").attr("scrollHeight") - 20;
				if(newscrollHeight > oldscrollHeight){
					$("#menu").animate({ scrollTop: newscrollHeight }, 'normal');
				}				
		  	},
		});
	}
	setInterval (loadOn, 4000);
	


</script>
<?php
}
?>

</body>
</html>

<?php


} else { ?>
<meta http-equiv='refresh' content='0; url=index'>
<?php } 

?>