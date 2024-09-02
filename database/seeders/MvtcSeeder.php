<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class MvtcSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Path to your CSV file
        $file = database_path('seeders/data/mvtc.csv');

        //Check if the file exists
        if (! File::exists($file)) {
            echo "File not found: $file";

            return;
        }

        // Read the CSV file
        $data = array_map('str_getcsv', file($file));

        // Get the header of the CSV file
        $header = array_shift($data);

        foreach ($data as $row) {
            $rowData = array_combine($header, $row);

            // Handle empty strings and null foreign keys
            $district_id = ! empty($rowData['district_id']) ? $rowData['district_id'] : null;
            $sector_id = ! empty($rowData['sector_id']) ? $rowData['sector_id'] : null;

            // Handle graduation_date as either a valid date or null
            $graduation_date = ! empty($rowData['graduation_date']) ? $rowData['graduation_date'] : null;
            DB::table('mvtc_beneficiaries')->insert([
                'reg_no' => $rowData['reg_no'] ?? null,
                'name' => $rowData['name'] ?? null,
                'gender' => $rowData['gender'] ?? null,
                'district_id' => $district_id,
                'sector_id' => $sector_id,
                'student_id' => $rowData['student_id'] ?? null,
                'student_contact' => $rowData['student_contact'] ?? null,
                'trade' => $rowData['trade'] ?? null,
                'scholar_type' => $rowData['scholar_type'] ?? null,
                'intake' => $rowData['intake'] ?? null,
                'graduation_date' => $graduation_date, // If null, ensure this field is nullable in the database
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
