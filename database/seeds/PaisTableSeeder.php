<?php

use App\Models\Pais;
use Illuminate\Database\Seeder;

class PaisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pais::create(['codigo'=>'PE','nombre'=>'PERU','activo'=>true]);
    }
}
