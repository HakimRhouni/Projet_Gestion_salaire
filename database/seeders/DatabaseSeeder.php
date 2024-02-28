<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
{
    // Créer les rôles s'ils n'existent pas déjà
    if (Role::where('name', 'superadmin')->doesntExist()) {
        Role::create(['name' => 'superadmin']);
    }

    if (Role::where('name', 'admin')->doesntExist()) {
        Role::create(['name' => 'admin']);
    }

    if (Role::where('name', 'user')->doesntExist()) {
        Role::create(['name' => 'user']);
    }

    // Vérifier si l'utilisateur "admin" existe déjà
    $existingAdmin = User::where('email', 'admin@argon.com')->first();

    // Si l'utilisateur "admin" n'existe pas, créer un nouvel utilisateur
    if (!$existingAdmin) {
        User::create([
            'username' => 'admin',
            'firstname' => 'Admin',
            'lastname' => 'Admin',
            'email' => 'admin@argon.com', // Changer l'adresse e-mail si nécessaire
            'password' => bcrypt('secret')
        ])->assignRole('superadmin');
    }
}
}
