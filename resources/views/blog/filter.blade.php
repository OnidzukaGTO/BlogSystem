<x-form method="GET" action="{{route('blogs')}}">
    <div class="row">
        <div class="col-12 col-md-4">
            <div class="mb-3">
                <x-input name="search" value="{{request('search')}}" placeholder="{{__('Filter')}}" />
            </div>
        </div>

        <div class="col-12 col-md-4">
            <div class="mb-3">
                <x-input name="from_date" value="{{request('from_date')}}" placeholder="{{__('Publication Date from:')}}" />
            </div>
        </div>

        <div class="col-12 col-md-4">
            <div class="mb-3">
                <x-input name="to_date" value="{{request('to_date')}}" placeholder="{{__('Publication Date to:')}}" />
            </div>
        </div>

        <div class="col-12 col-md-4">
            <div class="mb-3">
                <x-input name="tag" value="{{request('tag')}}" placeholder="{{__('Tag:')}}" />
            </div>
        </div>

        <div class="col-12 col-md-4">
            <div class="mb-3">
                <x-button type="submit" class="w-100">
                    {{__('Filtr')}}
                </x-button>
            </div>
        </div>
    </div>
</x-form>