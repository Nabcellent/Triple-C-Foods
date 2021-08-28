<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array {
        $userId = User::inRandomOrder()->value('id');
        $orderNo = '#NFC0'.str_pad($this->faker->unique()->numberBetween(1, 1000), 7, "0", STR_PAD_LEFT);
        $phone = $this->faker->randomElement([
            11 . $this->faker->unique()->numerify('#######'),
            7 . $this->faker->unique()->numerify('########')
        ]);

        return [
            'user_id' => $userId,
            'order_no' => $orderNo,
            'phone' => $phone,
            'address' => $this->faker->address,
            'pay_method' => $this->faker->randomElement(['Cod', 'Mpesa', 'PayPal']),
            'total' => $this->faker->randomFloat(2, 0, 7000),
            'status' => $this->faker->randomElement(['pending', 'completed', 'cancelled']),
            'created_at' => $this->faker->dateTimeThisMonth()
        ];
    }
}
