<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ToolkitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $filePath = base_path('database/seeders/data/toolkits.csv');
        $csvData = array_map('str_getcsv', file($filePath));
        $header = array_map('trim', $csvData[0]);
        unset($csvData[0]);

        $existingIdNumbers = DB::table('toolkits')->pluck('identification_number')->toArray();
        foreach ($csvData as $row) {
            $data = array_combine($header, $row);
            //convert empty strings to null

            foreach ($data as $key => $value) {
                $data[$key] = trim($value) === '' ? null : trim($value);
            }
            //skip if id_num bber is empty or duplicate
            if (is_null($data['identification_number']) || in_array($data['identification_number'], $existingIdNumbers)) {
                continue;
            }
            DB::table('toolkits')->insert([
                'name' => $data['name'],
                'gender' => $data['gender'],
                'identification_number' => $data['identification_number'],
                'phone_number' => $data['phone_number'],
                'tvet_attended' => $data['tvet_attended'],
                'option' => $data['option'],
                'level' => $data['level'],
                'training_intake' => $data['training_intake'],
                'reception_date' => $data['reception_date'],
                'toolkit_received' => $data['toolkit_received'],
                'toolkit_cost' => $data['toolkit_cost'],
                'subsidized_percent' => $data['subsidized_percent'],
                'sector' => $data['sector'],
                'total' => $data['total'],
                'created_at' => now(),
                'updated_at' => now(),

            ]);
        }
    }
}
