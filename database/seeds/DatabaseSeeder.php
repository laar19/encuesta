<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();
        $this->call(preguntas_seeder::class);
        $this->call(opciones_preguntas_seeder::class);
        $this->call(otras_opciones_preguntas_seeder::class);
        $this->call(users_seeder::class);
    }
}
