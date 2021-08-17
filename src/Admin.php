<?php
/**
 * Created by PhpStorm.
 * User: gdy
 * Date: 2021/8/11
 * Time: 下午3:48
 */

namespace Gd\Question;


class Admin
{
    /**
     * 注册路由.
     *
     * @return void
     */
    public static function routes()
    {
        app('router')->group(['api'], function ($router) {
            /* @var \Illuminate\Routing\Router $router */
            $router->namespace('\Gd\Question\Controllers')->group(function ($router) {
                //问题分类管理
                $router->get('/question/type', 'QuestionTypeController@index')->name('question.type.index');
                $router->post('/question/type', 'QuestionTypeController@store')->name('question.type.store');
                $router->get('/question/type/{questionType}', 'QuestionTypeController@show')->name('question.type.show');
                $router->put('/question/type/{questionType}', 'QuestionTypeController@update')->name('question.type.update');
                /* @var \Illuminate\Routing\Router $router */
                $router->get('/question', 'QuestionController@index')->name('question.index');
                $router->post('/question', 'QuestionController@store')->name('question.store');
                $router->get('/question/{question}', 'QuestionController@show')->name('question.show');
                $router->put('/question/{question}', 'QuestionController@update')->name('question.update');


            });
        });
    }

}