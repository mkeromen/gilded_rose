<?php

namespace App\Products;

final class Sulfuras extends Product
{
    /**
     * @return Product
     */
    protected function updateSellIn(): Product
    {
        return $this;
    }

    /**
     * @return Product
     */
    protected function updateQuality() : Product
    {
        $this->item->quality = 80;
        return $this;
    }
}