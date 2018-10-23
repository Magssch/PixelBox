function Ajax(){
var xmlHttp;
try{	
xmlHttp=new XMLHttpRequest();// Firefox, Opera 8.0+, Safari
}
catch (e){
try{
xmlHttp=new ActiveXObject("Msxml2.XMLHTTP"); // Internet Explorer
}
catch (a){
try{
xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
}
catch (d){
alert("Din browser har ikke Ajax. Vi anbefaler deg &#229; laste ned FireFox :)");
return false;
}
}
}

xmlHttp.onreadystatechange=function(){
if(xmlHttp.readyState==4){
document.getElementById('ReloadThis').innerHTML=xmlHttp.responseText;
setTimeout('Ajax()', 500);
}
}

xmlHttp.open("GET","get_tags.php",true);


xmlHttp.send(null);
}

window.onload=function(){
setTimeout('Ajax()',100);
}