<?php

namespace App\Http\Controllers;

use App\history;
use App\url;
use Illuminate\Http\Request;

use App\Http\Requests;
use Yangqi\Htmldom\Htmldom;

class parse extends Controller
{

    public function parseaza(){

        $urls = url::all();

            foreach ($urls as $ureluri ) {
               $html = new Htmldom($ureluri->url);

                 $pret = str_replace(',', '.', $html->find('div.produs-price span.price', 0)->plaintext);

                $stoc = $html->find('span.stocky-txt', 0)->plaintext;
                $elem = new history();
                $elem['pret'] = $pret;
                $elem['stoc'] = $stoc;
                $elem['url_id'] = $ureluri->id;

                $elem->save();

            }





//




        }
}
