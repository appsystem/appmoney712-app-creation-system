<?php session_start();      
error_reporting(0); 

if($_GET[pj] and !preg_match('/^[0-9]*$/',$_GET[pj]))exit;
if($_GET[pj])$pj = $_GET[pj];
if($_GET[ap] and !preg_match('/^[0-9]*$/',$_GET[ap]))exit;
if($_GET[ap])$ap = $_GET[ap];
if($_GET[pn] and !preg_match('/^[0-9]*$/',$_GET[pn]))exit;
if($_GET[pn])$pn = $_GET[pn];
if($_GET[tl] and !preg_match('/^[0-9]*$/',$_GET[tl]))exit;
if($_GET[tl])$tl = $_GET[tl];
if($tl and !$pn)$pn = $tl;
if($_GET[tm] and !preg_match('/^[0-9]*$/',$_GET[tm]))exit;
if($_GET[tm])$tm = $_GET[tm];
if($_GET[pres] and !preg_match('/^[0-9]*$/',$_GET[pres]))exit;
if($_GET[pres])$pres = $_GET[pres];



define("ROOTPATH", "../");
include_once (ROOTPATH.'administration/db_conn.php');

	$sqlw=$db->query("select * from webhtml where cno='$ap'");
	if($sqlw)$roww=$sqlw->fetch();
	if($roww[pjn]){
		if($roww[pjn] and !preg_match('/^[0-9]*$/',$roww[pjn]))exit;
		if($roww[apn] and !preg_match('/^[0-9]*$/',$roww[apn]))exit;
		$pj = $roww[pjn];
		$ap = $roww[apn];
	;}
?>     
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php if($_SESSION[tn]==PRC){echo '列表 - AppMoney712 移动应用设计系统';}else if($_SESSION[tn]==EN){echo 'Listview - AppMoney712 APP Creation System';}else{echo '列表 - AppMoney712 移動應用設計系統';}?></title>
	<link href="../css/jquery.mobile-1.4.4.min.css" rel="stylesheet">
	<link href="../css/jquerymobile-1.4.4.min.css" rel="stylesheet">
	<link href="../css/icons/style.css" rel="stylesheet">
	<link href="../css/appsystem.css" rel="stylesheet"><link href="../jscss/gridlistview.css" rel="stylesheet">
	<style type="text/css">
			.ifrwidthps{overflow:hidden;}
			.ftrbg{position:absolute;bottom:0px;left:2px;right:4px;width:100%;padding-top:18px;padding-bottom:18px;}			
	</style>
	<script src="../js/jquery.js"></script>
	<script src="../js/jquery.mobile-1.4.4.min.js"></script>
	<script src="../js/fastbtn.js"></script>

</head>
<body>
<div data-role="page" data-theme="f" class="page">
	<div style="overflow: hidden;" data-role="header" data-theme="f">
	<a href="#navigations"  id="menubttn"  data-rel="popup" data-transition="pop" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-btn-icon-left ui-icon-bars"><?php if($_SESSION[tn]==PRC){echo '目录';}else if($_SESSION[tn]==EN){echo 'Menu';}else{echo '目錄';}?></a>
    <h1><?php if($_SESSION[tn]==PRC){echo '列表 - AppMoney712 移动应用设计系统';}else if($_SESSION[tn]==EN){echo 'Listview - AppMoney712 APP Creation System';}else{echo '列表 - AppMoney712 移動應用設計系統';}?></h1>
	
	</div><!-- /header -->


	<?php if($tl)$tln = '&tl='.$tl;?>
	
