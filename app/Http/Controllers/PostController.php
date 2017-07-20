<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        return view("painel.post.index", ["pagina" => "posts"], ["subpagina" => "todos"]);
    }
}
