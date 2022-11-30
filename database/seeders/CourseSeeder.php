<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('courses')->insert(
            [
                'code' => '002312',
                'name' => 'Ingenieria de Requisitos',
                'description' => 'Bla Bla Bla',
                'methodology' => 'Presencial'
            ]
        );

        DB::table('courses')->insert(
            [
                'code' => '002343',
                'name' => 'Bases de datos',
                'description' => 'Bla Bla Bla',
                'methodology' => 'Remota'
            ]
        );
    }
}
