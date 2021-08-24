@extends('layouts.master')

@section('content')
    {{-- <p class="text-center">{{ $token }}</p> --}}
    <div class="row d-flex justify-content-center mb-5">
        <div class="col-md-8 border d-flex align-items-center">
            <div>
                <img 
                    src="{{ $data['picturePath'] }}" 
                    class="rounded-circle img-fluid img-thumbnail mr-2" 
                    alt="{{ $data['name'] }}"
                    style="width: 10rem; height:10rem;">
                <div class="mt-3">
                    <form action="{{ route('photo.user') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="file" class="form-control-file" id="picturePath" name="picturePath" required>
                        </div>
                        <button type="submit" class="btn btn-sm btn-success">Upload Photo</button>
                    </form>
                </div>
            </div>
            <div class="card border-0">
                <div class="card-body">
                    <h5 class="card-title">{{ $data['name'] }}</h5>
                    <div class="mb-3">
                        <button class="btn btn-sm btn-success">{{ $data['roles'] }}</button>
                    </div>
                    <p class="text-left text-muted">
                        {{ $data['email'] }} 
                    </p>
                    <p class="text-left text-muted">
                        Alamat: {{ $data['address'] }} 
                    </p>
                    <p class="text-left text-muted" style="margin-bottom: 0 !important">
                        Join : {{ gmdate("l, d F Y", ($data['created_at']/1000)) }}   
                    </p>
                    <p class="text-left text-muted">
                        Last update profile : {{ gmdate("l, d F Y", ($data['updated_at']/1000)) }}   
                    </p>
                </div>
              </div>
           </div>
        </div>
    </div>

    {{-- <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-4 d-flex align-items-center">
                <form action="{{ route('photo.user') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="file" class="form-control-file" id="picturePath" name="picturePath" required>
                    </div>
                    <button type="submit" class="btn btn-sm btn-success">Upload Photo</button>
                </form>
            </div>
        </div>
    </div> --}}

    <div class="container mb-5">
        <div class="row d-flex justify-content-center mt-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Update profile</div>
                    <div class="card-body">
                        <form action="{{ route('update.profile') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" 
                                        value="{{ old('name') ?? $data['name'] }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email <small class="text-muted">(tidak bisa diubah)</small></label>
                                <input type="email" id="email" name="email" class="form-control" 
                                    value="{{ $data['email'] }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="password">Password <small class="text-muted">(kosongkan jika tidak ingin diubah)</small></label>
                                <input type="password" id="password" name="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="address">Alamat</label>
                                <input type="text" id="address" name="address" class="form-control @error('address') is-invalid @enderror" 
                                        value="{{ old('address') ?? $data['address'] }}">
                                @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Ubah Profile</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection