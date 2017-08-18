<?php

use App\Models\Secuencia;
use Illuminate\Database\Seeder;

class SecuenciaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Secuencia::create(['nombre' => 'numero_inscripcion']);

    }
}
