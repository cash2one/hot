<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Cache-Control" content="no-transform " />
<title><?=$huoduan['title']?></title>
<meta name="keywords" content="<?=$huoduan['keywords']?>" />
<meta name="description" content="<?=$huoduan['description']?>" />
<link rel="stylesheet" type="text/css" href="images/index.css" />

</head>
<body>
<?php 
$ishome=1;
include(ROOT_PATH.'/inc/head.php'); ?>
<div class="gather_main homej_main clear">
<div class="gather_left">
	<div class="block_frame">
		<div class="block_con clear">
			<div class="block_saylist">
					<div class="block_asklist_title clear">
						<h4>实时热门词条：</h4>
					</div>
				<ul class="list_say clear">
				<?php 
		 
		
	 $topkey = huoduan_get_baidu_top($huoduan['hotcachetime']);
		 foreach($topkey as $k=>$v){
	
			echo '<li><a target="_blank" href="'.huoduansourl($v).'">'.$v.'</a></li>'; 
			 
		 } 
	 
	 ?>		</ul>
			</div>
            
            <div class="block_saylist" style="clear:both; margin:20px  0 0 0;">
					<div class="block_asklist_title clear">
						<h4>七日热点：</h4>
					</div>
				<ul class="list_say clear">
				<?php 
		 
		
	  $top7 = get_baidutop('42',$huoduan['hotcachetime']);
		 foreach($top7 as $k=>$v){
	
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
			  if($k==38){break;}
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
