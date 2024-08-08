<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class MicrocreditSeeder extends Seeder
{
    public function run()
    {
        $filePath = base_path('database/seeders/data/microcredit.csv');
        $csvData = array_map('str_getcsv', file($filePath));
        $header = array_map('trim', $csvData[0]);
        unset($csvData[0]);

        $existingIdNumbers = DB::table('microcredits')->pluck('id_number')->toArray();

        foreach ($csvData as $row) {
            $data = array_combine($header, $row);

            // Convert empty strings to null
            foreach ($data as $key => $value) {
                $data[$key] = trim($value) === '' ? null : trim($value);
            }

            // Skip if id_number is empty or duplicate
            if (is_null($data['id_number']) || in_array($data['id_number'], $existingIdNumbers)) {
                continue;
            }

            // Insert the data into the microcredits table
            DB::table('microcredits')->insert([
                'vsla_id' => $data['vsla_id'],
                'name' => $data['name'],
                'gender' => $data['gender'],
                'id_number' => $data['id_number'],
                'district_id' => $data['district_id'],
                'sector_id' => $data['sector_id'],
                'cell_id' => $data['cell_id'],
                'village_id' => $data['village_id'],
                'mobile' => $data['mobile'],
                'loan_one' => $data['loan_one'],
                'loan_two' => $data['loan_two'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Add the inserted id_number to the existing array
            $existingIdNumbers[] = $data['id_number'];
        }
    }
}
