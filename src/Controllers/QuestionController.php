<?php
/**
 * Created by PhpStorm.
 * User: gdy
 * Date: 2021/8/11
 * Time: 下午3:35
 */

namespace Gd\Question\Controllers;


use Gd\Question\Models\Question;
use Gd\Question\Requests\QuestionRequest;
use Gd\Question\Resources\QuestionCollection;
use Gd\Question\Resources\QuestionResource;

class QuestionController extends BaseController
{
    public function index(QuestionRequest $request)
    {
        $redPackets = Question::query()
            ->when($request->filled('type'), function ($query) use ($request) {
                return $query->where('type', $request->type);
            })
            ->when($request->filled('keywords'), function ($query) use ($request) {
                return $query->OrWhere('id', $request->keywords)->OrWhere('title', $request->keywords);
            })
            ->orderBy('created_at', 'desc')
            ->paginate($request->size, ['*'], 'page', $request->page);
        return $this->success(200, new QuestionCollection($redPackets), '');
    }

    public function show(Question $question)
    {
        return $this->success(200, new QuestionResource($question->load('getType')));
    }

    public function update(QuestionRequest $questionRequest, Question $question)
    {
        $data   = $questionRequest->validated();
        $result = $question->update($data);
        if (!$result) {
            return $this->error('更新失败');
        }
        return $this->success(200, '', '更新成功');
    }

    public function store(QuestionRequest $questionRequest)
    {
        $adminUser                    = \Auth::guard('api')->user();
        $data                         = $questionRequest->validated();
        $data['create_admin_user_id'] = $adminUser->id;
        $result                       = Question::create($data);
        if (!$result) {
            return $this->error('创建失败');
        }
        return $this->success(200, '', '创建成功');
    }
}