<?php
/**
 * Created by PhpStorm.
 * User: yf
 * Date: 2019/9/6
 * Time: 11:36
 * 前端相关
 */

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\Model\Index\Articles;

class IndexController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth.admin')->only('indexView');
    }

    //首页
    public function homeView()
    {
        return view('index.home');
    }
}