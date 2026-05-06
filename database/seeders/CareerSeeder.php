<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Career;

class CareerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Inserción de datos en la tabla careers
        Career::create(['name' => 'Desarrollo de Software']);
        Career::create(['name' => 'Informatica y Desarrollo de Aplicaciones Web']);
        Career::create(['name' => 'Administracion Industrial']);
    }
}
