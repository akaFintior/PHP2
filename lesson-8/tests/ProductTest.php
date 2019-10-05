<?php

namespace app\tests;

use app\models\entities\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    /**
     * @dataProvider providerName
     */
    public function testProduct($name) {
        $product = new Product($name);
        $this->assertEquals($name, $product->name);
    }
    public function providerName() {
        return [['testName'], ['testName2'], ['testName3']];
    }
}