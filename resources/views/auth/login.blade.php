@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header text-center py-3 primary-bg text-white fs-3">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-fill-lock" viewBox="0 0 16 16">
                            <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h5v-1a1.9 1.9 0 0 1 .01-.2 4.49 4.49 0 0 1 1.534-3.693C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Zm7 0a1 1 0 0 1 1-1v-1a2 2 0 1 1 4 0v1a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1v-2Zm3-3a1 1 0 0 0-1 1v1h2v-1a1 1 0 0 0-1-1Z"/>
                          </svg>
                        </span> <span>Login Administration</span></div>

                <div class="card-body">
                    <div class="rounded-circle">
                        <img src="images/avater.jpg"  class="login-image" alt="admin image">
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <table class="w-100">
                            <tr>
                                <th colspan="2">
                                    <label for="email" class="  text-md-end">{{ __('Email Address') }}</label>
                                </th>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <th colspan="2">
                                    <label for="password" class=" text-md-end">{{ __('Password') }}</label>
                                </th>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td >
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    
                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <td colspan="2">
                                    <button type="submit" class="btn btn-primary w-100">
                                        {{ __('Login') }}
                                    </button>
    
                                    
                                </td>
                            </tr>
                        </table>

                       

                       

                      

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                               
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
