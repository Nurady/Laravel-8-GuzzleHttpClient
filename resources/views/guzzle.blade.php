@extends('layouts.master')

@section('content')
    {{-- <p>Jumlah Pengaduan : {{ count($response ) }}</p>
    <p>{{ $token ?? '' }}</p>
    <p>{{ $session_login ?? '' }}</p>
    <p>{{ $session_register ?? '' }}</p> --}}
    <div class="row mb-4">
        <div class="col">
            <div class="card">
                <div class="card-header">Jumlah Pengaduan : {{ count($response ) }}</div>
                <div class="card-header">Lihat Berdasarkan Kategori</div>
                <div class="card-body">
                    <div class="d-md-flex sm-mb-2">
                        <form action="{{ route('all.complaint') }}" method="get">
                            <button type="submit" class="btn btn-primary mr-3">Semua</button>
                        </form>
                        <form action="{{ route('sampah.complaint') }}" method="get">
                            <button type="submit" class="btn btn-success mr-3">Sampah</button>
                        </form>
                        <form action="{{ route('health.complaint') }}" method="get">
                            <button type="submit" class="btn btn-info mr-3">Kesehatan</button>
                        </form>
                        <form action="{{ route('lingkungan.complaint') }}" method="get">
                            <button type="submit" class="btn btn-success mr-3">Lingkungan</button>
                        </form>
                        <form action="{{ route('penduduk.complaint') }}" method="get">
                            <button type="submit" class="btn btn-info mr-3">Penduduk</button>
                        </form>
                        <form action="{{ route('employee.complaint') }}" method="get">
                            <button type="submit" class="btn btn-primary mr-3">Tenaga Kerja</button>
                        </form>
                        <form action="{{ route('other.complaint') }}" method="get">
                            <button type="submit" class="btn btn-warning">Lainnya</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach ($response as $item)
            <div class="col-md-4 mb-4 d-flex justify-content-between" style="padding-right:0 !important">
                <div class="card" style="height: 32rem;">
                    <img src="{{ $item['picturePath'] }}" 
                        class="card-img-top img-fluid w-100" 
                        alt="{{ $item['title'] }}" style="width: 22.5rem !important; height: 15rem;">
                    <div class="card-body">
                        <h5 class="card-title" style="margin-bottom: 0 !important;">{{ $item['title'] }}</h5>
                        <p class="text-sm-left text-muted" 
                            style="margin-bottom: 10px !important;">
                            {{ $item['user_name'] }}
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <button class="btn btn-sm btn-info mb-3">{{ $item['category'] }}</button>
                                <button class="btn btn-sm btn-primary mb-3">{{ $item['status'] }}</button>
                            </div>
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