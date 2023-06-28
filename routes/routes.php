<?php
namespace Routes;

use Bramus\Router\Router as Router;

$router = new Router();

//rutas para la tabla pais pais
$router->mount('/api/pais', function() use($router){
    $router->get('/get','App\Controllers\PaisController@getPais');
    $router->post('/post','App\Controllers\PaisController@postPais');
    $router->put('/put','App\Controllers\PaisController@updatePais');
    $router->delete('/delete','App\Controllers\PaisController@deletePais');
});



$router->run();

?>