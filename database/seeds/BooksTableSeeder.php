<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use App\Book;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Fake book data
        for($i = 0; $i < 5; $i++) {
            $new_book = new Book();

            $new_book->title = 'Book title' . ($i + 1);
            $new_book->slug = Str::slug($new_book->title, '-');
            $new_book->author = 'Book author' . ($i + 1);
            $new_book->author = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.';

            $new_book->save();
        }
    }
}
