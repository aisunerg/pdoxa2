<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            UserSeeder::class,
            AreaSeeder::class,
            AdressSeeder::class,
            CareerSeeder::class,
            PensumSeeder::class,
            ProjectSeeder::class,
            StateSeeder::class,
            MunicipySeeder::class,
            TeacherSeeder::class,
            CardSeeder::class,
            DepartamentSeeder::class,
            SubjectSeeder::class,
            ShiftSeeder::class,
            SectionSeeder::class,
            TeacherSectionSeeder::class,
            ClassroomTypeSeeder::class,
            MeetingSeeder::class,
            MeetingSectionSeeder::class,
            AttendanceSeeder::class,
            SchemeHourSeeder::class,
            HourSeeder::class,
            ShiftHourSeeder::class,
            SchemeDaySeeder::class,
            DaySeeder::class,
            UbicationSeeder::class,
            ClassroomSeeder::class,
            BlockSeeder::class,
        ]);
            
    }
}
