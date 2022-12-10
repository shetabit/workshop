<?php

namespace Tests\Unit;

use App\Classes\Cart;
use PHPUnit\Framework\TestCase;

class CardTest extends TestCase
{
    public function test_add_item_to_cart()
    {
        $cart = new Cart();
        $cart->addItem('P111', 'Pizza', 1, 110000);

        $this->assertCount(1, $cart->getItems());
        $this->assertNotNull($cart);
    }

    public function test_remove_item_from_cart()
    {
        $cart = new Cart();
        $cart->addItem('P111', 'Pizza', 1, 110000);

        $cart->removeItem('P111');

        $this->assertCount(0, $cart->getItems());
    }

    public function test_add_same_item_multiple_times_increases_quantity()
    {
        $cart = new Cart();

        $cart->addItem('P111', 'Pizza', 1, 110000);
        $cart->addItem('P111', 'Pizza', 1, 110000);

        $expected = [
            [
                'code' => 'P111',
                'name' => 'Pizza',
                'quantity' => 2,
                'price' => 110000
            ]
        ];

        $this->assertEquals($expected, $cart->getItems());
    }

    public function test_remove_item_decreases_quantity_or_removes_item()
    {
        $cart = new Cart();
        $cart->addItem('P111', 'Pizza', 1, 110000);
        $cart->addItem('B111', 'Beer', 2, 10000);

        $cart->removeItem('B111');

        $expected = [
            [
                'code' => 'P111',
                'name' => 'Pizza',
                'quantity' => 1,
                'price' => 110000
            ],
            [
                'code' => 'B111',
                'name' => 'Beer',
                'quantity' => 1,
                'price' => 10000
            ]
        ];

        $this->assertEquals($expected, $cart->getItems());
    }

    public function test_get_cart_total()
    {
        $cart = new Cart();
        $cart->addItem('P111', 'Pizza', 1, 110000);
        $cart->addItem('B111', 'Beer', 2, 10000);

        $this->assertEquals(130000, $cart->getTotal());
    }

    public function test_get_cart_item_count()
    {
        $cart = new Cart();
        $cart->addItem('P111', 'Pizza', 2, 110000);
        $cart->addItem('B111', 'Beer', 1, 10000);

        $this->assertEquals(3, $cart->getItemCount());
    }

    public  function test_removing_not_existing_cart_item_throws_exception()
    {
        $this->expectException(\Exception::class);

        $cart = new Cart();
        $cart->removeItem('notExisting');
    }
}
