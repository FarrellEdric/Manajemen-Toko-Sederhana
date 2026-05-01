<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use function Laravel\Prompts\table;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = Faker::create();

    for ($i = 0; $i < 20; $i++) {
        DB::table('products')->insert([
            'code' => 'P' . $faker->unique()->numberBetween(100, 999),
            'name' => $faker->word(),
            'price' => $faker->numberBetween(1000, 100000),
            'stock' => $faker->numberBetween(1, 50)
        ]);

       
    }
}
}