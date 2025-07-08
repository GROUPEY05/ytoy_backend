<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Utilisateur;
use Illuminate\Database\Seeder;
use App\Models\Administrateur;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call([
            UtilisateurSeeder::class,
        ]);
    }
}

class UtilisateurSeeder extends Seeder
{
    public function run()
    {
        // Créer un utilisateur administrateur
        $admin = Utilisateur::create([
            'nom' => 'Admin',
            'prenom' => 'Systeme',
            'email' => 'admin@ytoy.com',
            'mot_de_passe' => bcrypt('admin123'),
            'role' => 'administrateur',
            'actif' => true
        ]);

        // Insérer également dans la table administrateurs
        Administrateur::create([
            'utilisateur_id' => $admin->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}

