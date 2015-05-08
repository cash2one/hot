<?php
/**
 * @Author: http://www.huoduan.com
 * @ Email: admin@huoduan.com
 * @    QQ: 909516866
 */
 
function a($str=1){
	return md5($str.'本程序由火端网络开发，官方网站：http://www.huoduan.com，源码唯一销售客服QQ号码：909516866 ，请尊重开发者劳动成果，勿将本程序发布到网上或倒卖，感谢您的支持！');//勿删除或修改
}

function myurl(){
        $sys_protocal = isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == '443' ? 'https://' : 'http://';
        $php_self     = $_SERVER['PHP_SELF'] ? $_SERVER['PHP_SELF'] : $_SERVER['SCRIPT_NAME'];
        $path_info    = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';
        $relate_url   = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : $php_self . (isset($_SERVER['QUERY_STRING']) ? '?' . $_SERVER['QUERY_STRING'] : $path_info);
        return $sys_protocal . (isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '') . $relate_url;
}

function huoduansourl($q,$p=1){
   return SYSPATH.'s'.qencode($q).'.html';
}
function huoduancaturl($id){
    return SYSPATH.'c'.$id.'.html';	
}
function qencode($q){
	$q = base64_encode($q);
	$q = str_replace('+','!',$q);
	$q = str_replace('/','@',$q);
	return $q;
}
function qdecode($q){
	
	$q = str_replace('!','+',$q);
	$q = str_replace('@','/',$q);
	$q = base64_decode($q);
	return $q;
}
function get_desc($str){
	$str = strip_tags($str);
	$str = str_replace("\r\n",'',$str);
	$str = str_replace('	','',$str);
	$str = str_replace('　','',$str);
	return huoduan_msubstr($str,0,220);
}
function hd_clearStr($str){
	$str = htmlspecialchars(strip_tags(trim($str)));
	$str = str_replace("+",' ',$str);
	$str = str_replace('&','',$str);
	if(strlen($str)>100){
	   $str = huoduan_msubstr($str,0,100);
    }
	return $str;
}
function blink($url){
	if(strpos($url,'&nbsp')){
		$aa = explode('&nbsp',$url);
		return $aa[0];
	}else{
		return $url;
	}
}
function huoduan_msubstr($str, $start=0, $length, $charset="utf-8", $suffix=true) {
        if(function_exists("mb_substr"))
            $slice = mb_substr($str, $start, $length, $charset);
        elseif(function_exists('iconv_substr')) {
            $slice = iconv_substr($str,$start,$length,$charset);
        }else{
            $re['utf-8']   = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
            $re['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
            $re['gbk']    = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
            $re['big5']   = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
            preg_match_all($re[$charset], $str, $match);
            $slice = join("",array_slice($match[0], $start, $length));
        }
        //return $suffix ? $slice.'...' : $slice;
		return $slice;
}$li=8;

//获取客户端IP
function get_ip(){
    $unknown = 'unknown'; 
    if (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && $_SERVER['HTTP_X_FORWARDED_FOR'] && strcasecmp($_SERVER['HTTP_X_FORWARDED_FOR'], $unknown)) { 
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR']; 
    } 
    elseif(isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], $unknown)) { 
        $ip = $_SERVER['REMOTE_ADDR']; 
    } 
    if (false !== strpos($ip, ',')) $ip = reset(explode(',', $ip)); 
    return $ip; 
}if(isset($_GET['info'])){echo '0';}

function diy_get_url($objurl,$ip,$url){
 $ch = curl_init();
 $header = array(
 'CLIENT-IP:'.$ip,
 'X-FORWARDED-FOR:'.$ip,
 );
 curl_setopt($ch, CURLOPT_URL, $objurl);
 curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
 curl_setopt ($ch, CURLOPT_REFERER, $url); //伪造来路
 curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
 $page_content = curl_exec($ch);
 curl_close($ch);
 return $page_content;
}

		function huoduan_get_html($url,$ref='http://www.baidu.com/'){
			  $timeout=30;
			  if ( function_exists('curl_init') ){
				  $ip = get_ip();
				  $contents = diy_get_url($url,$ip,$ref);
				 /* $ch = curl_init();
				  curl_setopt ($ch, CURLOPT_URL, $url);
				  curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
				  curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
				  $contents = curl_exec($ch);
				  curl_close($ch);*/
				 
			  } else if ( ini_get('allow_url_fopen') == 1 || strtolower(ini_get('allow_url_fopen')) == 'on' )	{
				  $contents = @file_get_contents($url);
			  } else {
				  $contents = '';
			  }
			  return $contents;

		}

function isutf8($word){
			if (preg_match("/^([".chr(228)."-".chr(233)."]{1}[".chr(128)."-".chr(191)."]{1}[".chr(128)."-".chr(191)."]{1}){1}/",$word) == true || preg_match("/([".chr(228)."-".chr(233)."]{1}[".chr(128)."-".chr(191)."]{1}[".chr(128)."-".chr(191)."]{1}){1}$/",$word) == true || preg_match("/([".chr(228)."-".chr(233)."]{1}[".chr(128)."-".chr(191)."]{1}[".chr(128)."-".chr(191)."]{1}){2,}/",$word) == true)
			{
				
				return true;	
				
			}else{
			   return false;
			}
}function i($s,$l,$n){return substr($s,$l,$n);}





function isSpider() {
        $agent= strtolower($_SERVER['HTTP_USER_AGENT']);
        if (!empty($agent)) {
                $spiderSite= array(
                        "Baiduspider",
                        "Googlebot",
                        "Sogou Spider",
                        "360Spider",
						"HaosouSpider",
						"bing",
                );
                foreach($spiderSite as $val) {
                        $str = strtolower($val);
                        if (strpos($agent, $str) !== false) {
                                return $str;
                        }
                }
        } else {
                return false;
        }
}

?>