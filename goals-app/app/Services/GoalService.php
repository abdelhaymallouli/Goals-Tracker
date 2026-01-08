<?php

namespace App\Services;

use App\Models\Goal;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Illuminate\Database\Eloquent\Collection;

class GoalService
{
    public function getAllGoals(): Collection
    {
        return Goal::with('categories')->latest()->get();
    }

    public function getGoalById(int $id): Goal
    {
        return Goal::with('categories')->findOrFail($id);
    }

    /**
     * Crée ou met à jour un objectif avec gestion d'image et catégories.
     */
    public function persistGoal(array $data, ?int $id = null): Goal
    {
        $goal = $id ? Goal::findOrFail($id) : new Goal();

        if (isset($data['image']) && $data['image'] instanceof UploadedFile) {
            $data['image'] = $this->handleImageStorage($data['image'], $goal->image);
        }

        $goal->fill($data);
        
        if (!$id) {
            $goal->user_id = auth()->id() ?? 1; // Défaut pour le développement
        }

        $goal->save();

        if (isset($data['category_ids'])) {
            $goal->categories()->sync($data['category_ids']);
        }

        return $goal->load('categories');
    }

    public function removeGoal(int $id): bool
    {
        $goal = Goal::findOrFail($id);
        if ($goal->image) {
            Storage::disk('public')->delete($goal->image);
        }
        return $goal->delete();
    }

    private function handleImageStorage(UploadedFile $file, ?string $oldPath): string
    {
        if ($oldPath) {
            Storage::disk('public')->delete($oldPath);
        }
        return $file->store('goals', 'public');
    }
}