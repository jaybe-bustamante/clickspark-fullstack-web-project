<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Project;
use App\Models\Notification;
use App\Models\User;


class MessageController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'project_id' => 'required|exists:projects,id',
            'message' => 'required|string',
            'file' => 'nullable|file|max:10240', // 10MB
        ]);

        $filePath = null;
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('messages', 'public');
        }

        $message = auth()->user()->messages()->create([
            'project_id' => $request->project_id,
            'body' => $request->message,
            'file_path' => $filePath,
        ]);


        return back();
    }
}
