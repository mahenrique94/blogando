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
Route::get("/arquivo/download/{arquivom}", "ArquivoController@download");
Route::get("/arquivo/visualizar/{pasta}/{ano}/{mes}/{arquivo}", "ArquivoController@visualizar");
Route::get("/arquivo/visualizar/{pasta}/{arquivo}", "ArquivoController@visualizar");
Route::get("/arquivo/visualizar/{arquivo}", "ArquivoController@visualizar");

Route::get("painel/acessar", "AutenticacaoController@formulario");
Route::get("painel/acessar/perfil/{idPerfil}/{relembrar}", "AutenticacaoController@autenticarPerfil");
Route::get("painel/acessar/perfil/escolher/{idUsuario}/{relembrar}", "AutenticacaoController@escolherPerfil");
Route::get("painel/nova/conta", "PainelController@novaConta");
Route::post("painel/autenticar", "AutenticacaoController@autenticar");
Route::post("painel/criar/conta", "PainelController@criarConta");

Route::group(["prefix" => "api"], function() {
    Route::get("administrador/permissao/json", "AdmPermissaoController@json");

    Route::get("administrador/tipo-de-acesso/json", "AdmTipoAcessoController@json");

    Route::get("administrador/grupo/json", "AdmGrupoController@json");

    Route::get("categoria/json", "CadCategoriaController@json");

    Route::get("comentario/json", "PostComentarioController@json");

    Route::get("configuracoes/rede-social/json", "BlogRedeSocialController@json");

    Route::get("newsletter/json", "BlogNewsletterController@json");

    Route::get("post/categoria/json", "PostCategoriaController@json");

    Route::get("post/tag/json", "PostTagController@json");

    Route::get("post/recentes/json", "PostController@jsonRecentes");
    Route::get("post/json", "PostController@json");

    Route::get("tag/json", "CadTagController@json");

    Route::get("usuarios/json", "TblPerfilController@json");
});

