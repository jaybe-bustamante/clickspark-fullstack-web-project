<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Attachment;
use Illuminate\Support\Facades\Storage;
use App\Models\Message;



class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::where('user_id', auth()->id())->get();
        return view('projects.index', compact('projects'));
    }


    /**
     * Store a newly created resource in storage.
     */
    
    // -------------Create Project---------------- //
    public function store(Request $request)
    {
        $validated = $request->validate([
            
            'service_type' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'industry' => 'required|string|max:255',
            'description' => 'required|string',
            'target_audience' => 'nullable|string',
            'design_preference' => 'nullable|string',
            'color_preference' => 'nullable|array',
            'color_preference.*' => 'string', 
            'notes' => 'nullable|string',
            'attachments.*' => 'file|mimes:jpg,jpeg,png,bmp,gif,svg,pdf,doc,docx|max:10240',
            'amount' => 'required|numeric',
        ]);

        $validated['user_id'] = auth()->id();

        // Create the project
        $project = Project::create($validated);

        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $file) {
                
                $filePath = $file->store('public/attachments');
        
                $project->attachments()->create([
                    'file_path' => $filePath,
                ]);
            }
        }

        return redirect()->route('projects.show', $project);

    }

    /**
     * Display the specified resource.
     */
    // -------------Show Project---------------- //
    public function show(Project $project)
    {
        if (auth()->id() != $project->user_id) {
            abort(403, 'I think you are lost.');
        }

        return view('projects.show', compact('project'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    // -------------Edit Project---------------- //
    public function edit(Project $project)
    {
         
        if ($project->user_id != auth()->id()) {
            abort(403, 'It seems you are lost again.');
        }

        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    // -------------Payment for Project---------------- //
    public function payment(Request $request, $projectId)
    {
        $project = Project::findOrFail($projectId);

        if ($project->user_id != auth()->id()) {
            abort(403, 'Hmm.. Where do you think you\'re going?');
        }

        return view('projects.payment', compact('project'));
    }


    // -------------Edit Project---------------- //
    public function update(Request $request, Project $project)
    {
        if ($project->user_id != auth()->id() && !auth()->user()->isAdmin()) {
            abort(403, 'Geez! You are lost again.');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'industry' => 'required|string|max:255',
            'description' => 'required|string',
            'target_audience' => 'nullable|string',
            'design_preference' => 'nullable|string',
            'color_preference' => 'nullable|array',
            'color_preference.*' => 'string',
            'notes' => 'nullable|string',
            'attachments.*' => 'file|mimes:jpg,jpeg,png,bmp,gif,svg,pdf,doc,docx|max:10240',
        ]);

        // Update the project
        $project->update($validated);

        // Color preference
        $project->color_preference = $request->color_preference ?? [];
        $project->save();

        // Attachments
        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $file) {
                $filePath = $file->store('public/attachments');
                Attachment::create([
                    'project_id' => $project->id,
                    'file_path' => $filePath,
                ]);
            }
        }

        if ($request->filled('attachments_to_delete')) {
            foreach ($request->input('attachments_to_delete') as $attachmentId) {
                $attachment = Attachment::find($attachmentId);
                if ($attachment && $attachment->project_id === $project->id) {
                    Storage::delete($attachment->file_path);
                    $attachment->delete();
                }
            }
        }

        return redirect()->route('projects.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     */

     // -------------Delete Project Admin only ---------------- //
    public function destroy(Project $project)
    {
        // Delete the attachments
        if ($project->file_path) {
            Storage::delete($project->file_path);
        }

        // Delete the project
        $project->delete();

        
        return redirect()->route('admin.projects.all')->with('success', 'Project deleted successfully.');
    }

    // -------------View and Message in Project Admin and Project Owner ------------- //
    public function details(Project $project)
    {
        
        // Load messages
        $messages = $project->messages()->latest()->get(); 

        $messages = Message::where('project_id', $project->id)
                    ->orderBy('created_at', 'asc') //ascending order
                    ->get();

        return view('projects.details', compact('project', 'messages'));
    }


    // -------------Complete Project ------------- //
    public function complete(Request $request, Project $project)
    {
        $project->update(['status' => 'completed']);

        return back();
    }

    // ------------- View All Projects for Admin Only ------------- //
    public function allProjects()
    {
        $projects = Project::with('user')->latest()->get();

        return view('admin.manage-projects', compact('projects'));
    }

    // ------------- Dashboard Details for Admin Only ------------- //
    public function adminDetails(Project $project)
    {
        if (!auth()->user()->isAdmin()) {
            abort(403, 'Are you an admin? I don\'t think so.');
        } 

        // Load messages
        $messages = $project->messages()->latest()->get(); 

        $messages = Message::where('project_id', $project->id)
                    ->orderBy('created_at', 'asc')
                    ->get();

        return view('admin.details-admin', compact('project', 'messages'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
    
        $projects = Project::query()
        ->when($search, function ($query) use ($search) {
            
            $query->where('title', 'like', "%{$search}%")
                ->orWhere('industry', 'like', "%{$search}%")
                ->orWhere('service_type', 'like', "%{$search}%")
                ->orWhere('status', 'like', "%{$search}%")
                ->orWhere('created_at', 'like', "%{$search}%")
                ->orWhereHas('user', function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%");
                });
        })
        ->with('user') 
        ->paginate(10);
    
        return view('admin.manage-projects', compact('projects'));
    }


}
