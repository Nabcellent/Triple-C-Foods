<?php

declare(strict_types = 1);

namespace App\Charts;

use App\Models\Order;
use Carbon\Carbon;
use Carbon\Traits\Creator;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;

class BarChart extends BaseChart
{
    /**
     * Determines the middlewares that will be applied
     * to the chart endpoint.
     */
    public ?array $middlewares = ['auth'];

    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan {
        $orders = Order::whereBetween('created_at', [Carbon::now()->subWeek(), Carbon::now()])
            ->get(['created_at'])->groupBy(function($item) {
                return $item->created_at->toDateString();
            });

        $date = new Carbon;
        for($i = 0; $i < 7; $i++) {
            $dateString = $date->toDateString();

            isset($orders[$dateString]) ? $orders[$dateString] = $orders[$dateString]->count() : $orders[$dateString] = 0;

            $date->subDay();
        }

        $orders = $orders->sortKeys();

        foreach($orders as $key => $order) {
            $orders[Carbon::parse($key)->shortDayName] = $order;
            $orders->forget($key);
        }

        return Chartisan::build()
            ->labels(array_keys($orders->toArray()))
            ->dataset('Orders', array_values($orders->toArray()));
    }
}
