<?php
$c = $_GET['c'];
if(strpos($c,'_')){
	$cid = explode('_',$c);
	$topid = $cid[0];
	$sid = $cid[1];
	$cat_name = $cat[$topid][$sid];
}else{
	$sid = $c;
	$topid = $sid;
	$cat_name = $catname[$sid];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Cache-Control" content="no-transform " />
<title><?=$cat_name?>_<?=$huoduan['sitename']?></title>
<meta name="keywords" content="<?=$cat_name?>,<?=$huoduan['keywords']?>" />
<meta name="description" content="<?=$cat_name?>相关热门信息，<?=$huoduan['description']?>" />
<link rel="stylesheet" type="text/css" href="images/index.css" />

</head>
<body>
<?php include(ROOT_PATH.'/inc/head.php'); ?>



<div class="gather_main homej_main clear">
<div class="gather_left">
	<div class="block_frame">
		<div class="block_con clear">
			<div class="block_saylist">
					<div class="block_asklist_title clear">
						<h4><?=$cat_name?></h4>
					</div>
				<ul class="list_say clear">
				<?php 
		 
		
	  $topdata = get_baidutop($sid,$huoduan['hotcachetime']);
		 foreach($topdata as $k=>$v){
	
			echo '<li><a target="_blank" href="'.huoduansourl($v).'">'.$v.'</a></li>'; 
			 
		 } 
	 
	 ?>		</ul>
			</div>

		</div>
		<p class="block_foot"></p>
	</div>
</div>
<div class="gather_right"> 
	<div class="block_frame right_block_frame">
		<div class="block_con clear">
					<div class="block_asklist_title clear">
						<h4>今日热点：</h4>
					</div>
			<ul class="list_hotdiary clear">
				<?php 
		 
		
	 $todaytop = get_baidutop('341',$huoduan['hotcachetime']);
		 foreach($todaytop as $k=>$v){
	
			echo '<li><a target="_blank" href="'.huoduansourl($v).'">'.$v.'</a></li>'; 
			 if($k==20){break;}
		 } 
	 
	 ?>								</ul>

		</div>
		<p class="block_foot"></p>
	</div>
</div></div>
<div align="center" style="padding:20px 0;font-size:12px;">

<p><?=$huoduan['foot']?></p>
</div>
<?php  include(ROOT_PATH.'/data/huoduan.ads_all.php'); ?>
</body>
</html>
