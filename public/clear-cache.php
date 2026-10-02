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

echo "<h2>Diagnostic Check:</h2><ul>";
$tables = ['products', 'categories', 'category_product', 'body_parts', 'body_part_product', 'shops'];
foreach ($tables as $t) {
    $exists = \Illuminate\Support\Facades\Schema::hasTable($t);
    echo "<li>Table <code>$t</code>: " . ($exists ? "<strong style='color:green'>EXISTS</strong>" : "<strong style='color:red'>MISSING</strong>") . "</li>";
}
if (\Illuminate\Support\Facades\Schema::hasTable('products')) {
    $cols = ['category_id', 'shop_id', 'is_free_shipping', 'featured_order'];
    foreach ($cols as $col) {
        $hasCol = \Illuminate\Support\Facades\Schema::hasColumn('products', $col);
        echo "<li>Column <code>products.$col</code>: " . ($hasCol ? "<strong style='color:green'>EXISTS</strong>" : "<strong style='color:red'>MISSING</strong>") . "</li>";
    }
}
echo "</ul>";

echo "<h2>Recent Laravel Log Errors:</h2>";
$logPath = storage_path('logs/laravel.log');
if (file_exists($logPath)) {
    $lines = file($logPath);
    $lastLines = array_slice($lines, -100);
    echo "<pre style='background:#f4f4f4;padding:10px;max-height:400px;overflow:auto;font-size:11px;'>" . htmlspecialchars(implode("", $lastLines)) . "</pre>";
} else {
    echo "<p>No log file found at $logPath</p>";
}

