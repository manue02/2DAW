<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contacto;

class ContactoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        // $contacto1 = new Contacto();
        // $contacto1->nombre = 'Juan';
        // $contacto1->apellido = 'Perez';
        // $contacto1->telefono = '123456789';
        // $contacto1->direccion = 'Calle 123';


        // $contacto2 = new Contacto();
        // $contacto2->nombre = 'Maria';
        // $contacto2->apellido = 'Gomez';
        // $contacto2->telefono = '987654321';
        // $contacto2->direccion = 'Calle 456';


        // $contacto3 = new Contacto();
        // $contacto3->nombre = 'Pedro';
        // $contacto3->apellido = 'Gonzalez';
        // $contacto3->telefono = '147258369';
        // $contacto3->direccion = 'Calle 789';

        // $contacto1->save();
        // $contacto2->save();
        // $contacto3->save();

        Contacto::factory()->count(30)->create();
    }
}