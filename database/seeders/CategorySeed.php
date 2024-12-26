<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories=['Food','Technology','Software','Lifestyle','Shopping'];

        foreach ($categories as $category) {
            Category::create([
                'name'=>$category
            ]);
        }
 
        
    }
}
