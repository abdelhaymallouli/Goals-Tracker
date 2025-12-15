<?php

namespace App\Http\Controllers;

use App\Models\Goal;
use Illuminate\Http\Request;

class GoalController extends Controller
{
    // READ
    public function index()
    {
        $goals = Goal::all();
        return view('goals.index', compact('goals'));
    }

    // CREATE
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'deadline' => 'required|date'
        ]);

        Goal::create($request->all());

        return redirect()->back();
    }

    // DELETE
    public function destroy(Goal $goal)
    {
        $goal->delete();
        return redirect()->back();
    }
}
