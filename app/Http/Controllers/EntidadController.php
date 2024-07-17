<?php

namespace App\Http\Controllers;
use App\Entidad;

class ProvinciaController extends Controller
{
    public function index()
    {
        $entidades = Entidad::all();
        return $entidades;
    }
}
