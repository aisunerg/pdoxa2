<?php

namespace Database\Seeders;

use App\Models\SchemeDay;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SchemeDaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $schemedays = [
            ['name' => 'Dias Semestre Intensivo'],
            ['name' => 'Lunes a Viernes'],
            ['name' => 'Viernes y Sabados'],
            ['name' => 'Lunes - Sabado'],
            ['name' => 'Sabados'],
        ];

        SchemeDay::insert($schemedays);
    }
}
