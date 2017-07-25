<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArquivoController extends Controller
{
    public function download($arquivo) {
        return response()->download("/Arquivo/Upload/blogando/" . $arquivo);
    }

    public function upload(Request $request, $arquivo, $pasta) {
        
    }
}
