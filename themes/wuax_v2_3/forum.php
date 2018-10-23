<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WuaX V2</title>
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


<link href="forumstyle.css" rel="stylesheet" type="text/css" />
<body>
<div id="main">
<div id="header"></div>
<div id="container"></div>
 <div id="hovedside"><a href="index.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('hovedmeny','','images/hovedsiden_light.png',1)"><img src="images/hovedsiden.png" name="hovedmeny" width="89" height="24" border="0" id="media" /></a></div>
 
  <div id="anmld"><a href="content.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('anmeldelser','','images/anmeldelser_light.png',1)"><img src="images/anmeldelser.png" name="anmeldelser" width="93" height="24" border="0" id="anmeldelser" /></a></div>
  
  <div id="wuaxm"><a href="content.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('magazine','','images/magazine_light.png',1)"><img src="images/magazine.png" name="magazine" width="111" height="24" border="0" id="magazine" /></a> </div>
  
  <div id="fanc"><a href="content.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('fancenter','','images/fancenter_light.png',1)"><img src="images/fancenter.png" name="fancenter" width="84" height="24" border="0" id="fancenter" /></a> </div>
  
  <div id="wuax"><a href="content.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('wuax','','images/wuax_light.png',1)"><img src="images/wuax.png" name="wuax" width="52" height="24" border="0" id="w" /></a></div>
  
  <div id="hinfo"><a href="content.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('habboinfo','','images/habboinfo_light.png',1)"><img src="images/habboinfo.png" name="habboinfo" width="81" height="24" border="0" id="habboinfo" /></a> </div>
  
  <div id="mlp"><a href="content.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('mobelpriser','','images/mobelpriser_light.png',1)"><img src="images/mobelpriser.png" name="mobelpriser" width="93" height="24" border="0" id="mobelpriser" /></a> </div>
  <div id="tagw"><a href="content.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('tagwall','','images/tagwall_light.png',1)"><img src="images/tagwall.png" name="tagwall" width="66" height="24" border="0" id="tagwall" /></a> </div>
  
<div id="meny"></div>
<div id="mellom"></div>
<div id="hot_head"></div>
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
                        <div id="hotline8"></div></div>
<div id="mskill"></div>
<div id="nybox_head"></div>
<div id="nybox_mid"><iframe width="968px" height="900px" id="iframe_id" name="iframe_name" src="http://bluevoids.net/holymofoyo/phpBB3" scrolling="yes" frameborder="0" ALLOWTRANSPARENCY="true" onload=resize_iframe();></iframe></div>
<div id="nybox_bot"></div>
<div id="mskill2"></div>
<div id="footertxt">Sidens innhold beskyttes av åndsverkloven. Diverse grafikk er © Sulake.
WuaX er designet og kodet av Afos.</div>
<div id="footer"></div>
</div>
</body>
</html>
