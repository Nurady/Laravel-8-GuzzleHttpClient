@extends('layouts.master')

@section('content')
    <p>Jumlah Pengaduan : {{ count($response ) }}</p>
    <p>{{ $token }}</p>
    <div class="row">
        @foreach ($response as $item)
            <div class="col mb-4">
                <div class="card" style="width: 18rem; height: 32rem;">
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
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection