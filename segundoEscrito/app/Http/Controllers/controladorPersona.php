<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personas;
use Illuminate\Support\Facades\Redis;

class controladorPersona extends Controller
{
    public function CrearPersona(Request $request){
        $persona = new Personas();
        $persona -> nombre = $request -> post("nombre");
        $persona -> apellido = $request -> post("apellido");
        $persona -> telefono = $request -> post("telefono");

        $persona -> save();

        return $persona;
    }

    public function eliminarPersona(Request $request, $idPersona)
    {
        $persona = Personas::findOrFail($idPersona);
        $persona -> delete();

        return ["mensaje" => "Persona $idPersona eliminada"];
    }

    public function modificarPersona(Request $request, $idPersona)
    {
        $persona = Personas::findOrFail($idPersona);
        $persona -> nombre = $request -> post("nombre");
        $persona -> apellido = $request -> post("apellido");
        $persona -> save();
        return $persona;
    }

}
