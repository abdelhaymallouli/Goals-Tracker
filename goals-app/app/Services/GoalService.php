<?php
namespace App\Services;

use App\Models\Goal;
use Illuminate\Support\Facades\Storage;

class GoalService
{
    /**
     * Logique de filtrage combinée (Recherche + Catégorie).
     */
    public function getFilteredGoals(?string $search, ?int $categoryId)
    {
        return Goal::query()
            ->with('categories') // Optimisation (Eager Loading)
            
            // Filtre 1 : Recherche par titre
            ->when($search, function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%');
            })
            
            // Filtre 2 : Filtrage par catégorie via la table pivot
            ->when($categoryId, function ($query) use ($categoryId) {
                $query->whereHas('categories', function ($q) use ($categoryId) {
                    $q->where('categories.id', $categoryId);
                });
            })
            
            ->latest()
            ->get();
    }

    /**
     * Logique de création (utilisée lors du Live Coding).
     */
    public function storeGoal(array $data)
    {
        // Traitement de l'image si présente
        if (isset($data['image']) && $data['image'] instanceof \Illuminate\Http\UploadedFile) {
            $data['image'] = $data['image']->store('goals', 'public');
        }

        $data['user_id'] = 1; // ID par défaut car pas d'Auth
        $goal = Goal::create($data);

        // Synchronisation des multi-catégories
        if (isset($data['category_ids'])) {
            $goal->categories()->sync($data['category_ids']);
        }

        return $goal;
    }
}