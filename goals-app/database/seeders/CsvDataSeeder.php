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

private function importGoals()
    {
        $filePath = database_path('seeders/csv/goals.csv');
        
        if (!file_exists($filePath)) {
            $this->command->error("Fichier CSV introuvable à l'adresse : $filePath");
            return;
        }

        $file = fopen($filePath, 'r');
        fgetcsv($file); // Sauter l'entête

        while (($data = fgetcsv($file)) !== FALSE) {
            Goal::create([
                'user_id'     => trim($data[0]),
                'title'       => trim($data[1]),
                'description' => trim($data[2]),
                'status'      => trim($data[3]),
                'progress'    => trim($data[4]),
                'image'       => trim($data[5]),
            ]);
        }
        fclose($file);
    }
}