<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ScholarshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $filePath = base_path('database/seeders/data/Scholarship.csv');

        // Check if the file exists
        if (! File::exists($filePath)) {
            $this->command->error("CSV file does not exist at path: {$filePath}");

            return;
        }

        // Open the CSV file
        if (($handle = fopen($filePath, 'r')) !== false) {
            $header = null;
            while (($row = fgetcsv($handle, 1000, ',')) !== false) {
                if (! $header) {
                    $header = $row; // Capture the header row
                } else {
                    $data = array_combine($header, $row); // Combine header with row values

                    DB::table('scholarships')->insert([
                        'name' => $data['name'],
                        'gender' => $data['gender'] ?: null,
                        'id_number' => $data['id_number'] ?: null,
                        'district_id' => $data['district_id'] ?: null,
                        'sector_id' => $data['sector_id'] ?: null,
                        'cell_id' => $data['cell_id'] ?: null,
                        'village_id' => $data['village_id'] ?: null,
                        'mobile' => $data['mobile'] ?: null,
                        'university_attended' => $data['university_attended'] ?: null,
                        'faculty' => $data['faculty'] ?: null,
                        'program_duration' => $data['program_duration'] ?: null,
                        'budget_to_complete' => $data['budget_to_complete'] ?: null,
                        'year_of_entrance' => $data['year_of_entrance'] ?: null,
                        'school_contact' => $data['school_contact'] ?: null,
                        'status' => $data['status'] ?: null,
                    ]);

                }
            }
            fclose($handle);
        }
    }
}
