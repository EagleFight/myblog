<?php
/**
 * Created by IntelliJ IDEA.
 * User: huhu
 * Date: 2018/10/27
 * Time: 16:50
 */
namespace app\dream\controller;
use think\Controller;

class Index extends Controller
{
    public function index(){
//        $ac_name = 'index';
//        $this->assign('ac_name',$ac_name);
        $this->assign('ac_name','index');
        return $this->fetch('index');
    }
    public function product(){
        $this->assign('ac_name','product');
        return view();
    }
    public function aboutus(){
        $this->assign('ac_name','aboutus');
        return view();
    }

    public function solutions(){
        $this->assign('ac_name','solutions');
        return view();
    }
}