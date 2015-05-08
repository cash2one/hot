<?php if(!defined("a")) exit("Error 001");?>
<div id="header">
  <div class="con">
      <h1 class="logo png"><a href="./">火端搜索</a></h1>
      <div class="huoduan_info"><a href="../" target="_blank">网站首页</a>，欢迎您，<?=$huoduan['admin_name']?>，&nbsp;<a href="./login.php?act=logout">退出</a></div>
      <ul class="huoduan_nav">
         <li><a href="./"<?=$nav=='home'?' class="this"':''?>>后台首页</a></li>
         <li><a href="./setting.php"<?=$nav=='setting'?' class="this"':''?>>站点设置</a></li>
         <li><a href="./ads.php"<?=$nav=='ads'?' class="this"':''?>>广告设置</a></li>
         <li style="display:none;"><a href="./plus.php"<?=$nav=='plus'?' class="this"':''?>>扩展功能</a></li>
         <li style="display:none;"><a href="./code.php"<?=$nav=='code'?' class="this"':''?>>代码引用</a></li>
         <li><a href="./cache.php"<?=$nav=='cache'?' class="this"':''?>>清除缓存</a></li>
     
      </ul>
  </div>
</div><!--header-->