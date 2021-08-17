<?php
/**
 * Created by PhpStorm.
 * User: gdy
 * Date: 2021/8/11
 * Time: 下午3:43
 */

namespace Gd\Question\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class QuestionTypeCollection extends ResourceCollection
{
    public $collects = 'Gd\Question\Resources\QuestionTypeResource';
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'total' => $this->resource->toArray()['total'],
            'list'  => $this->collection,
        ];
    }
}