<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

echo "=== Création des 3 comptes responsables ===\n\n";

// Créer les rôles si nécessaire
foreach (['responsable1', 'responsable2', 'responsable3'] as $roleName) {
    Role::firstOrCreate(['name' => $roleName]);
}

// Supprimer et recréer les comptes
$accounts = [
    ['name' => 'Responsable Niveau 1', 'email' => 'responsable1@grh.test', 'role' => 'responsable1', 'password' => 'resp1'],
    ['name' => 'Responsable Niveau 2', 'email' => 'responsable2@grh.test', 'role' => 'responsable2', 'password' => 'resp2'],
    ['name' => 'Responsable Niveau 3', 'email' => 'responsable3@grh.test', 'role' => 'responsable3', 'password' => 'resp3'],
];

foreach ($accounts as $acc) {
    // Supprimer s'il existe
    User::where('email', $acc['email'])->delete();

    // Créer
    $user = User::create([
        'name' => $acc['name'],
        'email' => $acc['email'],
        'password' => Hash::make($acc['password'])
    ]);

    $user->assignRole($acc['role']);

    echo "✅ {$acc['name']} créé\n";
    echo "   📧 Email: {$acc['email']}\n";
    echo "   🔑 Mot de passe: {$acc['password']}\n\n";
}

echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";
echo "🎯 FLUX D'APPROBATION À 3 NIVEAUX:\n";
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n\n";

echo "1️⃣ RESPONSABLE NIVEAU 1\n";
echo "   📧 responsable1@grh.test\n";
echo "   🔑 resp1\n";
echo "   ➜ Doit approuver EN PREMIER (niveau 0 → 1)\n\n";

echo "2️⃣ RESPONSABLE NIVEAU 2\n";
echo "   📧 responsable2@grh.test\n";
echo "   🔑 resp2\n";
echo "   ➜ Doit approuver EN DEUXIÈME (niveau 1 → 2)\n\n";

echo "3️⃣ RESPONSABLE NIVEAU 3\n";
echo "   📧 responsable3@grh.test\n";
echo "   🔑 resp3\n";
echo "   ➜ Doit approuver EN DERNIER (niveau 2 → 3 + status=approved)\n\n";

echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";
echo "✨ ACCÈS:\n";
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";
echo "📝 Login: http://192.168.1.38:8806/login\n";
echo "📋 Demandes: http://192.168.1.38:8806/demandes\n";
echo "➕ Menu sidebar: \"Gestion des demandes\" ajouté!\n\n";
