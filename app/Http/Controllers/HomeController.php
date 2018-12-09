<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;

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
        $user = \Auth::user();
        $admins = $user->hasRole([
            'superadministrator', 'language_checker', 'finance', 'Arbitrator', 'print'
        ]);
        if ($admins) {
            return redirect()->route('manage.dashboard');
        }
        return view('home');
    }
}
