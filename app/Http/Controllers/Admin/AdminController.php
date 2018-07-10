<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        if(Auth::check() && Auth::user()->hasRole('admin')) {
           return view('admin.dashboard');
        } else {
            return redirect('/login');
        }
    }
}
