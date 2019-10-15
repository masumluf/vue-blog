<?php

use Illuminate\Database\Seeder;
use SebastianBergmann\FileIterator\Factory;
use App\User;
use App\Catagory;
use App\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(Post::class, 10)->create();
        factory(User::class, 10)->create();
        factory(Catagory::class, 10)->create();
    }
}
