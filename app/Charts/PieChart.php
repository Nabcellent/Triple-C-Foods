<?php

declare(strict_types = 1);

namespace App\Charts;

use App\Models\OrdersProduct;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PieChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan {
        $topProducts = OrdersProduct::join('products', 'orders_products.product_id', '=', 'products.id')
            ->select(['product_id', 'title', DB::raw("COUNT(*) as total")])
            ->groupBy('product_id')->latest('total')->take(3)->get();

        return Chartisan::build()
            ->labels($topProducts->pluck('title')->toArray())
            ->dataset('Sample', $topProducts->pluck('total')->toArray());
    }
}
