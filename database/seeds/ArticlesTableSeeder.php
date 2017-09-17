<?php

use Illuminate\Database\Seeder;
use App\Models\Article;
class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$article = factory(Article::class)->times(100)->make();
    	Article::insert($article->toArray());

    }
}
