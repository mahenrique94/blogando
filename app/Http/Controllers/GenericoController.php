<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

interface GenericoController {

    public function atualizar(Request $request);
    public function deletar($id);
    public function editar($id);
    public function formulario();
    public function json();
    public function listar(Request $request);
    public function salvar(Request $request);

}