<?php

namespace App\Http\Controllers;
use App\Entidad;

class ProvinciaController extends Controller
{
    public function index()
    {
        $provincias = Entidad::all();
        return $provincias;
    }
}
