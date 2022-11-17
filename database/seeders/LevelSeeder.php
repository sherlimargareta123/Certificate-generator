<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Level;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $levels = [
            [
                'name' => 'Admin',
                'description' => '-'
            ],
            [
                'name' => 'Participant',
                'description' => '-'
            ]
        ];

        foreach ($levels as $level) {
            Level::create($level);
        }
    }
}
