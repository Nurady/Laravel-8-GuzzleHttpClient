<?php

namespace App\Http\Controllers;

use App\Helpers\BaseUrl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\RequestException;

class LoginController extends Controller
{   
    private $base_url;
    public function __construct()
    {
        $this->base_url = BaseUrl::endBaseUrl();
    }
    
    public function login()
    {
        return view('otentikasi.login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        
        try {
            $response = Http::post($this->base_url . 'api/login', [
                'email' => $request->email,
                'password' => $request->password,
            ]);
            $data = $response->json();
            $statusLogin = $data['meta']['code'];
            if($statusLogin == '500') {
                return back()->withErrors([
                    'email' => 'Email atau Password anda harus valid',
                ])->withInput();
            } else {
                $token = $response->json()['data']['token_type'] . ' ' . $response->json()['data']['access_token'];
                session(['token' => $token]);
                session(['berhasil_login' => true]);
                $session_token = session('token');
                return redirect()->route('all.complaint');
            }
        } catch (\Throwable $response) {
            return back()->withErrors([
                'email' => 'Email atau Password anda harus valid',
            ])->withInput();
        }
    }
}

