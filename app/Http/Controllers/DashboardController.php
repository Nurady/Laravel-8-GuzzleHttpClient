<?php

namespace App\Http\Controllers;

use App\Helpers\BaseUrl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
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
                    ->retry(10, 20)->get($this->base_url . 'api/complaint/user')->json();
        $selesai = Http::withHeaders(['Authorization' => $token])
                    ->retry(10, 20)->get($this->base_url . 'api/complaint/user/selesai')->json();
        $proses = Http::withHeaders(['Authorization' => $token])
                    ->retry(10, 20)->get($this->base_url . 'api/complaint/user/proses')->json();
        $verifikasi = Http::withHeaders(['Authorization' => $token])
                    ->retry(10, 20)->get($this->base_url . 'api/complaint/user/verification')->json();
        $tertunda = Http::withHeaders(['Authorization' => $token])
                    ->retry(10, 20)->get($this->base_url . 'api/complaint/user/pending')->json();

        $data = $response['data']['data'];
        $statusSelesai = $selesai['data'];
        $statusProses = $proses['data'];
        $statusVerifikasi = $verifikasi['data'];
        $statusTertunda = $tertunda['data'];
        // dd($statusTertunda);       
        return view('dashboard', compact('token', 'data', 'statusSelesai', 'statusProses','statusVerifikasi', 'statusTertunda'));
    }
}
