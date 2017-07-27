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
Route::get("/arquivo/download/{pasta}/{ano}/{mes}/{arquivo}", "ArquivoController@download");
Route::get("/arquivo/download/{pasta}/{arquivo}", "ArquivoController@download");
Route::get("/arquivo/download/{arquivo}", "ArquivoController@download");
Route::get("/arquivo/visualizar/{pasta}/{ano}/{mes}/{arquivo}", "ArquivoController@visualizar");
Route::get("/arquivo/visualizar/{past}/{arquivo}", "ArquivoController@visualizar");
Route::get("/arquivo/visualizar/{arquivo}", "ArquivoController@visualizar");

Route::get("painel/acessar", "AutenticacaoController@formulario");
Route::post("painel/autenticar", "AutenticacaoController@autenticar");

Route::group(["prefix" => "painel", "middleware" => "autenticacao"], function() {
    Route::get("", "PainelController@index");
    Route::get("dashboard", "DashboardController@index");

    Route::get("sair", "AutenticacaoController@sair");

    Route::delete("categoria/{id}", "CadCategoriaController@deletar");
    Route::get("categoria", "CadCategoriaController@listar");
    Route::get("categoria/formulario", "CadCategoriaController@formulario");
    Route::get("categoria/json", "CadCategoriaController@json");
    Route::get("categoria/{id}", "CadCategoriaController@editar");
    Route::post("categoria", "CadCategoriaController@salvar")->middleware(["csrf"]);
    Route::put("categoria", "CadCategoriaController@atualizar")->middleware(["csrf"]);

    Route::delete("tag/{id}", "CadTagController@deletar");
    Route::get("tag", "CadTagController@listar");
    Route::get("tag/formulario", "CadTagController@formulario");
    Route::get("tag/json", "CadTagController@json");
    Route::get("tag/{id}", "CadTagController@editar");
    Route::post("tag", "CadTagController@salvar")->middleware(["csrf"]);
    Route::put("tag", "CadTagController@atualizar")->middleware(["csrf"]);

    Route::delete("post/categoria/{id}", "PostCategoriaController@deletar");
    Route::get("post/categoria/json", "PostCategoriaController@json");
    Route::post("post/categoria/", "PostCategoriaController@salvar");

    Route::delete("post/tag/{id}", "PostTagController@deletar");
    Route::get("post/tag/json", "PostTagController@json");
    Route::post("post/tag/", "PostTagController@salvar");

    Route::delete("post/{id}", "PostController@deletar");
    Route::get("post", "PostController@listar");
    Route::get("post/formulario", "PostController@formulario");
    Route::get("post/json", "PostController@json");
    Route::get("post/{id}", "PostController@editar");
    Route::post("post", "PostController@salvar")->middleware(["csrf"]);
    Route::put("post", "PostController@atualizar")->middleware(["csrf"]);
});