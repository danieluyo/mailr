<?php

namespace App\Http\Controllers\Testing;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mailgun;

class MailgunController extends Controller
{
    public function createList($nombreLista)
    {
        $res = Mailgun::api()->post("lists", [
            'address'      => 'ejemplo@de.emprendimiento404.com',
            'name'         => 'Developers',
            'description'  => 'Developers Mailing List',
            'access_level' => 'readonly'
        ]);

        return response()->json(['response'=>$res]);
    }

    public function putMemberInList($lista, $correo)
    {
        $res = Mailgun::api()->post("lists/{$lista}/members", [
            'address'      => $correo,
            'name'         => 'John Doe',
            'vars'         => json_encode(['age' => 27, 'country' => 'MX']),
            'subscribed'   => 'no'
        ]);

        return response()->json(['response'=>$res]);
    }

    public function envia()
    {
        $data = [
            'customer' => 'Hola, este es un mensaje de prueba.',
            'url' => 'http://emprendimiento404.com'
        ];

        Mailgun::send('emails.test.welcome', $data, function ($message) {
            $message->dkim(true);
            $message->from('mail@chobok.com', 'Daniel de emprende');
            $message->to('ejemplo@de.emprendimiento404.com', 'Daniel')->subject('Bienvendo a MailrApp!');
        });

        return response()->json(['sucess'=>true]);
    }
}
