<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $newUser = new User();
        $newUser->name = "admin";
        $newUser->email = "admin@admin.com";
        $newUser->password = '$2y$10$yofiePaR01n.92lfESL9MeYgzX5fY3Ahdk8LD3QAS9ZqKMFqiR9Va'; //password
        $newUser->save();
    }
}
