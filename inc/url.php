<?php
if(!defined("a")) exit("Error 001");
if(!empty($_GET['u']) && !empty($_GET['k']) && !empty($_GET['t']) && !empty($_GET['s'])){
	$url = $_GET['u'];	
	$key = $_GET['k'];
	$title = $_GET['t'];
	$q = $_GET['s'];
	if(substr(a($url.$title.$q),0,8)!=$key){
		echo 'URL错误!<a href="./"><<请返回</a>';
	    exit;
	}
	$url = qdecode($url);
	$title = qdecode($title);
	$q = qdecode($q);
}else{
	echo 'URL错误!<a href="./"><<请返回</a>';
	exit;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$title?></title>
<meta name="keywords" content="<?=$q?>,<?=$title?>" />
<meta name="description" content="<?=$q?>相关信息，<?=$title?>" />
<link rel="shortcut icon" type="image/x-icon" href="./favicon.ico">
<link href="images/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript"> 
window.onerror=function(){return true;} 
$(function() { 
<?php
   if($huoduan['topbar_open']==1){
	  echo 'headerH = 70;'; 
   }else{
	  echo 'headerH = 0;';  
   }?>
   var h = $(window).height();
   $("#huoduan_frame").height((h-headerH)+"px"); 
});
</script>
<!--[if IE 6]>
<script type="text/javascript" src="js/DDPNG.js"></script>
<script type="text/javascript">
DD_belatedPNG.fix('.png');
</script><![endif]-->
</head>
<body scroll="no" style="margin:0; padding:0; overflow-y:hidden ">
<?php
   if($huoduan['topbar_open']==1){?>
<div id="header">
  <div class="con">
      <h1 class="logo png"><a href="./"></a></h1>
      <div class="searchbox">
       <form action="./" method="get"><input align="middle" name="q" class="q" id="kw" value="<?=$q?>" maxlength="100" size="50" autocomplete="off" baiduSug="1" x-webkit-speech /><?php if(REWRITE=='1'){?><input name="re" type="hidden" value="1" /><?php }?><input id="btn" class="btn" align="middle" value="搜索一下" type="submit" />
              </form>
      </div>
  </div>
</div><!--header-->
<div class="cl"></div>
<?php
   }?>
<iframe id="huoduan_frame" frameborder="0" scrolling="yes" name="main" src="<?=$url?>" style=" height:500px; visibility: inherit; width: 100%; z-index: 1;overflow: visible;"></iframe>
<?php include(ROOT_PATH.'/data/huoduan.ads_iframe.php'); ?>
<div style="display:none">
<?=$huoduan['foot']?>
</div>
</body></html>
<!-- powered by huoduan.com -->