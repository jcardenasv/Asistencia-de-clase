<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teachers')->insert(
            [
                'id_user' => 2,
                'department' => 'Ciencias de la computacion',
                'knowledge_area' => 'Ingenieria de Software'
            ]
        );
    }
}
