<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    public function definition(): array
    {
        $id_order = \App\Models\Order::pluck('id_order')->toArray();
        return [
            'id_order' => $this->faker->randomElement($id_order),
            'amount' => $this->faker->randomFloat(2, 50, 500),
            'status' => $this->faker->randomElement(['Pending', 'Dibayar', 'Gagal']),
            'payment_method' => $this->faker->word,
            'payment_date' => $this->faker->dateTimeThisYear(),
        ];
    }
}
