<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AkunController extends Controller
{
    public  function index()
    {
        $token = session('token');
        $response = Http::withHeaders(['Authorization' => $token])
                    ->get('https://b1cb-110-136-218-170.ngrok.io/api/user')->json();
        $data = $response['data'];
        // dd($data);
        
        return view('akun', compact('data', 'token'));
    }

    public function photo(Request $request)
    {
        // dd($request->all());
        $token = session('token');
        // $response = Http::withHeaders(['Authorization' => $token])
        //             // ->withBody(base64_encode($request->picturePath), 'image/jpeg')
        //             ->attach('picturePath', file_get_contents($request->picturePath), 'assets/user/' . $request->picturePath)
        //             ->post('https://b1cb-110-136-218-170.ngrok.io/api/user/photo', [
        //                 'picturePath' => $request->picturePath
        //             ]);
        // $data = $response->json();    
        // dd($data); 
        $request->all();
        Http::withHeaders(['Authorization' => $token])
                    ->attach('picturePath', file_get_contents($request->picturePath), 'assets/user/' . $request->picturePath)
                    ->post('https://b1cb-110-136-218-170.ngrok.io/api/user/photo', [
                        'picturePath' => $request->picturePath
                    ]);

        return back();
    }
}
