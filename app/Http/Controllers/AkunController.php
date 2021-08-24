<?php

namespace App\Http\Controllers;

use App\Helpers\BaseUrl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AkunController extends Controller
{
    private $base_url;

    public function __construct()
    {
        $this->base_url = BaseUrl::endBaseUrl();
    }
    
    public  function index()
    {
        $token = session('token');
        $response = Http::withHeaders(['Authorization' => $token])
                            ->retry(10, 20)->get($this->base_url . 'api/user')->json();
        $data = $response['data'];
        return view('akun', compact('data', 'token'));
    }

    public function photo(Request $request)
    {
        $token = session('token');
        $request->all();
        Http::withHeaders(['Authorization' => $token])
                    ->attach('picturePath', file_get_contents($request->picturePath), 'assets/user/' . $request->picturePath)
                    ->retry(10, 20)
                    ->post($this->base_url . 'api/user/photo', [
                        'picturePath' => $request->picturePath
                    ]);

        return back();
    }

    public function updateProfile(Request $request)
    {
        $token = session('token');
        $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'address' => ['required'],
        ]);

        $response = Http::withHeaders(['Authorization' => $token])->retry(10, 20)->post($this->base_url . 'api/user', [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'address' => $request->address,
        ]);
        $data = $response->json();
        return back();
    }
}

// dd($request->all());
// $response = Http::withHeaders(['Authorization' => $token])
//             // ->withBody(base64_encode($request->picturePath), 'image/jpeg')
//             ->attach('picturePath', file_get_contents($request->picturePath), 'assets/user/' . $request->picturePath)
//             ->post('https://e019-110-136-217-185.ngrok.io/api/user/photo', [
//                 'picturePath' => $request->picturePath
//             ]);
// $data = $response->json();    
// dd($data); 
