<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchoolFeedingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Specify the path to your CSV file
        $csvPath = 'database/seeders/data/school_feedings.csv';

        // Open the CSV file
        $handle = fopen($csvPath, 'r');

        // Skip the header row
        fgetcsv($handle);

        // Iterate through the CSV data and insert into the database
        while (($row = fgetcsv($handle)) !== false) {
            $data = [
                'name' => $row[0],
                'grade' => $row[1] ?: null,
                'gender' => $row[2] ?: null,
                'school' => $row[3] ?: null,
                'option' => $row[4],
                'school_phone' => $row[5] ?: null,
                'district' => $row[6] ?: null,
                'sector' => $row[7] ?: null,
                'cell' => $row[8] ?: null,
                'village' => $row[9] ?: null,
                'father_name' => $row[10] ?: null,
                'mother_name' => $row[11] ?: null,
                'home_phone' => $row[12] ?: null,
                'status' => $row[13],
                'created_at' => now() ?: null,
                'updated_at' => now(),
            ];

            DB::table('school_feedings')->insert($data);
        }

        fclose($handle);
    }
}
