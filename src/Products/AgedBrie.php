<?php

namespace App\Products;

final class AgedBrie extends Product
{
    protected function updateQuality() : Product
    {
        $this->item->quality = min(50, $this->item->quality + 1);
        return $this;
    }
}