<?php


namespace app\tests;



use app\models\entities\Product;
use PHPUnit\Framework\TestCase;

class ShopTest extends TestCase
{
    public function testPrice() {
        $product = new Product('TestName', 'TestDescription', 100);
        $this->assertObjectHasAttribute('price', $product);
        $this->assertIsInt($product->price);
        $this->assertLessThan(101, $product->price);
        $this->assertGreaterThan(99, $product->price);
    }
}