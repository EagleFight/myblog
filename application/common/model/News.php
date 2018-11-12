<?php
namespace app\common\model;

use think\Model;
use think\Db;

class News extends Model
{
    //不能写get方法，框架内部定义了get方法，本人一开始就在这里写了get方法
    //导致一直报 xxxx News::get() non static method in class xxx
    public function getNews($id = 1)
    {
        $res = Db::name('news')->where('id', $id)->select();
        // echo $this->getLastSql();
        return $res;
    }

    public function getNewsList()
    {
        $res = Db::name('news')->select();
        // echo url('picture');
        return $res;
    }
}