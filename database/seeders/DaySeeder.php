<?php

namespace Database\Seeders;

use App\Models\Day;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $days = [
            ['name' => "Lunes", 'number' => 1, 	'scheme_day_id' => 2],
            ['name' => "Martes", 'number' => 2, 	'scheme_day_id' => 2],
            ['name' => "Miercoles", 'number' => 3, 'scheme_day_id' => 2],
            ['name' => "Jueves", 'number' => 4, 	'scheme_day_id' => 2],
            ['name' => "Viernes", 'number' => 5, 	'scheme_day_id' => 2],
        ];

        Day::insert($days);
    }
}
