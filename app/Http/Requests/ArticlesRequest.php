<?php

namespace App\Http\Requests;

use Auth;
use Hash;
use Validator;
use App\Model\Admin\Admin;
use Illuminate\Foundation\Http\FormRequest;

class ArticlesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
//        return false;
        return Auth::guard('admin')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //验证规则
            'title'     => 'sometimes|required|max:10',
        ];
    }

    public function messages()
    {
        return [
            'title.required'        => '文章标题不能为空',
            'title.max'             => '标题不能超过十个字符',
        ];
    }
}
