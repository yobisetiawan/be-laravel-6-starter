@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <h1 class="mb-3">Profile </h1> 

            @component('components.alert.success')@endcomponent 

            <form method="POST" action="{{ route('web.profile.update') }}">
                @csrf

                @component('components.form.input', [
                'field' => 'name',
                'label' => 'Name',
                'row' => $row
                ])@endcomponent 


                <button type="submit" class="btn btn-primary">
                    {{ __('Submit') }}
                </button>

            </form>

        </div>
    </div>
</div>

@endsection