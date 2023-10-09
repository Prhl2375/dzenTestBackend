<?php

namespace Database\Seeders;

use App\Models\SortingFilter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SortingFilterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SortingFilter::create([
            'id'=>1,
            'name'=>'Date Sorting',
            'src'=>'App\SF\DateSorting',
            'query_name'=>'date_sorting'
        ]);
        SortingFilter::create([
            'name'=>'Name Filter',
            'src'=>'App\SF\NameFilter',
            'query_name'=>'name_filter'
        ]);
        SortingFilter::create([
            'name'=>'Email Filter',
            'src'=>'App\SF\EmailFilter',
            'query_name'=>'email_filter'
        ]);
    }
}
