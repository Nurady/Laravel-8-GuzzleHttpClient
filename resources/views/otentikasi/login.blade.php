@extends('layouts.master')

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-md-6 mt-4 mb-4">
            <div class="card" style="">
                <div class="card-body">
                    <h5 class="text-center">Login</h5>
                    <form action="{{ url('login/store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>                        
                        <button type="submit" class="btn btn-success">LOGIN</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection