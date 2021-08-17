<?php
/**
 * Created by PhpStorm.
 * User: gdy
 * Date: 2021/8/13
 * Time: 下午1:49
 */

namespace Gd\Question\Controllers;


class BaseController
{
    public function success($code = 200,  $data = [],$message ='')
    {
        return response()->json([
            'code' => 0,
            'data' => $data,
            'message' => $message
        ], $code);
    }

    public function error($message, $code = 200, $error_code = 710000, $data = [])
    {
        return response()->json([
            'code' => $error_code,
            'data' => $data,
            'message' => $message,
        ], $code);
    }
    public function timeOut($message, $code = 200, $error_code = 700003, $data = [])
    {
        return response()->json([
            'code' => $error_code,
            'data' => $data,
            'message' => $message,
        ], $code);
    }
    public function response($res, $data, $message, $code = 200)
    {
        return response()->json([
            'code' => $res?0:201,
            'data' => $res?$data:$res,
            'message' => $res?'':$message,
        ], $code);
    }
}