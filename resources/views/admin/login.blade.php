@extends('layouts.admin')
@section('title','login')
@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-7 m-auto">
                <div class="card shadow">
                    <div class="results">
                        @if (Session::has('success'))
                            <div class="alert alert-danger">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        @if (Session::has('failed'))
                            <div class="alert alert-danger">
                                {{ Session::get('failed') }}
                            </div>
                        @endif
                    </div>
                    <div class="card-header">
                        <h4 class="text-center">Login</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('login.post') }}" method="post">
                        @csrf
                            <div class="form-floating">
                                <input type="text" name="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}">
                                <label for="email">Email</label>
                                @error('email')
                                    <div id="validationServer04Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    
                                @enderror
                            </div>
                            
                            <div class="form-floating">
                                <input type="password" name="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror">
                                <label for="password">Password</label>
                                @error('password')
                                    <div id="validationServer04Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary form-control mt-3">Submit</button>
                            <p class="text-center mt-3">Belum punya akun? <a href="/register">Register</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection