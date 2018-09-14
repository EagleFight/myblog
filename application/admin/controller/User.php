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
        $user = Db::table('health_user')->where('user_type','eq',1)->select();

        return json($user);
    }
}