<?php  if($pn and !$tl){ 
			if($pres){
				if($pres==1){$preshtml = '';}else if($pres==2){$preshtml = '[1]';}else if($pres==3){$preshtml = '[2]';}else if($pres==4){$preshtml = '[3]';}
				$ht = file_get_contents('../panel/'.$roww[pjnbr].'/temp/'.$pn.'/'.$ap.$preshtml.'.html');
				$nhtmn = explode('<!--part',$ht);
				$pntag = '<!--part'.$pn.'!-->';
				for($i=1;$i<sizeof($nhtmn);$i++){if(strpos('<!--part'.$nhtmn[$i],$pntag)!==false){if(!$tabshtml)$tabshtml  = str_replace($pntag,'','<!--part'.$nhtmn[$i]);};}
	  		;}
			$ht = file_get_contents('../panel/'.$roww[pjnbr].'/'.$ap.'.html');			
			$hts = $ht;
			//$ht = file_get_contents('../panel/'.$roww[pjnbr].'/'.$ap.'.html');
			$htm = explode('<!--part',$ht);
			$pntag = '<!--part'.$pn.'!-->';
				for($i=1;$i<sizeof($htm);$i++){
					if(strpos('<!--part'.$htm[$i],$pntag)===false and !$tabshtml){$html .= '<!--part'.$htm[$i];}
					else if(strpos('<!--part'.$htm[$i],$pntag)!==false){$tabshtml  = str_replace($pntag,'','<!--part'.$htm[$i]);}
					else{$htmls .= '<!--part'.$htm[$i];}
				;}

				$tabnbgdata = explode('<!--data-tabnbg',$tabshtml);
				if($tabnbgdata[1]){
				$tabnbgdatn = explode('data-tabnbg!-->',$tabnbgdata[1]);
				if(strpos($tabnbgdatn[0],'vtns1vtns')!==false){
					$bvtns = 1;
				;}else if(strpos($tabnbgdatn[0],'vtns5vtns')!==false){
					$bvtns = 5;
				;}else if(strpos($tabnbgdatn[0],'vtns6vtns')!==false){
					$bvtns = 6;
				;}else{
					$bvtns = '';
				;}
				
				$tabshtml  = str_replace('<div class="swiper-slide"><div id="'.$pj.$ap.'vnts'.$pn.'" class="vntsns vtnn">','',$tabshtml);
				$tabshtml  = str_replace('<!--data-tabnbg'.$tabnbgdatn[0].'data-tabnbg!-->','',$tabshtml);	
				;}	
				$tabshtml  = str_replace('</div></div><!--vnts!-->','',$tabshtml);

			
			//$ultbg = explode('</ul>',$tabshtml);
			$ultbg = explode('</div><!--ul!-->',$tabshtml);
			

			$tbg = explode('<!--item!-->',$ultbg[0]);
			//$tbgs = explode('<!--itemvws',$ultbg[1]);
			
			for($i=1;$i<sizeof($tbg);$i++){
				$tbgnvlu = explode('<!--data',$tbg[$i]);
				$tbgsvlu = explode('data!-->',$tbgnvlu[1]);
				$tbgvlu = explode('@#@',$tbgsvlu[0]);
				$popupurlvlu[$i]= $tbgvlu[0];
				$typvlu[$i]= $tbgvlu[1];
				$titlevlu[$i]= $tbgvlu[2];
				$ftrvlu[$i]= $tbgvlu[3];
				$tclrvlu[$i]= $tbgvlu[4];	
				$ftrclrvlu[$i]= $tbgvlu[5];
				$imgbgvlu[$i]= $tbgvlu[6];		
				$tmvlu[$i] = $tbgvlu[7];
				$borderbgvlu[$i] = $tbgvlu[8];
				$widthvlu[$i] = $tbgvlu[9];
				if($tmvlu[$i] > $tabsnvlu or !$tabsnvlu)$tabsnvlu = $tmvlu[$i];
			;}

			;}
	?>		
	<div data-role="content">
	
	<?php if($ap){?>
	<a href="webpage.php?pj=<?php echo htmlspecialchars($roww[pjnbr]) ?>&ap=<?php echo htmlspecialchars($roww[ap])?>" data-ajax="false" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-btn-icon-left ui-icon-carat-l">&nbsp;</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#view" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-inline ui-corner-all ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '预览';}else if($_SESSION[tn]==EN){echo 'Preview';}else{echo '預覽';}?></a>
		
	<div data-role="popup" id="view"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>

	<ul data-role="listview" data-corners="false" data-inset="true">
	<li><a href="view.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo htmlspecialchars($roww[ap])?>&vw=ap" data-ajax="false" target="_blank" class="ui-btn ui-btn-inline ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '预览应用页内容形式';}else if($_SESSION[tn]==EN){echo 'Page content of APP style[Preview]';}else{echo '預覽應用頁內容形式';}?></a></li>
	<li><a href="view.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo htmlspecialchars($roww[ap])?>&vw=ap&ts=1" data-ajax="false" target="_blank" class="ui-btn ui-btn-inline ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '预览应用页内容形式';}else if($_SESSION[tn]==EN){echo 'Page content of APP style[Preview]';}else{echo '預覽應用頁內容形式';}?><?php if($_SESSION[tn]==PRC){echo '[触控式] [使用webkit型浏览器]';}else if($_SESSION[tn]==EN){echo '[Touch screen] [using any webkit browser]';}else{echo '[觸控式] [使用webkit型瀏覽器]';}?></a></li>
	<li><a href="viewp.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo htmlspecialchars($roww[ap])?>" data-ajax="false" target="_blank" class="ui-btn ui-btn-inline ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '预览popup形式';}else if($_SESSION[tn]==EN){echo 'content of popup style[Preview]';}else{echo '預覽popup形式';}?></a></li>
	<li><a href="viewp.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo htmlspecialchars($roww[ap])?>&ts=1" data-ajax="false" target="_blank" class="ui-btn ui-btn-inline ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '预览popup形式';}else if($_SESSION[tn]==EN){echo 'content of popup style[Preview]';}else{echo '預覽popup形式';}?><?php if($_SESSION[tn]==PRC){echo '[触控式] [使用webkit型浏览器]';}else if($_SESSION[tn]==EN){echo '[Touch screen] [using any webkit browser]';}else{echo '[觸控式] [使用webkit型瀏覽器]';}?></a></li>
	<!--<li><a href="view.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo htmlspecialchars($roww[ap])?>&vw=s" data-ajax="false" target="_blank" class="ui-btn ui-btn-inline ui-mini ui-btn-icon-left ui-icon-search"><?php if($_SESSION[tn]==PRC){echo '预览單頁形式';}else if($_SESSION[tn]==EN){echo 'single page style[Preview]';}else{echo '預覽單頁形式';}?></a></li>!-->
	</ul>
	</div>
	
		
	<a href="menudesign.php?pj=<?php echo htmlspecialchars($roww[pjnbr])?>&ap=<?php echo $ap?>&pn=<?php echo $pn?>&php=listviewn&plt=1" data-ajax="false" class="ui-btn ui-btn ui-btn-inline ui-corner-all ui-mini ui-btn-icon-left ui-icon-bars"><?php if($_SESSION[tn]==PRC){echo '专案应用页列表';}else if($_SESSION[tn]==EN){echo 'Project Page List';}else{echo '專案應用頁列表';}?></a>
	
	
	<a href="#try" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-f ui-btn-inline ui-corner-all ui-mini" style="color:BLACK"><span class="pigss-pencil" style="color:red"></span><?php if($_SESSION[tn]==PRC){echo '快速试用';}else if($_SESSION[tn]==EN){echo 'Quick try';}else{echo '快速試用';}?></a>
		<div data-role="popup" id="try" data-position-to="window" data-theme="f" class="ifrwidth"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><BR><BR>
		

				
		<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '项目填写';}else if($_SESSION[tn]==EN){echo 'Item information';}else{echo '項目填寫';}?></b> &nbsp;<?php if($_SESSION[tn]==PRC){echo '在\'型式\'点选\'项目 - popup\',填\'标题\'及点选\'图像字体\'并提送。此标题显示在此页列表,点撀此标题,再在\'POPUP内容 URL\'填相片档名,档案须存於panel/'.$roww[pjnbr].'/images档夹内,再提送。';}else if($_SESSION[tn]==EN){echo 'You need to select \'Item - popup\' in the Type, fiil in the \'Title\' and select \'Icon font\'. The title is showed on the list of this page and you need to click it, enter a photo filename to the popup content URL and click the SEND button. You need to place the photo file to the folder panel/'.$roww[pjnbr].'/images.';}else{echo '在\'型式\'點選\'項目 - popup\',填\'標題\'及點選\'圖像字體\'並提送。此標題顯示在此頁列表,點撀此標題,再在\'POPUP內容 URL\'填相片檔名,檔案須存於panel/'.$roww[pjnbr].'/images檔夾內,再提送。';}?></p>	
	
		<HR>
		
		<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '试用';}else if($_SESSION[tn]==EN){echo 'Testing';}else{echo '試用';}?></b> &nbsp;
	<?php if($_SESSION[tn]==PRC){echo '您须点撀此页上的预览,再进行预览或测试。再修改及选用不同设置再预览并试用。';}else if($_SESSION[tn]==EN){echo 'You need to click the above preview button to preview or test your design. You can enter or select different parameters to test their functions and effects.';}else{echo '您須點撀此頁上的預覽,再進行預覽或測試。再修改及選用不同設置再預覽並試用。';}?></p>	
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '试用步骤';}else if($_SESSION[tn]==EN){echo 'Testing Steps';}else{echo '試用步驟';}?></b> &nbsp;
	<?php if($_SESSION[tn]==PRC){echo '您点撀POPUP按钮能显示含相片的POPUP。';}else if($_SESSION[tn]==EN){echo 'You can click a data popup button to open popup containing a photo.';}else{echo '您點撀POPUP按鈕能顯示含相片的POPUP。';}?></p>
		</div>
		
		
	<a href="#trys" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-f ui-btn-inline ui-corner-all ui-mini" style="color:BLACK"><span class="pigss-pencil" style="color:red"></span><?php if($_SESSION[tn]==PRC){echo '快速试用 - 项目popup选项';}else if($_SESSION[tn]==EN){echo 'Quick try - Item quick button';}else{echo '快速試用 - 項目popup選項';}?></a>
		<div data-role="popup" id="trys" data-position-to="window" data-theme="f" class="ifrwidth"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><BR><BR>
		<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '使用';}else if($_SESSION[tn]==EN){echo 'Usage';}else{echo '使用';}?></b>
		<?php if($_SESSION[tn]==PRC){echo '此项产生按钮选项,供用户点选并填到panel控制板上。此处是填POPUP按钮的标题。';}else if($_SESSION[tn]==EN){echo 'This item is the creating data popup button. APP user clicks on the button to open a popup for selecting data to panel. You need to enter title and content.';}else{echo '此項產生按鈕選項,供用戶點選並填到panel控制板上。此處是填POPUP按鈕的標題。';}?></p>	
		
		<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '项目填写';}else if($_SESSION[tn]==EN){echo 'Item information';}else{echo '項目填寫';}?></b> &nbsp;<?php if($_SESSION[tn]==PRC){echo '填写\'标题\'及点选\'图像字体\',在\'型式\'选用\'项目 - popup选项\'并提送。再点撀\'popup选项数据按钮\',再按该页的快速试用指引。';}else if($_SESSION[tn]==EN){echo 'You need to fill in the Title and the Icon font and select the Item - quick button in the Type. You need to click the SEND button and then you can click the Quick button data and follow the quick try instruction on the editing page.';}else{echo '填寫\'標題\'及點選\'圖像字體\',在\'型式\'選用\'項目 - popup選項\'並提送。再點撀\'popup選項數據按鈕\',再按該頁的快速試用指引。';}?></p>	
		<HR>
		<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '试用';}else if($_SESSION[tn]==EN){echo 'Testing';}else{echo '試用';}?></b> &nbsp;
	<?php if($_SESSION[tn]==PRC){echo '您须点撀此页上的预览,再进行预览,若有popup选项数据按钮,能进行测试。再修改及选用不同设置再预览并试用。';}else if($_SESSION[tn]==EN){echo 'You need to click the above preview button to preview your design. You need to create Quick button data for testing. You can enter or select different parameters to test their functions and effects.';}else{echo '您須點撀此頁上的預覽,再進行預覽,若有popup選項數據按鈕,能進行測試。再修改及選用不同設置再預覽並試用。';}?></p>	
	
		</div>
	
	<?php if(file_exists('../panel/'.$roww[pjnbr].'/'.$ap.'.html')){
	if(file_exists('../panel/'.$roww[pjnbr].'/temp/'.$pn.'/'.$ap.'.html') and !$pres){?>
	<div data-role="controlgroup" data-type="horizontal" class="ui-btn-inline" data-corners="false">
	<a href="listviewn.php?pj=<?php echo $roww[pjnbr]?>&ap=<?php echo $roww[ap]?>&pn=<?php echo $pn?>&pres=1" data-ajax="false" class="ui-btn ui-btn-f ui-btn-inline ui-corner-all ui-mini" style="color:pink" ><?php if($_SESSION[tn]==PRC){echo '改用上次储存';}else if($_SESSION[tn]==EN){echo 'Using previous save';}else{echo '改用上次儲存';}?></a>
	<?php if(file_exists('../panel/'.$roww[pjnbr].'/temp/'.$pn.'/'.$ap.'[1].html')){?>
	<a href="listviewn.php?pj=<?php echo $roww[pjnbr]?>&ap=<?php echo $roww[ap]?>&pn=<?php echo $pn?>&pres=2" data-ajax="false" class="ui-btn ui-btn-f ui-btn-inline ui-corner-all ui-mini" style="color:pink" >2</a>
	<?php ;}if(file_exists('../panel/'.$roww[pjnbr].'/temp/'.$pn.'/'.$ap.'[2].html')){?>
	<a href="listviewn.php?pj=<?php echo $roww[pjnbr]?>&ap=<?php echo $roww[ap]?>&pn=<?php echo $pn?>&pres=3" data-ajax="false" class="ui-btn ui-btn-f ui-btn-inline ui-corner-all ui-mini" style="color:pink" >3</a>
	<?php ;}if(file_exists('../panel/'.$roww[pjnbr].'/temp/'.$pn.'/'.$ap.'[3].html')){?>
	<a href="listviewn.php?pj=<?php echo $roww[pjnbr]?>&ap=<?php echo $roww[ap]?>&pn=<?php echo $pn?>&pres=4" data-ajax="false" class="ui-btn ui-btn-f ui-btn-inline ui-corner-all ui-mini" style="color:pink" >4</a>
	<?php ;}?>
	</div>
<?php ;}else{
	if(file_exists('../panel/'.$roww[pjnbr].'/temp/'.$pn.'/'.$ap.'.html') and $pres){?>
<a href="listviewn.php?pj=<?php echo $roww[pjnbr]?>&ap=<?php echo $roww[ap]?>&pn=<?php echo $pn?>"  data-ajax="false" class="ui-btn ui-btn-f ui-btn-inline ui-corner-all ui-mini" style="color:pink" ><?php if($_SESSION[tn]==PRC){echo '不改用上'.$pres.'次储存';}else if($_SESSION[tn]==EN){echo 'Not using previous save '.$pres;}else{echo '不改用上'.$pres.'次儲存';}?></a>
<?php ;} ;}
	;}//?>
	
	<?php ;}?>
	<hr>
	<span style="color:black"><?php if($_SESSION[tn]==PRC){echo '专案';}else if($_SESSION[tn]==EN){echo 'Project';}else{echo '專案';}?></span>
	<?php 	$sql=$db->query("select * from webpj where cno='$pj'");
	if($sql)$row=$sql->fetch();
	echo '['.htmlspecialchars($row[date]).'] '.htmlspecialchars($row[title]);?>
	
	&nbsp;&nbsp;&nbsp;&nbsp;
	
	<span style="color:black"><?php if($_SESSION[tn]==PRC){echo '应用页称';}else if($_SESSION[tn]==EN){echo 'Page name';}else{echo '應用頁稱';}?></span> :
	<?php echo htmlspecialchars($roww[title])?>
	<hr>
	<?php 
	if($_SESSION[tn]==PRC){echo '选项按钮';}else if($_SESSION[tn]==EN){echo 'Option button';}else{echo '選項按鈕';}	
	?>  
	

	<FORM action="listviewn.php?pj=<?php echo htmlspecialchars($roww[pjnbr]) ?>&ap=<?php echo htmlspecialchars($roww[ap]) ?>&tm=<?php echo htmlspecialchars($tm) ?>&pn=<?php echo htmlspecialchars($pn).$tln ?>" id="webxls" method="post" data-ajax="false" >

	<?php 
	if($tm and ($typvlu[$tm]=='popup' or $typvlu[$tm]=='link')){echo '<hr>';
	//if($_SESSION[tn]==PRC){echo '链结/POPUP内容 URL';}else if($_SESSION[tn]==EN){echo 'Link/popup content URL';}else{echo '鏈結/POPUP內容 URL';}
	if($_SESSION[tn]==PRC){echo 'POPUP内容 URL';}else if($_SESSION[tn]==EN){echo 'popup content URL';}else{echo 'POPUP內容 URL';}?>
	<input type="text" name="img" id="img" placeholder="URL" value="<?php echo str_replace('&amp;','&',htmlspecialchars($popupurlvlu[$tm]))?>" required>
	<!--<a href="#webhtml" data-rel="popup" class="ui-btn ui-btn-inline ui-corner-all ui-mini ui-btn-icon-left ui-icon-edit"><?php if($_SESSION[tn]==PRC){echo '专案应用页链结/加tel或mail格式';}else if($_SESSION[tn]==EN){echo 'Link of Project APP Page/add tel or mail format';}else{echo '專案應用頁鏈結/加tel或mail格式';}?></a>!-->
	
	<a href="#webhtml" data-rel="popup" class="ui-btn ui-btn-inline ui-corner-all ui-mini ui-btn-icon-left ui-icon-edit"><?php if($_SESSION[tn]==PRC){echo '加tel或mail格式';}else if($_SESSION[tn]==EN){echo 'Add tel or mail format';}else{echo '加tel或mail格式';}?></a>
	
	<div id="webhtml" data-role="popup"  style="overflow-y:auto">
	<ul data-role="listview" data-inset="true">
	<li><a href="#" class="webhtm ui-btn ui-mini ui-btn-icon-left ui-icon-edit" data-value="tel:"><?php if($_SESSION[tn]==PRC){echo '加电话号格式';}else if($_SESSION[tn]==EN){echo 'Fill in telephone number format';}else{echo '加電話號格式';}?></a></li>
	<li><a href="#" class="webhtm ui-btn ui-mini ui-btn-icon-left ui-icon-edit" data-value="mailto:"><?php if($_SESSION[tn]==PRC){echo '加电话号格式';}else if($_SESSION[tn]==EN){echo 'Fill in email format';}else{echo '加電郵格式';}?></a></li>
	<!--<?php 	$sql=$db->query("select * from webhtml where pjnbr='$pj' order by nbr,date desc");
	if($sql){
	while($row=$sql->fetch()){
	if($row[hidden]!=5){
	if($row[pjn]){$htmlink = 'web'.htmlspecialchars($row[pjn]).'.html';}else{$htmlink = 'web'.htmlspecialchars($row[pjnbr]);}
	echo '<li><a href="#" class="webhtml ui-btn ui-mini ui-btn-icon-left ui-icon-edit" data-value="'.htmlspecialchars($htmlink).'">'.htmlspecialchars($htmlink).' ['.htmlspecialchars($row['date']).'] '.htmlspecialchars($row[title]).'</a></li>';
	;}
	;};}?>!-->
	</ul>
	</div>
	
	<?php echo '<hr>';}?>
	<?php if($_SESSION[tn]==PRC){echo '型式';}else if($_SESSION[tn]==EN){echo 'Type';}else{echo '型式';}?><select name="typ">
	<!--<option value="link"  <?php if($typvlu[$tm]=='link')echo 'selected="selected"';?>><?php if($_SESSION[tn]==PRC){echo '项目 - 链结';}else if($_SESSION[tn]==EN){echo 'Item - link';}else{echo '項目 - 鏈結';}?>/<?php if($_SESSION[tn]==PRC){echo '电邮/电话按钮';}else if($_SESSION[tn]==EN){echo 'Email/phone button';}else{echo '電郵/電話按鈕';}?></option>!-->	

	<option value="link"  <?php if($typvlu[$tm]=='link')echo 'selected="selected"';?>><?php if($_SESSION[tn]==PRC){echo '电邮/电话按钮';}else if($_SESSION[tn]==EN){echo 'Email/phone button';}else{echo '電郵/電話按鈕';}?></option>	
	<option value="popup"  <?php if($typvlu[$tm]=='popup')echo 'selected="selected"';?>><?php if($_SESSION[tn]==PRC){echo '项目 - popup';}else if($_SESSION[tn]==EN){echo 'Item - popup';}else{echo '項目 - popup';}?></option>
	<option value="quick"  <?php if($typvlu[$tm]=='quick')echo 'selected="selected"';?>><?php if($_SESSION[tn]==PRC){echo '项目 - popup选项';}else if($_SESSION[tn]==EN){echo 'Item - quick button';}else{echo '項目 - popup選項';}?></option>
	<?php if(file_exists('../panel/'.$roww[pjnbr].'/panel'.$ap.'.html')){?>
	
	<option value="shw"  <?php if($typvlu[$tm]=='shw')echo 'selected="selected"';?>><?php if($_SESSION[tn]==PRC){echo '显示控制板';}else if($_SESSION[tn]==EN){echo 'Panel showing';}else{echo '顯示控制板';}?></option>
	<?php ;}?>
	</select>
	
	<div class="ui-grid-a"><div class="ui-block-a" style="width:30%"><?php if($_SESSION[tn]==PRC){echo '图像字体';}else if($_SESSION[tn]==EN){echo 'Icon font';}else{echo '圖像字體';}?><input type="text" name="title" placeholder="" id="title" value="<?php echo htmlspecialchars($titlevlu[$tm])?>" required>
	
	
	<div class="ui-block-b"><a href="#icons" class="ui-btn ui-btn-f ui-btn-inline" data-rel="popup" data-transition="pop"><?php if($_SESSION[tn]==PRC){echo '字符';}else if($_SESSION[tn]==EN){echo 'ICON';}else{echo '字符';}?></a></div><div data-role="popup" id="icons" style="width:650px"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>

	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-airplanefly"><span class="pigss-airplanefly"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-bigsale"><span class="pigss-bigsale"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-bunny"><span class="pigss-bunny"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-coupon"><span class="pigss-coupon"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-discodancer"><span class="pigss-discodancer"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-drinks"><span class="pigss-drinks"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-gift"><span class="pigss-gift"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-gifts"><span class="pigss-gifts"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-music"><span class="pigss-music"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-newproduct"><span class="pigss-newproduct"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-panda"><span class="pigss-panda"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-pocketmoney"><span class="pigss-pocketmoney"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-salerecommed"><span class="pigss-salerecommed"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-santa"><span class="pigss-santa"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-sign-percent"><span class="pigss-sign-percent"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-tbn"><span class="pigss-tbn"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-valentinesday"><span class="pigss-valentinesday"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-laugh"><span class="pigss-laugh"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-loveface"><span class="pigss-loveface"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-noanswer"><span class="pigss-noanswer"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-noanswer1"><span class="pigss-noanswer1"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-noanswer2"><span class="pigss-noanswer2"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-notsmile"><span class="pigss-notsmile"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-notsmile1"><span class="pigss-notsmile1"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-sick"><span class="pigss-sick"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-smile"><span class="pigss-smile"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-smile1"><span class="pigss-smile1"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-smiling"><span class="pigss-smiling"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-smiling1"><span class="pigss-smiling1"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-smiling2"><span class="pigss-smiling2"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-surprised"><span class="pigss-surprised"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-surprised1"><span class="pigss-surprised1"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-thinking"><span class="pigss-thinking"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-tired"><span class="pigss-tired"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-tongue"><span class="pigss-tongue"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-tongue1"><span class="pigss-tongue1"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-tongue2"><span class="pigss-tongue2"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-tongue3"><span class="pigss-tongue3"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-tongue5"><span class="pigss-tongue5"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-winking"><span class="pigss-winking"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-yummy"><span class="pigss-yummy"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-angry"><span class="pigss-angry"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-confused"><span class="pigss-confused"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-cry"><span class="pigss-cry"></span></a>
	

	
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-chat"><span class="pigss-chat"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-user"><span class="pigss-user"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-location"><span class="pigss-location"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-mobile"><span class="pigss-mobile"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-screen"><span class="pigss-screen"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-mail"><span class="pigss-mail"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-help"><span class="pigss-help"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-videos"><span class="pigss-videos"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-pictures"><span class="pigss-pictures"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-link"><span class="pigss-link"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-search"><span class="pigss-search"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-download"><span class="pigss-download"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-pencil"><span class="pigss-pencil"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-info"><span class="pigss-info"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-article"><span class="pigss-article"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-clock"><span class="pigss-clock"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-star"><span class="pigss-star"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-heart"><span class="pigss-heart"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-file"><span class="pigss-file"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-feed"><span class="pigss-feed"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-refresh"><span class="pigss-refresh"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-images"><span class="pigss-images"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-heart2"><span class="pigss-heart2"></span></a>
	<a href="#" class="ui-btn ui-btn-f ui-btn-inline iconbtn" id="pigss-bookmark"><span class="pigss-bookmark"></span></a>

	</div>
	</div><div class="ui-block-b" style="width:70%"><?php if($_SESSION[tn]==PRC){echo '标题';}else if($_SESSION[tn]==EN){echo 'Title';}else{echo '標題';}?><textarea name="imgftr"><?php echo htmlspecialchars($ftrvlu[$tm])?></textarea></div></div>
	
	<div class="ui-grid-d"><div class="ui-block-a"><?php if($_SESSION[tn]==PRC){echo '图像字体颜色';}else if($_SESSION[tn]==EN){echo 'Icon font color';}else{echo '圖像字體顏色';}?><input type="text" name="tclr" placeholder="" value="<?php echo htmlspecialchars($tclrvlu[$tm])?>"></div>
	<div class="ui-block-b"><?php if($_SESSION[tn]==PRC){echo '标题颜色';}else if($_SESSION[tn]==EN){echo 'Title text color';}else{echo '標題顏色';}?><input type="text" name="ftrclr" placeholder="" value="<?php echo htmlspecialchars($ftrclrvlu[$tm])?>"></div>
	<div class="ui-block-c"><?php if($_SESSION[tn]==PRC){echo '背景';}else if($_SESSION[tn]==EN){echo 'Background';}else{echo '背景';}?><input type="text" name="imgbg" placeholder="" value="<?php echo htmlspecialchars($imgbgvlu[$tm])?>"></div>
	<div class="ui-block-d"><?php if($_SESSION[tn]==PRC){echo '边色';}else if($_SESSION[tn]==EN){echo 'Border color';}else{echo '邊色';}?><input type="text" name="borderbg" placeholder="" value="<?php echo htmlspecialchars($borderbgvlu[$tm])?>"></div>
	<div class="ui-block-e"><?php if($_SESSION[tn]==PRC){echo '长度';}else if($_SESSION[tn]==EN){echo 'Length';}else{echo '長度';}?>%<input type="text" name="width" placeholder="" value="<?php echo htmlspecialchars($widthvlu[$tm])?>"></div></div>
	
	
	<?php if($tm){?>

	<hr>
	<?php ;}?>

	<input type="hidden" name="guanyin1" value="<?php if(!$_POST[guanyin1])$_SESSION[guanyin1]=rand();
	echo htmlspecialchars($_SESSION[guanyin1]); ?>">
	<div class="ui-grid-c"><div class="ui-block-a">

	<input type="submit" name="submit" id="webxlsbtn" Value="<?php if($_SESSION[tn]==PRC){echo '送交';}else if($_SESSION[tn]==EN){echo 'SEND';}else{echo '送交';}?>">
	</div><div class="ui-block-b">
	<a href="#steps" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini"><?php if($_SESSION[tn]==PRC){echo '步骤';}else if($_SESSION[tn]==EN){echo 'Steps';}else{echo '步驟';}?></a><div data-role="popup" id="steps" style="min-width:300px;max-width:85%" data-position-to="window" data-theme="f"><a class="ui-btn ui-corner-all ui-shadow ui-btn-a ui-icon-delete ui-btn-icon-notext ui-btn-right" href="#" data-rel="back">Close</a>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '填写项目';}else if($_SESSION[tn]==EN){echo 'Fiil in item data';}else{echo '填寫項目';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '您须选择型式并填写资料。';}else if($_SESSION[tn]==EN){echo 'You need to select type and fill in item data.';}else{echo '您須選擇型式並填寫資料。';}?></p><HR>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '修改项目/填写资料';}else if($_SESSION[tn]==EN){echo 'Amend data/add information';}else{echo '修改項目/填寫資料';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '您须点撀下面的项目列表的相关标题,再作进一步填写或修改资料。对popup及popup选项,须填url资料。<BR>点选\'插入\'能修改次序。<BR>点选\'删除\'进行删除资料。';}else if($_SESSION[tn]==EN){echo 'You need to click the related title on the below item list to amend data or edit additional information of popup and quick button styles.<BR>If you want to re-order the item on the listview, you need to select \'Insert\'.<BR>If you need to delete the data, you need to select the \'Delete\'.';}else{echo '您須點撀下面的項目列表的相關標題,再作進一步填寫或修改資料。對popup及popup選項,須填url資料。<BR>點選\'插入\'能修改次序。<BR>點選\'刪除\'進行刪除資料。';}?></p><HR>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo 'popup选项资料';}else if($_SESSION[tn]==EN){echo 'Quick button data';}else{echo 'popup選項資料';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '您须点撀下面的项目列表的相关标题,再点撀\'popup选项数据按钮\'编写数据。';}else if($_SESSION[tn]==EN){echo 'You need to click the related title of below item list and then click the \'Quick button data\' to edit data.';}else{echo '您須點撀下面的項目列表的相關標題,再點撀\'popup選項數據按鈕\'編寫數據。';}?></p>
	<hr>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '添加项目';}else if($_SESSION[tn]==EN){echo 'Add item';}else{echo '添加項目';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '点撀\'再增加新数据\'。';}else if($_SESSION[tn]==EN){echo 'You need to click the \'Add new data\'.';}else{echo '點撀\'再增加新數據\'。';}?></p>
	<hr>
	<h4 style="color:black"><?php if($_SESSION[tn]==PRC){echo '预览计设';}else if($_SESSION[tn]==EN){echo 'Preview';}else{echo '預覽計設';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '在此页下面能预览您的设计,若测试popup选项的功能,您须点撀上面的预览按钮。';}else if($_SESSION[tn]==EN){echo 'You can preview your listview design on the below directly. If you want to preview the proper function of quick buttons, you need to click the above \'Preview\' button.';}else{echo '在此頁下面能預覽您的設計,若測試popup選項的功能,您須點撀上面的預覽按鈕。';}?></p>
	
	
