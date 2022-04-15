<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@email.com',
                'password' => Hash::make('123456789'),
                'role' => 'admin',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Fulano de Tal',
                'email' => 'maria@email.com',
                'password' => Hash::make('123456789'),
                'role' => 'agent',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Siclano de Tal',
                'email' => 'siclano@email.com',
                'password' => Hash::make('123456789'),
                'role' => 'user',
                'created_at' => Carbon::now()
            ],
        ]);

        DB::table('categories')->insert([
            [
                'name' => 'Computadores e Notebooks',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Smartphones',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Tablets',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Hardware',
                'created_at' => Carbon::now()
            ],
        ]);

        $faker = Faker\Factory::create();

        for($i = 1; $i < 501; $i++) {
            DB::table('products')->insert([
                [
                    'name' => $faker->text(15),
                    'description' => $faker->text(),
                    'category_id' => rand(1,4),
                    'price' => rand(100, 5000),
                    'quantity' => rand(0, 10000),
                    'created_at' => Carbon::now()
                ]
            ]);

            DB::table('products_images')->insert([
                [
                    'image' => 'https://place-hold.it/500',
                    'product_id' => $i,
                    'created_at' => Carbon::now()
                ],
                [
                    'image' => 'https://place-hold.it/500',
                    'product_id' => $i,
                    'created_at' => Carbon::now()
                ],
            ]);
        }

    }
}
