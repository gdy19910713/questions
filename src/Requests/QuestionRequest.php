<?php
/**
 * Created by PhpStorm.
 * User: gdy
 * Date: 2021/8/13
 * Time: 下午1:44
 */

namespace Gd\Question\Requests;

use Gd\Question\Requests\BaseRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class QuestionRequest extends BaseRequest
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

    public function questionStoreValidate()
    {
        return [
            'detail' => 'required',
            'title'  => 'required',
            'type'   => 'required|integer',
        ];
    }

    public function questionUpdateValidate()
    {
        return [
            'detail' => 'required',
            'title'  => 'required',
            'type'   => 'required|integer',
        ];
    }

    public function questionIndexValidate()
    {
        return [
            'page' => 'sometimes|integer',
            'size' => 'sometimes|integer',
        ];
    }

    public function messages()
    {
        return [
            'detail.required' => '回答必填',
            'title.required'  => '问题标题必填',
            'type.required'   => '未选择分类',
            'type.integer'    => '分类名称格式错误',
            'page.sometimes'  => '当前页不能为空',
            'page.integer'    => '当前页格式错误',
            'size.sometimes'  => '分页大小不能为空',
            'size.integer'    => '分页大小格式错误',
        ];
    }
}