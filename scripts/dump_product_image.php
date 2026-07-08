<?php
// Quick script to dump a product's image field by name
$projectRoot = dirname(__DIR__);
require $projectRoot . '/vendor/autoload.php';
$app    = require_once $projectRoot . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Product;

$name    = $argv[1] ?? 'okook';
$product = Product::where('nama', $name)->first();
if (! $product) {
    echo "Product not found: {$name}\n";
    exit(1);
}

echo "Product: {$product->nama}\n";
echo "Image field: {$product->image}\n";
echo "Computed image_url: {$product->image_url}\n";
echo "url(image_url): " . url($product->image_url) . "\n";
echo "asset(image_url): " . asset($product->image_url) . "\n";
