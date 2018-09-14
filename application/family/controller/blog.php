<?php
/**
 * Created by IntelliJ IDEA.
 * User: 唐彦武
 * Date: 2018/9/14
 * Time: 10:33
 */

namespace app\family\controller;
use think\Controller;
use think\controller\Rest;

class Blog extends Rest
{
    public function index()
    {
        switch ($this->method){
            case 'get': // get请求处理代码
                json(['code'=>1,'msg'=>'get']);
                if ($this->type == 'html'){
                } elseif ($this->type == 'xml'){
                }
                break;
            case 'put': // put请求处理代码
                json(['code'=>1,'msg'=>'put']);
                break;
            case 'post': // post请求处理代码
                json(['code'=>1,'msg'=>'post']);
                break;
        }
    }
}