<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ZamukaSeeder extends Seeder
{
    /**
     * Run the database seeder.
     *
     * @return void
     */
    public function run(): void
    {
        $csvFile = database_path('seeders/data/zamuka.csv');
        $firstRow = true;

        if (($handle = fopen($csvFile, 'r')) !== false) {
            while (($row = fgetcsv($handle)) !== false) {
                // Skip header row
                if ($firstRow) {
                    $firstRow = false;
                    continue;
                }

                DB::table('zamuka_beneficiaries')->insert([
                    'head_of_household_name' => $row[0] ?: null,
                    'household_id_number' => $row[1] ?: null,
                    'spouse_name' => $row[2] ?: null,
                    'spouse_id_number' => $row[3] ?: null,
                    'sector' => $row[4] ?: null,
                    'cell' => $row[5] ?: null,
                    'village' => $row[6] ?: null,
                    'house_hold_phone' => $this->formatPhoneNumber($row[7]),
                    'family_size' => $row[8] ? (int)$row[8] : null,
                    'main_source_of_income' => $row[9] ?: null,
                    'entrance_year' => $row[10] ?: null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
            fclose($handle);
        }
    }

    /**
     * Format phone number to include country code if missing
     *
     * @param string|null $phone
     * @return string|null
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
            return '+250' . $phone;
        }

        return $phone;
    }
}
