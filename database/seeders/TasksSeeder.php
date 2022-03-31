<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TasksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('taks')->insert([
            'name' => 'Task 1',
            'description' => 'Task 1 description',
            'user_id' => 1,
        ]);
        DB::table('taks')->insert([
            'name' => 'Task 2',
            'description' => 'Task 2 description',
            'user_id' => 2,
        ]);
        DB::table('taks')->insert([
            'name' => 'Task 3',
            'description' => 'Task 3 description',
            'user_id' => 3,
        ]);
    }
}
