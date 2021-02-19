<?php

namespace App\Products;

final class BackStage extends Product
{
    /**
     * @return Product
     */
    protected function updateQuality() : Product
    {
        $quality = $this->item->quality + 1;
        if($this->item->sellIn <= 10) {
            $quality++;
            if($this->item->sellIn <= 5) {
                $quality++;
            }
        }

        $this->item->quality = ($this->item->sellIn < 0) ? 0 : min(50, $quality);
        return $this;
    }
}