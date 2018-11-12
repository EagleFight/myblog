<?php
/**
 * Created by IntelliJ IDEA.
 * User: huhu
 * Date: 2018/10/27
 * Time: 16:50
 */
namespace app\dream\controller;
use think\Controller;

class Template extends Controller
{
    public function index(){
        return view();
    }

    public function resume($tid){
        return view('temp_resume_'.$tid);
    }
}