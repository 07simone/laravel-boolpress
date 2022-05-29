<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Model\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 100; $i++) {
            $newPost = new Post();
            $newPost->img = "https://picsum.photos/id/$i/350/500";
            $newPost->Titolo =ucfirst($faker->word());
            $newPost->Autore =$faker->name();
            $newPost->Descrizione =$faker->paragraph();
            $newPost->Data =$faker->date('Y-m-d');
            $newPost->save();
        }
    }
}
