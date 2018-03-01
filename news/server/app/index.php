<?php
namespace control;

defined('WAFER') OR exit('No direct script access allowed');

class index extends \core\fsociety
{
	function index()
	{
		echo file_get_contents('http://v.juhe.cn/toutiao/index?type=&key=392ea49c3e92e61bfe913cf93b3ce2f6');
		exit;
	}
}