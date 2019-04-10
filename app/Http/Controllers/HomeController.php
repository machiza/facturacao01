<?php

namespace App\Http\Controllers;

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
        // $lang = \Session::get('locale'); //this value should dynamic
        // \App::setLocale($lang);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {

        if(!$request->user()->authorizeRoles(['root'])) {
            // \Session::put('pt');
            return view('home');
        }else {
            return redirect('/admin');
        }

    }

    public function index2(Request $request, $locale)
    {

        if($locale === 'pt' ||  $locale === 'en') {
            \Session::put('locale', $locale);
            \App::setLocale($locale);
        }

        if(!$request->user()->authorizeRoles(['root'])) {
            // \Session::put('pt');
            return view('home');
        }else {
            return redirect('/admin');
        }

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function admin()
    {
        // if($request->user()->authorizeRoles(['root'])) {
            // \Session::put('pt');
            return view('admin');
        // }else {
        //     return redirect('/home');
        // }

    }
}
