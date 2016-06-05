<?php

namespace App\Http\Controllers;

use App\history;
use App\url;
use App\User;
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

                //trimite mail daca pretul este mai mic
                if ($ureluri->pret < $pret){

                   echo $user = User::find($ureluri->user_id)->email;
                    $subject = 'alerta pret';
                    $url = $ureluri->url;
                    $text = "Produsului  $ureluri->url  are pret mai mic";
                    \Mail::send('emails.welcome', ['url' => $url,'text' => $text], function($message) use ($user,$subject) {
                        // note: if you don't set this, it will use the defaults from config/mail.php
                        $message->from('cosmina.santa@gmail.com');
                        $message->to($user)->subject($subject);
                            ;
                    });

                }



                if (strcasecmp(str_replace(' ', '',$ureluri->stoc), str_replace(' ', '',$stoc)) == 0){

                    echo $user = User::find($ureluri->user_id)->email;
                    $subject = 'Modificare stoc';
                    $text = "Produsului  $ureluri->url  are stoc diferit";
                    $url = $ureluri->url;
                    \Mail::send('emails.welcome', ['url' => $url,'text' => $text], function($message) use ($user,$subject) {
                        // note: if you don't set this, it will use the defaults from config/mail.php
                        $message->from('cosmina.santa@gmail.com');
                        $message->to($user)->subject($subject);
                        ;
                    });

                }


                

            }





//




        }
}
