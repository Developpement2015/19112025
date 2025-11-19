<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

echo "=== Création des comptes test ===\n\n";

// Créer les rôles
$roles = ['responsable1', 'responsable2', 'responsable3', 'utilisateur3', 'admin'];
foreach ($roles as $roleName) {
    $role = Role::firstOrCreate(['name' => $roleName]);
    echo "✓ Rôle créé/trouvé: {$roleName}\n";
}

echo "\n";

// Créer les utilisateurs
$users = [
    ['name' => 'Responsable 1', 'email' => 'resp1@example.test', 'role' => 'responsable1'],
    ['name' => 'Responsable 2', 'email' => 'resp2@example.test', 'role' => 'responsable2'],
    ['name' => 'Responsable 3', 'email' => 'resp3@example.test', 'role' => 'responsable3'],
];

foreach ($users as $userData) {
    $user = User::updateOrCreate(
        ['email' => $userData['email']],
        [
            'name' => $userData['name'],
            'password' => Hash::make('password')
        ]
    );

    // Assigner le rôle
    if (!$user->hasRole($userData['role'])) {
        $user->assignRole($userData['role']);
    }

    echo "✓ Utilisateur créé: {$userData['email']} (mot de passe: password)\n";
}

echo "\n=== Comptes créés avec succès ! ===\n";
echo "\nVous pouvez maintenant vous connecter avec:\n";
echo "- resp1@example.test / password\n";
echo "- resp2@example.test / password\n";
echo "- resp3@example.test / password\n";
