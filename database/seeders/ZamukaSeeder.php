<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ZamukaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $csvFile = base_path('/database/seeders/data/zamuka.csv');
         $data = $this->csvToArray($csvFile);
        foreach ($data as $row) {
            // Check if foreign key values exist
            if (
                $this->foreignKeyExists('districts', $row['district_id']) &&
                $this->foreignKeyExists('sectors', $row['sector_id']) &&
                $this->foreignKeyExists('cells', $row['cell_id']) &&
                $this->foreignKeyExists('villages', $row['village_id'])
            ) {
                DB::table('zamuka_beneficiaries')->insert([
                    'head_of_household_name' => $row['head_of_household_name'],
                    'household_id_number' => $row['household_id_number'],
                    'spouse_name' => $row['spouse_name'],
                    'spouse_id_number' => $row['spouse_id_number'],
                    'district_id' => $row['district_id'],
                    'sector_id' => $row['sector_id'],
                    'cell_id' => $row['cell_id'],
                    'village_id' => $row['village_id'],
                    'house_hold_phone' => $row['house_hold_phone'],
                    'family_size' => $row['family_size'],
                    'main_source_of_income' => $row['main_source_of_income'],
                    'entrance_year' => $row['entrance_year'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                // Log or handle the error for foreign key constraint failure
                // This can be logged to a file or displayed for debugging
                echo 'Foreign key constraint failed for row: '.json_encode($row)."\n";
            }
        }
    }

    /**
     * Convert a CSV file to an array.
     *
     * @param  string  $filename
     * @return array
     */
    private function csvToArray($filename)
    {
        $rows = array_map('str_getcsv', file($filename));
        $header = array_shift($rows);
        $csv = [];
        foreach ($rows as $row) {
            $csv[] = array_combine($header, $row);
        }

        return $csv;
    }

    /**
     * Check if a foreign key value exists in the given table.
     *
     * @param  string  $table
     * @param  mixed  $id
     * @return bool
     */
    private function foreignKeyExists($table, $id)
    {
        return DB::table($table)->where('id', $id)->exists();
    }
}
