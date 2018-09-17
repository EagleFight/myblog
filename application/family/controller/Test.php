<?php

namespace app\family\controller;

use think\Controller;
use think\Request;

class Test extends Controller
{
//    public function __construct(Request $request = null)
//    {
//            }

    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        return json(['code'=>1,'msg'=>'test']);
        //
    }


    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        return json(['code'=>1,'msg'=>'test/create']);    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        return json(['code'=>1,'msg'=>'save']);
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}
