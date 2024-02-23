<?php

namespace App\Http\Controllers;
use App\Models\Portfolio;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class PortfolioController extends Controller
{
    // Show portfolio
    public function index()
    {
        $portfolios = Portfolio::all();
        return view('admin.manage-portfolios', compact('portfolios'));
    }

    // Show portfolio on public
    public function publicIndex()
    {
        $portfolios = Portfolio::all();
        return view('frontend.portfolio', compact('portfolios'));
    }
    
    // Search method
    public function search(Request $request)
    {
        $search = $request->input('search');
    
        $portfolio = Portfolio::query()
        ->when($search, function ($query) use ($search) {
            
            $query->where('category', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%");         
        })

        
        ->paginate(10);
    
        return view('admin.manage-portfolios', compact('portfolio'));
    }

    // Save new portfolio item
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image',
            'category' => 'required|string',
            'description' => 'required|string',
        ]);

        $imagePath = $request->file('image')->store('portfolio_images', 'public');

        Portfolio::create([
            'image' => $imagePath,
            'category' => $request->category,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.portfolio.index')->with('success', 'New item added successfully.');
    }

    // Delete portfolio
    public function destroy(Portfolio $portfolio)
    {
        // Delete image
        Storage::delete('public/'.$portfolio->image);
        $portfolio->delete();

        return back()->with('success', 'Portfolio item deleted.');
    }

}
