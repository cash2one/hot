<?php 
include('config.php'); 
$tips = '';
include('../inc/function.php');
include('admincore.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include('inc.php'); ?>
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.dragsort-0.4.min.js"></script>
<script type="text/javascript">
function getsort(){
	var str = '';
	 $("#sxlist li").each(function(i){
	     str+=','+$("#sxlist li").eq(i).text();
	 });
	$("#sort").val(str);
	return true;
}
$(function(){
	$("#searchtype_1").click(function(){
		$("#searchsite").hide();
	});
	$("#searchtype_2").click(function(){
		$("#searchsite").show();
	});
	$("#hotkeytype_1").click(function(){
		$("#hotcachetime").show();
		$("#diykey").hide();
	});
	$("#hotkeytype_2").click(function(){
		$("#hotcachetime").hide();
		$("#diykey").show();
	});
})
</script>

</head>

<body>
<?php $nav = 'setting';include('head.php'); ?>

<div id="hd_main">
  <div align="center"><?=$tips?></div>
 <form name="configform" id="configform" action="./setting.php?act=setting&t=<?=time()?>" method="post">

<table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="tablecss">
<tr class="thead">
<td colspan="10" align="center">基本设置</td>
</tr>
<tr>
    <td width="125" align="right" valign="middle" class="s_title">网站名称：</td>
    <td width="690" valign="middle"><input name="edit" type="hidden" value="1" /><input type="text" name="huoduan[sitename]" value="<?=$huoduan['sitename']?>" size="50">
      <span class="gray tips">如：火端搜索</span></td>
</tr>

<tr>
    <td width="125" align="right" valign="middle" class="s_title">首页标题：</td>
    <td valign="top"><input type="text" name="huoduan[title]" value="<?=$huoduan['title']?>" size="50">
      <span class="gray tips">显示在首页标题上</span></td>
</tr>
<tr>
    <td width="125" align="right" valign="middle" class="s_title">首页关键字：</td>
    <td valign="top"><input type="text" name="huoduan[keywords]" value="<?=$huoduan['keywords']?>" size="50">
      <span class="gray tips">如：多个关键字请用英文状态下的逗号分开，建议在6个词以内</span></td>
</tr>
<tr>
    <td width="125" align="right" valign="middle" class="s_title">首页描述：</td>
    <td valign="top"><textarea name="huoduan[description]" cols="80" rows="3"><?=$huoduan['description']?></textarea></td>
</tr>
<tr>
    <td width="125" align="right" valign="middle" class="s_title">网站目录：</td>
    <td width="690" valign="middle"><input type="text" name="huoduan[path]" value="<?=$huoduan['path']?>" size="20">
      <span class="gray tips">根目录请填写 / ，子目录请填写如：/sub/</span></td>
</tr>

<tr class="thead">
<td colspan="10" align="center">高级设置</td>
</tr>
<tr style="display:none;">
    <td width="125" align="right" valign="middle" class="s_title">搜索类型</td>
    <td valign="top">
      <label>
        <input type="radio" id="searchtype_1" name="huoduan[searchtype]" value="1" <?=$huoduan['searchtype']==1?' checked="checked"':''?> />
        百度全网搜索</label>
   
      <label>
        <input type="radio" id="searchtype_2" name="huoduan[searchtype]" value="2" <?=$huoduan['searchtype']==2?' checked="checked"':''?> />
        搜索某个站点</label> &nbsp;<span id="searchsite"<?=$huoduan['searchtype']==1?' style="display:none;"':''?>><input type="text" name="huoduan[searchsite]" value="<?=$huoduan['searchsite']?>" size="20">
      <span class="gray tips">只在百度搜索该域名下的结果，填写如：dl.vmall.com</span></span>
      
      </td>
</tr>

<tr style="display:none;">
    <td width="125" align="right" valign="middle" class="s_title">伪静态：</td>
    <td valign="top">
      <label>
        <input type="radio" name="huoduan[rewrite]" value="1" <?=$huoduan['rewrite']==1?' checked="checked"':''?> />
        开启</label>
   
      <label>
        <input type="radio" name="huoduan[rewrite]" value="0" <?=$huoduan['rewrite']==0?' checked="checked"':''?> />
        关闭</label>  <span class="gray">(必须要服务器支持才行，具体规则请看<a href="http://www.huoduan.com/so-rewrite.html" target="_blank">这里</a>)</span>
      
      </td>
</tr>
<tr style="display:none;">
    <td width="125" align="right" valign="middle" class="s_title">相关搜索：</td>
    <td valign="top">
      <label>
        <input type="radio" name="huoduan[xg_open]" value="1" <?=$huoduan['xg_open']==1?' checked="checked"':''?> />
        开启</label>
   
      <label>
        <input type="radio" name="huoduan[xg_open]" value="0" <?=$huoduan['xg_open']==0?' checked="checked"':''?> />
        关闭</label>  <span class="gray">(关闭可加快搜索速度)</span>
      
      </td>
</tr>
<tr style="display:none;">
    <td width="125" align="right" valign="middle" class="s_title">搜索结果前数字</td>
    <td valign="top">
      <label>
        <input type="radio" name="huoduan[listnum]" value="1" <?=$huoduan['listnum']==1?' checked="checked"':''?> />
        显示</label>
   
      <label>
        <input type="radio" name="huoduan[listnum]" value="0" <?=$huoduan['listnum']==0?' checked="checked"':''?> />
        关闭</label>  <span class="gray">(搜索结果标题前的①、②、③数字是否显示)</span>
      
      </td>
</tr>
<tr style="display:none;">
    <td width="125" align="right" valign="middle" class="s_title">链接Iframe：</td>
    <td valign="top">
      <label>
        <input type="radio" name="huoduan[iframe_open]" value="1" <?=$huoduan['iframe_open']==1?' checked="checked"':''?> />
        开启</label>
   
      <label>
        <input type="radio" name="huoduan[iframe_open]" value="0" <?=$huoduan['iframe_open']==0?' checked="checked"':''?> />
        关闭</label>  <span class="gray">(关闭后搜索链接直接打开)</span>
      
      </td>
</tr>
<tr style="display:none;">
    <td width="125" align="right" valign="middle" class="s_title">Iframe顶部搜索条：</td>
    <td valign="top">
      <label>
        <input type="radio" name="huoduan[topbar_open]" value="1" id="huoduanxg_open_0"<?=$huoduan['topbar_open']==1?' checked="checked"':''?> />
        显示</label>
   
      <label>
        <input type="radio" name="huoduan[topbar_open]" value="0" id="huoduanxg_open_1"<?=$huoduan['topbar_open']==0?' checked="checked"':''?> />
        关闭</label>  <span class="gray">(链接iframe打开后顶部的搜索条是否显示)</span>
      
      </td>
</tr>
<tr>
    <td width="125" align="right" valign="middle" class="s_title">搜索结果缓存时间：</td>
    <td valign="top">
      <select name="huoduan[cachetime]">
        <option value="3600"<?=$huoduan['cachetime']=='3600'?' selected="selected"':''?>>1小时</option>
        <option value="10800"<?=$huoduan['cachetime']=='10800'?' selected="selected"':''?>>3小时</option>
        <option value="21600"<?=$huoduan['cachetime']=='21600'?' selected="selected"':''?>>6小时</option>
        <option value="43200"<?=$huoduan['cachetime']=='43200'?' selected="selected"':''?>>12小时</option>
        <option value="86400"<?=$huoduan['cachetime']=='86400'?' selected="selected"':''?>>1天</option>
        <option value="259200"<?=$huoduan['cachetime']=='259200'?' selected="selected"':''?>>3天</option>
        <option value="604800"<?=$huoduan['cachetime']=='604800'?' selected="selected"':''?>>7天</option>
        <option value="2592000"<?=$huoduan['cachetime']=='2592000'?' selected="selected"':''?>>一个月</option>
        <option value="0"<?=$huoduan['cachetime']=='0'?' selected="selected"':''?>>永久</option>
      </select>  
      <span class="gray">(搜索结果缓存有效时间，建议大于12小时)</span>
      
      </td>
</tr>

<tr style="display:none;">
    <td width="125" align="right" valign="middle" class="s_title">搜索结果排序：</td>
    <td valign="top"><input name="huoduan[sort]" id="sort" type="hidden" value="" />
      <ul class="sxlist" id="sxlist">
      <?php
	     $sort = explode(',',$huoduan['sort']);
		 foreach($sort as $k=>$v){
			 echo '<li>'.$v.'</li>';
		 }
	  ?></ul>
      <span class="gray">(拖拽调整搜索结果排序)</span>
      
      </td>
</tr>
<tr style="display:none;">
    <td width="125" align="right" valign="middle" class="s_title">热门搜索词：</td>
    <td valign="top">
      <label>
        <input type="radio" name="huoduan[hotkeytype]" value="1" id="hotkeytype_1"<?=$huoduan['hotkeytype']==1?' checked="checked"':''?> />
        自动获取百度排行榜</label>
   
      <label>
        <input type="radio" name="huoduan[hotkeytype]" value="2" id="hotkeytype_2"<?=$huoduan['hotkeytype']==2?' checked="checked"':''?> />
        自定义热门词</label>
      
      
      </td>
</tr>
<tr id="hotcachetime"<?=$huoduan['hotkeytype']==2?' style="display:none;"':''?>>
    <td width="125" align="right" valign="middle" class="s_title">实时热门搜索缓存：</td>
    <td valign="top">
      <select name="huoduan[hotcachetime]">
        <option value="1800"<?=$huoduan['hotcachetime']=='1800'?' selected="selected"':''?>>30分钟</option>
        <option value="3600"<?=$huoduan['hotcachetime']=='3600'?' selected="selected"':''?>>1小时</option>
        <option value="7200"<?=$huoduan['hotcachetime']=='7200'?' selected="selected"':''?>>2小时</option>
        <option value="14400"<?=$huoduan['hotcachetime']=='14400'?' selected="selected"':''?>>4小时</option>
       
      </select>  
      <span class="gray">(百度实时热点搜索排行榜缓存时间，建议在1小时左右)</span>
      
      </td>
</tr>
<tr id="diykey"<?=$huoduan['hotkeytype']==1?' style="display:none;"':''?>>
    <td width="125" align="right" valign="middle" class="s_title">自定义关键词：</td>
    <td valign="top">
<textarea name="diykey" cols="30" rows="8" style="width:300px; height:160px; float:left; display:inline-block;"><?php $code = file_get_contents('../data/huoduan.diykey.php');echo htmlspecialchars($code);?></textarea> <div style="display:inline-block; float:left; margin:20px 0 0 10px;"><span class="gray">(一行一个关键词，请勿插入特殊字符)</span><br />
<br /><br />
<br />

<input name="huoduan[joinhotkey]" type="checkbox" value="1"<?=$huoduan['joinhotkey']==1?' checked="checked"':''?> /> <span class="green">混入百度热门搜索词</span><span class="gray"> (选中后将自定义关键词和百度热门搜索词混合)</span>
</div>
      </td>
</tr>
<tr>
    <td width="125" align="right" valign="middle" class="s_title">底部信息：</td>
    <td valign="top"><textarea name="huoduan[foot]" cols="80" rows="5"><?php $huoduan['foot'] = str_replace("\\'","'",$huoduan['foot']);echo htmlspecialchars($huoduan['foot'])?></textarea>
      </td>
</tr>
<tr>
    <td width="125" align="right" valign="middle" class="s_title">登录账号：</td>
    <td valign="top"><input type="text" name="huoduan[admin_name]" value="<?=$huoduan['admin_name']?>" size="30">
      <span class="gray tips"></span></td>
</tr>
<tr>
    <td width="125" align="right" valign="middle" class="s_title">登录密码：</td>
    <td valign="top"><input type="text" name="huoduan[admin_pass]" value="" size="30">
      <span class="gray tips">不修改请留空</span></td>
</tr>
<tr>
    <td width="125" align="right" valign="middle" class="s_title">禁止某些IP访问：</td>
    <td valign="top">多个IP请用“|”分开，如111.111.111.111|222.222.222.222<div class="cl5"></div><textarea name="huoduan[ip]" cols="80" rows="3"><?php echo $huoduan['ip']?></textarea>
      </td>
</tr>
<tr>
<td colspan="10" align="center"><input name="edit" type="hidden" value="1" /><input id="configSave" type="submit" onclick="return getsort()" value="     保 存     "></td>
</tr>
</table>


</form>
<script type="text/javascript">
			$(".sxlist:first").dragsort();
		</script>
</div><!--main-->
<?php include('foot.php'); ?>
</body>
</html>
