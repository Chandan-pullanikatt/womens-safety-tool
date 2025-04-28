<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function create()
    {
        return view('report.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'location' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Report::create([
            'user_id' => $request->has('is_anonymous') ? null : Auth::id(),
            'location' => $request->location,
            'description' => $request->description,
            'is_anonymous' => $request->has('is_anonymous'),
        ]);

        return redirect()->route('report.create')->with('success', 'Report submitted successfully.');
    }

    
    public function index()
    {
        $reports = Report::latest()->get(); // or paginate
        return view('report.index', compact('reports'));
    }
    
}
