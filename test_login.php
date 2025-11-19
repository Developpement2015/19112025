<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\User;
use Illuminate\Support\Facades\Hash;

echo "=== Test de connexion des comptes ===\n\n";

$testAccounts = [
    'resp1@example.test',
    'resp2@example.test',
    'resp3@example.test'
];

foreach ($testAccounts as $email) {
    echo "Test pour: $email\n";

    $user = User::where('email', $email)->first();

    if (!$user) {
        echo "  ❌ ERREUR: Utilisateur non trouvé!\n\n";
        continue;
    }

    echo "  ✓ Utilisateur trouvé: {$user->name}\n";

    // Test du mot de passe
    if (Hash::check('password', $user->password)) {
        echo "  ✓ Mot de passe 'password' est CORRECT\n";
    } else {
        echo "  ❌ Mot de passe 'password' est INCORRECT\n";
    }

    // Vérifier les rôles
    $roles = $user->roles->pluck('name')->toArray();
    if (count($roles) > 0) {
        echo "  ✓ Rôles: " . implode(', ', $roles) . "\n";
    } else {
        echo "  ⚠ Aucun rôle assigné\n";
    }

    echo "\n";
}

echo "=== Test terminé ===\n";
