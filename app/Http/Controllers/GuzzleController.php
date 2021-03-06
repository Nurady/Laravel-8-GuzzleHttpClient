<?php

namespace App\Http\Controllers;

use App\Helpers\BaseUrl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class GuzzleController extends Controller
{
    private $base_url;

    public function __construct()
    {
        $this->base_url = BaseUrl::endBaseUrl();
    }

    public function index()
    {
        $token = session('token');
        $session_login = session('berhasil_login');
        $session_register = session('berhasil_register');
        $aduan = Http::retry(10, 20)->get($this->base_url . 'api/complaint')->json();
        $response = $aduan['data']['data'];
        return view('guzzle', compact('response', 'token', 'session_login','session_register'));
    }

    public function detail($id)
    {
        // $base_url = BaseUrl::endBaseUrl();
        $aduan = Http::get($this->base_url . 'api/complaint', ['id' => $id])->json(); 
        $data = $aduan['data'];
        return view('detail', compact('data'));
    }

    public function sampah()
    {
        $aduan = Http::retry(10, 20)->get($this->base_url . 'api/complaint/?category=Sampah')->json();
        $response = $aduan['data']['data'];
        return view('guzzle', compact('response'));
    }

    public function health()
    {
        $aduan = Http::retry(10, 20)->get($this->base_url . 'api/complaint/?category=Kesehatan')->json();
        $response = $aduan['data']['data'];
        return view('guzzle', compact('response'));
    }

    public function lingkungan()
    {
        $aduan = Http::retry(10, 20)->get($this->base_url . 'api/complaint/?category=Lingkungan')->json();
        $response = $aduan['data']['data'];
        return view('guzzle', compact('response'));
    }

    public function penduduk()
    {
        $aduan = Http::retry(10, 20)->get($this->base_url . 'api/complaint/?category=Penduduk')->json();
        $response = $aduan['data']['data'];
        return view('guzzle', compact('response'));
    }

    public function employee()
    {
        $aduan = Http::retry(10, 20)->get($this->base_url . 'api/complaint/?category=Tenaga Kerja')->json();
        $response = $aduan['data']['data'];
        return view('guzzle', compact('response'));
    }

    public function other()
    {
        $aduan = Http::retry(10, 20)->get($this->base_url . 'api/complaint/?category=Lainnya')->json();
        $response = $aduan['data']['data'];
        return view('guzzle', compact('response'));
    }


    public function create()
    {
        $token = session('token');
        return view('create', compact('token'));
    }

    public function store(Request $request)
    {
        $token = session('token');
        // $base_url = BaseUrl::endBaseUrl();
        $response = Http::withHeaders(['Authorization' => $token])
                ->attach('picturePath', file_get_contents($request->picturePath), 'assets/complaint/' . $request->picturePath)
                ->post($this->base_url . 'api/createComplaint', [
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
