<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainAdminController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }
	
	/**
	 * @return Application|Factory|View
	 */
	public function index()
    {
	    return view('dashboard.index');
    }
	
	/**
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
