<?php
/**
 * Created by PhpStorm.
 * User: gdy
 * Date: 2021/8/11
 * Time: 下午3:41
 */

namespace Gd\Question\Resources;
use Illuminate\Http\Resources\Json\ResourceCollection;

class QuestionCollection extends ResourceCollection
{
    public $collects = 'Gd\Question\Resources\QuestionResource';
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