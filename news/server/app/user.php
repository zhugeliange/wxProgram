<?php
namespace control;
use QCloud_WeApp_SDK\Auth\LoginService as LoginService;
use QCloud_WeApp_SDK\Constants as Constants;

defined('WAFER') OR exit('No direct script access allowed');

class user extends \core\fsociety
{
    // 验证用户
	function check()
	{
		$result = LoginService::check();

        if ($result['loginState'] === Constants::S_AUTH) {
            echo json_encode([
                'code' => 0,
                'data' => $result['userinfo']
            ]);
        } else {
            echo json_encode([
                'code' => -1,
                'data' => []
            ]);
        }

        exit;
	}

    // 用户登陆
	function login()
	{
		$result = LoginService::login();
        
        if ($result['loginState'] === Constants::S_AUTH) {
            echo json_encode([
                'code' => 0,
                'data' => $result['userinfo']
            ]);
        } else {
            echo json_encode([
                'code' => -1,
                'error' => $result['error']
            ]);
        }

        exit;
	}
}