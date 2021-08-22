<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class GuzzleController extends Controller
{
    public function index()
    {
        $token = session('token');
        $aduan = Http::get('https://a3e2-110-136-218-170.ngrok.io/api/complaint')->json();
        $response = $aduan['data']['data'];
        return view('guzzle', compact('response', 'token'));
    }

    public function create()
    {
        $token = session('token');
        return view('create', compact('token'));
    }

    public function store(Request $request)
    {
        // Tanpa Bearer Token
                // Http::attach('picturePath', file_get_contents($request->picturePath), 'assets/complaint/' . $request->picturePath)
                //         ->post('https://a3e2-110-136-218-170.ngrok.io/api/aduan', [
                //             'title' => $request->title,
                //             'location' => $request->location,
                //             'category' => $request->category,
                //             'description' => $request->description,
                //             'picturePath' => $request->picturePath
                // ]);
        
        // Buat aduan denga header authorization Bearer Token
        $token = session('token');
        $response = Http::withHeaders(['Authorization' => $token])
                ->attach('picturePath', file_get_contents($request->picturePath), 'assets/complaint/' . $request->picturePath)
                ->post('https://a3e2-110-136-218-170.ngrok.io/api/createComplaint', [
                    'title' => $request->title,
                    'location' => $request->location,
                    'category' => $request->category,
                    'description' => $request->description,
                    // 'picturePath' => $request->picturePath
        ]);
        // echo $response->getBody();
        return redirect()->route('all.complaint');
    }
}
