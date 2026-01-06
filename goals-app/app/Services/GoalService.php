<?php
namespace App\Services;

use App\Models\Goal;

class GoalService
{
    //recherche and filter les objetics
    public function getFilteredGoals(?string $searchTerm)
    {
        return Goal::query()
            ->when($searchTerm, function ($query) use ($searchTerm) {
                $query->where('title', 'like', '%' . $searchTerm . '%');
            })
            ->with('categories')
            ->latest()           
            ->get();
    }

    public function storeGoal(array $data)
    {
        // Gestion de l'image locale via UploadedFile
        if (isset($data['image']) && $data['image'] instanceof \Illuminate\Http\UploadedFile) {
            $data['image'] = $data['image']->store('goals', 'public');
        }

        // Création sans contrainte d'user_id
        $goal = Goal::create($data);

        // Association des catégories
        if (isset($data['category_ids'])) {
            $goal->categories()->sync($data['category_ids']);
        }

        return $goal;
    }
}