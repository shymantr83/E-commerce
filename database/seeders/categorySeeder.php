<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\category;

class categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        category::create(['name'=>'Man & Woman Fashion']);
        category::create(['name'=>'Electronic']);
        category::create(['name'=>'Jewellery Accessories']);
    }
}
