<?php

namespace Database\Seeders;

use App\Models\Hour;
use App\Models\ShiftHour;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hours = [
            ['number' => "1", 'start' => "07:00:00", 'end' =>	"07:45:00", 'scheme_hour_id' => 2, 'shift' => 1 ],
            ['number' => "2", 'start' => "07:45:00", 'end' =>	"08:30:00", 'scheme_hour_id' => 2, 'shift' => 1 ],
            ['number' => "3", 'start' => "08:30:00", 'end' =>	"09:15:00", 'scheme_hour_id' => 2, 'shift' => 1 ],
            ['number' => "4", 'start' => "09:15:00", 'end' =>	"10:00:00", 'scheme_hour_id' => 2, 'shift' => 1 ],
            ['number' => "5", 'start' => "10:00:00", 'end' =>	"10:45:00", 'scheme_hour_id' => 2, 'shift' => 1 ],
            ['number' => "6", 'start' => "10:45:00", 'end' =>	"11:30:00", 'scheme_hour_id' => 2, 'shift' => 1 ],
            ['number' => "7", 'start' => "11:30:00", 'end' =>	"12:15:00", 'scheme_hour_id' => 2, 'shift' => 1 ],
            ['number' => "8", 'start' => "12:15:00", 'end' =>	"13:00:00", 'scheme_hour_id' => 2, 'shift' => 1 ],
            ['number' => "9", 'start' => "13:00:00", 'end' =>	"13:45:00", 'scheme_hour_id' => 2, 'shift' => 2 ],
            ['number' => "10", 'start' => "13:45:00", 'end' =>	"14:30:00", 'scheme_hour_id' => 2, 'shift' => 2 ],
            ['number' => "11", 'start' => "14:30:00", 'end' =>	"15:15:00", 'scheme_hour_id' => 2, 'shift' => 2 ],
            ['number' => "12", 'start' => "15:15:00", 'end' =>	"16:00:00", 'scheme_hour_id' => 2, 'shift' => 2 ],
            ['number' => "13", 'start' => "16:00:00", 'end' =>	"16:45:00", 'scheme_hour_id' => 2, 'shift' => 2 ],
            ['number' => "14", 'start' => "16:45:00", 'end' =>	"17:30:00", 'scheme_hour_id' => 2, 'shift' => 2 ],
            ['number' => "15", 'start' => "17:30:00", 'end' =>	"18:15:00", 'scheme_hour_id' => 2, 'shift' => 2 ],
            ['number' => "16", 'start' => "18:15:00", 'end' =>	"19:00:00", 'scheme_hour_id' => 2, 'shift' => 2 ],

        ];

        foreach ($hours as $hour) {
            $nHour = new Hour();

            $nHour->number = $hour['number'];
            $nHour->start = $hour['start'];
            $nHour->end = $hour['end'];
            $nHour->scheme_hour_id = $hour['scheme_hour_id'];

            $nHour->save();
            $nHour->shift()->attach($hour['shift']);
        }
    }
}
