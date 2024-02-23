<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;


class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with(['user', 'project'])->get();
        $totalEarnings = Payment::sum('amount');

        return view('admin.manage-payments', compact('payments', 'totalEarnings'));
    }


    public function paypalTransactionComplete(Request $request)
    {
        $data = $request->validate([
            'orderID' => 'required',
            'project_id' => 'required|exists:projects,id'
        ]);

        $project = Project::findOrFail($data['project_id']);
        $project->update([
            'is_paid' => true,
        ]);

        
        $payment = Payment::create([
            'user_id' => $project->user_id,
            'project_id' => $project->id,
            'amount' => $project->amount, 
            'transaction_id' => $data['orderID'], 
            'payment_date' => now(), 
        ]);

        return response()->json(['success' => true]);
    }

    
    // Payment success method
    public function paymentSuccess(Request $request)
    {
        $projectId = $request->query('project_id');
        $project = Project::findOrFail($projectId);

        
        if ($project->user_id != auth()->id()) {
            abort(403, 'Are you lost again? Oh come on!');
        }

        return view('payments.success', compact('project'));
    }

    public function userEarnings()
    {
        $payments = Payment::where('user_id', Auth::id())
                            ->with('project') 
                            ->get();

        return view('payments.index', compact('payments'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $totalEarnings = Payment::sum('amount');

        $payments = Payment::query()
            ->when($search, function ($query) use ($search) {
                $query->where('amount', 'like', "%{$search}%")
                    ->orWhere('transaction_id', 'like', "%{$search}%")
                    ->orWhere('payment_date', 'like', "%{$search}%")
                    ->orWhereHas('project', function ($query) use ($search) {
                        $query->where('title', 'like', "%{$search}%");
                    })
                    ->orWhereHas('user', function ($query) use ($search) {
                        $query->where('name', 'like', "%{$search}%");
                    });
            })
            ->with(['user', 'project']) 
            ->paginate(10);
        


        return view('admin.manage-payments', compact('payments', 'totalEarnings'));
    }

}
