<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    public function definition(): array
    {
        $id_pengguna = \App\Models\Pengguna::pluck('id_pengguna')->toArray();
        $id_package = \App\Models\Package::pluck('id_package')->toArray();
        return [
            'id_pengguna' => $this->faker->randomElement($id_pengguna),
            'id_package' => $this->faker->randomElement($id_package),
            'berat_kg' => $this->faker->randomFloat(2, 1, 10),
            'subtotal' => $this->faker->randomFloat(2, 50, 500),
            'tgl_order' => $this->faker->dateTimeThisYear(),
            'status' => $this->faker->randomElement(['Pending', 'Selesai', 'Dibatalkan']),
            'waktu_pengambilan' => $this->faker->dateTimeThisYear(),
            'waktu_pengantaran' => $this->faker->dateTimeThisYear(),
        ];
    }
}
