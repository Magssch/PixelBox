<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WuaX 2.0</title>

<script type="text/javascript">
<!--
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->

</script>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>

<script type="text/javascript" src="fadeslideshow.js">

/***********************************************
* Ultimate Fade In Slideshow v2.0- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for this script and 100s more
***********************************************/

</script>

<script type="text/javascript">

var mygallery=new fadeSlideShow({
	wrapperid: "fadeshow1", //ID of blank DIV on page to house Slideshow
	dimensions: [471, 205], //width/height of gallery in pixels. Should reflect dimensions of largest image
	imagearray: [
		["images/ny1.png", "#", "", "Fusce nec magna risus. Sed sit amet orci ac sem posuere luctus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas aliquet tellus sit amet ipsum euismod dignissim."],
		["images/ny2.png", "#", "", "Sed sapien massa, varius at rutrum a, sagittis id turpis. Vestibulum vestibulum ante nec magna adipiscing sodales."],
		["images/ny3.png", "#", "", "Vestibulum sit amet est mi. Nulla ut mi massa. Nullam leo ante, cursus eget ullamcorper in, euismod ut nisi. Quisque mollis turpis id turpis placerat vel faucibus lectus scelerisque. Pellentesque vel lectus quis risus dapibus sodales. Nam quis diam purus, eget accumsan elit."],
		["images/ny4.png", "#", "", "Morbi sagittis ornare ultricies. Vivamus orci felis, bibendum in ultrices vel, tempor ac dui. Curabitur semper auctor dui, eget malesuada eros gravida at."], //<--no trailing comma after very last image element!
	],
	displaymode: {type:'auto', pause:3500, cycles:0, wraparound:false},
	persist: false, //remember last viewed slide and recall within same session?
	fadeduration: 500, //transition duration (milliseconds)
	descreveal: "always",
	togglerid: ""
})
</script>
</head>



<link href="style.css" rel="stylesheet" type="text/css" />

<body>

<div id="header"></div>
<div id="menu"></div>
  <div id="hovedside"><a href="#" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('hovedmeny','','images/hovedsiden_light.png',1)"><img src="images/hovedsiden.png" name="hovedmeny" width="89" height="24" border="0" id="media" /></a></div>
 
  <div id="anmld"><a href="content.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('anmeldelser','','images/anmeldelser_light.png',1)"><img src="images/anmeldelser.png" name="anmeldelser" width="93" height="24" border="0" id="anmeldelser" /></a></div>
  
  <div id="wuaxm"><a href="content.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('magazine','','images/magazine_light.png',1)"><img src="images/magazine.png" name="magazine" width="111" height="24" border="0" id="magazine" /></a> </div>
  
  <div id="fanc"><a href="content.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('fancenter','','images/fancenter_light.png',1)"><img src="images/fancenter.png" name="fancenter" width="84" height="24" border="0" id="fancenter" /></a> </div>
  
  <div id="wuax"><a href="content.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('wuax','','images/wuax_light.png',1)"><img src="images/wuax.png" name="wuax" width="52" height="24" border="0" id="w" /></a></div>
  
  <div id="hinfo"><a href="content.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('habboinfo','','images/habboinfo_light.png',1)"><img src="images/habboinfo.png" name="habboinfo" width="81" height="24" border="0" id="habboinfo" /></a> </div>
  
  <div id="mlp"><a href="content.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('mobelpriser','','images/mobelpriser_light.png',1)"><img src="images/mobelpriser.png" name="mobelpriser" width="93" height="24" border="0" id="mobelpriser" /></a> </div>
  <div id="tagw"><a href="content.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('tagwall','','images/tagwall_light.png',1)"><img src="images/tagwall.png" name="tagwall" width="66" height="24" border="0" id="tagwall" /></a> </div>
  
  <div id="mellom"></div>
  <div id="hot_head"></div>
  <div id="sistenytt"><img src="images/sistenytt.png" /></div>
