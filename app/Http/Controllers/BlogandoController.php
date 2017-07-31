<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogandoController extends Controller
{
    public function index() {
        $tema = "blogando";
        return view("temas." . $tema . ".index");
    }
}
