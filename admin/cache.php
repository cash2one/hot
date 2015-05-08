<?php 
include('config.php'); 
include('admincore.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include('inc.php'); ?>
</head>

<body>
<?php $nav = 'cache';include('head.php'); ?>

<div id="hd_main">

   <div class="btnlist"><a<?=$_GET['c']=='0'?' class="this"':''?> href="./cache.php?act=cache&c=0">清除全部缓存</a><a<?=$_GET['c']==1?' class="this"':''?> href="./cache.php?act=cache&c=1">清除1天前缓存</a><a<?=$_GET['c']==3?' class="this"':''?> href="./cache.php?act=cache&c=3">清除3天前缓存</a><a<?=$_GET['c']==7?' class="this"':''?> href="./cache.php?act=cache&c=7">清除7天前缓存</a></div>
  <div class="cl10"></div>
   <div style="margin:20px; line-height:200%; text-align:center;">
      <?php

if(isset($_GET['c']) && isset($_GET['act']) && $_GET['act']=='cache') {
	$c = $_GET['c'];
	switch($c){
		case '0':
		 $user = new huoduan_del();  
         $user->delFileUnderDir('../cache/');
		break;
		case '1':
		 $user = new huoduan_del();  
         $user->delFileUnderDir('../cache/',86400);
		break;
		case '3':
		 $user = new huoduan_del();  
         $user->delFileUnderDir('../cache/',259200);
		break;
		case '7':
		 $user = new huoduan_del();  
         $user->delFileUnderDir('../cache/',604800);
		break;
	}
}
  
	  ?>
   </div>
</div><!--main-->

<?php include('foot.php'); ?>

</body>
</html>
