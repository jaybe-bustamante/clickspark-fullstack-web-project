<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsletterSubscriber;

class NewsletterController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|unique:newsletter_subscribers,email',
        ], [
            'email.unique' => 'You are already subscribed to our newsletter!',
        ]);

        NewsletterSubscriber::create($validated);

        return back()->with('newsletter_success', 'Thank you for subscribing to our newsletter!');
        
    }
}
