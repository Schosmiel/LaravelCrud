<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Etudiant;




class DatabaseSeeder extends Seeder
{
    
    public function run()
    {
        Etudiant::factory(30)->create();
       // $this->call(ClassesTableSeeder::class);
    }
}
