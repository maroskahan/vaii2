<?php

namespace App\Http\Controllers;

use App\Models\Article as Article;
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
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $articles = Article::all();
        return view('home', [
            'articles' => $articles
        ]);
    }

    public function about_us()
    {
        return view('about_us');
    }

    public function page1()
    {
        return view('page1');
    }


}
