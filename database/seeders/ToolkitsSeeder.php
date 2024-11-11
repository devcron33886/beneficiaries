<?php

namespace Database\Seeders;

use Carbon\Carbon;
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
            //skip if id_number is empty or duplicate
            if (is_null($data['identification_number']) || in_array($data['identification_number'], $existingIdNumbers)) {
                continue;
            }

            // Convert date format
            $receptionDate = null;
            if (! is_null($data['reception_date'])) {
                try {
                    $receptionDate = Carbon::createFromFormat('d-m-Y', $data['reception_date'])->format('Y-m-d');
                } catch (\Exception $e) {
                    // If date conversion fails, set to null
                    $receptionDate = null;
                }
            }

            DB::table('toolkits')->insert([
                'name' => $data['name'],
                'gender' => $data['gender'],
                'identification_number' => $data['identification_number'],
                'phone_number' => $this->formatPhoneNumber($data['phone_number']),
                'tvet_attended' => $data['tvet_attended'],
                'option' => $data['option'],
                'level' => $data['level'],
                'training_intake' => $data['training_intake'],
                'reception_date' => $receptionDate,
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

    /**
     * Format phone number to include country code if missing
     */
    private function formatPhoneNumber(?string $phone): ?string
    {
        if (empty($phone)) {
            return null;
        }

        // Remove any non-numeric characters
        $phone = preg_replace('/[^0-9]/', '', $phone);

        // If number starts with 7, add Rwanda country code
        if (strlen($phone) == 9 && str_starts_with($phone, '7')) {
            return '+250'.$phone;
        }

        return $phone;
    }
}
