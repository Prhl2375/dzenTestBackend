<?php

namespace Database\Seeders;

use App\Models\SortingFilterMethod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SortingFilterMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SortingFilterMethod::create([
            'sf_id'=>1,
            'name'=>'Newer first',
            'src'=>'newerFirstMethod',
            'query_name'=>'newer_first_method'
        ]);
        SortingFilterMethod::create([
            'sf_id'=>1,
            'name'=>'Older first',
            'src'=>'olderFirstMethod',
            'query_name'=>'older_first_method'
        ]);
    }
}
