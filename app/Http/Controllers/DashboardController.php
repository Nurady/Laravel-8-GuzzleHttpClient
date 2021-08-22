<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public  function index()
    {
        $token = session('token');
        return view('dashboard', compact('token'));
    }
}
