<?php
namespace app\admin\controller;

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
        $type = db('h5_type')->select();
        $data = array(
            'code'=> 0 ,
            'count'=>300,
            'data'=>$type
        );
        return json($data);
    }


}
