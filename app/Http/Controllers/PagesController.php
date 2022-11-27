<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cookie;

class PagesController extends Controller
{



    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vars = [];
        return redirect()->route('login');
    }
}
