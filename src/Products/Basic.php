<?php

namespace App\Products;

final class Basic extends Product
{
    /**
     * @return Product
     */
    protected function updateQuality() : Product
    {
        $this->item->quality = max($this->item->quality - 1, 0);
        if($this->item->sellIn < 0) {
            $this->item->quality -= 1;
        }

        return $this;
    }
}