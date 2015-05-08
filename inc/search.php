<?php
if(!defined("a")) exit("Error 001");
/**
 * @Author: http://www.huoduan.com
 * @ Email: admin@huoduan.com
 * @    QQ: 909516866
 */


$listnum = array('①','②','③','④','⑤','⑥','⑦','⑧','⑨','⑩');

if(isset($_GET['q'])){
  $q = hd_clearStr($_GET['q']);
}
$q = qdecode($q);
$kword = array('三级片','法轮功','迷药','性爱','porn');//这里可以屏蔽关键词，请暂时在这里手动加上，今后版本会在后台设置
foreach($kword as $k=>$v){
	if(strpos($q,$v)>-1){
		echo '您搜索的关键词暂时无法显示结果';
		exit;
	}
}

if(isset($_GET['cr']) && $_GET['cr']=='gb2312'){
	$q = iconv("gb2312","utf-8",$q);
	$gourl = huoduansourl($q);
    header("location: $gourl");
    exit;
}
if(isset($_GET['re'])){
	$gourl = huoduansourl($q);
    header("location: $gourl");
    exit;
}
if(isset($_GET['p'])){
	$p=$_GET['p'];
	if($p>100){
	   $p=100;	
	}
}else{
	$p=1;
}
$s = urlencode($q);

$list = huoduan_get_haosou($q,$p,$huoduan['cachetime']);

$listcount = count($list['data']);
if($listcount<2){
	echo '<!-- bd1 -->';
	$list = huoduan_get_baidu($q,$p,$huoduan['cachetime']);
    $listcount = count($list['data']);
	
	if($listcount<2){
		echo '<!-- hs2 -->';
		$list = huoduan_get_sogou($q,$p,$huoduan['cachetime']);
		$listcount = count($list['data']);
		
	}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Cache-Control" content="no-transform " />
<title><?=$q?><?php if($p!=1){echo '第'.$p.'页';}?> - <?=$huoduan['sitename']?></title>
<meta name="keywords" content="<?=$q?>" />
<meta name="description" content="最新“<?=$q?>”信息，<?php if($listcount>2){echo strip_tags($list['data'][0]['title']).strip_tags($list['data'][1]['des']);}?>" />
<link href="<?=SYSPATH?>images/view.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php 
$ishome=1;
include(ROOT_PATH.'/inc/head.php'); ?>

<div class="gather_main homej_main clear">

<div class="gather_left">
	<div class="block_frame left_block_specialframe">
		<div class="block_head">
			<p class="road"><label>您的当前位置：</label><a href="/">网络热词</a>&nbsp;&gt;&nbsp;<?=$q?></p>
		</div>
		<div class="block_con clear">
			<div class="note_main clear">
				<h1><?=$q?></h1>
 <?php

if($listcount>1){
	
  include(ROOT_PATH.'/data/huoduan.ads.php');

  for($i=0;$i<$listcount;$i++){
	
	
	?>
<p><?=strip_tags($list['data'][$i]['des'])?></p>   
    <?php	
    if(($i+1)==$ads['search']){
		include(ROOT_PATH.'/data/huoduan.ads_search.php');
	}
  }
}else{
	echo '<div style="padding:30px 10px; text-align:center; color:#F00; font-size:16px;">对不起，没有找到相关内容！请更换关键词搜索，或刷新本页重试。</div>';
}
?>			</div>
	</div>
		<p class="block_foot"></p>
  </div>

</div>
<div class="gather_right">
<?php include(ROOT_PATH.'/data/huoduan.ads_sidebar.php'); ?>
	<div class="block_frame right_block_frame">
		<div class="block_con clear">
					<div class="block_asklist_title clear">
						<h4>今日热搜：</h4>
					</div>
			<div class="block_saylist">
              <ul class="list_say clear"> 
            <?php 
   
     $topkey = huoduan_get_baidu_top($huoduan['hotcachetime']);
     for($i=0;$i<10;$i++){
	?>
        <li><a href="<?=huoduansourl($topkey[$i])?>"><?=$topkey[$i]?></a></li>
        <?php
		 
	 } 
   
	 ?>
     </ul>
</div>
		</div>
		<p class="block_foot"></p>
	</div>
	<div class="block_frame right_block_frame">
		<div class="block_con clear">
					<div class="block_asklist_title clear">
						<h4>相关搜索：</h4>
					</div>
			<div class="block_saylist">
				<ul class="list_say clear">
                <?php
				
		$xgdata = huoduan_get_baidu_xg($q);
	   if(is_array($xgdata)){
		 
		   foreach($xgdata as $v){
			   echo '<li><a href="'.huoduansourl($v).'">'.$v.'</a></li>';
		   }
		
	   }
				?>
				       </ul>
</div>
		</div>
		<p class="block_foot"></p>
	</div>
</div></div>
<div align="center" style="padding:20px 0;font-size:12px;">
<p>
<p><?=$huoduan['foot']?></p></div>
<?php  include(ROOT_PATH.'/data/huoduan.ads_all.php'); ?>
</body>
</html>