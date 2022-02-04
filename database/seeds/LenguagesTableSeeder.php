<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use App\Language;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Languages availables
        $languages = ['Italian', 'English', 'Spanish', 'French', 'German', 'Chinese'];

        foreach ($languages as $language) {
            $new_language = new Language();

            $new_language->name = $language;
            $new_language->slug = Str::slug($language);

            $new_language->save();
        }
    }
}
