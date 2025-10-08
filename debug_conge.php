<?php
// Small script to dispatch an internal request to the Laravel app and print the response
require __DIR__ . '/vendor/autoload.php';
$app = require __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
// show environment
$env = $app->environment();
echo "Application environment: {$env}\n";

// check if the debug route exists
$routes = \Illuminate\Support\Arr::pluck(\Illuminate\Support\Facades\Route::getRoutes()->get(), 'uri');
$found = false;
foreach ($routes as $r) {
	if (strpos($r, 'debug/fonctionnaire-conges') !== false) {
		$found = true;
		break;
	}
}

echo "Debug route registered: " . ($found ? 'YES' : 'NO') . "\n";

// If route not registered, stop and show some diagnostics
if (! $found) {
	echo "Registered route URIs (sample 30):\n";
	$sample = array_slice($routes, 0, 30);
	foreach ($sample as $s) echo " - $s\n";
	exit(0);
}

$request = Illuminate\Http\Request::create('/debug/fonctionnaire-conges/1942339', 'GET');
$response = $kernel->handle($request);
echo $response->getContent();
$kernel->terminate($request, $response);
