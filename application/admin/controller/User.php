<?php
/**
 * Created by IntelliJ IDEA.
 * User: Administrator
 * Date: 2018/7/14
 * Time: 13:53
 */

namespace app\admin\controller;


use think\Db;

class User
{
    public function index(){
//        header("Access-Control-Allow-Origin:http://a.com");          //设置允许a.com发起的跨域请求
//        header("Access-Control-Allow-Origin:$array");                //设置允许多个域名发起跨域请求
//        header("Access-Control-Allow-Origin:*");                     //设置允许任意域名发起的跨域请求
//        header("Access-Control-Allow-Headers:X-Requested-With,X_Requested_With");//设置为任意域名时需要

        $user = array(
            'name'=>'唐彦武',
            'sex'=>'男',
            'intro'=>'25',
            'create_time'=>'2018',
            'mobile'=>'13919545516',

        );
        return json($user);
    }
}