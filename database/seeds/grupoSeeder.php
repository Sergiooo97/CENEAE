<?php

use Illuminate\Database\Seeder;
use App\grupo;
class grupoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $grupo = new grupo();
        $grupo->id='1';
        $grupo->nombre = '1A';
        $grupo->grado  = '1';
        $grupo->grupo  = 'A';
        $grupo->save();

        $grupo = new grupo();
        $grupo->id='2';
        $grupo->nombre = '2A';
        $grupo->grado  = '2';
        $grupo->grupo  = 'A';
        $grupo->save();

        
    }
}
