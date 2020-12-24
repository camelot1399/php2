<?php

use PHPUnit\Framework\TestCase;
use app\models\Product;

class ProductTest extends TestCase
{
    /** 
    * @dataProvider prodiderProductTest 
    */
    public function testProduct($name, $description, $price) {
        $product = new Product($name, $description, $price);
        $this->assertEquals($name, $product->name);
        $this->assertEquals($description, $product->description);
        $this->assertEquals($price, $product->price);
    }

    public function prodiderProductTest() {
        return [
            ['яблоко', 'фркут1234'],
            ['dsflkdsfnsdfnksdj'],
            [345345345, 0000444]
        ];
    }

}
