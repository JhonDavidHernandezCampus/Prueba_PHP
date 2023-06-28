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

//rutas para la tabla departamento
$router->mount('/api/departamento', function() use($router){
    $router->get('/get','App\Controllers\DepartamentoController@getDepartamento');
    $router->post('/post','App\Controllers\DepartamentoController@postDepartamento');
    $router->put('/put','App\Controllers\DepartamentoController@updateDepartamento');
    $router->delete('/delete','App\Controllers\DepartamentoController@deleteDepartamento');
});


//rutas para la tabla Region
$router->mount('/api/region', function() use($router){
    $router->get('/get','App\Controllers\RegionController@getRegion');
    $router->post('/post','App\Controllers\RegionController@postRegion');
    $router->put('/put','App\Controllers\RegionController@updateRegion');
    $router->delete('/delete','App\Controllers\RegionController@deleteRegion');
});

//rutas para la tabla Campers
$router->mount('/api/campers', function() use($router){
    $router->get('/get','App\Controllers\CampersController@getCampers');
    $router->post('/post','App\Controllers\CampersController@postCampers');
    $router->put('/put','App\Controllers\CampersController@updateCampers');
    $router->delete('/delete','App\Controllers\CampersController@deleteCampers');
});





$router->run();

?>