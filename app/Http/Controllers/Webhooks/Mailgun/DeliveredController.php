<?php

namespace App\Http\Controllers\Webhooks\Mailgun;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Testing\TestingMailgunMails;

class DeliveredController extends Controller
{
    public function index(Request $request)
    {

        TestingMailgunMails::create(['data'=> json_encode($request->all()) ]);

        return response()->json($request->all());
    }

}
