<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personas;


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
}
