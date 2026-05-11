<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotesTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('notes')->insert([
            [
                'note_desc' => 'Initial project note',
                'supervisor_id' => 2,
                'project_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
