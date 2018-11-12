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
    public function index($tid){
        $fn = 'tempH'.$tid;
        return view($this->$fn());
    }

    public function resume($tid){
        $fn = 'tempResume'.$tid;
        return view($this->$fn());
    }

    /*
     * *H5模板
     */

    public function tempH1(){
        return 'temp_h5_1';
    }

    /*
     * *pc模板
     */

    /*
     * *简历模板
     */
    public function tempResume1(){
        return 'temp_resume_1';
    }
}