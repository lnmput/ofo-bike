<?php
/**
 * Created by PhpStorm.
 * User: edu
 * Date: 2017/6/2
 * Time: 20:02
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;

class LoginController extends Controller
{

    /**渲染管理员登陆界面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showLogin()
    {
        return view('admin.login');
    }

    /**
     * 登陆操作
     * @param AdminLoginRequest $loginRequest
     * @return mixed
     */
    public function postLogin(AdminLoginRequest $loginRequest)
    {
        $data = $loginRequest->only('name', 'password');
        $result = \Auth::guard('admin')->attempt($data, true);
        if ($result){
            return redirect(route('admin.home'));
        }else{
            return redirect()->back()
                ->with('name',$loginRequest->get('name'))
                ->withErrors(['name'=>'用户名或者密码错误']);
        }
    }

    public function postLogout()
    {
        \Auth::guard('admin')->logout();
        return redirect(route('admin.login.show'));
    }
}