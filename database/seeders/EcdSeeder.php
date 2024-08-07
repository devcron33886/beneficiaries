<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class EcdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Disable foreign key checks to allow nullable foreign keys
        Schema::disableForeignKeyConstraints();

        // Path to the CSV file
        $csvFile = base_path('database/seeders/data/ecd.csv');

        // Read the CSV file
        $data = array_map('str_getcsv', file($csvFile));

        // Remove the header row
        $header = array_shift($data);

        foreach ($data as $row) {
            // Map CSV columns to database columns
            $beneficiary = array_combine($header, $row);

            // Convert empty strings to null
            foreach ($beneficiary as $key => $value) {
                if ($value === '') {
                    $beneficiary[$key] = null;
                }
            }

            // Insert data into the database
            DB::table('ecd_beneficiaries')->insert([
                'name' => $beneficiary['name'],
                'grade' => $beneficiary['grade'],
                'gender' => $beneficiary['gender'],
                'academic_year' => $beneficiary['academic_year'],
                'district_id' => $beneficiary['district_id'],
                'sector_id' => $beneficiary['sector_id'],
                'cell_id' => $beneficiary['cell_id'],
                'village_id' => $beneficiary['village_id'],
                'father_name' => $beneficiary['father_name'],
                'father_id_number' => $beneficiary['father_id_number'],
                'mother_name' => $beneficiary['mother_name'],
                'home_phone_number' => $beneficiary['home_phone_number'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Enable foreign key checks again
        Schema::enableForeignKeyConstraints();
    }
}
