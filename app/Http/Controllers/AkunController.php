<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AkunController extends Controller
{
    public  function index()
    {
        $token = session('token');
        return view('akun', compact('token'));
    }
}