</div>


</div><div class="ui-block-c">
<a href="#inf" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini">? <?php if($_SESSION[tn]==PRC){echo '解释';}else if($_SESSION[tn]==EN){echo 'Explanation';}else{echo '解釋';}?></a>
	<div data-role="popup" id="inf" style="min-width:300px;max-width:85%" data-position-to="window" data-theme="f"><a class="ui-btn ui-corner-all ui-shadow ui-btn-a ui-icon-delete ui-btn-icon-notext ui-btn-right" href="#" data-rel="back">Close</a>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '型式';}else if($_SESSION[tn]==EN){echo 'Style';}else{echo '型式';}?></b> - </p>
	<p><?php if($_SESSION[tn]==PRC){echo 'popup是用户点撀项目按钮显示popup,popup内容是相片丶应用页丶特定互联视频或音频或网页内容。popup选项是用户点撀项目按钮显示popup,popup内是选项,用户点选进行资料填写。电邮/电话按钮能调用合适的应用设备功能。显示控制板只能在巳使用popup选项及巳设置控制板才显示此选项供选用,用户点撀按钮显示该控制板。';}else if($_SESSION[tn]==EN){echo 'Popup is for showing popup content by user clicking on the item button. The content can be picture, APP page, specific Internet video or audio or web page. Quick button[option button] is an option list on popup for user clicking as data entry. Email/phone button can use related functions of appropriate device. The option of panel showing style will be showed after using Quick button in your design. APP user clicks on the button to open the panel.';}else{echo 'popup是用戶點撀項目按鈕顯示popup,popup內容是相片、應用頁、特定互聯視頻或音頻或網頁內容。popup選項是用戶點撀項目按鈕顯示popup,popup內是選項,用戶點選進行資料填寫。電郵/電話按鈕能調用合適的應用設備功能。顯示控制板只能在巳使用popup選項及巳設置控制板才顯示此選項供選用,用戶點撀按鈕顯示該控制板。';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '对於相片URL,设置特定尺寸的内容区的高度,用户拖拽内容区浏览纵向或横向,格式是相片称[1].png,e.g. picture[1].png。';}else if($_SESSION[tn]==EN){echo 'For picture URL, you can limit the popop size by specific filename format filename[1].png, e.g. picture[1].png. APP user needs to vertically or horizontally swipe the popup area to view the pucture.';}else{echo '對於相片URL,設置特定尺寸的內容區的高度,用戶拖拽內容區瀏覽縱向或橫向,格式是相片稱[1].png,e.g. picture[1].png。';}?></p>	
	<p><?php  if(!$roww[pjnbr])$roww[pjnbr] = '???';
	if($_SESSION[tn]==PRC){echo '若使用应用内相片,档案放置於panel/'.$roww[pjnbr].'/images档夹内,填相片档名,e.g. picture.png。您亦能在相片档名加[1],e.g. picture[1].png 。';}else if($_SESSION[tn]==EN){echo 'If you need to use picture stored inside APP, you need to place the file to folder panel/'.$roww[pjnbr].'/images. You need to enter picture filename. e.g. picture.png or picture[1].png.';}else{echo '若使用應用內相片,檔案放置於panel/'.$roww[pjnbr].'/images檔夾內,填相片檔名,e.g. picture.png。您亦能在相片檔名加[1],e.g. picture[1].png。';}?></p>
	
	<p><?php if($_SESSION[tn]==PRC){echo '若使用特定互联网网页[只限应用形式],应使用\'嵌入内容\'创建iframe,互联网网页是显示在iframe内。';}else if($_SESSION[tn]==EN){echo 'If you want to show an specific Internet web page[APP status only], you need to use the \'Embed web page\' function to embed the web page into an iframe.';}else{echo '若使用特定互聯網網頁[只限應用形式],應使用\'嵌入內容\'創建iframe,互聯網網頁是顯示在iframe內。';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '网页填写时必须填上网页档案,e.g. http://www.?????.com/index.html, 不能只填域名,http://www.?????.com。若是应用页,填应用页档名,e.g. web1.html。';}else if($_SESSION[tn]==EN){echo 'You need to fill in file name of Internet web page. e.g. http://www.?????.com/index.html, You cannot only fill in url, http://www.?????.com. If you need to open an APP page, you need to enter its filename. e.g. web1.html';}else{echo '網頁填寫時必須填上網頁檔案,e.g. http://www.?????.com/index.html, 不能只填域名,http://www.?????.com。若是應用頁,填應用頁檔名,e.g. web1.html。';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '您亦能令用户开启浏览器浏览特定网页,e.g. pdf文件或地图。格式是[openbrowser]网页url,e.g. [openbrowser]http://???.?????.com/viewer?url=??????????word.pdf。此功能不能用电脑浏览器试用。';}else if($_SESSION[tn]==EN){echo 'You can open APP user device\'s specific browser to show specific Internet web page. e.g. pdf document or map. The format is [openbrowser]url of web page. e.g. [openbrowser]http://???.?????.com/viewer?url=??????????word.pdf. You cannot preview it on your computer browser.';}else{echo '您亦能令用戶開啟瀏覽器瀏覽特定網頁,e.g. pdf文件或地圖。格式是[openbrowser]網頁url,e.g. [openbrowser]http://???.?????.com/viewer?url=??????????word.pdf。此功能不能用電腦瀏覽器試用。';}?></p>

	<p><?php if($_SESSION[tn]==PRC){echo '您亦能令用户开启合适应用浏览特定互联网或内联网文件,e.g. 用Acrobat Reader APP开启pdf文件。格式是[openapp]网页url,e.g. [openapp]http://???.?????.com/word.pdf。此功能不能用电脑浏览器试用。';}else if($_SESSION[tn]==EN){echo 'You can let APP users to open Internet/Intranet document by appropriate APP in their appropriate device. e.g. open pdf document by Acrobat Reader APP. The format is [openapp]document url. e.g. [openapp]http://???.?????.com/word.pdf.  You cannot preview it on your computer browser.';}else{echo '您亦能令用戶開啟合適應用瀏覽特定互聯網或內聯網文件,e.g. 用Acrobat Reader APP開啟pdf文件。格式是[openapp]網頁url,e.g. [openapp]http://???.?????.com/word.pdf。此功能不能用電腦瀏覽器試用。';}?></p>

	<p><?php if($_SESSION[tn]==PRC){echo '您亦能令用户开启设备巳安装的WHATSAPP APP,格式是whatsapp://??????????,并显示特定内容,对於IOS APP,您亦能使用相关社交分享的URL scheme, 能令用户的相关应用开启并使用特定功能,到本司网站有指引。此功能不能用电脑浏览器试用。';}else if($_SESSION[tn]==EN){echo 'You can open APP user device\'s WhatsAPP APP to use its specific function. e.g.whatsapp://??????????. Please refer to our website. For IOS APP, you can use the URL scheme of many social sharing media to open APP user device\'s related social sharing APPs and use their functions. Please refer to our website.  You cannot try it on your computer browser.';}else{echo '您亦能令用戶開啟設備巳安裝的WHATSAPP APP,格式是whatsapp://??????????,並顯示特定內容,對於IOS APP,您亦能使用相關社交分享的URL scheme, 能令用戶的相關應用開啟並使用特定功能,到本司網站有指引。此功能不能用電腦瀏覽器試用。';}?></p>
	<!--<p><?php if($_SESSION[tn]==PRC){echo '若使用互联网网页[嵌入内容]及应用页,应使用\'标签导航\'才能含创建返到上一页按钮。';}else if($_SESSION[tn]==EN){echo 'If you want to show an Internet web[Embed web page] or APP page, you need to use the \'Tab Navigation\' function to create a button for returning to previous page.';}else{echo '若使用互聯網網頁[嵌入內容]及應用頁,應使用\'標簽導航\'才能含創建返到上一頁按鈕。';}?></p>!-->
	<hr>
	
	
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '文字颜色';}else if($_SESSION[tn]==EN){echo 'Text color';}else{echo '文字顏色';}?></b>
	<?php if($_SESSION[tn]==PRC){echo '填上html颜色码 e.g. #123456。';}else if($_SESSION[tn]==EN){echo 'You can add  color code e.g. #123456 .';}else{echo '填上html顏色碼 e.g. #123456。';}?></p>
	<hr>
	
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '背景';}else if($_SESSION[tn]==EN){echo 'Background';}else{echo '背景';}?></b> -
	<?php  if(!$roww[pjnbr])$roww[pjnbr]='?';
	if($_SESSION[tn]==PRC){echo '长方背景图像,使用应用内的图像,档案须存於panel/'.$roww[pjnbr].'/images档夹内。若设置背景图像上下左右重覆显示,在档案名加[xy]。e.g. picture[xy].png';}else if($_SESSION[tn]==EN){echo 'It is about the background of item. If you use the APP pictures, you need to prepare pictures and store them in  panel/'.$roww[pjnbr].'/images folder. If you add [xy] to the picture file name e.g. picture[xy].png, the picture will be repeated both vertically and horizontally in the item area.';}else{echo '長方背景圖像,使用應用內的圖像,檔案須存於panel/'.$roww[pjnbr].'/images檔夾內。若設置背景圖像上下左右重覆顯示,在檔案名加[xy]。e.g. picture[xy].png';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '您亦能在背景图像填上rgb颜色码e.g. rgb(125,125,125), rgba颜色码e.g. rgba(125,125,125,0.5) 或 hex颜色码e.g. #123456代替背景图像。';}else if($_SESSION[tn]==EN){echo 'You can add rgb color code e.g. rgb(125,125,125), rgba color code e.g. rgba(125,125,125,0.5) or hex color code e.g. #123456 instead of background picture.';}else{echo '您亦能在背景圖像填上rgb顏色碼e.g. rgb(125,125,125), rgba顏色碼e.g. rgba(125,125,125,0.5) 或 hex顏色碼e.g. #123456代替背景圖像。';}?></p>
	<!--<p><?php if($_SESSION[tn]==PRC){echo '您亦能填a-y的颜色主题e.g. b。';}else if($_SESSION[tn]==EN){echo 'You can enter color theme a-y.e.g. a';}else{echo '您亦能填a-y的顏色主題e.g. b。';}?></p>!-->
	<hr>
	
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '边色';}else if($_SESSION[tn]==EN){echo 'Border color';}else{echo '邊色';}?></b> -
	<?php if($_SESSION[tn]==PRC){echo '填上html颜色码,e.g. #123456。若不设置,填none。';}else if($_SESSION[tn]==EN){echo 'You can add html color code e.g. #123456. If you do not use the border for an item, enter none.';}else{echo '填上html顏色碼,e.g. #123456。若不設置,填none。';}?></p>
	<hr>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '按钮长度[阔度]';}else if($_SESSION[tn]==EN){echo 'Button length[width]';}else{echo '按鈕長度[闊度]';}?></b> -
	<?php if($_SESSION[tn]==PRC){echo '按钮长度占用户设备屏的阔度的百分比,填整数,e.g.50。但此百分比是受您的应用页设计设定影响。';}else if($_SESSION[tn]==EN){echo 'It is the length percentage[width] relating to the device screen of APP user. You need to enter integer, e.g. 50. This length will be affected by your page design setting.';}else{echo '按鈕長度佔用戶設備屏的闊度的百分比,填整數,e.g.50。但此百分比是受您的應用頁設計設定影響。';}?></p>
	<hr>
