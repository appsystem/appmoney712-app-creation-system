<!DOCTYPE html>
	<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<title>Bikini</title>
	<link rel="stylesheet" href="../css/jquerymobile-1.4.4.min.css">
	<link rel="stylesheet" href="../css/jquery.mobile-1.4.4.min.css">
	<link rel="stylesheet" href="../css/jqmobile.min.css">
	<link href="../css/appsystem.css" rel="stylesheet">
	<link rel="shortcut icon" href="favicon.ico">
	<!--copyiframe--><style type="text/css">
	body {overflow-y:hidden;}
	@media all and (min-width: 1250px){.tabnwdh{width:96%;}}
	@media all and (min-width: 1020px) and (max-width: 1250px){.tabnwdh{width:95%;}}
	@media all and (min-width: 768px) and (max-width: 1020px){.tabnwdh{width:93%;}}
	@media all and (min-width: 601px) and (max-width: 768px){.tabnwdh{width:92%;}}
	@media all and (min-width: 321px) and (max-width: 600px){.tabnwdh{width:88%;}.tablistrights {right:1em;}}
	@media all and (max-width: 321px){.tabnwdh{width:85%;}.tablistrights {right:1em;}}
	</style><!--copyiframes-->
	<script src="../js/jquery.js"></script>
	<script src="../js/jquery.mobile-1.4.4.min.js"></script>
	<!--copyiframe--><!--copyiframes-->
	</head>
	<body>
	<div data-role="page" id="web2" class="page" data-theme="f"><div  class="ui-content pagebg tabnwdh">
	<ul class="tablistrights" data-role="listview">	
	 <li><a href="#" data-vntsns="[1,2,5,6,8]" style="background-color:rgba(0,0,0,0)"  class="tbnu ui-btn ui-btn-z ui-btn-icon-notext ui-icon-carat-u"></a></li>
	<li><a href="#tabnmenu" data-rel="popup" style="background-color:rgba(0,0,0,0)" data-transition="pop" class="ui-btn ui-btn-z ui-btn-icon-notext ui-icon-bars"></a></li>
      <li><a href="#" data-vntsns="[1,2,5,6,8]" style="background-color:rgba(0,0,0,0)"  class="tbnd ui-btn ui-btn-z ui-btn-icon-notext ui-icon-carat-d"></a></li>
    </ul>
<div id="tabnmenu" data-role="popup" data-corners="false"><ul data-role="listview"  data-corners="false" data-inset="true"><li><a href="#" data-vnts="1" style="background-color:rgba(0,0,0,0)" class="vnts vntsn ui-btn ui-btn-z "><?php if($_SESSION[tn]==PRC){echo '标题';}else if($_SESSION[tn]==EN){echo 'Title';}else{echo '標題';}?></a></li><li><a href="#" data-vnts="5" style="background-color:rgba(0,0,0,0)" class="vnts vntsn ui-btn ui-btn-z "><?php if($_SESSION[tn]==PRC){echo '标题1';}else if($_SESSION[tn]==EN){echo 'Title1';}else{echo '標題1';}?></a></li><li><a href="#" style="background-color:rgba(0,0,0,0)" class="tabrefresh ui-btn ui-btn-z ui-btn-icon-left ui-icon-refresh">&nbsp;</a></li></ul></div>

	<div data-role="controlgroup" data-corners="false" class="plft" data-type="horizontal"><a href="#panel" data-rel="panel" class="ui-btn ui-btn-y ui-btn-inline ui-mini ui-btn-icon-top ui-icon-bars">MENU</a></div><!--panel!--><div data-role="panel" id="panel" data-display="overlay" ><ul style="min-width:210px;" data-role="listview" data-corners="false" data-inset="true"><li ><a href="#">Bikini</a></li><li ><a href="#">Bikini3</a></li><li ><a href="#">Bikini4</a></li><li><a href="#">Bikini5</a></li></ul>
		</div>
	
