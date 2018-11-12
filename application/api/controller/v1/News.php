<?php
/**
 * Created by IntelliJ IDEA.
 * User: Administrator
 * Date: 2018/11/9
 * Time: 15:37
 */
namespace app\api\controller\v1;

use think\Controller;

class News extends Controller
{
    public function index()
    {
        $id = input('id');
        $model = model('News');
        $data = $model->getNews($id);// 查询数据
        if ($data) {
            $code = 200;
        } else {
            $code = 404;
        }
        $data = [
            'code' => $code,
            'data' => $data
        ];

        return $data;
    }
}