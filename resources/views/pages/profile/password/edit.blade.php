@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <h1 class="mb-3">Change Password </h1>

            @component('components.alert.success')@endcomponent
            
            <form method="POST" action="{{ route('web.profile.update.password') }}">
                @csrf


                @component('components.form.input', [
                'field' => 'old_password',
                'label' => 'Old Password',
                'type' => 'password',
                ])@endcomponent

                @component('components.form.input', [
                'field' => 'password',
                'label' => 'New Password',
                'type' => 'password',
                ])@endcomponent

                @component('components.form.input', [
                'field' => 'password_confirmation',
                'label' => 'Confirm New Password',
                'type' => 'password',
                ])@endcomponent


                <button type="submit" class="btn btn-primary">
                    {{ __('Submit') }}
                </button>

            </form>

        </div>
    </div>
</div>

@endsection