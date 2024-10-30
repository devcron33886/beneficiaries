<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users=[
            [
                'name'=>'RWAGAJU Desire',
                'email'=>'desire@fmorwanda.org',
                'password'=>bcrypt('password'),
                'email_verified_at'=>now(),
            ],
            [
                'name'=>'IMANIZABAYO Dieudonne',
                'email'=>'dieudonne@fmorwanda.org',
                'password'=>bcrypt('password'),
                'email_verified_at'=>now(),
            ],
            [
                'name'=>'MBABAZI Jacques',
                'email'=>'support@fmorwanda.org',
                'password'=>bcrypt('password'),
                'email_verified_at'=>now(),
            ]
        ];
        User::insert($users);
    }
}
