@props(['options' => []])

<select {{$attributes->class([
    'form-control'
]) }}>
    @foreach ($options as $key => $value)
        <option value="{{$key}}">
            {{$value}}
        </option>
    @endforeach
</select>