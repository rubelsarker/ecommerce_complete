<?php

use App\Model\Admin\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Mens',
            'Womens',
            'Kids',
        ];

        foreach ($categories as $cat) {
            Category::create(['name' => $cat, 'slug' => Str::slug($cat), 'status' =>1]);
        }
    }
}
