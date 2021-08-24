@extends('layouts.master')

@section('content')
    <p>{{ $token }}</p>
    <div class="row mb-3 d-flex justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Statistik Aduan Anda</div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <button class="btn btn-sm btn-primary">Total: {{ count($data ) }}</button>
                        <button class="btn btn-sm btn-info">Verifikasi: {{ $statusVerifikasi }}</button>
                        <button class="btn btn-sm btn-success">Selesai: {{ $statusSelesai }}</button>
                        <button class="btn btn-sm btn-warning">Proses: {{ $statusProses }}</button>
                        <button class="btn btn-sm btn-danger">Tertunda: {{ $statusTertunda }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row d-flex justify-content-center">
        @foreach ($data as $item)
            <div class="col-md-4 mb-4 d-flex justify-content-center">
                <div class="card" style="height: 32rem;">
                    <img src="{{ $item['picturePath'] }}" class="card-img-top" alt="{{ $item['title'] }}" style="height: 15rem;">
                    <div class="card-body">
                        <h5 class="card-title" style="margin-bottom: 0 !important;">{{ $item['title'] }}</h5>
                        <p class="text-sm-left text-muted" 
                            style="margin-bottom: 10px !important;">
                            {{ $item['user_name'] }}
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <button class="btn btn-sm btn-primary mb-3">{{ $item['status'] }}</button>
                            <button class="btn btn-sm btn-warning mb-3">{{ $item['ticket'] }}</button>
                        </div>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $item['location'] }}</h6>
                        <p class="card-text">{{ $item['description'] }}.</p>
                        <a href="{{ route('detail.complaint', $item['id']) }}" class="btn btn-primary">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection