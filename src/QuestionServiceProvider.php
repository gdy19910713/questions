<?php
/**
 * Created by PhpStorm.
 * User: gdy
 * Date: 2021/8/12
 * Time: 下午1:47
 */

namespace Gd\Question;

use Illuminate\Support\ServiceProvider;

class QuestionServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../database/migrations/CreateQuestionTables.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_question_tables.php'),
            // 你可以在这里添加更多的迁移
        ], 'migrations');
    }
}