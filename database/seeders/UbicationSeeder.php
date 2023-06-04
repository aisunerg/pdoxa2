<?php

namespace Database\Seeders;

use App\Models\Ubication;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UbicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ubications = [
            ['name' => 'Area de Ciencias de la Salud', 'description' => 'Area de Ciencias de la Salud', 'coords' => '9.893732086073857,-67.3862099647522'],
            ['name' => 'Area de Ingenieria de Sistemas', 'description' => 'Area de Ingenieria de Sistemas', 'coords' => '9.897857073288638,-67.38899677991867'],
            ['name' => 'Casona Universitaria', 'description' => 'Av. Bolivar, San Juan de los Morros', 'coords' => '9.910109126467397,-67.35909014940262'],
            ['name' => 'Decanato de Investigación', 'description' => '', 'coords' => '9.897310119556396,-67.3910540342331'],
            ['name' => 'Concha Acustica', 'description' => '', 'coords' => '9.894652301363859, -67.38760468014834'],
            ['name' => 'Dirección de Informática', 'description' => '', 'coords' => '9.900117, -67.398283'],
            ['name' => 'Área de Ciencias Economicas', 'description' => '2do Edificio', 'coords' => ''],
            ['name' => 'INCES', 'description' => 'INCES GUARICO AVENIDA MIRANDA', 'coords' => ''],
        ];

        Ubication::insert($ubications);
    }
}
