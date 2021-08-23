<?php

namespace App\Http\Controllers;

use App\Helpers\BaseUrl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\RequestException;

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
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        
        try {
            $response = Http::post($this->base_url . 'api/login', [
                'email' => $request->email,
                'password' => $request->password,
            ]);
            $token = $response->json()['data']['token_type'] . ' ' . $response->json()['data']['access_token'];
            session(['token' => $token]);
            session(['berhasil_login' => true]);
            $session_token = session('token');
            return redirect()->route('all.complaint');
        } catch (\Throwable $th) {
            // throw $th;
            return back()->withErrors([
                'email' => 'Email atau Password anda harus valid',
            ])->withInput();
        }
    }


    public function register()
    {
        return view('otentikasi.register');
    }

    public function registerStore(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required'],
        ]);

        try {
            $response = Http::post($this->base_url . 'api/register', [
                'name' => $request->name,
                'email' => $request->email,
                'address' => $request->address,
                'password' => $request->password,
                'password_confirmation' => $request->password,
            ]);
    
            $token = $response->json()['data']['token_type'] . ' ' . $response->json()['data']['access_token'];
            session(['token' => $token]);
            session(['berhasil_register' => true]);
            $session_token = session('token');
            return redirect()->route('all.complaint');
        } catch (\Throwable $th) {
            return back()->withErrors([
                'email' => 'Mohon ulangi, Terjadi Kesalahan/Data tidak valid',
            ])->withInput();
        }
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/login');
    }
}
