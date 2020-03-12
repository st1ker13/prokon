<?php

use Illuminate\Database\Seeder;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Author::class, 50)->create()->each(function ($author) {
            $author->books()->save(factory(\App\Models\Book::class)->make());
        });
    }
}
