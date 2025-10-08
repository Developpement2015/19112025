<?php
require __DIR__ . '/vendor/autoload.php';
$app = require __DIR__ . '/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$search = '1942339';

// Try by id
$f = \App\Models\Fonctionnaire::find($search);
if ($f) {
    echo "Found by id:\n";
    echo json_encode($f->toArray(), JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
    exit;
}

// Try by ppr exact
$f = \App\Models\Fonctionnaire::where('ppr', $search)->first();
if ($f) {
    echo "Found by ppr:\n";
    echo json_encode($f->toArray(), JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
    exit;
}

// Try by ppr like
$f = \App\Models\Fonctionnaire::where('ppr', 'like', "%{$search}%")->first();
if ($f) {
    echo "Found by ppr like:\n";
    echo json_encode($f->toArray(), JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
    exit;
}

// Try by cin
$f = \App\Models\Fonctionnaire::where('cin', $search)->first();
if ($f) {
    echo "Found by cin:\n";
    echo json_encode($f->toArray(), JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
    exit;
}

echo json_encode(['found' => false, 'searched' => $search], JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
