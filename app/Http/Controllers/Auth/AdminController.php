<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Supportticket;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function admin(){
        return view('auth.admin.dashboard'); 
    }
}
