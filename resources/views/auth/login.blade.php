@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <label for="email" class="col">{{ __('E-Mail Address') }}</label>

                            <div class="col">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col">{{ __('Password') }}</label>

                            <div class="col">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div style="text-align: center;">
                            <div class="form-group row mb-0">
                                <div class="col offset-md-5">
                                    <button style="display: block; font-size: 18px" type="submit" class="btn btn-primary p-3" >
                                        {{ __('Login') }}
                                    </button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
            <div class="card-body mt-lg-5">
                <div class="alert-info p-3">
                    <span>Username: <b>test@gmail.com</b></span>
                    <br>
                    <span>Password: <b>12345678</b></span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
