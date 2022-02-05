@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <h1 class="mb-3">{{ __('Reset Password') }}</h1>


            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">



                @component('components.form.input', [
                'field' => 'email',
                'label' => 'Email',
                'value' => $email ?? old('email')
                ])@endcomponent

                @component('components.form.input', [
                'field' => 'password',
                'label' => 'Password',
                'type' => 'password'
                ])@endcomponent

                @component('components.form.input', [
                'field' => 'password_confirmation',
                'label' => 'Confirm Password',
                'type' => 'password'
                ])@endcomponent

                <button type="submit" class="btn btn-primary">
                    {{ __('Reset Password') }}
                </button>
            </form>

        </div>
    </div>
</div>
@endsection