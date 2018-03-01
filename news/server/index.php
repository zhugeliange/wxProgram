<?php
// 定义常量
define('ROOT', realpath('./'));	//	定义根目录
define('APP', ROOT.'/app/'); // 定义项目文件目录
define('CORE', ROOT.'/core/'); // 定义框架核心文件目录
define('WAFER', ROOT.'/wafer/'); // 定义框架核心文件目录

// 定义是否开启调试模式 On | Off
ini_set('display_error', 'On'); 

// 开启session
session_start();

// 引入composer
include_once WAFER.'AutoLoader.php'; 

// Wafer php sdk 配置文件
use \QCloud_WeApp_SDK\Conf as Config;

$config = array(
    'appId'          => 'wx97aa8536ff0d1d94', // 微信小程序 AppID
    'appSecret'      => '4082fdc46d564ec2fff9f863ce670344', // 微信小程序 AppSecret
    'useQcloudLogin' => true, // 使用腾讯云代理登录
    /**
     * MySQL 配置，用来存储 session 和用户信息
     * 若使用了腾讯云微信小程序解决方案
     * 开发环境下，MySQL 的初始密码为您的微信小程序 AppID
     */
    'mysql' => [
        'host' => 'localhost',
        'port' => 3306,
        'user' => 'root',
        'pass' => 'wx97aa8536ff0d1d94',
        'db'   => 'cAuth',
        'char' => 'utf8mb4'
    ],
    /**
     * 区域
     * 上海：cn-east
     * 广州：cn-sorth
     * 北京：cn-north
     * 广州二区：cn-south-2
     * 成都：cn-southwest
     * 新加坡：sg
     * @see https://www.qcloud.com/document/product/436/6224
     */
    'cos' => [
        'region'       => 'cn-east',
        'fileBucket'   => 'wafer', // Bucket 名称
        'uploadFolder' => '' // 文件夹
    ],
    // 微信登录态有效期
    'wxLoginExpires' => 7200,
    'wxMessageToken' => 'abcdefgh'
);

// 系统判断
if (PHP_OS === 'WINNT') {
    $sdkConfigPath = 'C:\qcloud\sdk.config';
} else {
    $sdkConfigPath = '/data/release/sdk.config.json';
}

$sdkConfig = file_exists($sdkConfigPath) ? json_decode(file_get_contents($sdkConfigPath), true) : [];

// 合并 sdk config 和原来的配置
$config = array_merge($sdkConfig, $config);

// 设置 SDK 基本配置
Config::setup($config);

// 加载核心文件
include_once CORE.'fsociety.php';

// 启动框架
\core\fsociety::run();