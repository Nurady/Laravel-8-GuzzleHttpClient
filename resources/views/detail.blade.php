@extends('layouts.master')

@section('content')
<div class="row d-flex justify-content-center">
    <div class="col-md-6">
        <p>Detail Pengaduan</p>
        <div class="card mb-3">
            <img src="{{ $data['picturePath'] }}" class="card-img-top" alt="{{ $data['title'] }}">
            <div class="card-body">
            <h5 class="card-title">{{ $data['title'] }}</h5>
            <div class="mb-3">
                <button class="btn btn-success">{{ $data['ticket'] }}</button>
                <button class="btn btn-primary">{{ $data['status'] }}</button>
                <button class="btn btn-warning">{{ $data['category'] }}</button>
            </div>
            <div class="d-flex justify-content-between">
                <p class="text-left text-muted">
                    {{ $data['user_name'] }} 
                </p>
                <p class="text-left text-muted">
                    {{ $data['location'] }} - 
                    {{ gmdate("l, d F Y", ($data['updated_at']/1000)) }}   
                </p>
            </div>
              <p class="card-text">
                {{ $data['description'] }}.
              </p>
            </div>
          </div>
       </div>
    </div>
@endsection