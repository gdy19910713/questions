<?php
/**
 * Created by PhpStorm.
 * User: gdy
 * Date: 2021/8/11
 * Time: 下午3:37
 */

namespace Gd\Question\Models;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $guarded = [];

    public function getType()
    {
        return $this->belongsTo(QuestionType::class, 'type', 'id');
    }

}