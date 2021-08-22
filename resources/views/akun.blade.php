@extends('layouts.master')

@section('content')
    <p class="text-center">{{ $token }}</p>
    <div class="row d-flex justify-content-center mb-5">
        <div class="col-md-8 border d-flex align-items-center">
            <div>
                <img 
                    src="{{ $data['picturePath'] }}" 
                    class="rounded-circle img-fluid img-thumbnail mr-2" 
                    alt="{{ $data['name'] }}"
                    style="width: 10rem; height:10rem;">
            </div>
            <div class="card border-0">
                <div class="card-body">
                    <h5 class="card-title">{{ $data['name'] }}</h5>
                    <div class="mb-3">
                        <button class="btn btn-success">{{ $data['roles'] }}</button>
                    </div>
                    <p class="text-left text-muted">
                        {{ $data['email'] }} 
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

    <div class="row d-flex justify-content-center">
        <div class="col-md-4 d-flex align-items-center">
            <form action="{{ route('photo.user') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="file" class="form-control" id="picturePath" name="picturePath" required>
                </div>
                <button type="submit" class="btn btn-sm btn-success">Upload Photo</button>
            </form>
        </div>
    </div>
@endsection