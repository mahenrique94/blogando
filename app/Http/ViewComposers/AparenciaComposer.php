<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;

use App\BlogAparencia;

class AparenciaComposer {

    public function compose(View $view) {
        $view->with("aparencia", BlogAparencia::first());
    }

}