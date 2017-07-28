<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

use App\BlogAparencia;

class AparenciaComposer {

    public function compose(View $view) {
        $user = Auth::user();
        $view->with("aparencia", BlogAparencia::where("idblog", $user->idblog)->first());
    }

}