<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BonusController extends Controller
{
    /**
     * Consume la API externa de usuarios para el Bono de la prueba.
     */
    public function index()
    {
        // Consumir la API pública desactivando verificación SSL (Problema común en local Windows)
        $response = Http::withoutVerifying()->get('https://jsonplaceholder.typicode.com/users');
        $users = $response->json();

        return view('payments.bonus', compact('users'));
    }
}
