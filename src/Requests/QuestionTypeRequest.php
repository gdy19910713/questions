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

class QuestionTypeRequest extends BaseRequest
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
    public function questionTypeStoreValidate()
    {
        return [
            'name' => 'required|unique:question_types',
        ];
    }

    public function questionTypeUpdateValidate()
    {
        return [
            'name' => 'required|unique:question_types',
        ];
    }

    public function questionTypeIndexValidate()
    {
        return [
            'page' => 'required|integer',
            'size' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'name.required'  => '分类名称必填',
            'name.unique'    => '分类名称已存在',
            'page.required' => '当前页不能为空',
            'page.integer'   => '当前页格式错误',
            'size.required' => '分页大小不能为空',
            'size.integer'   => '分页大小格式错误',
        ];
    }
}