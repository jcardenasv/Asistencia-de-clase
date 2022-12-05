<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('classes')->insert(
            [
                'id_course' => '002312',
                'number' => 1,
                'topic' => 'Esquemas preconceptuales'
            ]
        );

        DB::table('classes')->insert(
            [
                'id_course' => '002312',
                'number' => 2,
                'topic' => 'Modelo del dominio'
            ]
        );

        DB::table('classes')->insert(
            [
                'id_course' => '002343',
                'number' => 1,
                'topic' => 'NoSQL'
            ]
        );
    }
}
