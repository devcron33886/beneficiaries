<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UrgentCommunitySupportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = database_path('seeders/data/urgent.csv');
        $firstRow = true;

        if (($handle = fopen($csvFile, 'r')) !== false) {
            while (($row = fgetcsv($handle)) !== false) {
                // Skip header row
                if ($firstRow) {
                    $firstRow = false;

                    continue;
                }

                DB::table('urgent_community_supports')->insert([
                    'name' => $row[0] ?? null,
                    'national_id_number' => $row[1] ?? null,
                    'sector' => $row[2] ?? null,
                    'cell' => $row[3] ?: null,
                    'village' => $row[4] ?? null,
                    'phone_number' => $this->formatPhoneNumber($row[5]) ?? null,
                    'support' => $row[6] ?? null,
                    'done_at' => Carbon::createFromFormat($row[7]) ?? null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
            fclose($handle);
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
