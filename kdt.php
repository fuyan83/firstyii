<?PHP
$start_time=time();

if(isset($_SERVER['SERVER_PORT'])){
	//die('不允许在客户端执行！');
}

define('APP_DEBUG',false); // 是否调试模式
define('__CONSOLE',true); // 控制台模式
define('APP_PATH', dirname(__FILE__).DIRECTORY_SEPARATOR);//系统根目录
require APP_PATH.'Core/Runtime.php';//加载系统启动文件
set_time_limit(0);
//echo PHP_EOL;
DB::init();

require APP_PATH.'kdt/KdtApiClient.php';

$kdtconfig=C('kdt');

$client=new KdtApiClient($kdtconfig['appId'],$kdtconfig['appSecret']);

$method = 'kdt.trades.sold.get';
$params = [
	'use_has_next'=>true,
	'page_size'=>10,
	'page_no'=>1
];

$res=$client->get($method, $params, $files);
print_rr($res);
