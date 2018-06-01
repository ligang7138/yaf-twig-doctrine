<?php
define("APP_PATH",  realpath(dirname(__FILE__) . '/../'));
define("APPLICATION_CONFIG_PATH", APP_PATH . '/conf');

//var_dump(function_exists('token_get_all'));die;
//ini_set('yaf.use_spl_autoload',0);
//require_once APPLICATION_CONFIG_PATH . '/env.php';
//echo 232;die;
//phpinfo();die;
$app  = new \Yaf_Application(APP_PATH . "/conf/application.ini");
$app->bootstrap()
	->run();
