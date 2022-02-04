<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use App\Lenguage;

class LenguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Lenguages availables
        $lenguages = ['Italian', 'English', 'Spanish', 'French', 'German', 'Chinese'];

        foreach ($lenguages as $lenguage) {
            $new_lenguage = new Lenguage();

            $new_lenguage->name = $lenguage;
            $new_lenguage->slug = Str::slug($lenguage);

            $new_lenguage->save();
        }
    }
}
