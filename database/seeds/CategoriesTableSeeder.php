<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Category;
class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $categorie =['game','scientific','nature','sport','motors','technology','adventures','travel','fantasy','funny'];
        for ($i=0; $i < count($categorie) ; $i++) {

            $newCategory = new Category();
            $newCategory->name = $categorie[$i];
            $newCategory->img = "https://picsum.photos/id/$i/350/500";
            $newCategory->save();
        }
    }
}
