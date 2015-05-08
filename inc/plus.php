<?php
/**
 * @Author: http://www.huoduan.com
 * @ Email: admin@huoduan.com
 * @    QQ: 909516866
 */
if(!defined("a")) exit("Error 001");

include(ROOT_PATH.'/data/huoduan.plus.php');
function plusecho($str,$q=''){
	//echo '<div id="plus">';
	$str = str_replace('{$q}',$q,$str);
	echo $str;
	//echo '</div>';
}
if(is_array($plus['type']) & $p==1){
	
	foreach($plus['type'] as $k=>$v){
		if($v==1){
			if($q==$plus['key'][$k]){
				plusecho($plus['value'][$k]);
				break;
			}
		}else if($v==2){
			if(strpos($q,$plus['key'][$k])>-1){
				plusecho($plus['value'][$k]);
				break;
			}
		}else if($v==3){
			$plus['key'][$k] = str_replace('\\\\','\\',$plus['key'][$k]);
			if(preg_match($plus['key'][$k],$q)){
				plusecho($plus['value'][$k],$q);
				break;
			}
		}
	}
	
}

?>
