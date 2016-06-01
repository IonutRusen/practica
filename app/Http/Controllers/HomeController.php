<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function history(){

    $data =    \DB::table('histories')
            ->join('urls', 'urls.id', '=', 'histories.url_id')
            ->join('users', 'users.id', '=', 'urls.id')
            ->where('urls.user_id','=',\Auth::id())
            ->select('users.id', 'histories.pret', 'histories.stoc')
            ->get();
    
        return view('history')->with(compact('data'));
        }

}
