<?php

namespace App\Http\Controllers;
use App\Models\ContactMessage;
use App\Models\NewsletterSubscriber;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMessageReply;

use Illuminate\Http\Request;

class EmailManagementController extends Controller
{
    public function showEmailManagement()
    {
        $contactSubmissions = ContactMessage::orderBy('created_at', 'desc')->get();
        $newsletterSubscribers = NewsletterSubscriber::orderBy('created_at', 'desc')->get();

        return view('admin.manage-emails', compact('contactSubmissions', 'newsletterSubscribers'));
    }

    public function sendReply(Request $request, $contactMessageId)
    {
        $validated = $request->validate([
            'replyContent' => 'required|string',
        ]);

        $contactMessage = ContactMessage::findOrFail($contactMessageId);

        Mail::to($contactMessage->email)->send(new ContactMessageReply($validated['replyContent']));

        return back()->with('success', 'Reply sent successfully.');
    }

    public function destroy($id)
    {
        $submission = ContactMessage::findOrFail($id);
        $submission->delete();

        return back()->with('success', 'Message deleted successfully.');
    }

}
