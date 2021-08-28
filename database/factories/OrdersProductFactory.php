<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\OrdersProduct;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrdersProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OrdersProduct::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array {
        $productId = Product::inRandomOrder()->value('id');

        return [
            'order_id' => Order::factory(),
            'product_id' => $productId,
            'details' => json_encode(['discount' => mt_rand(0, 10)]),
            'quantity' => $this->faker->numberBetween(1, 10),
            'price' => $this->faker->numberBetween(100, 5000),
        ];
    }
}
