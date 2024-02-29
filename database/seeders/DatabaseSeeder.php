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
    
    if (Role::where('name', 'superadmin')->doesntExist()) {
        Role::create(['name' => 'superadmin']);
    }

    if (Role::where('name', 'admin')->doesntExist()) {
        Role::create(['name' => 'admin']);
    }

    if (Role::where('name', 'user')->doesntExist()) {
        Role::create(['name' => 'user']);
    }

    
    $existingAdmin = User::where('email', 'admin@argon.com')->first();

    
    if (!$existingAdmin) {
        User::create([
            'username' => 'admin',
            'firstname' => 'Admin',
            'lastname' => 'Admin',
            'email' => 'admin@argon.com', 
            'password' => bcrypt('secret')
        ])->assignRole('superadmin');
    }

    $newUser = User::create([
        'username' => 'nouvel_utilisateur',
        'firstname' => 'Prénom',
        'lastname' => 'Nom',
        'email' => 'nouvel_utilisateur@example.com', 
        'password' => bcrypt('mot_de_passe')
    ]);
    
    
    $role = Role::where('name', 'user')->first(); // Récupère le rôle 'user'
    $newUser->assignRole($role);
}
}
