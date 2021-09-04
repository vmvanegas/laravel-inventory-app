<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonaController extends Controller
{
    function mostrar($username=null){
        if($username==null) {
            return "Debe ingresar un nombre de usuario";
        } 
        return "Hola ".$username;
    }
}
