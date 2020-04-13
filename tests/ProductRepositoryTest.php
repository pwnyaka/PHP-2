<?php


namespace app\tests;


use app\model\entities\Product;
use app\model\repositories\ProductRepository;
use PHPUnit\Framework\TestCase;

class ProductRepositoryTest extends TestCase
{
    /** @var ProductRepository $fixture */
    protected $fixture;

    protected function setUp(): void
    {
        $this->fixture = new ProductRepository();
    }

    public function testTableName()
    {
        $this->assertEquals('goods', $this->fixture->getTableName());
    }

    public function testEntityClass()
    {
        $this->assertEquals(Product::class, $this->fixture->getEntityClass());

    }

    protected function tearDown(): void
    {
        $this->fixture = null;
    }
}