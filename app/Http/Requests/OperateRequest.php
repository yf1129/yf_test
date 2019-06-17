<?php

namespace App\Http\Requests;

use Auth;
use Hash;
use Validator;
use App\Model\Admin\Admin;
use Illuminate\Foundation\Http\FormRequest;

class OperateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
//        return true;
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
            'name'     => 'sometimes|required|max:10',
        ];
    }

    public function messages()
    {
        return [
            'name.required'        => '标签名称不能为空',
            'name.max'             => '标签名不能超过十个字符',
        ];
    }
}
