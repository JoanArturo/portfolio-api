<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendEmailRequest;
use App\Mail\EmailSent;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response;

class ContactController extends Controller
{
    public function sendEmail(SendEmailRequest $request)
    {
        Mail::to(config('mail.from.address'))
            ->send(new EmailSent($request->email, $request->message));

        return response()->json(['data' => 'Correo enviado.'], Response::HTTP_OK);
    }
}
