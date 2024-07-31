<?php

namespace Database\Seeders;

use App\Models\Vsla;
use Illuminate\Database\Seeder;

class VslaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vslas = [
            [
                'code' => '23NGI8',
                'name' => 'DUTABARANE No1',
                'representative_name' => 'NTAKIRUTIMANA JONAS',
                'representative_id' => '1197280072044001',
                'representative_phone' => '',
                'entrance_year' => '2023',
                'mou_sign_date' => '04-03-2023',
            ],
            [
                'code' => '23SRU3',
                'name' => 'DUTERANINKUNGA',
                'representative_name' => 'NZAMUKUNDA SOPHIE',
                'representative_id' => '1198870147707074',
                'representative_phone' => '',
                'entrance_year' => '2023',
                'mou_sign_date' => '04-03-2023',
            ],
            [
                'code' => '23NMU1',
                'name' => 'Koperative TEMUNYA',
                'representative_name' => 'BYUKUSENGE VIANNEY',
                'representative_id' => '1197680077265072',
                'representative_phone' => '',
                'entrance_year' => '2023',
                'mou_sign_date' => '04-03-2023',
            ],
            [
                'code' => '23SNZ2',
                'name' => 'TUZAMURANE',
                'representative_name' => 'HABIMANANA JEAN DAMASCENE',
                'representative_id' => '1197680078080025',
                'representative_phone' => '',
                'entrance_year' => '2023',
                'mou_sign_date' => '04-03-2023',
            ],
            [
                'code' => '23SKA5',
                'name' => 'TWISUNGANE',
                'representative_name' => 'NYIRANTEZIRYAYO Fortune',
                'representative_id' => '1197270072039054',
                'representative_phone' => '',
                'entrance_year' => '2023',
                'mou_sign_date' => '04-03-2023',
            ],
            [
                'code' => '23NKA7',
                'name' => 'TWISUNGANE KABUYE',
                'representative_name' => 'UWIZEYIMANA CHARLES',
                'representative_id' => '1195880063881081',
                'representative_phone' => '',
                'entrance_year' => '2023',
                'mou_sign_date' => '04-03-2023',
            ],
            [
                'code' => '23SRE6',
                'name' => 'TWISUNGANE SHYARA 15',
                'representative_name' => 'NYIRAHAKIZIMANA DATIVE',
                'representative_id' => '1199070145557092',
                'representative_phone' => '',
                'entrance_year' => '2023',
                'mou_sign_date' => '04-03-2023',
            ],
            [
                'code' => '23NNG10',
                'name' => 'NYIRANSENGIMANA ESPERANCE',
                'representative_name' => '1198570141203228',
                'representative_id' => '1197280072044001',
                'representative_phone' => '',
                'entrance_year' => '2023',
                'mou_sign_date' => '04-03-2023',
            ],
        ];
        Vsla::insert($vslas);
    }
}
