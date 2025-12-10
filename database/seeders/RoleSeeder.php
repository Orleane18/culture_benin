<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['nom' => 'Administrateur']);
        Role::create(['nom' => 'Editeur']);
        Role::create(['nom' => 'Modérateur']);
        Role::create(['nom' => 'Lecteur']);
        Role::create(['nom' => 'Traducteur']);
    }
}
