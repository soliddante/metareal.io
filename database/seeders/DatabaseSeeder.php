<?php

namespace Database\Seeders;

use App\Models\Land;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {

        for ($a = 1; $a < 12; $a++) {
            Land::create([
                'id' => $a,
                'user_id' => rand(1, 4),
                'geo_id' => $a,
                'price' => rand(1500, 3000),
                'name' => fake()->firstNameFemale(),
                'picture' => 'img/buildings/winter/classic.png',
            ]);
        }

        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'bank',
            'username' => 'bank',
            'email' => 'bank@gmail.com',
            'wallet' => '0x0',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'dante',
            'username' => 'DanteVelli',
            'email' => 'dante@gmail.com',
            'wallet' => "0xb9C5Bd3158C86750a1CC501A0FB8aDE2852cD9a2",
        ]);
        \App\Models\User::factory()->count(2)->create();
    }
}
