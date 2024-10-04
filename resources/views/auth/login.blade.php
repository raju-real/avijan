@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Admin Login</div>

                    <div class="card-body">
                        @if (Session::has('message'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <div class="alert-body">
                                    {{ Session::get('message') }}
                                </div>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('admin-login') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">Email {!! starSign() !!}</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control {!! hasError('email') !!}" name="email"
                                        value="{{ old('email') }}" autocomplete="email" autofocus placeholder="Email">

                                    @error('email')
                                        {!! displayError($message) !!}
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">Password {!! starSign() !!}</label>

                                <div class="col-md-6">
                                    <input type="password" class="form-control {!! hasError('email') !!}" name="password"
                                        autocomplete="current-password" placeholder="Password">

                                    @error('password')
                                        {!! displayError($message) !!}
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">Remember Me</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">Login</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
