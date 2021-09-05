<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrdersProduct;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PermissionSeeder::class
        ]);

        User::factory(100)->create();
        Order::factory()->count(100)->create()->each(function($order) {
            OrdersProduct::factory()->count(mt_rand(1, Product::count()))->create([
                'order_id' => $order->id,
                'created_at' => $order->created_at
            ]);
        });
    }
}
