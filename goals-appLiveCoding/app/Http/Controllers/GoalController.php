<?php

namespace App\Http\Controllers;
use App\Models\Goal;
use Illuminate\Http\Request;

class GoalController extends Controller
{
    // read
    public function index()
    {
        $goals = Goal::all();
        return view('goals.index', compact('goals'));
    }

    //create 
    public function store(Request $request) 
    {
        $request->validate([
            'description' => 'required',
            'deadline' => 'required|date'
        ]);

         Goal::create($request->all());

         return redirect()->back();
    }

    //delete 
    public function destroy(Goal $goal)
    {
        $goal->delete();
        return redirect()->back();
    }
}


