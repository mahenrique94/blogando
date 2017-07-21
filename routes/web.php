<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix("painel")->group(function() {
    Route::get("", "PainelController@index");
    Route::get("dashboard", "DashboardController@index");

    Route::get("posts", "PostController@index");

    Route::delete("posts/categorias/{id}", "CadCategoriaController@deletar");
    Route::get("posts/categorias", "CadCategoriaController@listar");
    Route::get("posts/categorias/formulario", "CadCategoriaController@formulario");
    Route::get("posts/categorias/json", "CadCategoriaController@json");
    Route::get("posts/categorias/{id}", "CadCategoriaController@editar");
    Route::post("posts/categorias", "CadCategoriaController@salvar")->middleware(["csrf"]);
    Route::put("posts/categorias", "CadCategoriaController@atualizar")->middleware(["csrf"]);

    Route::delete("posts/tags/{id}", "CadTagController@deletar");
    Route::get("posts/tags", "CadTagController@listar");
    Route::get("posts/tags/formulario", "CadTagController@formulario");
    Route::get("posts/tags/json", "CadTagController@json");
    Route::get("posts/tags/{id}", "CadTagController@editar");
    Route::post("posts/tags", "CadTagController@salvar")->middleware(["csrf"]);
    Route::put("posts/tags", "CadTagController@atualizar")->middleware(["csrf"]);
});