<?php
namespace core;
/**
 * 框架核心类
 */
class fsociety
{
	/**
	 * [路由]
	 * @return [array] [控制器和方法]
	 */
	static public function route($control = 'index', $action = 'index')
	{
		/**
		 * 1. 优化url，隐藏index.php （改服务器配置文件）
		 * 2. 获取url的参数部分 （1. 返回对应的控制器和方法 2. 将url多余的参数部分以get方式返回）
		 */
		if (isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] != '/' && !strpos($_SERVER['REQUEST_URI'], 'favicon.ico')) {
			if(strpos($_SERVER['REQUEST_URI'], '?')) {
				$path = explode('?', trim($_SERVER['REQUEST_URI'], '?'));
			} else {
				$path = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
				if(isset($path[0])){
					$control = preg_replace('/[^\w]*/', '', strval($path[0]));
				}
				if(isset($path[1])){
					$action = preg_replace('/[^\w]*/', '', strval($path[1]));
				}
				unset($path);
			}

			// 1. 返回对应的控制器和方法
			if(isset($path[0])){
				$paths = explode('/', trim($path[0], '/'));
				if(isset($paths[0])){
					$control = preg_replace('/[^\w]*/', '', strval($paths[0]));
				}
				if(isset($paths[1])){
					$action = preg_replace('/[^\w]*/', '', strval($paths[1]));
				}
			}

			// 2. 将url多余的参数部分以get方式返回
			if(isset($path[1])){
				$paths = explode('&', trim($path[1], '&'));
				if(is_array($paths)) foreach ($paths as $key => $value) {
					if (strpos($value, '=')) {
						$values = explode('=', $value);
						if (isset($values[0]) && isset($values[1])) {
							$_GET[$values[0]] = $values[1];
						}
					}
				}
			}
		}

		return [
			'control' => $control,
			'action' => $action
		]; 
	}

	/**
	 * [框架入口]
	 * @return [type] [description]
	 */
	static public function run()
	{
		// 加载路由
		$route = SELF::route();
		$control = $route['control'];
		$action = $route['action'];

		if (preg_match('/[^\w]/', $control) < 1 && preg_match('/[^\w]/', $action) < 1) {
			$file = APP.$control.'.php';
			$class = '\control\\'.$control;

			// 控制器和方法名不能有特殊字符
			if (is_file($file)) {
				// 加载公共函数
				include_once CORE.'function.php';

				include_once $file;
				$class = new $class();
				$class -> $action();
			} else {
				throw new \Exception("找不到控制器：".$control);
			}
		}
	}
}