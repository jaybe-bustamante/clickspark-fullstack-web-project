<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'message' => 'required|string',
    ]);

    // Assuming you have a ContactUsSubmission model
    ContactMessage::create($validated);

    return back()->with('success', 'Your message has been sent successfully!');
}
}