Route::group(["prefix" => "painel", "middleware" => "autenticacao"], function() {
    Route::get("", "PainelController@index");

    Route::delete("administrador/permissao/{id}", "AdmPermissaoController@deletar");
    Route::get("administrador/permissao", "AdmPermissaoController@listar");
    Route::get("administrador/permissao/formulario", "AdmPermissaoController@formulario");
    Route::get("administrador/permissao/{id}", "AdmPermissaoController@editar");
    Route::post("administrador/permissao", "AdmPermissaoController@salvar")->middleware(["csrf"]);
    Route::put("administrador/permissao", "AdmPermissaoController@atualizar")->middleware(["csrf"]);

    Route::delete("administrador/tipo-de-acesso/{id}", "AdmTipoAcessoController@deletar");
    Route::get("administrador/tipo-de-acesso", "AdmTipoAcessoController@listar");
    Route::get("administrador/tipo-de-acesso/formulario", "AdmTipoAcessoController@formulario");
    Route::get("administrador/tipo-de-acesso/{id}", "AdmTipoAcessoController@editar");
    Route::post("administrador/tipo-de-acesso", "AdmTipoAcessoController@salvar")->middleware(["csrf"]);
    Route::put("administrador/tipo-de-acesso", "AdmTipoAcessoController@atualizar")->middleware(["csrf"]);

    Route::delete("administrador/grupo/{id}", "AdmGrupoController@deletar");
    Route::get("administrador/grupo", "AdmGrupoController@listar");
    Route::get("administrador/grupo/formulario", "AdmGrupoController@formulario");
    Route::get("administrador/grupo/{id}", "AdmGrupoController@editar");
    Route::post("administrador/grupo", "AdmGrupoController@salvar")->middleware(["csrf"]);
    Route::put("administrador/grupo", "AdmGrupoController@atualizar")->middleware(["csrf"]);

    Route::delete("categoria/{id}", "CadCategoriaController@deletar");
    Route::get("categoria", "CadCategoriaController@listar");
    Route::get("categoria/formulario", "CadCategoriaController@formulario");
    Route::get("categoria/{id}", "CadCategoriaController@editar");
    Route::post("categoria", "CadCategoriaController@salvar")->middleware(["csrf"]);
    Route::put("categoria", "CadCategoriaController@atualizar")->middleware(["csrf"]);

    Route::delete("comentario/{id}", "PostComentarioController@deletar");
    Route::get("comentario", "PostComentarioController@listar");
    Route::get("comentario/{id}", "PostComentarioController@editar");
    Route::put("comentario", "PostComentarioController@atualizar")->middleware(["csrf"]);

    Route::get("configuracoes/aparencia", "BlogAparenciaController@formulario");
    Route::get("configuracoes/compartilhamento", "BlogParametrosController@compartilhamento");
    Route::get("configuracoes/discussao", "BlogParametrosController@discussao");
    Route::get("configuracoes/escrita", "BlogParametrosController@escrita");
    Route::get("configuracoes/geral", "BlogController@formulario");
    Route::get("configuracoes/leitura", "BlogParametrosController@leitura");
    Route::get("configuracoes/newsletter", "BlogNewsletterParametrosController@formulario");
    Route::put("configuracoes/aparencia", "BlogAparenciaController@atualizar");
    Route::put("configuracoes/compartilhamento", "BlogParametrosController@compartilhamentoAtualizar");
    Route::put("configuracoes/discussao", "BlogParametrosController@discussaoAtualizar");
    Route::put("configuracoes/escrita", "BlogParametrosController@escritaAtualizar");
    Route::put("configuracoes/geral", "BlogController@atualizar");
    Route::put("configuracoes/leitura", "BlogParametrosController@leituraAtualizar");
    Route::put("configuracoes/newsletter", "BlogNewsletterParametrosController@atualizar");

    Route::delete("configuracoes/rede-social/{id}", "BlogRedeSocialController@deletar");
    Route::get("configuracoes/rede-social", "BlogRedeSocialController@listar");
    Route::get("configuracoes/rede-social/formulario", "BlogRedeSocialController@formulario");
    Route::get("configuracoes/rede-social/{id}", "BlogRedeSocialController@editar");
    Route::post("configuracoes/rede-social", "BlogRedeSocialController@salvar")->middleware(["csrf"]);
    Route::put("configuracoes/rede-social", "BlogRedeSocialController@atualizar")->middleware(["csrf"]);

    Route::get("dashboard", "DashboardController@index");
    Route::get("dashboard/meu/perfil", "DashboardController@meuPerfil");
    Route::get("dashboard/meus/agendamentos", "DashboardController@meusAgendamentos");
    Route::get("dashboard/meus/comentarios", "DashboardController@meusComentarios");
    Route::get("dashboard/meus/posts", "DashboardController@meusPosts");
    Route::get("dashboard/meus/posts/curtidos", "DashboardController@meuspostsCurtidos");
    Route::get("dashboard/meus/posts/favoritos", "DashboardController@meusPostsFavoritos");
    Route::get("dashboard/meus/rascunhos", "DashboardController@meusRascunhos");
    Route::put("dashboard/meu/perfil/atualizar", "DashboardController@meuPerfilSalvar");

    Route::delete("newsletter/{id}", "BlogNewsletterController@deletar");
    Route::get("newsletter", "BlogNewsletterController@listar");
    Route::get("newsletter/formulario", "BlogNewsletterController@formulario");
    Route::get("newsletter/{id}", "BlogNewsletterController@editar");
    Route::post("newsletter", "BlogNewsletterController@salvar")->middleware(["csrf"]);
    Route::put("newsletter", "BlogNewsletterController@atualizar")->middleware(["csrf"]);

    Route::post("notificacao/ler/{id}", "BlogNotificacaoController@ler");

    Route::delete("midia/{id}", "BlogMidiaController@deletar");
    Route::post("midia/adicionar", "BlogMidiaController@adicionar");
    Route::get("midia/biblioteca", "BlogMidiaController@biblioteca");
    Route::get("midia/formulario", "BlogMidiaController@formulario");

    Route::delete("post/categoria/{id}", "PostCategoriaController@deletar");
    Route::post("post/categoria/", "PostCategoriaController@salvar");

    Route::delete("post/tag/{id}", "PostTagController@deletar");
    Route::post("post/tag/", "PostTagController@salvar");

    Route::delete("post/{id}", "PostController@deletar");
    Route::get("post", "PostController@listar");
    Route::get("post/agendados", "PostController@listarAgendados");
    Route::get("post/rascunhos", "PostController@listarRascunhos");
    Route::get("post/formulario", "PostController@formulario");
    Route::get("post/{id}", "PostController@editar");
    Route::get("post/pre-visualizar/{situacao}/{slug}", "PostController@preVisualizar");
    Route::post("post", "PostController@salvar")->middleware(["csrf"]);
    Route::post("post/rascunho", "PostController@salvarRascunho")->middleware(["csrf"]);
    Route::put("post", "PostController@atualizar")->middleware(["csrf"]);
    Route::put("post/publicar", "PostController@publicar")->middleware(["csrf"]);
    Route::put("post/rascunho", "PostController@atualizarRascunho")->middleware(["csrf"]);

    Route::get("sair", "AutenticacaoController@sair");

    Route::delete("tag/{id}", "CadTagController@deletar");
    Route::get("tag", "CadTagController@listar");
    Route::get("tag/formulario", "CadTagController@formulario");
    Route::get("tag/{id}", "CadTagController@editar");
    Route::post("tag", "CadTagController@salvar")->middleware(["csrf"]);
    Route::put("tag", "CadTagController@atualizar")->middleware(["csrf"]);

    Route::delete("usuarios/rede-social/{id}", "AdmUsuarioRedeSocialController@deletar");
    Route::get("usuarios/rede-social", "AdmUsuarioRedeSocialController@listar");
    Route::get("usuarios/rede-social/formulario", "AdmUsuarioRedeSocialController@formulario");
    Route::get("usuarios/rede-social/json", "AdmUsuarioRedeSocialController@json");
    Route::get("usuarios/rede-social/{id}", "AdmUsuarioRedeSocialController@editar");
    Route::post("usuarios/rede-social", "AdmUsuarioRedeSocialController@salvar")->middleware(["csrf"]);
    Route::put("usuarios/rede-social", "AdmUsuarioRedeSocialController@atualizar")->middleware(["csrf"]);

    Route::get("usuarios/configuracoes/{id}", "AdmUsuarioParametrosController@editar");
    Route::put("usuarios/configuracoes", "AdmUsuarioParametrosController@atualizar")->middleware(["csrf"]);

    Route::delete("usuarios/{id}", "AdmUsuarioController@deletar");
    Route::get("usuarios", "AdmUsuarioController@listar");
    Route::get("usuarios/formulario", "AdmUsuarioController@formulario");
    Route::get("usuarios/{id}", "AdmUsuarioController@editar");
    Route::post("usuarios", "AdmUsuarioController@salvar")->middleware(["csrf"]);
    Route::put("usuarios", "AdmUsuarioController@atualizar")->middleware(["csrf"]);

    Route::delete("usuarios/perfil/{id}", "TblPerfilController@deletar");
    Route::get("usuarios/perfil/formulario", "TblPerfilController@formulario");
    Route::get("usuarios/perfil/{id}", "TblPerfilController@editar");
    Route::post("usuarios/perfil", "TblPerfilController@salvar")->middleware(["csrf"]);
    Route::put("usuarios/perfil", "TblPerfilController@atualizar")->middleware(["csrf"]);
});

