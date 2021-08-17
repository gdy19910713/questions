<?php
/**
 * Created by PhpStorm.
 * User: gdy
 * Date: 2021/8/11
 * Time: 下午3:44
 */

namespace Gd\Question\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuestionTypeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'   => $this->id,
            'name' => $this->name,
        ];
    }

}