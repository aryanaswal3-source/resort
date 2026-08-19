<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use App\Models\ContactInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:20',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        ContactInfo::create($data);

        Mail::to('sunsetvistaresort@gmail.com')->send(new ContactFormMail($data));

        Mail::send('emails.contact-user-confirmation', ['formData' => $data], function ($message) use ($data) {
            $message->to($data['email'])->subject('We Received Your Message - Sunset Vista Resort');
        });

        return back()->with('success', 'Message Sent Successfully!');
    }
}
