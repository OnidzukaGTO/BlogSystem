<form {{$attributes}}>
    @if ($attributes["method"] !== "GET")
        @csrf
    @endif
    {{$slot}}
</form>