<!--<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '链结/POPUP内容 URL';}else if($_SESSION[tn]==EN){echo 'Link/popup content URL';}else{echo '鏈結/POPUP內容 URL';}?></b>
<?php if($_SESSION[tn]==PRC){echo '链结应填应用页的url,e.g. 1.html,popup能填应用页或图像,使用应用内的图像,档案须存於panel/'.$roww[pjnbr].'/images档夹内e.g. picture.png。';}else if($_SESSION[tn]==EN){echo 'You can only use app/web page for link style. e.g. 1.html. You can use app/web page or picture for popup style. If you use the APP pictures, you need to prepare pictures and store them in  panel/'.$roww[pjnbr].'/images folder.';}else{echo '鏈結應填應用頁的url,e.g. 1.html,popup能填應用頁或圖像,使用應用內的圖像,檔案須存於panel/'.$roww[pjnbr].'/images檔夾內e.g. picture.png。';}?><BR>

	<?php if($_SESSION[tn]==PRC){echo '您能点选\'专案应用页链结\',此按钮作用是到此功能页。';}else if($_SESSION[tn]==EN){echo 'You can select the APP page on the \'Link of Project APP Page\' so the function of button becomes \'go to the selected APP page\'.';}else{echo '您能點選\'專案應用頁鏈結\',此按鈕作用是到此功能頁。';}?><BR>
	<?php if($_SESSION[tn]==PRC){echo '只键入#是此按钮作用是返上一页。';}else if($_SESSION[tn]==EN){echo 'You can enter # only so the function of button becomes \'go to previous APP page\'.';}else{echo '只鍵入#是此按鈕作用是返上一頁。';}?></p>!-->

	</div>
