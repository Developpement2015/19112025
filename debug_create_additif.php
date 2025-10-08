<?php
require __DIR__ . '/vendor/autoload.php';
$app = require __DIR__ . '/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\Relicat;

$fonctionnaireId = 46;
$typeCongeId = 1; // administratif
$annee = 2025;
$nbr = 10; // additif +10 jours

$reliquat = new Relicat();
$reliquat->fonctionnaire_id = $fonctionnaireId;
$reliquat->type_conge_id = $typeCongeId;
$reliquat->nbr_jours_disponibles = $nbr;
$reliquat->date_conge = "$annee-01-01";
$reliquat->is_additif = 1;
$reliquat->annee = $annee;
$reliquat->document = null;
$reliquat->save();

echo "Created additif relicat id=" . $reliquat->id . " for fonctionnaire $fonctionnaireId (+$nbr days, year $annee)\n";

// Show relicats now
$rows = Relicat::where('fonctionnaire_id', $fonctionnaireId)->get(['id','type_conge_id','annee','nbr_jours_disponibles','is_additif','date_conge','document'])->toArray();
echo json_encode($rows, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
