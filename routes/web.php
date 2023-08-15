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

$router->get('/', function () use ($router) {
    return $router->app->version();
});
//mostra todos os dados
$router->get('/usuarios','UsuarioController@mostrarTodosUsuarios');

//posta dados
$router->post('/usuario/cadastrar','UsuarioController@cadastrarUsuario');

//mostra apenas um que eu quero
$router->get('/usuario/{id}','UsuarioController@mostrarUmUsuario');

//put atualiza dados
$router->put('/usuario/{id}/atualizar','UsuarioController@atualizarUsuario');


$router->delete('/usuario/{id}/deletar','UsuarioController@deletarUsuario');