</div><div class="ui-block-d">

<a href="#tpsn" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini">? <?php if($_SESSION[tn]==PRC){echo '电邮/电话按钮';}else if($_SESSION[tn]==EN){echo 'Email/phone button';}else{echo '電郵/電話按鈕';}?></a>
	<div data-role="popup" id="tpsn" style="min-width:300px;max-width:85%" data-position-to="window" data-theme="f"><a href="#" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext ui-btn-right" data-rel="back"></a>
	<p><b><?php if($_SESSION[tn]==PRC){echo '解释';}else if($_SESSION[tn]==EN){echo 'Explanation';}else{echo '解釋';}?></b></p>
	<p><b style="color:black"><?php if($_SESSION[tn]==PRC){echo '使用';}else if($_SESSION[tn]==EN){echo 'Use';}else{echo '使用';}?></b></p>
	<p><?php if($_SESSION[tn]==PRC){echo '限适用的移动电话应用。用户点撀按钮能使用设备相关功能或应用。电话号限1个,电邮用;号隔开。您须键入tel:及mailto:作前端。e.g. tel:12345678 或 mailto:example@yahoo.com;examples@yahoo.com; 。';}else if($_SESSION[tn]==EN){echo 'It is for appropriate mobile device only. User clicks the related button to use related function or application of the device. You can only enter one phone number or use ; as seperator for email accounts. You need to enter tel: for phone number and mailto: for email accounts. e.g. tel:12345678 or mailto:example@yahoo.com;examples@yahoo.com;';}else{echo '限適用的移動電話應用。用戶點撀按鈕能使用設備相關功能或應用。電話號限1個,電郵用;號隔開。您須鍵入tel:及mailto:作前端。e.g. tel:12345678 或 mailto:example@yahoo.com;examples@yahoo.com; 。';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '一个按钮限键入电邮或电话。';}else if($_SESSION[tn]==EN){echo 'You can only enter phone number or mail for a button.';}else{echo '一個按鈕限鍵入電郵或電話。';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '在修改时,此项填在\'POPUP内容 URL\'内。';}else if($_SESSION[tn]==EN){echo 'You need to enter the phone number or mail to \'popup content URL\' in amendment situation.';}else{echo '在修改時,此項填在\'POPUP內容 URL\'內。';}?></p>
		<p><?php if($_SESSION[tn]==PRC){echo '对於电邮按钮,您亦试加标题及内容,格式是mailto:email account?subject=subject content&body=body content。e.g. mailto:example@yahoo.com?subject=您的电邮标题&body=您的电邮内容。';}else if($_SESSION[tn]==EN){echo 'You need to try to add title and content value to email button. The format is mailto:email account?subject=subject content&body=body content. e.g mailto:example@yahoo.com?subject=your email title&body=your email content';}else{echo '對於電郵按鈕,您亦試加標題及內容,格式是mailto:email account?subject=subject content&body=body content。e.g. mailto:example@yahoo.com?subject=您的電郵標題&body=您的電郵內容';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '在body内容是用%0d%0a作为换行。';}else if($_SESSION[tn]==EN){echo 'You can use %0d%0a as line break in body content.';}else{echo '在body內容是用%0d%0a作為換行。';}?></p>
		<p><?php if($_SESSION[tn]==PRC){echo '您亦到访本司网站,有进一步指引或资讯。';}else if($_SESSION[tn]==EN){echo 'You can visit our website to get more information.';}else{echo '您亦到訪本司網站,有進一步指引或資訊。';}?></p>
	</div>
</div>
</div>
	<hr>
	<div class="ui-grid-d"><div class="ui-block-a"></div><div class="ui-block-b"><?php if($typvlu[$tm]=='quick'){?><a href="listvw.php?ap=<?php echo htmlspecialchars($roww[ap])?>&pj=<?php echo htmlspecialchars($roww[pjnbr])?>&pn=<?php echo htmlspecialchars($pn)?>&tm=<?php echo htmlspecialchars($tmvlu[$tm])?>&sn=1" class="ui-btn" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo ' popup选项数据按钮';}else if($_SESSION[tn]==EN){echo 'Quick button data';}else{echo 'popup選項數據按鈕';}?></a><?php ;}?></div><div class="ui-block-c"><?php if($tm){?><a href="listviewn.php?ap=<?php echo htmlspecialchars($roww[ap])?>&pj=<?php echo htmlspecialchars($roww[pjnbr])?>&pn=<?php echo htmlspecialchars($pn)?>" class="ui-btn" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo '再增加新数据';}else if($_SESSION[tn]==EN){echo 'Add new data';}else{echo '再增加新數據';}?></a><?php ;}?></div><div class="ui-block-d">
	<?php if(sizeof($tbg)>=3 and $tm){?>
	<select name="ord" data-theme="b">
	<option value=" "><?php if($_SESSION[tn]==PRC){echo '插入';}else if($_SESSION[tn]==EN){echo 'Insert';}else{echo '插入';}?></option>
	<?php for($i=1;$i<sizeof($tbg);$i++){
	if($i!=$tm and $i!=$tm+1){?><option value="<?php echo $i?>"><?php echo '['.$i.'] ';echo htmlspecialchars($ftrvlu[$i])?></option>
	<?php ;};}?>
	</select><?php ;}?></div><div class="ui-block-e"><?php if($tm){?><input name="dlt" id="dlt" type="checkbox" data-theme="e" ><label for="dlt"><?php if($_SESSION[tn]==PRC){echo '刪除';}else if($_SESSION[tn]==EN){echo 'Delete';}else{echo '刪除';}?></label><?php ;}?></div></div>
	</FORM>
<hr>
<?php 
if(sizeof($tbg)){
echo '<div data-corners="false" data-role="listview" data-inset="true">';}
for($i=1;$i<sizeof($tbg);$i++){
echo '<li data-icon="edit"><a href="listviewn.php?ap='.htmlspecialchars($roww[ap]).'&pj='.htmlspecialchars($roww[pjnbr]).'&pn='.htmlspecialchars($pn).'&tm='.$i.'" data-ajax="false">';
echo  '['.$i.']&nbsp;&nbsp;&nbsp;';
if($titlevlu[$i])echo  '<span style="color:'.htmlspecialchars($tclrvlu[$i]).'">'.htmlspecialchars($titlevlu[$i]).'</span>';
if($ftrvlu[$i])echo  '<br><span style="color:'.htmlspecialchars($ftrclrvlu[$i]).'">'.htmlspecialchars($ftrvlu[$i]).'</span>';

echo '</a></li>';
;}
if(sizeof($tbg))echo '</div>';
?>
	<hr>
	
<?php
if(sizeof($tbg)>1){
if($_SESSION[tn]==PRC){echo '您的设计';}else if($_SESSION[tn]==EN){echo 'Your design';}else{echo '您的設計';}

if($tabshtml){
	$tabshtmln = str_replace('(images/','(../panel/'.$roww[pjnbr].'/images/',$tabshtml);
	echo '<!--part'.str_replace('"images/','"../panel/'.$roww[pjnbr].'/images/',$tabshtmln);}
}

?>
<hr>	


<?php if($_SESSION[tn]==PRC){echo '例';}else if($_SESSION[tn]==EN){echo 'Examples';}else{echo '例';}?>
<div class="ui-grid-solo"><a href="#popup" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-b ui-btn-inline" style="padding:1px;"><h1 style="margin:0px;color:"><span class="pigss-bigsale"></span></h1><span style="padding:0px;color:"><?php if($_SESSION[tn]==PRC){echo 'popup型式';}else if($_SESSION[tn]==EN){echo 'popup type';}else{echo 'popup型式';}?></span></a><a  href="#15vw1n1" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-f ui-btn-inline" style="padding:1px;background-image:url(sw,jpg);background-size:100%;background-repeat:repeat-y;"><h1 style="margin:0px;color:"><span class="pigss-bigsale" style="color:blue"></span></h1><span style="padding:0px;color:pink"><?php if($_SESSION[tn]==PRC){echo 'popup选项';}else if($_SESSION[tn]==EN){echo 'quick button';}else{echo 'popup選項';}?></span></a><a href="#" class="ui-btn ui-btn-z ui-btn-inline" style="padding:1px;background-image:url(sw,jpg);background-size:100%;background-repeat:repeat-y;"><h1 style="margin:0px;color:"><span class="pigss-gift" style="color:blue"></span></h1><span style="padding:0px;"><?php if($_SESSION[tn]==PRC){echo '标 题';}else if($_SESSION[tn]==EN){echo 'title';}else{echo '標 題';}?></span></a><a href="#" class="ui-btn ui-btn-w ui-btn-inline" style="padding:1px;background-image:url(sw,jpg);background-size:100%;background-repeat:repeat-y;"><h1 style="margin:0px;color:"><span class="pigss-gift" style="color:brown"></span></h1><span style="padding:0px;color:blue"><?php if($_SESSION[tn]==PRC){echo '标 题';}else if($_SESSION[tn]==EN){echo 'title';}else{echo '標 題';}?></span></a></div>

