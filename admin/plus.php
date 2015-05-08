<?php 
include('config.php'); 
include('../data/huoduan.plus.php'); 
$tips = '';
include('admincore.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include('inc.php'); ?>
<script type="text/javascript" src="../js/jquery.min.js"></script>
</head>

<body>
<?php $nav = 'plus';include('head.php'); ?>

<div id="hd_main">
  <div align="center"><?=$tips?></div>
 <form name="configform" id="configform" action="./plus.php?act=plus&t=<?=time()?>" method="post">
<input name="edit" type="hidden" value="1" />
<table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="tablecss">
<tr class="thead">
<td align="center">扩展管理[<a href="http://www.huoduan.com/so-plus.html" target="_blank">帮助</a>]</td>
</tr>
<?php
foreach($plus['type'] as $k=>$v){
?>
<tr>
    <td valign="top" style="padding-left:50px;">当搜索关键词<select name="plus[type][]">
     <option value="1"<?=$plus['type'][$k]==1?' selected="selected"':''?>>等于</option>
     <option value="2"<?=$plus['type'][$k]==2?' selected="selected"':''?>>包含</option>
     <option value="3"<?=$plus['type'][$k]==3?' selected="selected"':''?>>正则</option>
    </select> <input name="plus[key][]" type="text" value="<?=$plus['key'][$k]?>" size="30" />
    显示以下内容<div class="cl5"></div><textarea name="plus[value][]" cols="80" rows="5"><?=htmlspecialchars($plus['value'][$k])?></textarea></td>
</tr>

<?php
}
?>
<tr>
    <td valign="top" style="padding-left:50px;">当搜索关键词<select name="plus[type][]">
     <option value="1">等于</option>
     <option value="2">包含</option>
     <option value="3">正则</option>
    </select> <input name="plus[key][]" type="text" value="" size="30" />
    显示以下内容<div class="cl5"></div><textarea name="plus[value][]" cols="80" rows="5"></textarea></td>
</tr>
<tr id="fbox">
<td colspan="10" align="left" style="padding-left:50px;"><input name="edit" type="hidden" value="1" /><input id="configSave" type="submit" value="     保 存     ">   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="add" type="button" value="    新增加一条     "> (删除一条请清空该条的搜索词)</td>
</tr>
</table>


</form>

</div><!--main-->
<script type="text/javascript">
$(function(){
	$("#add").click(function(){
		$("#fbox").before('<tr><td valign="top" style="padding-left:50px;">当搜索关键词<select name="plus[type][]"><option value="1">等于</option><option value="2">包含</option></select> <input name="plus[key][]" type="text" value="" size="30" />显示以下内容<div class="cl5"></div><textarea name="plus[value][]" cols="80" rows="5"></textarea></td></tr>');
	});
	
});
</script>

<?php include('foot.php'); ?>
</body>
</html>
