<?php
/**
 * Created by PhpStorm.
 * User: gdy
 * Date: 2021/8/11
 * Time: 下午3:35
 */

namespace Gd\Question\Controllers;

use Gd\Question\Models\QuestionType;
use Gd\Question\Requests\QuestionTypeRequest;
use Gd\Question\Resources\QuestionTypeCollection;
use Gd\Question\Resources\QuestionTypeResource;
use Illuminate\Database\Eloquent\Builder;
class QuestionTypeController extends BaseController
{
    public function index(QuestionTypeRequest $request)
    {
        $data=$request->validated();
        $redPackets = QuestionType::query()
            ->orderBy('created_at', 'desc')
            ->when($request->has('size'), function (Builder $query) use ($data) {
                return $query->paginate($data['size']);
            }, function (Builder $query) {
                return $query->get();
            });
        return $this->success(200,new QuestionTypeCollection($redPackets),'');
    }

    public function show(QuestionType $questionType)
    {
        return $this->success(200, new QuestionTypeResource($questionType));
    }

    public function update(QuestionTypeRequest $request,QuestionType $questionType)
    {
        $data = $request->validated();
        $result    = $questionType->update($data);
        if (!$result) {
            return $this->error('更新失败');
        }
        return $this->success(200, '','更新成功');
    }

    public function store(QuestionTypeRequest $request)
    {
        $data   = $request->validated();
        $result = QuestionType::create($data);
        if (!$result) {
            return $this->error('创建失败');
        }
        return $this->success(200, '', '创建成功');
    }
}