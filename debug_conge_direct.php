<?php
// Direct debug script that invokes private methods via reflection to get congé data for a fonctionnaire
require __DIR__ . '/vendor/autoload.php';
$app = require __DIR__ . '/bootstrap/app.php';
// Bootstrap the application (console kernel) so Eloquent and service providers are ready
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$id = 46; // ppr 1942339 corresponds to internal id 46
$fonctionnaire = \App\Models\Fonctionnaire::with(['relicats.typeConge'])->find($id);
if (! $fonctionnaire) {
    echo json_encode(['error' => 'Fonctionnaire not found', 'id' => $id], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    exit(0);
}

$controller = new \App\Http\Controllers\FonctionnaireController();

$rf = new ReflectionClass($controller);

// Invoke private getFonctionnaireCongeDocuments
$methodDocs = $rf->getMethod('getFonctionnaireCongeDocuments');
$methodDocs->setAccessible(true);
$congeDocuments = $methodDocs->invoke($controller, $fonctionnaire);

// Invoke private getFonctionnaireCongeStatistics
$methodStats = $rf->getMethod('getFonctionnaireCongeStatistics');
$methodStats->setAccessible(true);
$congeStatistics = $methodStats->invoke($controller, $fonctionnaire);

// Invoke private getCongeTypesTotals
$methodTotals = $rf->getMethod('getCongeTypesTotals');
$methodTotals->setAccessible(true);
$congeTotals = $methodTotals->invoke($controller, $fonctionnaire);

echo json_encode([
    'fonctionnaire_id' => $id,
    'congeDocuments' => $congeDocuments,
    'congeStatistics' => $congeStatistics,
    'congeTotals' => $congeTotals
], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
