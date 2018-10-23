function insertText(elname, what, formname) {
   if (formname == undefined) formname = 'inputform';
   if (document.forms[formname].elements[elname].createTextRange) {
       document.forms[formname].elements[elname].focus();
       document.selection.createRange().duplicate().text = what;
   } else if ((typeof document.forms[formname].elements[elname].selectionStart) != 'undefined') {
       // for Mozilla
       var tarea = document.forms[formname].elements[elname];
       var selEnd = tarea.selectionEnd;
       var txtLen = tarea.value.length;
       var txtbefore = tarea.value.substring(0,selEnd);
       var txtafter =  tarea.value.substring(selEnd, txtLen);
       var oldScrollTop = tarea.scrollTop;
       tarea.value = txtbefore + what + txtafter;
       tarea.selectionStart = txtbefore.length + what.length;
       tarea.selectionEnd = txtbefore.length + what.length;
       tarea.scrollTop = oldScrollTop;
       tarea.focus();
   } else {
       document.forms[formname].elements[elname].value += what;
       document.forms[formname].elements[elname].focus();
   }
}

function addText(elname, strFore, strAft, formname) {
   if (formname == undefined) formname = 'inputform';
   if (elname == undefined) elname = 'message';
   element = document.forms[formname].elements[elname];
   element.focus();
   // for IE 
   if (document.selection) {
	   var oRange = document.selection.createRange();
	   var numLen = oRange.text.length;
	   oRange.text = strFore + oRange.text + strAft;
	   return false;
   // for FF and Opera
   } else if (element.setSelectionRange) {
      var selStart = element.selectionStart, selEnd = element.selectionEnd;
			var oldScrollTop = element.scrollTop;
      element.value = element.value.substring(0, selStart) + strFore + element.value.substring(selStart, selEnd) + strAft + element.value.substring(selEnd);
      element.setSelectionRange(selStart + strFore.length, selEnd + strFore.length);
			element.scrollTop = oldScrollTop;      
      element.focus();
   } else {
			var oldScrollTop = element.scrollTop;
      element.value += strFore + strAft;
			element.scrollTop = oldScrollTop;      
      element.focus();
	}
	
	}


/***********************************************
* Dynamic Ajax Content- &#169; Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
***********************************************/

var bustcachevar=1 //bust potential caching of external pages after initial request? (1=yes, 0=no)
var loadedobjects=""
var rootdomain="http://"+window.location.hostname
var bustcacheparameter=""

function ajaxpage(url, containerid){
var page_request = false
if (window.XMLHttpRequest) // if Mozilla, Safari etc
page_request = new XMLHttpRequest()
else if (window.ActiveXObject){ // if IE
try {
page_request = new ActiveXObject("Msxml2.XMLHTTP")
} 
catch (e){
try{
page_request = new ActiveXObject("Microsoft.XMLHTTP")
}
catch (e){}
}
}
else
return false
page_request.onreadystatechange=function(){
loadpage(page_request, containerid)
}
if (bustcachevar) //if bust caching of external page
bustcacheparameter=(url.indexOf("?")!=-1)? "&"+new Date().getTime() : "?"+new Date().getTime()
page_request.open('GET', url+bustcacheparameter, true)
page_request.send(null)
}

function loadpage(page_request, containerid){
if (page_request.readyState == 4 && (page_request.status==200 || window.location.href.indexOf("http")==-1))
document.getElementById(containerid).innerHTML=page_request.responseText
}

function loadobjs(){
if (!document.getElementById)
return
for (i=0; i<arguments.length; i++){
var file=arguments[i]
var fileref=""
if (loadedobjects.indexOf(file)==-1){ //Check to see if this object has not already been added to page before proceeding
if (file.indexOf(".js")!=-1){ //If object is a js file
fileref=document.createElement('script')
fileref.setAttribute("type","text/javascript");
fileref.setAttribute("src", file);
}
else if (file.indexOf(".css")!=-1){ //If object is a css file
fileref=document.createElement("link")
fileref.setAttribute("rel", "stylesheet");
fileref.setAttribute("type", "text/css");
fileref.setAttribute("href", file);
}
}
if (fileref!=""){
document.getElementsByTagName("head").item(0).appendChild(fileref)
loadedobjects+=file+" " //Remember this object as being already added to page
}
}
}