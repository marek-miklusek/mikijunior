<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'max:200'],
            'email' => ['required', 'email'],
            'message' => 'required'
        ]);

        Mail::to('marek.miklusek@gmail.com')
            ->send(new ContactMail($validated['name'], $validated['email'], $validated['message']));

        return $request->all();
    }
}
