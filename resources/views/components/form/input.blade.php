<div class="{{$class_group ?? null}} mb-3">
    @if($label ?? false)
    <label for="{{$field}}" class="form-label">{{$label}}</label>
    @endIf

    <input type="{{$type ?? 'text'}}" class="form-control @error($field) is-invalid @enderror" name="{{$field}}" value="{{ $value ?? old($field, $row->$field ?? null) }}" {{$attr ?? null}}>

    @error($field)
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>