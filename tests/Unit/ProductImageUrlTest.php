<?php
namespace Tests\Unit;

use App\Models\Product;
use Tests\TestCase;

class ProductImageUrlTest extends TestCase
{
    public function test_product_image_url_uses_storage_path(): void
    {
        $product = new Product();
        $product->setRawAttributes(['image' => 'product-images/example.jpg']);

        $this->assertSame('/storage/product-images/example.jpg', $product->image_url);
    }
}
