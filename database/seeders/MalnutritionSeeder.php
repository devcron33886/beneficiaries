<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MalnutritionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $filePath = base_path('database/seeders/data/malnutrition.csv');
        $csvData = array_map('str_getcsv', file($filePath));
        $header = array_map('trim', $csvData[0]);
        unset($csvData[0]);

        foreach ($csvData as $row) {
            $data = array_combine($header, $row);

            // Convert empty strings to null
            foreach ($data as $key => $value) {
                $data[$key] = trim($value) === '' ? null : trim($value);
            }

            // Convert package_reception_date to Y-m-d format
            $packageReceptionDate = null;
            if (!is_null($data['package_reception_date'])) {
                try {
                    $packageReceptionDate = Carbon::createFromFormat('d/m/Y', $data['package_reception_date'])->format('Y-m-d');
                } catch (\Exception $e) {
                    $packageReceptionDate = null;
                }
            }

            DB::table('malnutritions')->insert([
                'name' => $data['name'],
                'gender' => $data['gender'],
                'age_or_months' => $data['age_or_months'],
                'associated_health_center' => $data['associated_health_center'],
                'sector' => $data['sector'],
                'cell' => $data['cell'],
                'village' => $data['village'],
                'father_name' => $data['father_name'],
                'mother_name' => $data['mother_name'],
                'home_phone_number' => $data['home_phone_number'],
                'package_reception_date' => $packageReceptionDate,
                'entry_muac' => floatval($data['entry_muac']),
                'current_muac' => floatval($data['current_muac']),
                'current_nutrition_color_code' => $data['current _nutrition_color_code'], // Note the space before 'nutrition'
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
