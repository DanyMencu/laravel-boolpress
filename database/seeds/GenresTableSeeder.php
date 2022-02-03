<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use App\Genre;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Genres collection
        $genres = ['Horror', 'Comic Book', 'Drama', 'Romance', 'Adventure', 'Thriller', 'Shi-fi', 'Action', 'Classic', 'Mystery', 'Fantasy'];

        foreach ($genres as $genre) {
            $new_genre = new Genre();

            $new_genre->name = $genre;
            $new_genre->slug = Str::slug($new_genre->name);

            $new_genre->save();
        }
    }
}
