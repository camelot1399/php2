<?php

use PHPUnit\Framework\TestCase;
use app\models\Product;

class ProductTest extends TestCase
{
    public function testProduct() {
        $name = 'чай';
        $product = new Product($name);
        $this->assertEquals($name, $product->name);
    }
}