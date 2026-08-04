<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';

// Bootstrap the console kernel to make Artisan available
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

try {
    $exitCode1 = \Illuminate\Support\Facades\Artisan::call('config:clear');
    $exitCode2 = \Illuminate\Support\Facades\Artisan::call('config:cache');
    $exitCode3 = \Illuminate\Support\Facades\Artisan::call('view:clear');

    echo "<h1>Cache Cleared Successfully!</h1>";
    echo "<p>Config Clear: $exitCode1</p>";
    echo "<p>Config Cache: $exitCode2</p>";
    echo "<p>View Clear: $exitCode3</p>";
    echo "<p><a href='/'>Go back to website</a></p>";
    
    unlink(__FILE__); // self delete
} catch (\Exception $e) {
    echo "<h1>Error</h1>";
    echo "<p>" . $e->getMessage() . "</p>";
}
