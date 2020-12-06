<?php
namespace App\Util;

class PasswordUtil{

    public static function md5($password){
        return md5($password . config('common.password_md5_key'));
    }

}
