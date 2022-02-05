@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <h1 class="mb-3">{{ __('Confirm Password') }}</h1>


            {{ __('Please confirm your password before continuing.') }}

            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

                @component('components.form.input', [
                'field' => 'password',
                'label' => 'Password',
                'type' => 'password'
                ])@endcomponent

                <div>
                    <button type="submit" class="btn btn-primary">
                        {{ __('Confirm Password') }}
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