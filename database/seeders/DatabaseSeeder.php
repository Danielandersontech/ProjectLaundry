<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // \App\Models\Pasien::factory(100)->create();
        // \App\Models\Poli::factory(4)->create();
        // \App\Models\Daftar::factory(100)->create();
        \App\Models\Pengguna::factory(10)->create();
        \App\Models\Package::factory(10)->create();
        \App\Models\Order::factory(10)->create();
        \App\Models\Payment::factory(10)->create();
        \App\Models\Feedback::factory(10)->create();
    }
}
