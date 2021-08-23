<?php

namespace App\Http\Controllers;

use App\Helpers\BaseUrl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
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
        // $base_url = BaseUrl::endBaseUrl();
        $response = Http::post($this->base_url . 'api/login', [
            'email' => $request->email,
            'password' => $request->password,
        ]);

        $token = $response->json()['data']['token_type'] . ' ' . $response->json()['data']['access_token'];
        session(['token' => $token]);
        $session_token = session('token');
        return redirect()->route('all.complaint');
    }


    public function register()
    {
        return view('otentikasi.register');
    }

    public function registerStore(Request $request)
    {
        // $base_url = BaseUrl::endBaseUrl();
        $response = Http::post($this->base_url . 'api/register', [
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'password' => $request->password,
            'password_confirmation' => $request->password,
        ]);

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
