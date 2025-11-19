<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

// Créer une requête POST simulée
$request = Illuminate\Http\Request::create(
    '/demandes/mine',
    'POST',
    [
        'email_fonctionnaire' => 'test@example.com',
        'password' => '1234',
        '_token' => csrf_token(),
    ]
);

$response = $kernel->handle($request);

// Afficher le résultat
echo "Status: " . $response->getStatusCode() . "\n";
echo "Content preview: " . substr($response->getContent(), 0, 500) . "\n";

if (strpos($response->getContent(), 'Mot de passe incorrect') !== false) {
    echo "\n❌ ERREUR: Mot de passe incorrect\n";
} elseif (strpos($response->getContent(), 'Aucune demande trouvée') !== false) {
    echo "\n❌ ERREUR: Aucune demande trouvée\n";
} elseif (strpos($response->getContent(), 'BENNANI') !== false) {
    echo "\n✅ SUCCESS: Demande trouvée!\n";
} else {
    echo "\n⚠️ UNKNOWN: Vérifier la réponse\n";
}

$kernel->terminate($request, $response);
