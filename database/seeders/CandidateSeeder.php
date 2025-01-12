<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CandidateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('candidates')->insert([
            ['name' => 'Matthew Prempeh', 'category_id' => '1' ],
            ['name' => 'Dominic Szoboszlai', 'category_id' => '1' ],
            ['name' => 'Prince Annor', 'category_id' => '1' ],

            ['name' => 'Lauren James', 'category_id' => '2' ],
            ['name' => 'Francis Ngannou', 'category_id' => '2' ],
            ['name' => 'Harry Styles', 'category_id' => '2' ],

            ['name' => 'Reece Pratt', 'category_id' => '3' ],
            ['name' => 'John Doe', 'category_id' => '3' ],
            ['name' => 'Ernest Essien', 'category_id' => '3']
        ]);
    }
}
