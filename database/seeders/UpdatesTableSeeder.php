<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UpdatesTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('updates')->insert([
            [
                'update_desc' => 'Initial update entry',
                'project_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
