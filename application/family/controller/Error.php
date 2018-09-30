<?php
/**
 * Created by IntelliJ IDEA.
 * User: Administrator
 * Date: 2018/9/30
 * Time: 14:27
 */

namespace app\family\controller;


class Error
{
    public function _empty($name)
    {
        //把所有城市的操作解析到city方法
        echo '操作不存在';
    }

    public function index(){
        echo '控制器不存在';
    }
}