<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

//Api routes
$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('categories', 'Api\CategoryController@index');
    $router->get('quizzes', 'Api\QuizController@index');
    $router->get('quizzes/{id}', 'Api\QuizController@show');
    $router->get('question/{id}', 'Api\QuestionController@show');
    $router->post('answer', 'Api\AnswerController@check');

    //Authentication routes
    $router->post('login', 'Api\AuthController@login');
});

//Any routes
$router->get('/{route:.*}/', function () use ($router) {
    return view('home');
});
