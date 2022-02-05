@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1 class="mb-3">Login</h1>
            <form method="POST" action="{{ route('login') }}">
                @csrf


                @component('components.form.input', [
                'field' => 'email',
                'label' => 'Email'
                ])@endcomponent

                @component('components.form.input', [
                'field' => 'password',
                'label' => 'Password',
                'type' => 'password'
                ])@endcomponent



                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>

                <div>
                    <button type="submit" class="btn btn-primary">
                        {{ __('Login') }}
                    </button>

                    @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                    @endif
                </div>
            </form>

        </div>
    </div>
</div>
@endsection