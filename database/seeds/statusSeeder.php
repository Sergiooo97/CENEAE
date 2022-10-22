<?php

use App\status;
use Illuminate\Database\Seeder;

class statusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = new status();
        $status->nombre = 'ACTIVO'; 
        $status->save();
        $status = new status();
        $status->nombre = 'INACTIVO'; 
        $status->save();
    }
}