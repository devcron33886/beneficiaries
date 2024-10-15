<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use League\Csv\Reader;
use Illuminate\Support\Facades\Log;

class MalnutritionSeeder extends Seeder
{
    public function run()
    {
        $path =  base_path('database/seeders/data/malnutrition.csv');

        if (!file_exists($path)) {
            Log::error("CSV file not found: $path");
            return;
        }

        $csv = Reader::createFromPath($path, 'r');
        $csv->setHeaderOffset(0);

        foreach ($csv as $record) {
            try {
                DB::table('malnutritions')->insert([
                    'name' => $record['name'] ?? null,
                    'gender' => $record['gender'] ?? null,
                    'age_or_months' => $record['age_or_months'] ?? null,
                    'associated_health_center' => $record['associated_health_center'] ?? null,
                    'sector' => $record['sector'] ?? null,
                    'cell' => $record['cell'] ?? null,
                    'village' => $record['village'] ?? null,
                    'father_name' => $record['father_name'] ?? null,
                    'mother_name' => $record['mother_name'] ?? null,
                    'home_phone_number' => $record['home_phone_number'] ?? null,
                    'package_reception_date' => $this->parseDate($record['package_reception_date'] ?? null),
                    'entry_muac' => floatval($record['entry_muac'] ?? 0),
                    'current_muac' => floatval($record['current_muac'] ?? 0),
                    'current_nutrition_color_code' => $record['current _nutrition_color_code'] ?? null, // Note the space before 'nutrition'
                ]);
            } catch (\Exception $e) {
                Log::error("Error inserting record: " . json_encode($record));
                Log::error($e->getMessage());
            }
        }
    }

    private function parseDate($date)
    {
        if (empty($date)) {
            return null;
        }
        $parsedDate = \DateTime::createFromFormat('d/m/Y', $date);
        return $parsedDate ? $parsedDate->format('Y-m-d') : null;
    }
}
