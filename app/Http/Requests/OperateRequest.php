<?php

namespace App\Http\Requests;

use Auth;
use Hash;
use Illuminate\Foundation\Http\FormRequest;
use Validator;

class OperateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $this->addValidator();

        return [
            //验证规则
            'name'     => 'sometimes|required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'        => '标签名称不能为空',
        ];
    }
}
