<?php

namespace Database\Seeders;

use App\Models\Classroom_type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassroomTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //0 = Deporte
        //1 = regular
        //3 = Distancia
        //4 = Pasantia 
        $classroom_types = [
            ['name' => 'Regular',   'description' =>  'Aula de Clase Regular','modality' => 1],
            ['name' => 'Lab. Comp.','description' =>  'Laboratorio de Computacion','modality' => 1],
            ['name' => 'Pasantia',  'description' => 'Pasantias','modality' => 4],
            ['name' => 'Distancia', 'description' => 'Educacion a Distancia','modality' => 3],
            ['name' => 'Deporte',   'description' => 'Area Deportiva','modality' => 0],
        ];

        Classroom_type::insert($classroom_types);
    }
}
