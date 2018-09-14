<?php

namespace app\home\controller;
use think\Controller;
use think\Db;

class Index extends Controller
{
    public function login()
    {
        return view();
    }

    public function index()
    {
        return view();
    }

    public function chat1()
    {
        $user = db('chat_user');
        $users = $user->select();
//        dump($users);
        if(request()->isAjax()){
            $post = $this->request->post();
            if(empty($post['name'])) return json(['status'=>0,'msg'=>'请输入您的姓名']);
            if(empty($post['password'])) return json(['status'=>0,'msg'=>'请输入密码']);
            $res = $user->where(['u_loginID'=>$post['name']])->find();
            if(!$res) {
                return json(['status'=>0,'msg'=>'账号不存在']);
            }elseif ($post['password']!=$res['u_password']){
                return json(['status'=>0,'msg'=>'密码不存在']);
            }else{
                return json(['status'=>1,'msg'=>'登陆成功','user'=>$res]);
            }
        }
        $this->assign('users',$user);
        return view();
    }
}
