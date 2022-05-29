<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Category;
use App\Model\Post;
class CategoryPostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // prendo tutti gli id di categories
        $category_id = Category::pluck('id')->toArray();

        $post_id = Post::all();

        foreach ($post_id as $post) {
            $post->categories()->sync($faker->randomElements($category_id,3));
        }

    }
}
