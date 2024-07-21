<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Controllers\controladorPersona;

class test extends TestCase
{
    public function test_CrearUsuario()
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

    public function test_eliminarPersona()
    {
        $response = $this->delete('/api/personas/1');
        $response -> assertStatus(200);    
        $response -> assertJsonStructure(['mensaje']);
        $response -> assertJsonFragment([ 'mensaje' => 'Persona eliminada']);

        $this->assertDatabaseMissing('persona', [
            'id' => '1',
            'deleted_at' => null
        ]);
    }

    public function test_ModificarPersona(){
        $estructuraEsperable = [
            'id',
            'nombre',
            'apellido',
            'telefono',
            'created_at',
            'updated_at',
            'deleted_at'
        ];

        $datosDePersona = [
            "nombre" => "Juancito",
            "Apellido" => "Alberto"
        ];

        $response = $this->put('/api/personas/5',$datosDePersona);
        $response -> assertStatus(200);
        $response -> assertJsonStructure($estructuraEsperable);
        $response -> assertJsonFragment($datosDePersona);
        $this->assertDatabaseHas('personas', [
            "id" => 2,
            "nombre" => "Juancito",
            "Apellido" => "Alberto"
        ]);
    }

    public function test_listarPersonas()
    {
        $estructuraEsperable = [
            '*' => [
                'id',
                'nombre',
                'apellido',
                'telefono',
                'created_at',
                'updated_at',
                'deleted_at'
            ]
        ];

        $response = $this->get('/api/personas');
        $response->assertStatus(200);
        $response->assertJsonStructure($estructuraEsperable);
    }
}
