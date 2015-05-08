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
<?php $nav = 'home';include('head.php'); ?>

<div id="hd_main">

   <div style="margin:20px;">
   <?php
    $path = $_SERVER['SCRIPT_NAME'];
    if(strpos($path,'/admin/')>-1){
	   echo '<div style="text-align:center; color:red; font-size:16px; margin-bottom:15px;">您的后台目录为默认的/admin/ ，为了安全请修改后台目录</div>';	
	}
	if($huoduan['admin_name']=='huoduan' && $huoduan['admin_pass']=='a13a02276910cbc879f020ed88816512'){
	   echo '<div style="text-align:center; color:red; font-size:16px; margin-bottom:15px;">您的账号密码为系统默认，请尽快修改</div>';	
	}
   ?>


      <table width="600" border="0" class="tablecss" cellspacing="0" cellpadding="0" align="center">
   <tr>
    <td colspan="2" align="center">欢迎使用火端搜索系统！</td>
    </tr>

  <tr>
    <td width="213" align="right">PHP版本：</td>
    <td width="387"><?=PHP_VERSION?></td>
  </tr>
  <tr>
    <td align="right">域名：</td>
    <td><?=$_SERVER['HTTP_HOST']?></td>
  </tr>
  <tr>
    <td align="right">allow_url_fopen：</td>
    <td><?=ini_get('allow_url_fopen') ? '<span class="green">支持</span>' : '<span class="red">不支持</span>'?></td>
  </tr>
  <tr>
    <td align="right">curl_init：</td>
    <td><?php if ( function_exists('curl_init') ){ echo '<span class="green">支持</span>' ;}else{ echo '<span class="red">不支持</span>';}?></td>
  </tr>
<tr>
    <td align="right">/cache/目录权限检测</td>
    <td><?=is_writable('../cache/') ? '<span class="green">可写</span>' : '<span class="red">不可写</span>'?></td>
  </tr>
<tr>
    <td align="right">/data/目录权限检测</td>
    <td><?=is_writable('../data/') ? '<span class="green">可写</span>' : '<span class="red">不可写</span>'?></td>
  </tr>  
  <tr>
    <td align="right">搜索主页：</td>
    <td><a href="../" target="_blank">访问主页</a></td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr style="display:none;">
    <td colspan="2" style="line-height:220%; text-indent:28px;">本程序由<a href="http://www.huoduan.com" target="_blank">火端网络</a>开发，官方网站：<a href="http://www.huoduan.com" target="_blank">http://www.huoduan.com</a>，源码唯一销售客服QQ号码：<a href="http://wpa.qq.com/msgrd?v=3&uin=909516866&site=qq&menu=yes" target="_blank">909516866</a> ，请尊重开发者劳动成果，勿将本程序发布到网上或倒卖，感谢您的支持！</td>
    </tr>
</table>

   </div>

</div><!--main-->


<?php include('foot.php'); ?>

</body>
</html>
