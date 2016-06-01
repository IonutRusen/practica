<?php

namespace App\Http\Controllers\forms;

use App\URL;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class salveaza extends Controller
{
    public function salveazaForm(Request $request){
        $this->validate($request, [
            'url' => "required|active_url",
            'clasa1' => "required",
            'clasa2' => "required"

        ]);


        $elem = new url();

        $elem['user_id'] = \Auth::id();
        $elem['url'] = $request['url'];
        $elem['pret'] = $request['clasa1'];
        $elem['stoc'] = $request['clasa2'];

        $elem->save();
        }
}
