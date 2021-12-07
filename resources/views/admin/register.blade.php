@extends('layouts.admin')
@section('title','register')
@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-7 m-auto">
                <div class="card shadow">
                    <div class="results">
                        @if (Session::has('success'))
                            <div class="alert alert-success">
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
                        <h4 class="text-center">Register</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('post.register') }}" method="post">
                        @csrf
                            <div class="form-floating">
                                <input type="text" name="username" placeholder="Username" class="form-control @error('username') is-invalid @enderror" value="{{old('username')}}">
                                <label for="username">Username</label>
                                @error('username')
                                    <div id="validationServer04Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    
                                @enderror
                            </div>
                            <div class="form-floating">
                                <input type="text" name="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}">
                                <label for="Email">Email</label>
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
                            <div class="d-flex align-items-center">
                                
                                <button type="submit" class="btn btn-primary form-control mt-3">Submit</button>

                            </div>
                            <p class="text-center mt-3">Sudah punya akun? <a href="/">Login</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection