<?php


namespace app\tests;


use app\model\entities\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    /**
     * @dataProvider providerProduct
     */
    public function testProduct($name, $description, $cost)
    {
        $product = new Product($name, $description, $cost);
        $this->assertEquals($name, $product->prodName);
        $this->assertEquals($description, $product->description);
        $this->assertEquals($cost, $product->cost);
        $this->assertEquals('default.jpg', $product->imgName);
    }

    public function providerProduct()
    {
        return [
            ['Машина123', 'Описание123', 710000000000000],
            ['!@#$%^&*(af', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur dolor eius iusto
             obcaecati officiis porro quisquam sequi voluptate. A at beatae eos magni modi odit perspiciatis quidem
              sed. Atque cupiditate eligendi eveniet maiores modi, porro reiciendis? Accusantium esse expedita non.', 100500],
            [1251126, 12315512, -2512051286],
            ['1241251', '123Описание123', false]
        ];
    }
}