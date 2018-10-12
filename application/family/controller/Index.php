<?php
/**
 * Created by IntelliJ IDEA.
 * User: 唐彦武
 * Date: 2018/9/13
 * Time: 12:47
 */
namespace app\family\controller;
use think\Controller;

class Index extends Controller
{
    public function index(){
        return view();
    }

    public function about(){
        return view();
    }



    public function recruit(){

        return view();
    }





    public function test(){
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
                return json(['code'=>1,'msg'=>'登陆成功','user'=>$res]);
            }
            return json(['code'=>1,'msg'=>'登陆成功','user'=>$res]);
        }
        $data = array(
            'name'=>'果果',
            'like'=>'写小说',
            'age'=>'26',
            'sex'=>'女',
        );
        return json(['code'=>200,'msg'=>'登陆成功！','data'=>$data]);
//        $this->assign('users',$user);
//        return view();
    }

}