<div id="vnts1" class="vntsns vtnn">
<div style="padding-top:35px; overflow:hidden"><!--gridpic!--><div class="ui-grid-d">
<div class="ui-block-a">Title<a href="#"><img style="width:100%"  src="../images/jstrusts.jpg"></a>Remark</div>
<div class="ui-block-b">Title1<a href="#"><img style="width:100%"  src="../images/jstrusts.jpg"></a>Remark1</div>
<div class="ui-block-c">Title2<a href="#"><img style="width:100%"  src="../images/jstrusts.jpg"></a>Remark2</div>
<div class="ui-block-d">Title3<a href="#"><img style="width:100%"  src="../images/jstrusts.jpg"></a>Remark3</div>
<div class="ui-block-e">Title4<a href="#"><img style="width:100%"  src="../images/jstrusts.jpg"></a>Remark4</div></div><!--gridpic!--></div></div><!--vnts!-->

<div id="vnts2" class="vntsns vtnn">
<div style="padding-top:35px"><!--popupic!--><div class="ui-grid-d">
<div class="ui-block-a">tItle<a href="#"><img style="width:100%" src="../images/sw.jpg"></a>Footnote</div>
<div class="ui-block-b">tItle2<a href="#"><img style="width:100%" src="../images/sw.jpg"></a>Footnote2</div>
<div class="ui-block-c">tItle3<a href="#"><img style="width:100%" src="../images/sw.jpg"></a>Footnote3</div>
<div class="ui-block-d">tItle4<a href="#"><img style="width:100%" src="../images/sw.jpg"></a>Footnote4</div>
<div class="ui-block-e">tItle5<a href="#"><img style="width:100%" src="../images/sw.jpg"></a>Footnote5</div>
</div></div><!--vnts!-->

<div id="12htmlpopup1" data-role="popup" data-corners="false" class="ifrwidthpn"><iframe src="http://localhost/ftb/phonegaptp/images/ishow3.gif" style="width:100%" seamless="" frameborder="0"></iframe></div>
<div id="12htmlpopup2" data-role="popup" data-corners="false" class="ifrwidthpn"><iframe src="http://localhost/ftb/phonegaptp/images/ishow3B.gif" style="width:100%" seamless="" frameborder="0"></iframe></div>
<div id="12htmlpopup3" data-role="popup" data-corners="false" class="ifrwidthpn"><iframe src="http://localhost/ftb/phonegaptp/images/ishow3S.gif" style="width:100%" seamless="" frameborder="0"></iframe></div>
<div id="12htmlpopup4" data-role="popup" data-corners="false" class="ifrwidthpn"><iframe src="http://localhost/ftb/phonegaptp/images/ishow3D.gif" style="width:100%" seamless="" frameborder="0"></iframe></div>
<div id="12htmlpopup5" data-role="popup" data-corners="false" class="ifrwidthpn"><iframe src="http://localhost/ftb/phonegaptp/images/ishow3E.gif" style="width:100%" seamless="" frameborder="0"></iframe></div><!--popupic!--></div></div><!--vnts!-->

<div id="vnts5" class="vntsns vtnn">
<div style="padding-top:35px"><!--popupic!--><div class="ui-grid-solo">A Bikini<a class="grid" href="#12htmlpopup8" data-rel="popup" data-transition="pop"><img style="width:100%"  src="http://localhost/ftb/phonegaptp/images/ishowpure.gif"></a>A Bikini</div><div id="12htmlpopup8" data-role="popup" data-corners="false" class="ifrwidthpn"><iframe src="http://localhost/ftb/phonegaptp/images/ishow3.gif" style="width:100%" seamless="" frameborder="0"></iframe></div><!--popupic!--></div></div><!--vnts!-->

