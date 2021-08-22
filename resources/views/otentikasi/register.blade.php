@extends('layouts.master')

@section('content')
<div class="row d-flex justify-content-center">
        <div class="col-md-6 mt-4 mb-4">
            <div class="card" style="">
                <div class="card-body">
                    <h5 class="text-center">Register</h5>
                    <form action="{{ route('register.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" id="name" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">email</label>
                            <input type="text" id="email" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="address">Alamat</label>
                            <input type="text" id="address" name="address" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="text" id="password" name="password" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-success">REGISTER</button>
                    </form>
                </div>
            </div>
        </div>
</div>
@endsection