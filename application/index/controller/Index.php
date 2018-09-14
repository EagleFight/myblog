<?php
namespace app\index\controller;

use think\View;

class Index
{
    public function index()
    {
        return view();
    }
    public function nurse(){
        return view();
    }
    public function manager(){
        return view();
    }
    public function zhaopin(){
        return view();
    }
    public function detail(){
        return view();
    }
    public function contact(){
        return view();
    }
    public function map(){
        return view();
    }
    public function video(){
        $vid = $_GET['vid'];
        $type = $_GET['type'];
        $view = new View();
        $view->vid = $vid;
        $view->assign('type',$type);
        return $view->fetch();
    }

    public function talk(){
        return view();
    }
}
