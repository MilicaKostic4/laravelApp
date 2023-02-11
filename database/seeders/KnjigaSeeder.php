<?php

namespace Database\Seeders;

use App\Models\Knjiga;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KnjigaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Knjiga::factory(10)->create();
    }
}
