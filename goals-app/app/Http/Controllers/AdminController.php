<?php

namespace App\Http\Controllers;

use App\Services\GoalService;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class AdminController extends Controller
{
    protected $goalService;
    protected $categoryService;

    public function __construct(GoalService $goalService, CategoryService $categoryService)
    {
        $this->goalService = $goalService;
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        return view('admin.index', [
            'goals' => $this->goalService->getAllGoals(),
            'categories' => $this->categoryService->getAllCategories() // Utilisation du service dédié
        ]);
    }

    public function save(Request $request): JsonResponse
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'status' => 'required|in:todo,in_progress,completed',
            'image' => 'nullable|image|max:2048',
        ]);

        $this->goalService->persistGoal($request->all(), $request->id);

        return response()->json(['success' => true]);
    }

    public function edit(int $id): JsonResponse
    {
        return response()->json($this->goalService->getGoalById($id));
    }

    public function destroy(int $id): JsonResponse
    {
        $this->goalService->removeGoal($id);
        return response()->json(['success' => true]);
    }
}