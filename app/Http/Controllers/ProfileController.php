<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Project;
use App\Models\Payment;
use App\Models\User;

class ProfileController extends Controller
{
    public function dashboard()
    {
        $totalEarnings = Payment::sum('amount');
        $projects = Project::where('user_id', auth()->id())->get();
        return view('dashboard', compact('projects'), compact('totalEarnings'));
    }

    public function adminDashboard()
    {
        $totalEarnings = Payment::sum('amount');
        $projects = Project::with('user')->latest()->take(5)->get();
        $totalProjects = Project::all()->count();
        $totalUsers = User::where('role', 'user')->count();

        return view('admin.admin-dash', compact('projects', 'totalEarnings', 'totalUsers', 'totalProjects'));
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->validate([
            'avatar' => ['nullable', 'image', 'mimes:jpg,png', 'max:2048'], // 2MB Max
            //
        ]);
    
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar')->store('avatars', 'public');
            $request->user()->forceFill([
                'avatar' => $avatar,
            ])->save();
        }

        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