<div id="reglogtop"><a href="forum.php"><img src="images/wuaxlog.png" border="0"/></a></div>
<div id="userinfo"></div>
<div id="reg"><a href="forum.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('regg','','images/regg_light.png',1)"><img src="images/regg.png" name="regg" width="119" height="25" border="0" id="regggg" /></a></div>
<div id="log"><a href="forum.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('logginn','','images/logginn_light.png',1)"><img src="images/logginn.png" name="logginn" width="86" height="25" border="0" id="logginn" /></a></div>
<div id="hotpic"><div id="fadeshow1"></div></div>
<div id="hotline">
          <div id="hotline1"></div>
          <div id="hotline2"></div>
          <div id="hotline3"></div>
          <div id="hotline4"></div>
          <div id="hotline5"></div>
          <div id="hotline6"></div>
          <div id="hotline7"></div>
          <div id="hotline8"></div>
</div>
<div id="midt"></div>
<div id="avstemning"><img src="images/avstemninger.png" /></div>
<div id="midt2"></div>
<div id="poll">
<div id="poll1">
<form method="post" action="http://poll.pollcode.com/K8x"><table border="0" width="204" style="background-color:#b7d6ec;color:#000000;font-family:'Verdana';font-size:10px;" cellspacing="0" cellpadding="2"><tr><td colspan="2" style="padding:2px;"><strong>Afos r kul</strong></td></tr><tr><td width="5"><input type=radio name="answer" value="1"></td><td style="padding:2px;">ja</td></tr><tr><td width="5"><input type=radio name="answer" value="2"></td><td style="padding:2px;">enig</td></tr><tr><td width="5"><input type=radio name="answer" value="3"></td><td style="padding:2px;">seff</td></tr><tr><td colspan="2"><center><input type="submit" value="Stem">&nbsp;&nbsp;<input type="submit" name="view" value="Resultat"></center></td></tr></table></form>
</div>
</div>
<div id="nhead"></div>
<div id="hjelp"><img src="images/nodanrop.png" /></div>
<div id="na"><a href="#"><img src="images/anrop.png" border="0"></a></div>
<div id="nhead"></div>
<div id="annonser"><img src="images/annonser.png" /></div>
<div id="an"><a href="#"><img src="images/annonse.png" border="0"></a></div>
<div id="frontbg"></div>
  <div id="verdi"></div>
  <div id="hbox">
            <div id="verdi1"></div>
           <div id="verdi2"></div>
           <div id="verdi3"></div>
           <div id="verdi4"></div>
  </div>
      <div id="mag"></div>
      <div id="hbox2"></div>
      <div id="magasin">For å gi dere en liten anelse om hvordan WuaX Magazine kommer til å bli, så kan vi hinte dere med habbogruppen "Habbo Nytt".
      <br /><br /> 
      Den vil bli oppdatert ukentlig, med flere innslag fra våre bruke. Både humoristiske og spennende!</div>
         <div id="anmd"></div>
         <div id="hbox3"></div>
         <div id="anmeldelse">hei</div>
<div id="nybox_head"></div>
<div id="nybox_mid">
  <div id="omwuax"><center>
  <br>
<img src="http://i36.tinypic.com/xkon5w.gif" align="right"/>
<br />
WuaX er en fanside for Habbo hotell og vi åpnet den 25. oktober 2009. Vi vil minne om at du må verifisere Habboen din for at du skal kunne bruke alle sidens funksjoner.
<br /><br />
Har du lyst på jobb i WuaX? Send en mail til jobb@wuax.net. Den skal inneholde hvem du er, hvilken jobb du vil ha, hvorfor vi skal velge akkurat deg og andre eventuelle erfaringer du har.
<br /><br/>
Her kommer også en liten introduksjonsfilm av WuaX, som er laget av Cool2Cool/Håkon!
<br /><br />
<object width="480" height="295"><param name="movie" value="http://www.youtube.com/v/OvOCHf0-rMU&hl=en_US&fs=1&rel=0"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube.com/v/OvOCHf0-rMU&hl=en_US&fs=1&rel=0" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="440" height="270"></embed></object>
<br /><br />
<center><i>Ellers håper vi dere koser dere på siden og har det fint!</i>
<br /><br />
Mvh:
<br /><br />
Kr1ss, Maziz og xgitta
</center>
  </div></div>
<div id="nybox_bot"></div>
<div id="nybox3_head"></div>
<div id="nybox3_mid"></div>
<div id="nybox3_bot"></div>
<div id="footertxt"><center>Sidens innhold beskyttes av åndsverkloven. Diverse grafikk er © Sulake.
Designet og kodet av Afos</center>.</div>
<div id="footer"></div>
</body>
</html>
