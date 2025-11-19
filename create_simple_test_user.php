<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

echo "=== Création d'un nouveau compte test ===\n\n";

// Créer un compte avec un email unique
$email = 'test.responsable@grh.test';
$password = 'test123';

// Supprimer l'utilisateur s'il existe déjà
User::where('email', $email)->delete();

// Créer le rôle si nécessaire
$role = Role::firstOrCreate(['name' => 'responsable1']);

// Créer l'utilisateur
$user = User::create([
    'name' => 'Test Responsable',
    'email' => $email,
    'password' => Hash::make($password)
]);

$user->assignRole('responsable1');

echo "✅ Compte créé avec succès !\n\n";
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";
echo "📧 Email: $email\n";
echo "🔑 Mot de passe: $password\n";
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n\n";

// Vérifier que ça fonctionne
if (Hash::check($password, $user->password)) {
    echo "✅ Vérification: Le mot de passe fonctionne correctement\n";
} else {
    echo "❌ ERREUR: Le mot de passe ne fonctionne pas!\n";
}

echo "\n📝 INSTRUCTIONS:\n";
echo "1. Allez sur: http://192.168.1.38:8806/login\n";
echo "2. Entrez l'email: $email\n";
echo "3. Entrez le mot de passe: $password\n";
echo "4. Cliquez sur 'Se Connecter'\n";
echo "5. Après connexion, allez sur: http://192.168.1.38:8806/demandes\n";
