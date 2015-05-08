<?php
error_reporting(0);
header("Content-Type: text/html; charset=utf-8");
define('a', '本程序由火端网络开发，官方网站：http://www.huoduan.com，源码唯一销售客服QQ号码：909516866 ，请尊重开发者劳动成果，勿将本程序发布到网上或倒卖，感谢您的支持！');//请勿修改此处信息，因修改版权信息引起的错误，将不提供任何技术支持
define('ROOT_PATH',dirname(__FILE__));

/* 请勿修改以上版权信息
 * @Author: http://www.huoduan.com
 * @ Email: admin@huoduan.com
 * @    QQ: 909516866
 */

include("data/huoduan.config.php");
include("data/huoduan.cat.php");
define('REWRITE',$huoduan['rewrite']);
define('SYSPATH',$huoduan['path']);
define('c',ROOT_PATH.'/inc/core.php');
include("inc/function.php");
include('inc/core.php');

$ip = get_ip();

if(strpos('|'.$huoduan['ip'].'|','|'.$ip.'|')>-1){
   echo '禁止访问';
   exit;	
}
if(isset($_GET['q'])){
	include('inc/search.php');
	exit;
}else if(isset($_GET['c'])){
	include('inc/list.php');
	exit;
}
if(isset($_GET['a'])){
	$a = $_GET['a'];
	switch($a){
		case 'url':
		  include('inc/url.php');
	      exit;
		break;
		case 'code':
		  include('inc/code.php');
	      exit;
		break;
		case 'go':
		  include('data/huoduan.baidutop.php');
		  shuffle($topkey);
		  $url = huoduansourl($topkey[0]);
		  header("location: $url");
		break;
	}
	
}
include('inc/home.php');
?>