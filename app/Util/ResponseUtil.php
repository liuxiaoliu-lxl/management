<?php
namespace App\Util;

class ResponseUtil{

    const SUCCESS = 200;
    const LOGIN_FAILED = 4001;
    const LOGIN_EXPIRE = 4002;
    const USER_PASS_NOT_EMPTY = 4003;
    const USER_PASS_ERROR = 4004;

    const CUSTOMER_EMPTY = 4101;
    const CUSTOMER_EXISTS = 4102;

    private static $message = [
        self::SUCCESS       => '成功',

        self::LOGIN_FAILED  => '非法登录',
        self::LOGIN_EXPIRE  => '登录超时',
        self::USER_PASS_NOT_EMPTY  => '用户名密码不能为空',
        self::USER_PASS_ERROR  => '用户名密码错误',

        self::CUSTOMER_EMPTY => '客户参数不能为空',
        self::CUSTOMER_EXISTS => '客户已存在'
    ];

    public static function responseJson($code, $message = '', $data = []){
        if(empty($message)){
            $message = self::$message[$code];
        }

        $result = [ 'code'  => $code, 'msg'   => $message, 'data'  => $data ];
        return response()->json($result);
    }
}
