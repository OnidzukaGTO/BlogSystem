<x-form method="GET" action="{{route('blogs')}}">
    <div class="row border-bottom pb-3 mb-4">

        <div class="col-12 col-md-4">
            <div class="mb-3">
                <x-input name="search" value="{{request('search')}}" placeholder="{{__('Search:')}}" />
            </div>

            <div class="mb-3">
                <x-input name="tag" value="{{request('tag')}}" placeholder="{{__('Tag:')}}" />
            </div> 

            <div class="mb-3">
                <x-button type="submit" class="w-100">
                    {{__('Filtr')}}
                </x-button>
            </div>
        </div>

        <div class="col-12 col-md-4">
            <div class="mb-3">
                <x-label>
                    {{__('Publication Date from:')}}
                </x-label>
                <x-input class="col-4" type="date" name="from_date" value="{{request('from_date')}}" />
            </div>
            <div class="mb-3">
                <x-label>
                    {{__('Publication Date to:')}}
                </x-label>
                <x-input type="date" name="to_date" value="{{request('to_date')}}" />
            </div>
        </div>
        

        
    </div>
</x-form>