<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Models\Donate;
use Illuminate\Http\Request;

class DonateController extends Controller
{
    public function __invoke()
    {
        for ($i=0; $i <10; $i++) {
            $currencies = Currency::query()->where('id', '=', 'BTC')->first();
            Donate::query()->forceCreate([
                'created_at' => now()->subDays(rand(0, 1000)),
                'currency_id' => $currencies->id,
                'amount' => rand(1, 1000),
            ]);
        }
         /*$stats = [
             'total_count' => Donate::query()->count(),
             'total_amount' => Donate::query()->sum('amount'),
             'avg_amount' => Donate::query()->avg('amount'),
             'min_amount' => Donate::query()->min('amount'),
             'max_amount' => Donate::query()->max('amount'),
         ];*/
         $static = Donate::query()
         ->select(['currency_id'])
         ->selectRaw('count(*) as total_count')
         ->selectRaw('sum(amount) as total_amount')
         ->selectRaw('avg(amount) as avg_amount')
         ->selectRaw('min(amount) as min_amount')
         ->selectRaw('max(amount) as max_amount')
         ->groupBy('currency_id')
         ->get();
        return view('donates.index', compact('static'));
    }
}
