@props(['blog' => ''] )

<div class="border-bottom pb-3 mb-4">

    @isset($link)
        <div class="mb-2">
            {{$link}}
        </div>
    @endisset

    <div class="d-flex justify-content-between">
        <div>
            <h1 class="h2 m-0 text-break" style="max-width: 550px">
                {{ $slot }}
            </h1>
        </div>

        @isset($right)
            <div>
                {{ $right }}
            </div>
        @endisset
    </div>

    @isset($author)
            {{$author}}
    @endisset
</div>

<x-errors />