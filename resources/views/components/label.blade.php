@props(['required'=>true])

<label {{$attributes ->class([
    'mb-1',($required ? 'required' : '')
])}}>
    {{$slot}}
</label>