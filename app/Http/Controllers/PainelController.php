<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;

class PainelController extends Controller
{
    private $admUsuarioController;
    private $admUsuarioParametrosController;
    private $tblPerfilController;

    public function __construct(AdmUsuarioController $admUsuarioController, AdmUsuarioParametrosController $admUsuarioParametrosController, TblPerfilController $tblPerfilController) {
        $this->admUsuarioController = $admUsuarioController;
        $this->admUsuarioParametrosController = $admUsuarioParametrosController;
        $this->tblPerfilController = $tblPerfilController;
    }

    public function novaConta() {
        return view("temas." . Blog::first()->aparencia->temablog . ".conta");
    }

    public function index() {
        return redirect()->action("DashboardController@index");
    }

    public function criarConta(Request $request) {
        $MENSAGEM_SUCESSO = "Conta criada com sucesso, para acessar sua conta é só fazer o login";
        $usuario = $this->admUsuarioController->novo($request);
        $this->admUsuarioParametrosController->novo($usuario);
        $this->tblPerfilController->novo($request, $usuario);
        return redirect()->action("PainelController@novaConta")->withInput(["sucesso" => $MENSAGEM_SUCESSO, "mensagem" => $MENSAGEM_SUCESSO]);
    }

}
