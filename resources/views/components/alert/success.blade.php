@if (\Session::has('success_msg'))
<div class="alert alert-primary">
    {!! \Session::get('success_msg') !!}
</div>
@endif