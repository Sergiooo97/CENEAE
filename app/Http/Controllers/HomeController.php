<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\alumno;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $results = alumno::selectRaw('count(*) as Total')
            
             ->get();


        return view('home', compact('results'));    

    }
}
