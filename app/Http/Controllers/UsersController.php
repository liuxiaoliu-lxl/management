<?php

namespace App\Http\Controllers;
use App\Models\UsersModel;
use App\Util\PasswordUtil;
use App\Util\ResponseUtil;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    /**
     * login
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request){
        $username = $request->post('username', '');
        $password = $request->post('password', '');
        if(empty($username) || empty($password)){
            return ResponseUtil::responseJson(ResponseUtil::LOGIN_FAILED, '密码不能为空');
        }

        $user = (new UsersModel())->getUserByName($username);

        $password = PasswordUtil::md5($password);
        if(empty($user) || $user['password'] != $password){
            return ResponseUtil::responseJson(ResponseUtil::LOGIN_FAILED, '密码错误');
        }
        $request->session()->put('user.id',    $user['id']);
        $request->session()->put('user.name',  $user['username']);
        $request->session()->put('user.role',  $user['role']);
        $request->session()->put('user.nickname',  $user['nickname']);

        return ResponseUtil::responseJson(ResponseUtil::SUCCESS);
    }

    public function loginOut(Request $request){
        $request->session()->remove('user');
        return view('users.index');
    }

    public function save(Request $request){
        $username = $request->post('username', '');
        if(empty($username)){
            return ResponseUtil::responseJson(ResponseUtil::LOGIN_FAILED, '用户名不能为空');
        }

        $password = $request->post('password', '');
        if(empty($password)){
            return ResponseUtil::responseJson(ResponseUtil::LOGIN_FAILED, '密码不能为空');
        }

        $id = $request->post('id', 0);
        $nickname = $request->post('nickname', '');
        $password = PasswordUtil::md5($password);
        $data = [
            'username'  => $username,
            'password'  => $password,
            'nickname'  => $nickname,
        ];

        if(empty($id)){
            (new UsersModel())->insert($data);
        }
        else{
            (new UsersModel())->where('id', $id)->update($data);
        }

        return ResponseUtil::responseJson(ResponseUtil::SUCCESS);
    }

    public function __call($method, $parameters)
    {
        return view('users.' . $method);
    }

}
