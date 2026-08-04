<?php

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

try {
    \Illuminate\Support\Facades\Artisan::call('optimize:clear');
    echo "<h1>Cache Cleared Successfully!</h1>";
    echo "<p>Return to your <a href='/'>website</a>.</p>";
} catch (\Exception $e) {
    echo "<h1>Error clearing cache:</h1>";
    echo "<p>" . $e->getMessage() . "</p>";
}
