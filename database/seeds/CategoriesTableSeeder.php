<?php

use App\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();
        $categories = file_get_contents(base_path('database/repositories/categories.json'));
        $categories = json_decode($categories);
        foreach ($categories as $category) {
            Category::create(array(
                "category_title" => $category));
        }
    }
}
