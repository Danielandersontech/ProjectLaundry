<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Feedback>
 */
class FeedbackFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $id_pengguna = \App\Models\Pengguna::pluck('id_pengguna')->toArray();
        $id_order = \App\Models\Order::pluck('id_order')->toArray();
        return [
            'id_pengguna' => $this->faker->randomElement($id_pengguna),
            'id_order' => $this->faker->randomElement($id_order),
            'rating' => $this->faker->numberBetween(1, 5), // Rating antara 1 hingga 5
            'komentar' => $this->faker->sentence,
            'created_at' => $this->faker->dateTimeThisYear(),
        ];
    }
}
