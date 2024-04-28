<?php

namespace App\Http\Controllers;

use App\UltramsgAPI;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function send()
    {
        $ultramsg = new UltramsgAPI();

        // Lista de números a los que enviar el mensaje
        $numbers = ['968339642', '950047205', '912135505'];

        // Mensaje a enviar
        $message = "Hola, este es un mensaje de prueba para múltiples contactos!";

        $responses = $ultramsg->sendMessages($numbers, $message);

        return response()->json($responses);
    }

    public function checkMessageStatus($messageId)
    {
        $ultramsg = new UltramsgAPI();
        $status = $ultramsg->getMessageStatus($messageId);

        return response()->json($status);
    }
}
