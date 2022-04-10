<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\ShippingMethod;
use Illuminate\Database\Eloquent\Factories\Factory;

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
    public function definition()
    {
        $subtotal = $this->faker->numberBetween(100, 5000);
        return [
            'payment_method' => $this->faker->creditCardType,
            'shipping_charge' => $this->faker->numberBetween(1, 50),
            'sub_total' => $subtotal,
            'grand_total' => $subtotal,
            'payment_status' => $this->faker->randomElement(array_keys(Order::PAYMENT_STATUS)),
            'order_status' => $this->faker->randomElement(array_keys(Order::ORDER_STATUS)),
        ];
    }
}
