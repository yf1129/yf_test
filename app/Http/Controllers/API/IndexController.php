<?php
/**
 * Created by PhpStorm.
 * User: yf
 * Date: 2019/9/10
 * Time: 11:24
 */

namespace App\Http\Controllers\API;

use App\Http\Controllers\BaseController;
use App\Model\Index\Articles;

class IndexController extends BaseController
{
    //首页的文章列表
    public function articleList($count = 10)
    {
        $results = Articles::where('is_recommended', 2)->where('is_delete', 1)->orderBy('article_id', 'desc')->paginate($count);
        $totalNum = $results->total(); //总数目
        $totalPage = $results->lastPage(); //总页码数
//        $counts = Articles::where('is_recommended', 2)->where('is_delete', 1)->orderBy('article_id', 'desc')->total();
        $result = $results->all();
        $data = [];
        if (!empty($result)) {
            $i = 0;
            foreach ($result as $k=>$v) {
                $data[$i]['article_id'] = $v->article_id;
                $data[$i]['uid'] = $v->uid;
                $data[$i]['article_title'] = $v->article_title;
                $data[$i]['article_describe'] = $v->article_describe;
                $data[$i]['article_images'] = $v->article_images;
                $data[$i]['article_content'] = $v->article_content;
                $data[$i]['reading_nums'] = $v->reading_nums;
                $data[$i]['is_hot'] = $v->is_hot;
                $data[$i]['is_delete'] = $v->is_delete;
                $data[$i]['is_recommended'] = $v->is_recommended;
                $data[$i]['created_at'] = $v->created_at;
                $data[$i]['updated_at'] = $v->updated_at;
                $data[$i]['deleted_at'] = $v->deleted_at;
                $idModel = Articles::find($v['article_id'])->user()->get();
                if (!empty($idModel[0])) {
                    $data[$i]['article_author'] = $idModel[0]->name;
                } else {
                    $data[$i]['article_author'] = '无名氏';
                }
                $i++;
            }
        }

        return $this->resultReturn($data, $totalPage, $totalNum);
    }
}