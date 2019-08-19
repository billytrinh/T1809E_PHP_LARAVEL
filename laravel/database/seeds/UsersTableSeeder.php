<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class,100)->create();
        factory(App\Author::class,100)->create();
        factory(App\Nxb::class,100)->create();
        factory(App\Book::class,200)->create();
    }
}
