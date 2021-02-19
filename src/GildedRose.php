<?php

namespace App;

use App\Products\Product;

final class GildedRose
{
    /**
     * @var array
     */
    private $items;

    /**
     * GildedRose constructor.
     * @param array $items
     */
    public function __construct(array $items)
    {
        $this->items = $items;
    }

    /**
     * @param Item $item
     * @return Product
     */
    public function makeProductByName(Item $item): Product
    {
        $specificProducts = [
            'Aged Brie' => 'App\\Products\\AgedBrie',
            'Sulfuras, Hand of Ragnaros' => 'App\\Products\\Sulfuras',
            'Backstage passes to a TAFKAL80ETC concert' => 'App\\Products\\BackStage'
        ];

        $instance = (isset($specificProducts[$item->name])) ? $specificProducts[$item->name] : 'App\\Products\\Basic';
        return new $instance($item);
    }

    public function updateItems()
    {
        foreach ($this->items as $item) {
            $this->makeProductByName($item)->update();
        }
    }
}

