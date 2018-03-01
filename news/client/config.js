/**
 * 小程序配置文件
 */

// 此处主机域名修改成腾讯云解决方案分配的域名
var host = 'https://cgyl5q3p.qcloud.la';

var config = {
	// 下面的地址配合云端 Demo 工作
	host,
	// 登录地址，用于建立会话
	loginUrl: `${host}/user/login`,
	// 测试的请求地址，用于测试会话
	requestUrl: `${host}/user/check`,
	dataUrl: `${host}/index/index`
};

module.exports = config;