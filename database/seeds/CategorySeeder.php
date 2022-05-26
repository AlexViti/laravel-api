<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Sport',
            ],
            [
                'name' => 'News',
            ],
            [
                'name' => 'Entertainment',
            ],
            [
                'name' => 'Technology',
            ],
            [
                'name' => 'Health',
            ],
            [
                'name' => 'Business',
            ],
            [
                'name' => 'Science',
            ],
            [
                'name' => 'Lifestyle',
            ]
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
