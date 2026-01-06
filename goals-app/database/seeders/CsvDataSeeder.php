<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Goal;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CsvDataSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Créer l'utilisateur par défaut s'il n'existe pas
        $user = User::firstOrCreate(
            ['email' => 'admin@test.com'],
            [
                'name' => 'Abdelhay Mallouli',
                'password' => Hash::make('password')
            ]
        );

        // 2. Importer les Catégories
        $this->importCategories();

        // 3. Importer les Goals
        $this->importGoals();
    }

    private function importCategories() {
        $file = fopen(database_path('seeders/csv/categories.csv'), 'r');
        fgetcsv($file); // Sauter la ligne d'en-tête
        while (($data = fgetcsv($file)) !== FALSE) {
            Category::firstOrCreate(['name' => $data[0]]);
        }
        fclose($file);
    }

    private function importGoals() {
        $file = fopen(database_path('seeders/csv/goals.csv'), 'r');
        fgetcsv($file); // Sauter la ligne d'en-tête
        while (($data = fgetcsv($file)) !== FALSE) {
            Goal::create([
                'user_id'     => $data[0],
                'title'       => $data[1],
                'description' => $data[2],
                'status'      => $data[3],
                'progress'    => $data[4],
            ]);
        }
        fclose($file);
    }
}