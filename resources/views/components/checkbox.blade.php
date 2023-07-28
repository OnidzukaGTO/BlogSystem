@php
    $id = Str::uuid()
@endphp

<div class="form-check">
    <input type="checkbox" class="form-check-input" {{$attributes->merge([
        'value' => 1, 
        'checked' => !! old($attributes->get('name'))
    ])}} id="{{$id}}">
    <label class="form-check-label" for="{{$id}}">
      {{$slot}}
    </label>
</div>