<x-form method="GET" action="{{route('blogs')}}">
    <div class="d-flex justify-content-between row border-bottom pb-3 mb-3" style="width: 750px">

        <div class="col-md-6">
            <div class="mb-3">
                <x-input name="search" value="{{request('search')}}" placeholder="{{__('Search:')}}" />
            </div>

            <div class="mb-3">
                <x-input name="tag" value="{{request('tag')}}" placeholder="{{__('Tag:')}}" />
            </div> 

            <div class="mb-3">
                <x-button type="submit" style="width: 100%">
                    {{__('Filtr')}}
                </x-button>
            </div>
        </div>


        <div class="col-md-6">
            <div class="row mb-3">
                <div class="col-md-6">
                    <x-label>
                        {{__('Publication Date from:')}}
                    </x-label>
                </div>
                <div class="col-md-6">
                    <x-input type="date" name="from_date" value="{{request('from_date')}}" />
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <x-label>
                        {{__('Publication Date to:')}}
                    </x-label>
                </div>
                <div class="col-md-6">
                    <x-input type="date" name="to_date" value="{{request('to_date')}}" />
                </div>
            </div>
        </div>
        

        
    </div>
</x-form>