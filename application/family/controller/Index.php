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

    public function test(){
        return json(['status'=>1,'msg'=>'登陆成功']);
    }

}