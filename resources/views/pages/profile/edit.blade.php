@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <h1 class="mb-3">Profile </h1>

            @component('components.alert.success')@endcomponent

            <div class="mb-3 d-flex align-items-center">
                <img src="{{$row->avatar_url ?? url('images/avatar-empty.png')}}" class="img-thumbnail" alt="" width="90">
                <a href="{{route('web.profile.change.avatar')}}" class="ps-3">Change Avatar</a>
            </div> 

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