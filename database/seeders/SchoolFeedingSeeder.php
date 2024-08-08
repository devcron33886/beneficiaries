<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
                'grade' => $row[1],
                'gender' => $row[2],
                'school' => $row[3],
                'option' => $row[4],
                'school_phone' => $row[5],
                'father_name' => $row[10],
                'mother_name' => $row[11],
                'home_phone' => $row[12],
                'status' => $row[13],
                'created_at' => now(),
                'updated_at' => now(),
            ];

            // Handle null foreign keys
            if ($row[6] !== '') {
                $data['district_id'] = $row[6];
            }
            if ($row[7] !== '') {
                $data['sector_id'] = $row[7];
            }
            if ($row[8] !== '') {
                $data['cell_id'] = $row[8];
            }
            if ($row[9] !== '') {
                $data['village_id'] = $row[9];
            }

            DB::table('school_feedings')->insert($data);
        }

        fclose($handle);
    }
}