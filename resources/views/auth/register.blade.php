@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <h1 class="mb-3">Register</h1>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                @component('components.form.input', [
                'field' => 'name',
                'label' => 'Name'
                ])@endcomponent

                @component('components.form.input', [
                'field' => 'email',
                'label' => 'Email'
                ])@endcomponent

                @component('components.form.input', [
                'field' => 'password',
                'type' => 'password',
                'label' => 'Password'
                ])@endcomponent


                @component('components.form.input', [
                'field' => 'password_confirmation',
                'type' => 'password',
                'label' => 'Confirm Password'
                ])@endcomponent

                @component('components.form.button')
                {{ __('Register') }}
                @endcomponent
            </form>

        </div>
    </div>
</div>
@endsection