<a href="#quick" data-rel="popup" data-transition="pop" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-mini">? <?php if($_SESSION[tn]==PRC){echo '解释';}else if($_SESSION[tn]==EN){echo 'Explanation';}else{echo '解釋';}?> <?php if($_SESSION[tn]==PRC){echo 'popup选项';}else if($_SESSION[tn]==EN){echo ' quick button';}else{echo 'popup選項';}?></a>
	<div data-role="popup" id="quick" style="min-width:300px;max-width:85%" data-position-to="window" data-theme="f"><a class="popn ui-btn ui-btn-w ui-icon-delete ui-btn-icon-notext ui-btn-right" href="#" data-rel="back">Close</a>
	<h4 style="color:pink"><?php if($_SESSION[tn]==PRC){echo '使用';}else if($_SESSION[tn]==EN){echo 'Use';}else{echo '使用';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '此功能须使用表格功能。';}else if($_SESSION[tn]==EN){echo 'You need to use the form function page with this function.';}else{echo '此功能須使用表格功能。';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '此功能亦含价格计算,但结果只供参考。';}else if($_SESSION[tn]==EN){echo 'This function contains price calculation but the result is for reference only.';}else{echo '此功能亦含價錢計算,但結果只供參考。';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '您能设置下一步提示。';}else if($_SESSION[tn]==EN){echo 'You can add next step tip.';}else{echo '您能設置下一步提示。';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '选项能被重覆选择。';}else if($_SESSION[tn]==EN){echo 'The options can be selected repeatedly.';}else{echo '選項能被重覆選擇。';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '您能在一个选项键入不同的语文。';}else if($_SESSION[tn]==EN){echo 'You may enter different languages to an option value.';}else{echo '您能在一個選項鍵入不同的語文。';}?></p>
	<p><?php if($_SESSION[tn]==PRC){echo '您应在选项内设定表达取消的选项。';}else if($_SESSION[tn]==EN){echo 'You may need to add a cancel item as option.';}else{echo '您應在選項內設定表達取消的選項。';}?></p><hr>
	
	<h4 style="color:pink"><?php if($_SESSION[tn]==PRC){echo '应用用户的使用步骤';}else if($_SESSION[tn]==EN){echo 'Usage steps for APP user';}else{echo '應用用戶的使用步驟';}?></h4><hr>
	<h4 style="color:blue"><?php if($_SESSION[tn]==PRC){echo '选项';}else if($_SESSION[tn]==EN){echo 'Option selection';}else{echo '選項';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '用户点撀相关选项按钮,popup显示选项,用户点选选项,选项显示在右侧控制页面上,选项自动加上序号。';}else if($_SESSION[tn]==EN){echo 'APP user clicks the related quick button to show options on a popup and clicks quick button to select option. The selected option will be showed on right side panel and  will be added a sequential number automatically.';}else{echo '用戶點撀相關選項按鈕,popup顯示選項,用戶點選選項,選項顯示在右側控制頁面上,選項自動加上序號。';}?></p>
	<h4 style="color:blue"><?php if($_SESSION[tn]==PRC){echo '提示';}else if($_SESSION[tn]==EN){echo 'Next step tip';}else{echo '提示';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '若上列选项巳设提示,用户按提示点撀下一个选项按钮。';}else if($_SESSION[tn]==EN){echo 'If you add next step tip for the selected option, APP user can follow the tip to select next necessary item.';}else{echo '若上列選項巳設提示,用戶按提示點撀下一個選項按鈕。';}?></p>
	<h4 style="color:blue"><?php if($_SESSION[tn]==PRC){echo '修改';}else if($_SESSION[tn]==EN){echo 'Amendment';}else{echo '修改';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '在popup选项内,用户点撀指定按钮能浏览右侧控板页面,用户点选上面的巳选的选项,popup选项再显示,点选进行修改。';}else if($_SESSION[tn]==EN){echo 'APP user can click a specific button on the option popup to show the right panel and can click the selected option on the panel to show the popup of options. APP user can click on selected item to show the popup of options again for amendment.';}else{echo '在popup選項內,用戶點撀指定按鈕能瀏覽右側控板頁面,用戶點選上面的巳選的選項,popup選項再顯示,點選進行修改。';}?></p>
	<h4 style="color:blue"><?php if($_SESSION[tn]==PRC){echo '次序';}else if($_SESSION[tn]==EN){echo 'Sequence';}else{echo '次序';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '巳选的选项均被编上序号,用户能点撀相关巳选项目的次序的POPUP进行修改。';}else if($_SESSION[tn]==EN){echo 'A sequential number is added to the selected options. APP User can click the related popup button about sequence of selected items and amend their sequence on the popup.';}else{echo '巳選的選項均被編上序號,用戶能點撀相關巳選項目的次序的POPUP進行修改。';}?></p>
	<h4 style="color:blue"><?php if($_SESSION[tn]==PRC){echo '刪除';}else if($_SESSION[tn]==EN){echo 'Delete';}else{echo '刪除';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '用户只能用修改的方法,点选表达取消的选项。';}else if($_SESSION[tn]==EN){echo 'APP user can use the above mentioned amendment method to select a cancel option.';}else{echo '用戶只能用修改的方法,點選表達取消的選項。';}?></p>
	<h4 style="color:blue"><?php if($_SESSION[tn]==PRC){echo '送交数据';}else if($_SESSION[tn]==EN){echo 'Send data';}else{echo '送交數據';}?></h4>
	<p><?php if($_SESSION[tn]==PRC){echo '在右侧控板页面,用户点撀指定按钮将数据交到表格功能的应用页,用户在表格应用页填写资料(若有),才送交数据到指定伺服器或电邮户口。';}else if($_SESSION[tn]==EN){echo 'APP user can click a specific button to send data to a form function page on the data panel. If necessary, the APP user can fill in data on the form page and send finished data to a server or email account. ';}else{echo '在右側控板頁面,用戶點撀指定按鈕將數據交到表格功能的應用頁,用戶在表格應用頁填寫資料(若有),才送交數據到指定伺服器或電郵戶口。';}?></p>
	</div><BR>


<div data-role="popup" id="15vw" data-theme="a" style="padding:5px;height: 100%;width: 100%;top:0;left:-15px;overflow-y:hidden;" class="ifrwidthpn">
<a href="#" id="15panelpop" data-pop="" class="ui-btn ui-btn-w ui-btn-inline ui-btn-icon-left ui-icon-delete">&nbsp;</a><a href="#" class="ui-btn ui-btn-w ui-btn-inline ui-btn-icon-left ui-icon-mail">SEND FORM</a>
<a href="#15vwv" data-rel="popup" id="15vwvp" data-transition="slideup" class="ui-btn ui-btn-w ui-btn-inline ui-btn-icon-left ui-icon-bullets">&nbsp;</a>
<div id="15vwv" data-role="popup" data-theme="f" data-corners="false" class=""><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><div class="vwshgts webkitm" style="overflow-y:auto;">
<div id="15vwvn" class="vws ui-content" style="width:80%"></div>
</div></div>

<div id="15vwtips" class="vws ui-grid-solo" style="width:50%;position:absolute;right:0;top:0;overflow-y:auto;display:none;"></div>
<div id="15vwtipop" data-role="popup" data-theme="z" style="background:rgb(35, 145, 234);color:pink;padding:5px;height: 100%;width: 100%;top:0;left:-15px;" data-corners="false" class="vws ifrwidthps"><a href="#" id="15vwtipoppopn" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><div id="15vwtipops" class="webkitm"><div></div></div></div>
<div class="vws ui-grid-solo"><div class="ui-grid-solo" id="15vlucount"  style=""></div><div class="ui-grid-solo" id="15vlucounts"  style=""></div></div><HR>
<div id="15vwdatn" class="ui-grid-solo"><br></div>
<div class="15vwshgtns webkitm" style="overflow-y:auto;padding:5px;height: 100%;width: 100%;top:0;left:-15px;">
<div id="15vwdata" class="vws ui-grid-solo" style="width:80%"></div>
</div>
</div>

<div id="15vw1n1" data-role="popup" data-theme="a" data-corners="false" style="overflow-y:auto;padding:5px;height: 100%;width: 100%;top:0;left:-15px;" class="vwspopups ifrwidthps"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><br><br><br>
<ul data-role="listview">
    <li data-icon="false" data-theme="b"><a href="#" class="15sltptn" data-popup="#15vw1n1" data-option="<?php if($_SESSION[tn]==PRC){echo '选项';}else if($_SESSION[tn]==EN){echo 'option';}else{echo '選項';}?>"  style="background-color:;"><?php if($_SESSION[tn]==PRC){echo '选项';}else if($_SESSION[tn]==EN){echo 'option';}else{echo '選項';}?></a></li>
    <li data-icon="false" data-theme="f"><a href="#" class="15sltptn" data-popup="#15vw1n1" data-option="<?php if($_SESSION[tn]==PRC){echo '选项1';}else if($_SESSION[tn]==EN){echo 'option 1';}else{echo '選項1';}?>"  style="background-color:;"><?php if($_SESSION[tn]==PRC){echo '选项1';}else if($_SESSION[tn]==EN){echo 'option 1';}else{echo '選項1';}?></a></li>
    <li data-icon="false" ><a href="#" class="15sltptn" data-popup="#15vw1n1" data-option="<?php if($_SESSION[tn]==PRC){echo '选项2';}else if($_SESSION[tn]==EN){echo 'option 2';}else{echo '選項2';}?>" data-rel="panel"><?php if($_SESSION[tn]==PRC){echo '选项2';}else if($_SESSION[tn]==EN){echo 'option 2';}else{echo '選項2';}?></a></li>
    <li data-icon="false" data-theme="f"><a href="#" class="15sltptn" data-popup="#15vw1n1" data-option="<?php if($_SESSION[tn]==PRC){echo '选项5';}else if($_SESSION[tn]==EN){echo 'option 5';}else{echo '選項5';}?>" ><?php if($_SESSION[tn]==PRC){echo '选项5';}else if($_SESSION[tn]==EN){echo 'option 5';}else{echo '選項5';}?></a></li>
</ul></div>

<div id="popup" data-role="popup" data-theme="z" data-corners="false" class="ifrwidthp" ><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><img style="width:100%" src="../images/lansw.jpg"></div>



<script src="../js/appsystem.js"></script>

<script>

var windowWidth = $(window).width();var windowHeight =  $(window).height(); 
fastbtn("1","5",windowHeight,windowWidth);

$(".iconbtn").click(function() {
$('#title').val($(this).attr('id'));$('#icons').popup('close');
});

$('#webhtml').css('max-height',$(window).height()*0.85);
$('.webhtml').click(function (event){
	event.preventDefault();
	$('#img').val('#'+$(this).attr('data-value'));
	$('#webhtml').popup('close');
;})
$('.webhtm').click(function (event){
	event.preventDefault();
	$('#img').val($(this).attr('data-value'));
	$('#webhtml').popup('close');
;})

</script>


<script>


</script>

<hr>
	<div class="copyright">&copy; 2015 Lee Wai Kwok(Hong Kong). JSTRUST CONSULTANCY. <?php if($_SESSION[tn]==PRC){echo '版权所有';}else if($_SESSION[tn]==EN){echo 'All Rights Reserved.';}else{echo '版權所有';}?></div>
	
			<div id="imgspop" data-theme="z" style="padding:5px;" data-role="popup" data-corners="false"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><div class="ifrspinn" style="position:relative;left:50%;width:100%">Loading...<BR><img src="css/images/ajax-loader.gif"></div><div class="imgspop"><img src=""></div></div>
		<div id="ifrspop" data-theme="z" data-role="popup" data-corners="false" style="overflow-y:auto;height:100%;width:100%;top:0;left:-15px;" class="ifrwidthpn" ><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><div class="ifrspinn" style="position:relative;left:50%;width:100%">Loading...<BR><img src="css/images/ajax-loader.gif"></div><iframe src="" style="width:100%" seamless frameBorder="0" ></iframe></div>	
		<div class="ui-content" id="pVideo" data-corners="false" data-role="popup" data-theme="x" data-tolerance="2,2"><iframe width="498" height="298" src="" seamless=""></iframe></div><div id="pAudio" data-corners="false"  data-role="popup" data-theme="a"  style="padding:5px;height: 100%;width: 100%;top:0;left:-15px;" class="ifrwidthps"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><br><br><i id="audtn" ></i> &nbsp;<i id="audur"></i><br><a href="#"  id="playaudion" data-vlu="" style="border:none;" class="ui-btn ui-btn-w"><img style="width:50px" src="css/images/sound.svg"></a><BR><input id="volmn" type="range" data-role="none" value="0.8"  step="0.1" min="0" max="1"><BR><input id="toposn" type="range" data-role="none" value="0" step="0.01" min="0" max="1"><div id="volmndiv"><input id="volmnapp" type="range"  value="0.8"  step="0.1" min="0" max="1"></div><BR><div id="toposndiv"><input id="toposnapp" type="range"  value="0" step="0.01" min="0" max="1"></div><audio id="audsn"><source src="" type="audio/mpeg"><source src="" type="audio/wav"></audio><div class="ifrspinn" style="position:relative;left:50%;width:100%">Loading...<BR><img src="css/images/ajax-loader.gif"></div></div>
	
	<div id="navigations" data-role="popup" data-theme="none">
	<ul style="min-width:210px;" data-role="listview" data-inset="true">
	<li data-icon="edit"><a href="design.php" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo '设计步骤';}else if($_SESSION[tn]==EN){echo 'Design Step';}else{echo '設計步驟';}?></a></li>
	<!--<li><a href="deignote.php" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo '设计笔记';}else if($_SESSION[tn]==EN){echo 'Design Note';}else{echo '設計筆記';}?></a></li>!-->
	<li><a href="project.php" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo '专案管理';}else if($_SESSION[tn]==EN){echo 'Project Management';}else{echo '專案管理';}?></a></li>
	<li><a href="tool.php" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo '工具';}else if($_SESSION[tn]==EN){echo 'Tools';}else{echo '工具';}?></a></li>


	<li><a href="explanation.php" data-ajax="false"><?php if($_SESSION[tn]==PRC){echo '解释';}else if($_SESSION[tn]==EN){echo 'Explanation';}else{echo '解釋';}?></a></li>

	

	</ul></div><!-- /navigation -->			
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

