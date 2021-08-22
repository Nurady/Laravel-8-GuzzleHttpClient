<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function login()
    {
        return view('otentikasi.login');
    }

    public function store(Request $request)
    {
        // dd('ok');
        $response = Http::post('https://b1cb-110-136-218-170.ngrok.io/api/login', [
            'email' => $request->email,
            'password' => $request->password,
        ]);

        $token = $response->json()['data']['token_type'] . ' ' . $response->json()['data']['access_token'];
        session(['token' => $token]);
        $session_token = session('token');
        // dd($session_token);

        // dd($response->json());
        return redirect()->route('all.complaint');
    }


    public function register()
    {
        return view('otentikasi.register');
    }

    public function registerStore(Request $request)
    {
        // dd('ok');
        $response = Http::post('https://b1cb-110-136-218-170.ngrok.io/api/register', [
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'password' => $request->password,
            'password_confirmation' => $request->password,
        ]);

        // dd($response->json());
        $token = $response->json()['data']['token_type'] . ' ' . $response->json()['data']['access_token'];
        session(['token' => $token]);
        $session_token = session('token');
        return redirect()->route('all.complaint');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/login');
    }
}
