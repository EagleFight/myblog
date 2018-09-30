<?php
/**
 * Created by IntelliJ IDEA.
 * User: Administrator
 * Date: 2018/9/28
 * Time: 11:30
 */

namespace app\family\controller;


use think\Controller;

class Wedding extends Controller
{
    public function _empty($name)
    {
        //把所有城市的操作解析到city方法
        echo '页面不存在';
    }

    public function index(){
        return view();
    }
}