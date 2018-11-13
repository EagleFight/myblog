<?php
namespace app\admin\controller;

use app\api\controller\News as ApiNews;
use think\Controller;

class Index extends Controller
{
    public function index()
    {
        return view();
    }

    public function h5List()
    {
        dump(db('dream_'));exit();
//        return view();
    }

    public function login(){
//        $type = db('h5_type')->select();
        $data = array(
            'code'=> 0 ,
            'count'=>300,
            'data'=>'hello'
        );
        return json($data);
    }

    public function test(){

        //调用当前模块控制器方法一
//        $user = new User();
//        return $user->index();

        //调用当前模块控制器方法二
//        $user = controller('User');
//        return $user->index();

        //调用不同模块控制器方法一
//        $user = new ApiNews();
//        return $user->save();

        //调用不同模块控制器方法一
        $user = controller('api/News');
        return $user->save();
    }

    //同控制器
    public function test1(){
        //调用当前控制器操作方法一
//       return $this->login();

        //调用当前控制器操作方法二
//        return self::login();

        //调用当前控制器操作方法三
//        return Index::login();

        //调用当前控制器操作方法四
        return action('login');
    }
    //同模块不同控制器
    public function test2(){
        //前边的方法不说
        return $user = action('User/index');
    }

    //不同模块不同控制器
    public function test3(){
        //前边的方法不说
        return $user = action('api/News/index');
    }


}