<div id="vnts6" class="vntsns vtnn">
<div style="padding-top:35px"><!--popupic!--><div class="ui-grid-solo">A Bikini<a class="grid" href="#12htmlpopup15" data-rel="popup" data-transition="pop"><img style="width:100%"  src="http://localhost/ftb/phonegaptp/images/ishowpure.gif"></a>A Bikini</div><div id="12htmlpopup15" data-role="popup" data-corners="false" class="ifrwidthp"><img src="http://localhost/ftb/phonegaptp/images/ishow3.gif"></div><!--popupic!--></div></div><!--vnts!-->

<div id="vnts8" class="vntsns vtnn">
<div style="padding-top:35px">A Bikini
<div style="overflow-x:hidden;height:350px;">sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss sssssssssssss </div>
</div>
</div><!--vnts!-->

	</div><!-- /content -->
	
	<div id="popup1" data-role="popup" data-corners="false" class="ifrwidthp"><div class="ifrwidth" id="jsnpopup1"  style="background-image:url(images/apopuppicbackground1.gif);background-size:100% 100%;background-repeat: no-repeat;">11111111</div></div>	
	<div id="popup2" data-role="popup" data-corners="false" class="ifrwidthp"><div class="ifrwidth" id="jsnpopup2"  style="background-image:url(images/apopuppicbackground2.gif);background-size:100% 100%;background-repeat: no-repeat;"></div></div>	
	<div id="popup3" data-role="popup" data-corners="false" class="ifrwidthp"><div class="ifrwidth" id="jsnpopup3"  style="background-image:url(images/apopuppicbackground3.gif);background-size:100% 100%;background-repeat: no-repeat"></div></div>	
	<div id="popup4" data-role="popup" data-corners="false" class="ifrwidthp"><div class="ifrwidth" id="jsnpopup4"  style="background-image:url(images/apopuppicbackground4.gif);background-size:100% 100%;background-repeat: no-repeat;"></div></div>	
	<div id="popup5" data-role="popup" data-corners="false" class="ifrwidthp"><div class="ifrwidth" id="jsnpopup5"  style="background-image:url(images/apopuppicbackground5.gif);background-size:100% 100%;background-repeat: no-repeat;"></div></div>	
	<div id="popup6" data-role="popup" data-corners="false" class="ifrwidthp"><div class="ifrwidth" id="jsnpopup6"  style="background-image:url(images/apopuppicbackground6.gif);background-size:100% 100%;background-repeat: no-repeat;"></div></div>	
	<div id="popup7" data-role="popup" data-corners="false" class="ifrwidthp"><div class="ifrwidth" id="jsnpopup7"  style="background-image:url(images/apopuppicbackground7.gif);background-size:100% 100%;background-repeat: no-repeat;"></div></div>	
	<div id="popup8" data-role="popup" data-corners="false" class="ifrwidthp"><div class="ifrwidth" id="jsnpopup8"  style="background-image:url(images/apopuppicbackground8.gif);background-size:100% 100%;background-repeat: no-repeat;"></div></div>	
	<div id="popup9" data-role="popup" data-corners="false" class="ifrwidthp"><div class="ifrwidth" id="jsnpopup9"  style="background-image:url(images/apopuppicbackground9.gif);background-size:100% 100%;background-repeat: no-repeat;"></div></div>	
	<div id="popup10" data-role="popup" data-corners="false" class="ifrwidthp"><div class="ifrwidth" id="jsnpopup10"  style="background-image:url(images/apopuppicbackground10.gif);background-size:100% 100%;background-repeat: no-repeat;"></div></div>	
	<div id="popup11" data-role="popup" data-corners="false" class="ifrwidthp"><div class="ifrwidth" id="jsnpopup11"  style="background-image:url(images/apopuppicbackground11.gif);background-size:100% 100%;background-repeat: no-repeat;"></div></div>	
	<div id="popup12" data-role="popup" data-corners="false" class="ifrwidthp"><div class="ifrwidth" id="jsnpopup12"  style="background-image:url(images/apopuppicbackground12.gif);background-size:100% 100%;background-repeat: no-repeat;"></div></div>	
	<div id="popup13" data-role="popup" data-corners="false" class="ifrwidthp"><div class="ifrwidth" id="jsnpopup13"  style="background-image:url(images/apopuppicbackground13.gif);background-size:100% 100%;background-repeat: no-repeat;"></div></div>	
	<div id="popup14" data-role="popup" data-corners="false" class="ifrwidthp"><div class="ifrwidth" id="jsnpopup14"  style="background-image:url(images/apopuppicbackground14.gif);background-size:100% 100%;background-repeat: no-repeat;"></div></div>	
	<div id="popup15" data-role="popup" data-corners="false" class="ifrwidthp"><div class="ifrwidth" id="jsnpopup15"  style="background-image:url(images/apopuppicbackground15.gif);background-size:100% 100%;background-repeat: no-repeat;"></div></div>	
	<div id="popup16" data-role="popup" data-corners="false" class="ifrwidthp"><div class="ifrwidth" id="jsnpopup16"  style="background-image:url(images/apopuppicbackground16.gif);background-size:100% 100%;background-repeat: no-repeat;"></div></div>	
	<div id="popup17" data-role="popup" data-corners="false" class="ifrwidthp"><div class="ifrwidth" id="jsnpopup17"  style="background-image:url(images/apopuppicbackground17.gif);background-size:100% 100%;background-repeat: no-repeat;"></div></div>	
	<div id="popup18" data-role="popup" data-corners="false" class="ifrwidthp"><div class="ifrwidth" id="jsnpopup18"  style="background-image:url(images/apopuppicbackground18.gif);background-size:100% 100%;background-repeat: no-repeat;"></div></div>		
	</div></div><!--copyiframes--></body>
	</html>

