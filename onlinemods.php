<?php

include"main.php";

database_con();

if($settings['maintenance'] == "yes" && $user['level'] != "4") {
die("<meta http-equiv='refresh' content='0; url=maintenance.php'>"); } 

pagetop("Online mods scanner");
include"includes/subheader_fancenter.php";
pagemid();
echo"<b>Online moderatorer:</b><br/><br/>";
?>
<script type="text/javascript">
function Ajax(){
var xmlHttp;
	try{	
		xmlHttp=new XMLHttpRequest();// Firefox, Opera 8.0+, Safari
	}
	catch (e){
		try{
			xmlHttp=new ActiveXObject("Msxml2.XMLHTTP"); // Internet Explorer
		}
		catch (e){
		    try{
				xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch (e){
				alert("Din browser har ikke Ajax. Vi anbefaler deg &#229; laste ned FireFox :)");
				return false;
			}
		}
	}

xmlHttp.onreadystatechange=function(){
	if(xmlHttp.readyState==4){
		document.getElementById('ReloadThis1').innerHTML=xmlHttp.responseText;

	}
}
<?php

 echo"xmlHttp.open(\"GET\",\"includes/get_online_mods.php\",true);";

?>

xmlHttp.send(null);
}

window.onload=function(){
	setTimeout('Ajax()',100);
}
</script>
<?php

echo"<text id='ReloadThis1'><img src='images/loading.gif' alt='Laster inn...'></text>";

pagebot($settings['footer']);

?>