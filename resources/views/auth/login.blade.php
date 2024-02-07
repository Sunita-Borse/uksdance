@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card login-container">
                <!--div class="card-header">{{ __('Login') }}</div-->
                <div class="logo2"  style="text-align: center;">
            <a href="/"><img src="{{ asset('/public/assets/img/ukslogo2.png') }}" alt="Logo" class="img-fluid"></a>
        </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                       <div class="form-group">
                        <div class=" ">
                            <label for="email" class=" col-form-label text-md-end">{{ __('Email Address') }}</label>
                         </div>
                            <div class="">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                             <div class="form-group">
                        <div class="">
                            <label for="password" class=" col-form-label text-md-end">{{ __('Password') }}</label>
                           </div>
                            <div class="">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                      

     <!--div class="form-group">
                        <div class="">
                            <div class=" ">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} style="width: auto !important;">

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        </div-->
     <div class="form-group">
                        <div class="">
                            <div class="">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
