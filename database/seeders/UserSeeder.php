<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')
            ->insert([
                [
                    'name' => 'Demo',
                    'last_name' => 'Demo',
                    'email' => 'demo@gmail.com',
                    'password' => Hash::make('123456'),
                    'user_created_id' => 1
                ]
            ])
    }
}
