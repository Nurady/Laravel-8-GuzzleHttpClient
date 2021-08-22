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
                            <label for="email">email</label>
                            <input type="text" id="email" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="text" id="password" name="password" class="form-control">
                        </div>                        
                        <button type="submit" class="btn btn-success">LOGIN</button>
                    </form>
                </div>
            </div>
        </div>
</div>
@endsection