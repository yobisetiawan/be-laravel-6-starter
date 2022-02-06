@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <h1 class="mb-3">Change Avatar </h1>

            @component('components.alert.success')@endcomponent

            <form method="POST" action="{{ route('web.profile.update.avatar') }}" enctype="multipart/form-data">
                @csrf


                <div class="mb-3">
                    <input class="form-control" type="file" name="avatar">
                </div>

                @error('avatar')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <button type="submit" class="btn btn-primary">
                    {{ __('Submit') }}
                </button>

            </form>

        </div>
    </div>
</div>

@endsection