<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataEduardoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jsonFile = file_get_contents(app_path('Data/data.json'));
        \Log::info($jsonFile);
        $data = json_decode($jsonFile);
        foreach ($data as $row => $value) {
            DB::table('data')->insert($value);
        }
    }
}