<script>
    $(".tablistrights").css('top',($(window).height()-3*28)/2);
		$(".tbnu").click(function (event){
				event.preventDefault();
				var tagvnts = $("#tabnmenu").data("tagvnts");
				var vntsns = JSON.parse($(this).attr('data-vntsns'));	
				if(tagvnts){tagvnts= parseInt(tagvnts)-1;}else{tagvnts= 0;}		
				var vnts = '';
				vnts = vntsns[tagvnts];						
				$(".vntsns").hide();$("#vnts"+vnts).fadeIn(800);
				$("#tabnmenu").data( "tagvnts",tagvnts);						               
        });
		$(".tbnd").click(function (event){
				event.preventDefault();
				var tagvnts = $("#tabnmenu").data("tagvnts");
				var vntsns = JSON.parse($(this).attr('data-vntsns'));	
				if(tagvnts && tagvnts>0){tagvnts= parseInt(tagvnts)+1;}else{tagvnts= 1;}
				var vnts = '';
				vnts = vntsns[tagvnts];						
				$(".vntsns").hide();$("#vnts"+vnts).fadeIn(800);
				$("#tabnmenu").data( "tagvnts",tagvnts);					               
        });
   		$(".vnts").click(function (event){
				event.preventDefault();
				var vntsp = '';
                var vnts = $(this).attr('data-vnts');
				$("body").data( "vnts",vnts);
				$('a.vnts').each(function() {
				if(parseInt($(this).attr('data-vnts')) < vnts)$(this).removeClass( "ui-icon-carat-d" ).addClass( "ui-icon-carat-u" );
				if(parseInt($(this).attr('data-vnts')) > vnts)$(this).removeClass( "ui-icon-carat-u" ).addClass( "ui-icon-carat-d" );
				});	
				
				$(".vntsns").hide();$("#vnts"+vnts).fadeIn(800);			
                 $("#tabnmenu").popup('close');
                
        });
		$(".tabrefresh").click(function (event){
		event.preventDefault();
		$(".vntsns").show('slow');		
         $("#tabnmenu").popup('close');
		});
  </script>