Route::get("", "BlogandoController@index");
Route::get("/pagina/{pagina}", "BlogandoController@index");
Route::get("/anuncie", "BlogandoController@anuncie");
Route::get("/arquivo/{ano}/{mes}", "BlogandoController@arquivo");
Route::get("/arquivo/{ano}/{mes}/pagina/{pagina}", "BlogandoController@arquivo");
Route::get("/autor/{slug}", "BlogandoController@autor");
Route::get("/autor/{slug}/pagina/{pagina}", "BlogandoController@autor");
Route::get("/categoria/{slug}", "BlogandoController@categoria");
Route::get("/categoria/{slug}/pagina/{pagina}", "BlogandoController@categoria");
Route::get("/contato", "BlogandoController@contato");
Route::get("/procurar", "BlogandoController@procurar");
Route::get("/procurar/pagina/{pagina}", "BlogandoController@procurar");
Route::get("/sobre", "BlogandoController@sobre");
Route::get("/{slug}", "BlogandoController@post");
Route::get("/tag/{slug}", "BlogandoController@tag");
Route::get("/tag/{slug}/pagina/{pagina}", "BlogandoController@tag");
Route::post("/comentario", "BlogandoController@comentar");
Route::post("/post/curtir", "PostEstatisticasController@curtirPost");
Route::post("/post/favoritar", "PostEstatisticasController@favoritarPost");

Route::get("/email/enviar", "EmailController@enviar");
Route::get("/email/template", "EmailController@template");

Route::post("/newsletter/assinar", "BlogNewsletterController@assinar");
Route::get("/newsletter/confirmar/{hash}", "BlogNewsletterController@confirmar");
