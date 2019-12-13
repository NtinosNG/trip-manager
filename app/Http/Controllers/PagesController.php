<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class PagesController extends Controller
{
    public function index()
    {
        if(Auth::Check()) {
            return redirect('/home');
        }
        else {
            return redirect('/login');
        }
    }
}
