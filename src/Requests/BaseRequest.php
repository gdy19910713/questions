<?php
/**
 * Created by PhpStorm.
 * User: gdy
 * Date: 2021/8/13
 * Time: 下午1:45
 */

namespace Gd\Question\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Route;

class BaseRequest extends FormRequest
{
    /**
     * 验证失败处理
     *
     * @param object $validator
     * @throws Illuminate\Http\Exceptions\HttpResponseException
     */
    public function failedValidation($validator)
    {
        $error = $validator->errors()->first();
        // $allErrors = $validator->errors()->all(); 所有错误
        // 验证错误
        $response = response()->json([
            'code' => 700200,
            'message' => $error,
        ]);

        throw new HttpResponseException($response);
    }
    /**
     * 路由名称转驼峰
     * @function_name testStoreValidate
     *
     * @return array
     */
    public function rules()
    {
        $currentRouteName = Route::currentRouteName();
        return $this->{$this->camelize($currentRouteName) . 'Validate'}();
    }
    /**
     * 路由转驼峰
     * 小写和大写紧挨一起的地方,加上分隔符,然后全部转小写
     * $this->{$this->camelize($currentRouteName).'Validate'}();
     * ***StoreValidate
     * @param string $uncamelized_words
     * @param string $separator
     * @return string
     */
    protected function camelize($uncamelized_words, $separator = '.')
    {
        $uncamelized_words = $separator . str_replace($separator, " ", strtolower($uncamelized_words));
        return ltrim(str_replace(" ", "", ucwords($uncamelized_words)), $separator);
    }
}