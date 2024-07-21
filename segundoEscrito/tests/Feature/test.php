<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Controllers\controladorPersona;

class test extends TestCase
{
    public function pruebaCrearUsuario()
    {
        $estructuraEsperable = [
            'id',
            'nombre',
            'apellido',
            'telefono',
            'created_at',
            'updated_at',
        ];

        $datosPersona = [
            "nombre" => "Lucas",
            "apelllido" => "Martinez",
            "telefono" => 1234
        ];

        $response = $this -> post('/api/personas',$datosPersona);
        $response -> assertStatus(201);
        $response -> assertJsonStructure($estructuraEsperable);
        $response -> assertJsonFragment($datosPersona);

        $this->assertDatabaseHas('persona', [
            "nombre" => "Lucas",
            "apelllido" => "Martinez",
            "telefono" => 1234
        ]);
    }
}
