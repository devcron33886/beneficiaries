<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ZamukaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = fopen(base_path('database/data/zamuka.csv'), 'r');
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ',')) !== false) {
            if (! $firstline) {
                DB::table('zamuka_beneficiaries')->insert([
                    'head_of_household_name' => $data[0],
                    'household_id_number' => $data[1],
                    'spouse_name' => $data[2],
                    'spouse_id_number' => $data[3],
                    'district_id' => $data[4],
                    'sector_id' => $data[5],
                    'cell_id' => $data[6],
                    'village_id' => $data[7],
                    'house_hold_phone' => $data[8],
                    'family_size' => $data[9],
                    'main_source_of_income' => $data[10],
                    'entrance_year' => $data[11],
                ]);
            }
            $firstline = false;
        }
        fclose($csvFile);
    }
}
