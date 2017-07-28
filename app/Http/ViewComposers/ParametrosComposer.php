<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

use App\BlogParametros;

class ParametrosComposer {

    public function compose(View $view) {
        $user = Auth::user();
        $view->with("parametros", BlogParametros::where("idblog", $user->idblog)->first());
    }

}