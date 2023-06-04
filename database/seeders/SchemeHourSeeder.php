<?php

namespace Database\Seeders;

use App\Models\SchemeHour;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SchemeHourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $schemehours = [
            ['name' => 'Horas Semestre Intensivo', 'sep_num' => 8],
            ['name' => 'Bloque 45min', 'sep_num' => 6],
            ['name' => 'Bloque45 (Mañana-Tarde)', 'sep_num' => 6],
            ['name' => 'anualizado', 'sep_num' => 0],
            ['name' => 'Turno Mañana - Tarde - Noche', 'sep_num' => 6],
        ];

        SchemeHour::insert($schemehours);
    }
}
