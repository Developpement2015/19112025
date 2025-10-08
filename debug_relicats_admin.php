<?php
require __DIR__ . '/vendor/autoload.php';
$app = require __DIR__ . '/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$fonctionnaireId = 46; // internal id for PPR 1942339
$adminTypeId = 1; // administratif (from earlier)

use App\Models\Relicat;
use Illuminate\Support\Facades\DB;

$admin_relicats = Relicat::where('fonctionnaire_id', $fonctionnaireId)
    ->where('type_conge_id', $adminTypeId)
    ->get(['id','fonctionnaire_id','type_conge_id','annee','nbr_jours_disponibles','is_additif','date_conge','document','created_at','updated_at'])
    ->toArray();

$all_relicats = Relicat::where('fonctionnaire_id', $fonctionnaireId)
    ->get(['id','fonctionnaire_id','type_conge_id','annee','nbr_jours_disponibles','is_additif','date_conge','document','created_at','updated_at'])
    ->toArray();

$sums_by_type = DB::table('relicats')
    ->select('type_conge_id', DB::raw('SUM(nbr_jours_disponibles) as total'))
    ->where('fonctionnaire_id', $fonctionnaireId)
    ->groupBy('type_conge_id')
    ->get()
    ->toArray();

$total_sum = DB::table('relicats')
    ->where('fonctionnaire_id', $fonctionnaireId)
    ->sum('nbr_jours_disponibles');

echo json_encode([
    'fonctionnaire_id' => $fonctionnaireId,
    'admin_type_id' => $adminTypeId,
    'admin_relicats' => $admin_relicats,
    'all_relicats' => $all_relicats,
    'sums_by_type' => $sums_by_type,
    'total_sum' => $total_sum
], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
