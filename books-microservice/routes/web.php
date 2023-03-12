<?php

/**
 * @var \Laravel\Lumen\Routing\Router $router
 */
$router->group(['prefix'=>'api/v1'], function() use ($router) {
    $router->group(['prefix' => 'books'], function() use ($router) {
        $router->get('/', 'BooksController@index');
        $router->post('/', 'BooksController@store');
        $router->get('/{id}', 'BooksController@show');
        $router->put('/{id}', 'BooksController@update');
        $router->delete('/{id}', 'BooksController@destroy');
    });
});
