<?php

namespace App\Http\Controllers;

use App\Helpers\BaseUrl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class GuzzleController extends Controller
{
    public function index()
    {
        $token = session('token');
        $base_url = BaseUrl::endBaseUrl();
        $aduan = Http::get($base_url . 'api/complaint')->json();
        $response = $aduan['data']['data'];
        return view('guzzle', compact('response', 'token'));
    }

    public function detail($id)
    {
        $base_url = BaseUrl::endBaseUrl();
        $aduan = Http::get($base_url . 'api/complaint', ['id' => $id])->json(); 
        $data = $aduan['data'];
        return view('detail', compact('data'));
    }

    public function create()
    {
        $token = session('token');
        return view('create', compact('token'));
    }

    public function store(Request $request)
    {
        $token = session('token');
        $base_url = BaseUrl::endBaseUrl();
        $response = Http::withHeaders(['Authorization' => $token])
                ->attach('picturePath', file_get_contents($request->picturePath), 'assets/complaint/' . $request->picturePath)
                ->post($base_url . 'api/createComplaint', [
                    'title' => $request->title,
                    'location' => $request->location,
                    'category' => $request->category,
                    'description' => $request->description,
        ]);
        // echo $response->getBody();
        return redirect()->route('all.complaint');
    }
}


// Tanpa Bearer Token
// Http::attach('picturePath', file_get_contents($request->picturePath), 'assets/complaint/' . $request->picturePath)
//         ->post('https://e019-110-136-217-185.ngrok.io/api/aduan', [
//             'title' => $request->title,
//             'location' => $request->location,
//             'category' => $request->category,
//             'description' => $request->description,
//             'picturePath' => $request->picturePath
// ]);
