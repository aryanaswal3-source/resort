<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactInfo;
use App\Services\EmailService;
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

        $emailService = new EmailService();

        // Email to Admin
        $adminHtml = $emailService->buildEmailHtml([
            'headerLabel' => 'NEW CONTACT FORM SUBMISSION',
            'paragraphs' => ['You have received a new message from your website contact form.'],
            'rows' => [
                'Name' => e($data['name']),
                'Email' => e($data['email']),
                'Phone' => e($data['phone'] ?? 'N/A'),
                'Subject' => e($data['subject'] ?? 'N/A'),
                'Message' => nl2br(e($data['message'])),
            ],
        ]);

        Mail::html($adminHtml, function ($message) {
            $message->to(env('ADMIN_EMAIL'))->subject('New Contact Form Submission');
        });

        // Email to User
        $userHtml = $emailService->buildEmailHtml([
            'greeting' => 'Hi ' . $data['name'] . ',',
            'paragraphs' => [
                "Thank you for reaching out to us. We've received your message and our team will get back to you within 24 hours.",
            ],
            'quoteLabel' => 'Your message:',
            'quoteText' => $data['message'],
            'closingNote' => 'If your query is urgent, feel free to call us directly.',
        ]);

        Mail::html($userHtml, function ($message) use ($data) {
            $message->to($data['email'])->subject('We Received Your Message - Sunset Vista Resort');
        });

        return back()->with('success', 'Message Sent Successfully!');
    }
}