<x-form method="GET" action="{{route('blogs')}}">
    <div class="row">
        <div class="col-12 col-md-4">
            <div class="mb-3">
                <x-input name="search" value="{{request('search')}}" placeholder="{{__('Filter')}}" />
            </div>
        </div>

        <div class="col-12 col-md-4">
            <div class="mb-3">
                <x-select name="category_id" value="{{request('category_id')}}" :options="[null => __('All'), 1 =>__('One'), 2 => __('Two')]" />
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