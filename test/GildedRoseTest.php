<?php

namespace App;

class GildedRoseTest extends \PHPUnit\Framework\TestCase {

    public function testQualityAndSellInDecreaseOnceADay()
    {
        $item = new Item('product1', 10, 20);
        $gildedRose = new GildedRose([$item]);
        $gildedRose->updateItems();
        $this->assertEquals('product1, 9, 19', (string) $item);
    }

    public function testQualityAndSellInDecreaseOnceADayDuringThreeDays()
    {
        $item = new Item('product2', 10, 20);
        $gildedRose = new GildedRose([$item]);
        for($i = 0; $i < 3; $i++) {
            $gildedRose->updateItems();
        }
        $this->assertEquals('product2, 7, 17', (string) $item);
    }

    public function testQualityDecreaseByTwoIfSellInExpired()
    {
        $item = new Item('product3', -1, 20);
        $gildedRose = new GildedRose([$item]);
        $gildedRose->updateItems();
        $this->assertEquals('product3, -2, 18', (string) $item);
    }

    public function testQualityCanNotBeLessThanZero()
    {
        $item = new Item('product4', 5, 0);
        $gildedRose = new GildedRose([$item]);
        $gildedRose->updateItems();
        $this->assertEquals('product4, 4, 0', (string) $item);
    }

    public function testProductAgedBrieIncreaseItsQuality()
    {
        $item = new Item('Aged Brie', 10, 0);
        $gildedRose = new GildedRose([$item]);
        for($i = 0; $i <5; $i++) {
            $gildedRose->updateItems();
        }
        $this->assertEquals('Aged Brie, 5, 5', (string) $item);
    }

    public function testProductAgedBrieQualityCanNotBeGreaterThanFifty()
    {
        $item = new Item('Aged Brie', 5, 50);
        $gildedRose = new GildedRose([$item]);
        $gildedRose->updateItems();
        $this->assertEquals('Aged Brie, 4, 50', (string) $item);
    }

    public function testProductSulfurasDontLoseSellInAndQuality()
    {
        $item = new Item('Sulfuras, Hand of Ragnaros', 5, 48);
        $gildedRose = new GildedRose([$item]);
        $gildedRose->updateItems();
        $this->assertEquals('Sulfuras, Hand of Ragnaros, 5, 80', (string) $item);
    }

    public function testProductBackStageIncreaseItsQuality()
    {
        $item = new Item('Backstage passes to a TAFKAL80ETC concert', 15, 10);
        $gildedRose = new GildedRose([$item]);
        for($i = 0; $i <5; $i++) {
            $gildedRose->updateItems();
        }
        $this->assertEquals('Backstage passes to a TAFKAL80ETC concert, 10, 15', (string) $item);
    }

    public function testProductBackStageQualityCanNotBeGreaterThanFifty()
    {
        $item = new Item('Aged Brie', 5, 50);
        $gildedRose = new GildedRose([$item]);
        $gildedRose->updateItems();
        $this->assertEquals('Aged Brie, 4, 50', (string) $item);
    }

    public function testProductBackStageQualityIncreaseByTwoWhenSellInLessOrEqualsThanTen()
    {
        $item = new Item('Backstage passes to a TAFKAL80ETC concert', 10, 10);
        $gildedRose = new GildedRose([$item]);
        for($i = 0; $i <5; $i++) {
            $gildedRose->updateItems();
        }
        $this->assertEquals('Backstage passes to a TAFKAL80ETC concert, 5, 20', (string) $item);
    }

    public function testProductBackStageQualityIncreaseByThreeWhenSellInLessOrEqualsThanFive()
    {
        $item = new Item('Backstage passes to a TAFKAL80ETC concert', 5, 10);
        $gildedRose = new GildedRose([$item]);
        for($i = 0; $i <3; $i++) {
            $gildedRose->updateItems();
        }
        $this->assertEquals('Backstage passes to a TAFKAL80ETC concert, 2, 19', (string) $item);
    }

    public function testProductBackStageQualityEqualsZeroWhenSellInIsNegative()
    {
        $item = new Item('Backstage passes to a TAFKAL80ETC concert', -1, 10);
        $gildedRose = new GildedRose([$item]);
        $gildedRose->updateItems();
        $this->assertEquals('Backstage passes to a TAFKAL80ETC concert, -2, 0', (string) $item);
    }
}
