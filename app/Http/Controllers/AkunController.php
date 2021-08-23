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
        // $base_url = BaseUrl::endBaseUrl();
        $response = Http::withHeaders(['Authorization' => $token])
                            ->get($this->base_url . 'api/user')->json();
        $data = $response['data'];
        return view('akun', compact('data', 'token'));
    }

    public function photo(Request $request)
    {
        
        $token = session('token');
        // $base_url = BaseUrl::endBaseUrl();
        $request->all();
        Http::withHeaders(['Authorization' => $token])
                    ->attach('picturePath', file_get_contents($request->picturePath), 'assets/user/' . $request->picturePath)
                    ->post($this->base_url . 'api/user/photo', [
                        'picturePath' => $request->picturePath
                    ]);

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
