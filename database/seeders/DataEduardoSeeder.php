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
        $data = json_decode($jsonFile)->REPORTE;
        DB::table('data')
            ->insert([
                $data
            ]);
    }
}
