<?php

use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->delete();

        for ($i=0; $i < 10; $i++) {
        \App\Article::create([
            'firstname'   => 'firstname '.$i,
            'email'    => 'email '.$i,
            'check_box' => 1,
        ]);
    }
    }
}
