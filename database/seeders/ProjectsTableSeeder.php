<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectsTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('projects')->insert([
            [
                'title' => 'Project Alpha',
                'project_desc' => 'Description of Project Alpha',
                'status' => 'pending',
                'supervisor_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
