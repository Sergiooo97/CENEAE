<?php

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
        $this->call(grupoSeeder::class);
        $this->call(docenteSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(peridodoSeeder::class);
        $this->call(peridoRangoSeeder::class);
        $this->call(cursoSeeder::class);
        $this->call(statusSeeder::class);
        
        //$this->call(alumnosSeeder::class);
        //$this->call(curso_alumnosSeeder::class);
        //$this->call(notasSeeder::class);
        //$this->call(notas_structuresSeeder::class);
       // $this->call(notas_valuesSeeder::class);
        $this->call(userSeeder::class);
        $this->call(user_rolSeeder::class);
        //$this->call(tutorSeeder::class);
        $this->call(ingresosSeeder::class);
        $this->call(salidasSeeder::class);
        $this->call(transaccionSeeder::class);
        $this->call(finanzasSeeder::class);



    }
}
