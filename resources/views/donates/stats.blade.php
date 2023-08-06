@foreach ($static as $stats)
<h5>
    {{__('Static for :currency', ['currency' => $stats->currency_id])}}
</h5>
<div class="row">
    <div class="col-12 col-md-4">
        <x-card>
            <x-card-body>
                {{__('Donates:')}}
                <h5 class="m-0">
                    {{$stats['total_count']}}
                </h5>
            </x-card-body>
        </x-card>
    </div>
    <div class="col-12 col-md-4">
        <x-card>
            <x-card-body>
                {{__('Suma:')}}
                <h5 class="m-0">
                    {{$stats['total_amount']}}
                </h5>
            </x-card-body>
        </x-card>
    </div>
    <div class="col-12 col-md-4">
        <x-card>
            <x-card-body>
                {{__('Average:')}}
                <h5 class="m-0">
                    {{round($stats['avg_amount'], 2)}}
                </h5>
            </x-card-body>
        </x-card>
    </div>
    <div class="col-12 col-md-4">
        <x-card>
            <x-card-body>
                {{__('Donat min:')}}
                <h5 class="m-0">
                    {{$stats['min_amount']}}
                </h5>
            </x-card-body>
        </x-card>
    </div>
    <div class="col-12 col-md-4">
        <x-card>
            <x-card-body>
                {{__('Donat max:')}}
                <h5 class="m-0">
                    {{$stats['max_amount']}}
                </h5>
            </x-card-body>
        </x-card>
    </div>
</div>
@endforeach