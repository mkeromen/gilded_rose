<?php

namespace App\Products;

use App\Item;

abstract class Product
{
    /**
     * @var Item
     */
    protected $item;

    /**
     * Product constructor.
     * @param Item $item
     */
    public function __construct(Item $item)
    {
        $this->item = $item;
    }

    public function update()
    {
        $this
            ->updateQuality()
            ->updateSellIn();
    }

    /**
     * @return Product
     */
    abstract protected function updateQuality() : Product;

    /**
     * @return $this
     */
    protected function updateSellIn() : Product
    {
        $this->item->sellIn -= 1;
        return $this;
    }
}