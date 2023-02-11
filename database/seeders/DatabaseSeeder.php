<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Autor;
use App\Models\Knjiga;
use App\Models\User;
use App\Models\Zanr;
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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        Zanr::truncate();
        Autor::truncate();
        User::truncate();
        Knjiga::truncate();

        $zanr= new ZanrSeeder;
        $zanr->run();

        $autor= new AutorSeeder;
        $autor->run();

        $knjiga= new KnjigaSeeder;
        $knjiga->run();
    }
}
