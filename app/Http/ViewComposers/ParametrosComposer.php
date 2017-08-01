<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;

use App\BlogParametros;

class ParametrosComposer {

    public function compose(View $view) {
        $view->with("parametros", BlogParametros::first());
    }

}