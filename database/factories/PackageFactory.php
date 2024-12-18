<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Package>
 */
class PackageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_paket' => $this->faker->word,
            'deskripsi' => $this->faker->sentence,
            'durasi' => $this->faker->numberBetween(1, 4),
            'harga_per_kg' => $this->faker->numberBetween(5000,12000),
        ];
    }
}
