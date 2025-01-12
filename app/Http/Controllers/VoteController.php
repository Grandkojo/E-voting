<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use App\Models\Category;
use App\Models\Candidate;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('vote.index', compact('categories'));
        // return view('vote.index');
    }


    public function getCandidates($categoryId)
    {
        $candidates = Candidate::where('category_id', $categoryId)->get();
        return response()->json($candidates);
    }

    public function vote(Request $request)
    {
        $candidate = Candidate::findOrFail($request->candidate_id);
        $candidate->increment('votes');
        return response()->json(['success' => true, 'votes' => $candidate->votes]);
    }

    public function results()
    {
        $categories = Category::with('candidates')->get();
        
        $categoryData = $categories->map(function ($category) {
            $totalVotes = $category->candidates->sum('votes');
            $candidateData = $category->candidates->map(function ($candidate) use ($totalVotes) {
                return [
                    'name' => $candidate->name,
                    'votes' => $candidate->votes,
                    'percentage' => $totalVotes > 0 ? round(($candidate->votes / $totalVotes) * 100, 2) : 0,
                ];
            });

            return [
                'name' => $category->name,
                'candidates' => $candidateData,
                'totalVotes' => $totalVotes,
            ];
        });

        return view('vote.results', compact('categoryData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Vote $vote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vote $vote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vote $vote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vote $vote)
    {
        //
    }
}
