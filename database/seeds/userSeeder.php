<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->id ='1';
        $user->matricula = 'EXGS971124H1A';
        $user->name = 'Rafael Eb Gallegos';
        $user->email = 'sergio@admin.com';
        $user->password = Hash::make('12345678');;
        $user->rol_id = '1';
        $user->save();
        $user = new User();
        $user->id ='2';
        $user->docente_id ='1';
        $user->matricula = 'GSGS971124H1A';
        $user->name = 'Rafael Eb Gallegos';
        $user->email = 'sergio@maestro.com';
        $user->password = Hash::make('12345678');;
        $user->rol_id = '3';
        $user->save();
        $user = new User();
        $user->id ='3';
        $user->docente_id ='2';
        $user->matricula = 'JSGS971124H1A';
        $user->name = 'Ana Eb Gallegos';
        $user->email = 'ana@maestro.com';
        $user->password = Hash::make('12345678');;
        $user->rol_id = '3';
        $user->save();
    }
}
