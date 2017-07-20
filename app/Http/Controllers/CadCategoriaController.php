<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CadCategoriaController extends Controller implements GenericoController
{    
    public function deletar() {

    }

    public function editar() {

    }

    public function formulario() {
        return view("painel.cadcategoria.formulario", ["pagina" => "posts", "subpagina" => "categorias"]);
    }
    
    public function listar() {
        return view("painel.cadcategoria.lista", ["pagina" => "posts", "subpagina" => "categorias"]);
    }
}
