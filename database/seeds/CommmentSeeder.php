<?php

use Illuminate\Database\Seeder;

class CommmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Comment::class, 100)->create();
    }
}
