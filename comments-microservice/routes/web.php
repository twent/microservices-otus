<?php

/**
 * @var \Laravel\Lumen\Routing\Router $router
 */
$router->group(['prefix'=>'api/v1'], function() use ($router) {
    $router->group(['prefix' => 'comments'], function () use ($router) {
        $router->get('/', 'CommentsController@index');
        $router->post('/', 'CommentsController@store');
        $router->get('/{id}', 'CommentsController@show');
        $router->put('/{id}', 'CommentsController@update');
        $router->delete('/{id}', 'CommentsController@destroy');
    });
});
