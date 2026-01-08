<?php
namespace App\Http\Controllers;

use App\Services\GoalService;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class GoalController extends Controller
{
    protected $goalService;
    protected $categoryService;

    // Injection des deux services dans le constructeur
    public function __construct(GoalService $goalService, CategoryService $categoryService)
    {
        $this->goalService = $goalService;
        $this->categoryService = $categoryService;
    }

    /**
     * Affiche la liste des objectifs et gère les filtres AJAX.
     */
    public function index(Request $request)
    {
        // 1. On récupère toutes les catégories pour remplir le menu de filtrage (via CategoryService)
        $categories = $this->categoryService->getAllCategories();

        // 2. On récupère les objectifs filtrés (via GoalService)
        // On récupère 'search' et 'category_id' depuis l'URL (ex: ?search=laravel&category_id=1)
        $goals = $this->goalService->getFilteredGoals(
            $request->query('search'),
            $request->query('category_id')
        );

        // 3. Si c'est une requête AJAX (Live Coding Search/Filter)
        // On retourne uniquement le morceau de code HTML de la liste
        if ($request->ajax()) {
            return view('public.goals.partials._list', compact('goals'))->render();
        }

        // 4. Chargement initial de la page complète
        return view('public.index', compact('goals', 'categories'));
    }

    public function show($id)
{
    // On récupère l'objectif avec ses catégories
    // Note: Assurez-vous que votre GoalService possède bien une méthode pour trouver par ID
    $goal = \App\Models\Goal::with('categories')->findOrFail($id);

    // On retourne la vue située dans le dossier public
    return view('public.show', compact('goal'));
}
}
