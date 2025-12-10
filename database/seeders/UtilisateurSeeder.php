<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\Hash;

class UtilisateurSeeder extends Seeder
{
    public function run()
    {
        // Administrateur
        Utilisateur::create([
            'nom' => 'Comlan',
            'prenom' => 'Maurice',
            'email' => 'maurice.comlan@uac.bj',
            'mot_de_passe' => Hash::make('eneam123'),
            'sexe' => 'M',
            'date_naissance' => '1990-01-01',
            'date_inscription' => now(),
            'statut' => 'Actif',
            'id_role' => 1, // ID du rôle Administrateur
            'id_langue' => 1, // ID de la langue par défaut
        ]);

        // Lecteur
        Utilisateur::create([
            'nom' => 'Capochichi',
            'prenom' => 'Jean',
            'email' => 'jeancapochichi@gmail.com',
            'mot_de_passe' => Hash::make('eneam123'),
            'sexe' => 'M',
            'date_naissance' => '1995-01-01',
            'date_inscription' => now(),
            'statut' => 'Actif',
            'id_role' => 2, // ID du rôle Lecteur
            'id_langue' => 1, // ID de la langue par défaut
        ]);
    }
}