</div>
</body></html>

<?php 
$tdy=0;
$tdy=date('Y-m-d');
if($_POST[title] and $pj and $_SESSION[guanyin1] and $_SESSION[guanyin1]==$_POST[guanyin1]){

	if($ap and !preg_match('/^[0-9]*$/', $ap))exit;
	if($pj and !preg_match('/^[0-9]*$/', $pj))exit;	
	if($tm and !preg_match('/^[0-9]*$/', $tm))exit;	

if($_POST[dlt] and $tm){
	
	$tbg = str_replace('<!--syslistviewnsys!-->','',$tabshtml);
	$ultbg = explode('</div><!--ul!-->',$tbg);
	
	$tbg = explode('<!--item!-->',$ultbg[0]);
	$popup = str_replace('<div class="swiper-slide"><div id="'.$pj.$ap.'vnts'.$pn.'" class="vntsns vtnn">','',$tbg[0]);
	for($i=1;$i<sizeof($tbg);$i++){
		if($i==$tm){$popup .= '';}
		else{$popup .= '<!--item!-->'.$tbg[$i];}
	;}
	
	if(strpos($ultbg[1],'<!--itemvws'.$tmvlu[$tm].'!-->')!==false){
		$tbgs = explode('<!--itemvws'.$tmvlu[$tm].'!-->',$ultbg[1]);
		$ul = '</div><!--ul!-->';
		if(strpos($tbgs[1],'<!--itemvws')!==false){
			$ultbgn = explode('<!--itemvws',$tbgs[1]);
			$popup = $popup.$ul.str_replace('<!--itemvws'.$tmvlu[$tm].'!-->'.$ultbgn[0],'',$ultbg[1]);
		}else{
			$popup = $popup.$ul.str_replace('<!--itemvws'.$tmvlu[$tm].'!-->'.$tbgs[1],'',$ultbg[1]);
		;}
	;}else{
		$popup = $popup.'</div><!--ul!-->'.$ultbg[1];
	;}
	
	
	
}else if($_POST['ord'] and preg_match('/^[0-9]*$/', $_POST['ord']) and $tm){
	$insert=$_POST['ord'];
	$tbg = str_replace('<!--syslistviewnsys!-->','',$tabshtml);
	
		$ultbg = explode('</div><!--ul!-->',$tbg);
	
	
	$tbg = explode('<!--item!-->',$ultbg[0]);
	$popup = str_replace('<div class="swiper-slide"><div id="'.$pj.$ap.'vnts'.$pn.'" class="vntsns vtnn">','',$tbg[0]);
	for($i=1;$i<sizeof($tbg);$i++){
		if($i==$insert){	
			$popup .= '<!--item!-->'.$tbg[$tm].'<!--item!-->'.$tbg[$i];}
		else if($i==$tm){$popup .= '';}
		else{$popup .= '<!--item!-->'.$tbg[$i];}
	;}
		
		$popup = $popup.'</div><!--ul!-->'.$ultbg[1];
	

}else if($_POST[title] and $tm){

	$tbg = str_replace('<!--syslistviewnsys!-->','',$tabshtml);
	
	$ultbg = explode('</div><!--ul!-->',$tbg);
	
	$tbg = explode('<!--item!-->',$ultbg[0]);
	
	$popup = str_replace('<div class="swiper-slide"><div id="'.$pj.$ap.'vnts'.$pn.'" class="vntsns vtnn">','',$tbg[0]);
	for($i=1;$i<sizeof($tbg);$i++){
		if($i==$tm){
			if($_POST[imgbg]){
			$bgtheme = 'b';
			if(strpos($_POST[imgbg],'http://')!==false or strpos($_POST[imgbg],'https://')!==false){$images = '';}else{$images = 'images/';}
			if(strlen($_POST[imgbg])==1){$bghtml = '';$bgtheme = htmlspecialchars($_POST[imgbg]);}		
			else if(strpos($_POST[imgbg],'#')!==false or strpos($_POST[imgbg],'rgba(')!==false  or strpos($_POST[imgbg],'rgb(')!==false){$bghtml = 'background-color:'.htmlspecialchars($_POST[imgbg]).';';}
			else if(strpos($_POST[imgbg],'[xy]')!==false and $_POST[typ]!='divider'){$bghtml = 'background-image:url('.$images.htmlspecialchars($_POST[imgbg]).');';}
			else if($_POST[typ]!='divider'){$bghtml = 'background-image:url('.$images.htmlspecialchars($_POST[imgbg]).');background-size:100%;background-repeat:repeat-y;';}
			;}else{$bghtml = '';$bgtheme = 'b';}
			
			$imgspop='';
			if($_POST[img]=='#'){$popuprel= 'data-rel="back" data-transition="slide"';}
			else if(strpos($_POST[img],'#')===0){$popuprel= ' data-transition="slide"';$href = htmlspecialchars($_POST[img]);}
			else if($_POST[typ]=='divider'){$divider = 'data-role="list-divider"';$popuprel= '';}
			else if($_POST[typ]=='popup'){if(strpos($_POST[img],'http://')!==false or strpos($_POST[img],'https://')!==false or strpos($_POST[img],'.html')!==false){$imgs = '';}else{$imgs = 'images/';}
			$imgspop= ' imgspop';$popuprel= ' data-pop="'.$pj.$ap.'" data-url="'.$imgs.htmlspecialchars(trim($_POST[img])).'"';}
			else if($_POST[typ]=='quick'){$popuprel= ' data-rel="popup" data-transition="pop"';}//$quick=' class="porkquick"';
			else if($_POST[typ]=='shw'){$popuprel= ' data-rel="popup" data-transition="pop"';}
			$imgs = '';
			
			if($_POST[typ]=='divider'){$href = '#';$td=';text-decoration:none;';}
			else if($_POST[typ]=='quick'){$href = '#'.$pj.$ap.'vw'.$pn.'n'.$tmvlu[$tm];}
			else if($_POST[typ]=='shw'){$href = '#'.$pj.$ap.'vw';}
			else if($_POST[typ]=='popup'){$href = '#';}
			else{$href = str_replace('&amp;','&',htmlspecialchars($_POST[img]));
			//if(strpos($_POST[img],'http://')!==false or strpos($_POST[img],'https://')!==false){$target = ' target="_blank"';}else{$target = '';}
			}
			
			$data = '<!--data'.str_replace('&amp;','&',htmlspecialchars($_POST[img])).'@#@'.htmlspecialchars($_POST[typ]).'@#@'.htmlspecialchars($_POST[title]).'@#@'.htmlspecialchars($_POST[imgftr]).'@#@'.htmlspecialchars($_POST[tclr]).'@#@'.htmlspecialchars($_POST[ftrclr]).'@#@'.htmlspecialchars($_POST[imgbg]).'@#@'.htmlspecialchars($tmvlu[$tm]).'@#@'.htmlspecialchars($_POST[borderbg]).'@#@'.htmlspecialchars($_POST[width]).'data!-->';				
			
			$popup .= '<!--item!-->'.$data;
			
			$btntheme = 'class="ui-btn ui-btn-'.$bgtheme.$imgspop.' ui-btn-inline"';$padding = 'padding:1px;';
			
			if($_POST[borderbg]=='none'){$dividerborderbg = 'border:none;';}else if($_POST[borderbg]){$dividerborderbg = 'border-color:'.htmlspecialchars($_POST[borderbg]).';';}else{$dividerborderbg = '';}
			if($_POST[width] and preg_match('/^[0-9.]*$/',$_POST[width])){$width = 'width:'.htmlspecialchars($_POST[width]).'%;';}else{$width = '';}
			
			if($width or $dividerborderbg or $padding or $bghtml or $td){$hrefstyle = 'style="'.$width.$dividerborderbg.$padding.htmlspecialchars($bghtml).$td.'"';}else{$hrefstyle = '';}

			$popup .= '<a href="'.$href.'" '.$btntheme.$popuprel.$target.' '.$hrefstyle.'>';
			
	
			if($_POST[imgtbn]){
			if(strpos($_POST[imgtbn],'http://')!==false or strpos($_POST[imgtbn],'https://')!==false){$images = '';}
			else{$images = 'images/';}
			$popup .= '<img src="'.$images.htmlspecialchars($_POST[imgtbn]).'">';
			}
			
			if($_POST[tclr]){$tclrstyle = 'color:'.htmlspecialchars($_POST[tclr]).';';}else{$tclrstyle = '';}

			$popup .= '<h1 style="margin:0px;'.$tclrstyle.'"><span class="'.htmlspecialchars($_POST[title]).'"></span></h1>';
			
			if($_POST[ftrclr]){$ftrclrstyle = 'color:'.htmlspecialchars($_POST[ftrclr]).';';}else{$ftrclrstyle = '';}

			if($_POST[imgftr])$popup .= '<span style="padding:0px;'.$ftrclrstyle.'">'.htmlspecialchars($_POST[imgftr]).'</span>';

			
				$popup .= '</a>';
				
		;}else{$popup .= '<!--item!-->'.$tbg[$i];}
	;}
	
	
	$tbgs = explode('<!--itemvws'.$tmvlu[$tm].'!-->',$ultbg[1]);
	
	if($_POST[typ]=='quick')$popups = '<!--itemvws'.htmlspecialchars($tmvlu[$tm]).'!-->';
	
			
	if($tbgs[1]){		
		
		$popup = $popup.'</div><!--ul!-->'.$ultbg[1];	
		
		
	}else{	
		$popup = $popup.'</div><!--ul!-->'.$tbgs[0].$popups;
		
	;}

}else if($_POST[title] and !$tm){
	$tabshtml = str_replace('<!--syslistviewnsys!-->','',$tabshtml);
	
	if($_POST[imgbg]){
	$bgtheme = 'b';
			if(strpos($_POST[img],'http://')!==false or strpos($_POST[imgbg],'https://')!==false){$images = '';}else{$images = 'images/';}
			if(strlen($_POST[img])==1){$bghtml = '';$bgtheme = htmlspecialchars($_POST[imgbg]);}		
			else if(strpos($_POST[imgbg],'#')!==false or strpos($_POST[imgbg],'rgba(')!==false  or strpos($_POST[imgbg],'rgb(')!==false){$bghtml = 'background-color:'.htmlspecialchars($_POST[imgbg]).';';}
			else if(strpos($_POST[imgbg],'[xy]')!==false and $_POST[typ]!='divider'){$bghtml = 'background-image:url('.$images.htmlspecialchars($_POST[imgbg]).');';}
			else if($_POST[typ]!='divider'){$bghtml = 'background-image:url('.$images.htmlspecialchars($_POST[imgbg]).');background-size:100%;background-repeat:repeat-y;';}
	;}else{$bghtml = '';$bgtheme = 'b';}
	
	if($_POST[typ]=='popup' or $_POST[typ]=='quick'){$popuprel= ' data-rel="popup" data-transition="pop"';}
	
	if($_POST[imgbg]=='#'){$popuprel= 'data-rel="back" data-transition="slide"';}
	else if(strpos($_POST[imgbg],'#')===0){$popuprel= ' data-transition="slide"';$href = htmlspecialchars($_POST[img]);}
	else if($_POST[typ]=='divider'){$href = '#';}
	else if($_POST[typ]=='popup' or $_POST[typ]=='quick'){$href = '#'.$pj.$ap.'vw'.$pn.'n'.($tabsnvlu+1);}
	else if($_POST[typ]=='shw'){$popuprel= 'data-rel="popup"';$href = '#'.$pj.$ap.'vw';}
	else{$href = str_replace('&amp;','&',htmlspecialchars($_POST[img]));
	//if(strpos($_POST[img],'http://')!==false or strpos($_POST[img],'https://')!==false){$target = ' target="_blank"';}else{$target = '';}
	}
	
	$data = '<!--data'.str_replace('&amp;','&',htmlspecialchars($_POST[img])).'@#@'.htmlspecialchars($_POST[typ]).'@#@'.htmlspecialchars($_POST[title]).'@#@'.htmlspecialchars($_POST[imgftr]).'@#@'.htmlspecialchars($_POST[tclr]).'@#@'.htmlspecialchars($_POST[ftrclr]).'@#@'.htmlspecialchars($_POST[imgbg]).'@#@'.htmlspecialchars($tabsnvlu+1).'@#@'.htmlspecialchars($_POST[borderbg]).'@#@'.htmlspecialchars($_POST[width]).'data!-->';	
						
	$popup .= '<!--item!-->'.$data;
	
	$btntheme = 'class="ui-btn ui-btn-'.$bgtheme.' ui-btn-inline"';$padding = 'padding:1px;';
	
	if($_POST[borderbg]=='none'){$dividerborderbg = 'border:none;';}else if($_POST[borderbg]){$dividerborderbg = 'border-color:'.htmlspecialchars($_POST[borderbg]).';';}else{$dividerborderbg = '';}
	if($_POST[width] and preg_match('/^[0-9.]*$/',$_POST[width])){$width = 'width:'.htmlspecialchars($_POST[width]).'%;';}else{$width = '';}
	
	if($width or $dividerborderbg or $padding or $bghtml){$hrefstyle = 'style="'.$width.$dividerborderbg.$padding.htmlspecialchars($bghtml).'"';}else{$hrefstyle = '';}
	$popup .= '<a href="'.$href.'" '.$btntheme.$popuprel.$target.' '.$hrefstyle.'>';
	
	if($_POST[imgtbn]){
	if(strpos($_POST[imgtbn],'http://')!==false or strpos($_POST[imgtbn],'https://')!==false){$images = '';}else{$images = 'images/';}
	$popup .= '<img src="'.$images.htmlspecialchars($_POST[imgtbn]).'">';
	}
	
	if($_POST[tclr]){$tclrstyle = 'color:'.htmlspecialchars($_POST[tclr]).';';}else{$tclrstyle = '';}
	$popup .= '<h1 style="margin:0px;'.$tclrstyle.'"><span class="'.htmlspecialchars($_POST[title]).'"></span></h1>';
	
	if($_POST[imgftr]){
		if($_POST[ftrclr]){$ftrclrstyle = 'color:'.htmlspecialchars($_POST[ftrclr]).';';}else{$ftrclrstyle = '';}
		$popup .= '<span style="padding:0px;'.$ftrclrstyle.'">'.htmlspecialchars($_POST[imgftr]).'</span>';
	}
		
	$popup .= '</a>';

	if($tabshtml){	
		$popup = str_replace('</div><!--ul!-->',$popup.'</div><!--ul!-->',$tabshtml);	
	}else{
		$popup = '<div class="ui-grid-solo" style="padding-left:5px;">'.$popup.'</div><!--ul!-->';
	}
}////if($_POST[dlt] and $owlnbr){


if($roww[theme]){$theme = $roww[theme];}else{$theme = '';}
			
			if($roww[bg]){$roww[bg]=str_replace('/','',$roww[bg]);$roww[bg]=str_replace('\\','',$roww[bg]);$roww[bg]=str_replace('..','',$roww[bg]);}
			
			if(strpos($roww[bg],'http://')!==false or strpos($roww[bg],'https://')!==false){$images = '';}else{$images = 'images/';}
			
			if(strpos($roww[bg],'#')!==false or strpos($roww[bg],'rgba(')!==false  or strpos($roww[bg],'rgb(')!==false){$bghtml = 'background-color:'.htmlspecialchars($roww[bg]).';';}
			else if(strpos($roww[bg],'[xy]')!==false){$bghtml = 'background-image:url('.$images.htmlspecialchars($roww[bg]).');';}
			else{$bghtml = 'background-image:url('.$images.htmlspecialchars($roww[bg]).');background-size:100%;background-repeat:repeat-y;';}
	
			if($roww[bg]){$bgstyle = 'style="'.$bghtml.'"';}else{$bgstyle = '';}
			
			$webpopup = '<div data-role="page" id="web'.$ap.'" class="page" data-theme="'.htmlspecialchars($theme).'" '.$bgstyle.'><div  class="ui-content pagebg">';
			if($roww[style]=='app')$webpopup .= '<div data-role="controlgroup" class="plft" data-type="horizontal" data-corners="false"><a href="#'.$ap.'panel" data-rel="panel" class="menubg ui-btn ui-btn-y ui-btn-inline ui-mini ui-btn-icon-left ui-icon-bars">WEBMENU</a></div><!--panel!--><div id="'.$pj.$ap.'imgspop" data-theme="z" style="padding:5px;" data-role="popup" data-corners="false"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><div class="ifrspinn" style="position:relative;left:50%;width:100%">Loading...<BR><img src="css/images/ajax-loader.gif"></div><div class="imgspop"><img src=""></div></div>
		<div id="'.$pj.$ap.'ifrspop" data-theme="z" data-role="popup" data-corners="false" style="overflow-y:auto;" class="ifrwidthpn" ><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><div class="ifrspinn" style="position:relative;left:50%;width:100%">Loading...<BR><img src="css/images/ajax-loader.gif"></div><iframe src="" style="width:100%" seamless frameBorder="0" ></iframe></div>
		<div class="ui-content" id="'.$pj.$ap.'pVideo" data-corners="false" data-role="popup" data-theme="x" data-tolerance="2,2"><iframe width="498" height="298" src="" seamless=""></iframe></div><div id="'.$pj.$ap.'pAudio" data-corners="false"  data-role="popup" style="color:black;background-color:rgba(255, 255, 255, 0.8);padding:5px;" class="ifrwidthps"><a href="#" data-rel="back" class="popn ui-btn ui-btn-z ui-btn-icon-notext ui-icon-delete"></a><BR><BR><i id="'.$pj.$ap.'audtn" ></i> &nbsp;<i  ></i><br><a href="#"  id="'.$pj.$ap.'playaudion" data-vlu="" style="border:none;" class="ui-btn ui-btn-w"><img style="width:50px" src="css/images/sound.svg"></a><BR><input id="'.$pj.$ap.'volmn" type="range" data-role="none" value="0.8"  step="0.1" min="0" max="1"><BR><input id="'.$pj.$ap.'toposn" type="range" data-role="none" value="0" step="0.1" min="0" max="1"><audio id="'.$pj.$ap.'audsn"><source src="" type="audio/mpeg"><source src="" type="audio/wav"></audio><div class="ifrspinn" style="position:relative;left:50%;width:100%">Loading...<BR><img src="css/images/ajax-loader.gif"></div></div>';
			if($roww[style]=='page')$webpopup .= '<a href="#" data-rel="back" class="menubgs plft ui-btn ui-btn ui-btn-inline ui-mini ui-btn-icon-left ui-icon-carat-l">WEBMENUS</a>';
			
			if($tl){$html = file_get_contents('../panel/'.$roww[pjnbr].'/'.$ap.'.html');$htmls = '';}
			
				if($bvtns == 1){
					$vnts  = '<div class="swiper-slide"><div id="'.$pj.$ap.'vnts'.$pn.'" class="vntsns vtnn">';
				;}else if($bvtns == 5){
					$vntsn  = '</div></div><!--vnts!-->';
				;}else if($bvtns == 6){
					$vnts  = '';$vntsn  = '';
				;}else{
					$vnts  = '<div class="swiper-slide"><div id="'.$pj.$ap.'vnts'.$pn.'" class="vntsns vtnn">';$vntsn  = '</div></div><!--vnts!-->';
				;}
			if($tabnbgdatn[0]){$tabnbgdatns = '<!--data-tabnbg'.$tabnbgdatn[0].'data-tabnbg!-->';}else{$tabnbgdatns = '<!--data-tabnbg@@@@@@data-tabnbg!-->';}

			$webpopup .= $html.'<!--part'.$pn.'!--><!--syslistviewnsys!-->'.$vnts.$popup.$vntsn.$tabnbgdatns.$htmls;
			$webpopup .= '</div><!--content!--></div><!--page!-->';
			
		 	
			
			$fpagtrns='../panel/'.$roww[pjnbr].'/'.$ap.'.html';
			file_put_contents($fpagtrns,$html.'<!--part'.$pn.'!--><!--syslistviewnsys!-->'.$vnts.$popup.$vntsn.$tabnbgdatns.$htmls);

			$fpagtrns='../panel/'.$roww[pjnbr].'/web'.$ap.'.html';
			file_put_contents($fpagtrns,$webpopup);

	


	
			if(!file_exists('../panel/'.$roww[pjnbr].'/web'.$ap.'.js')){
			$fpagtrns='../panel/'.$roww[pjnbr].'/web'.$ap.'.js';
			$js = '/*$(document).on(\'pageshow\', \'#web'.$ap.'\', function(){*//*});*/';
			file_put_contents($fpagtrns,$js);			
			;}
			
			if(!file_exists('../panel/'.$roww[pjnbr].'/temp/'.$pn.'/'.$ap.'.html')){
				mkdir('../panel/'.$roww[pjnbr].'/temp');
				mkdir('../panel/'.$roww[pjnbr].'/temp/'.$pn);
				file_put_contents('../panel/'.$roww[pjnbr].'/temp/'.$pn.'/'.$ap.'.html',$hts);			
			;}else{
				if(file_exists('../panel/'.$roww[pjnbr].'/temp/'.$pn.'/'.$ap.'[2].html'))rename('../panel/'.$roww[pjnbr].'/temp/'.$pn.'/'.$ap.'[2].html','../panel/'.$roww[pjnbr].'/temp/'.$pn.'/'.$ap.'[3].html');
				if(file_exists('../panel/'.$roww[pjnbr].'/temp/'.$pn.'/'.$ap.'[1].html'))rename('../panel/'.$roww[pjnbr].'/temp/'.$pn.'/'.$ap.'[1].html','../panel/'.$roww[pjnbr].'/temp/'.$pn.'/'.$ap.'[2].html');
				rename('../panel/'.$roww[pjnbr].'/temp/'.$pn.'/'.$ap.'.html','../panel/'.$roww[pjnbr].'/temp/'.$pn.'/'.$ap.'[1].html');
				file_put_contents('../panel/'.$roww[pjnbr].'/temp/'.$pn.'/'.$ap.'.html',$hts);		
			;}
						
	if(($_POST['ord']==' ' or !$_POST['ord']) and !$_POST[dlt])$tmp = '&tm='.htmlspecialchars($tm);
	echo "<meta http-equiv='refresh' content='0;URL=listviewn.php?ap=".htmlspecialchars($roww[ap])."&pj=".htmlspecialchars($roww[pjnbr])."&pn=".htmlspecialchars($pn).$tmp."'>";
;}

?>
	
