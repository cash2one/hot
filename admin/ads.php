<?php 
include('config.php'); 
include('../data/huoduan.ads.php'); 
$tips = '';
include('admincore.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include('inc.php'); ?>
</head>

<body>
<?php $nav = 'ads';include('head.php'); ?>

<div id="hd_main">
  <div align="center"><?=$tips?></div>
 <form name="configform" id="configform" action="./ads.php?act=ads&t=<?=time()?>" method="post">
<input name="edit" type="hidden" value="1" />
<table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="tablecss">
<tr class="thead">
<td colspan="10" align="center">广告管理</td>
</tr>
<tr>
    <td width="150" align="right" valign="middle" class="s_title">顶部右侧广告：</td>
    <td valign="top">728X90<div class="cl5"></div><textarea name="myads[ads_topr]" cols="80" rows="10"><?php $code = file_get_contents('../data/huoduan.ads_topr.php');echo htmlspecialchars($code);?></textarea></td>
</tr>
<tr>
    <td width="150" align="right" valign="middle" class="s_title">全站头部通栏广告：</td>
    <td valign="top">导航下面960px<div class="cl5"></div><textarea name="myads[ads_top]" cols="80" rows="10"><?php $code = file_get_contents('../data/huoduan.ads_top.php');echo htmlspecialchars($code);?></textarea></td>
</tr>
<tr>
    <td width="150" align="right" valign="middle" class="s_title">文章中间广告：</td>
    <td valign="top">在第<select name="ads[search]">
      <?php for($i=1;$i<11;$i++){ 
	       if($i==$ads['search']){
			   echo '<option value="'.$i.'" selected="selected">'.$i.'</option>';
		   }else{
			   echo '<option value="'.$i.'">'.$i.'</option>';
		   }
      
       }?>
    </select>
    段结果下放广告<div class="cl5"></div><textarea name="myads[ads_search]" cols="80" rows="10"><?php $code = file_get_contents('../data/huoduan.ads_search.php');echo htmlspecialchars($code);?></textarea></td>
</tr>
<tr>
    <td width="150" align="right" valign="middle" class="s_title">全站对联、右下角广告</td>
    <td valign="top">只能放漂浮类广告，如右下角、对联广告。<div class="cl5"></div>
<textarea name="myads[ads_all]" cols="80" rows="12"><?php $code = file_get_contents('../data/huoduan.ads_all.php');echo htmlspecialchars($code);?></textarea></td>
</tr>


<tr>
<td colspan="10" align="center"><input name="edit" type="hidden" value="1" /><input id="configSave" type="submit" value="     保 存     "></td>
</tr>
</table>


</form>

</div><!--main-->
<?php include('foot.php'); ?>
</body>
</html>
