<?php

namespace App;

use PHPUnit\Framework\TestCase;
use function PHPUnit\Framework\assertEquals;

class GildedRoseTest extends TestCase {

    public function testThatSellInValueIsDecreased(): void
    {
        $whateverItem = new Item('whaterver', 10, 0);

        $gildedRose = new GildedRose([$whateverItem]);
        $gildedRose->updateQuality();

        assertEquals($whateverItem->sell_in, 9);
    }

    public function testThatQualityValueIsDecreased(): void
    {
        $whateverItem = new Item("whatever", 1, 10);

        $gildedRose = new GildedRose([$whateverItem]);
        $gildedRose->updateQuality();

        assertEquals($whateverItem->quality, 9);
    }

    public function testThatQualityDecreasesTwiceAsMuchWhenSellByPassed(): void
    {
        $whateverItem = new Item("whatever", 0, 10);

        $gildedRose = new GildedRose([$whateverItem]);
        $gildedRose->updateQuality();

        assertEquals($whateverItem->quality, 8);
    }

    public function testThatQualityIsNeverNegative(): void
    {
        $whateverItem = new Item("whatever", 0, 0);

        $gildedRose = new GildedRose([$whateverItem]);
        $gildedRose->updateQuality();

        assertEquals($whateverItem->quality, 0);
    }

    public function testAgedBrieIncreasesQualityWithAge(): void
    {
        $agedBrie = new Item("Aged Brie", 5, 1);

        $gildedRose = new GildedRose([$agedBrie]);
        $gildedRose->updateQuality();

        assertEquals($agedBrie->quality, 2);
    }

    public function testQualityNeverIncreasesPastFifty(): void
    {
        $agedBrie = new Item("Aged Brie", 5, 50);

        $giledRose = new GildedRose([$agedBrie]);
        $giledRose->updateQuality();

        assertEquals($agedBrie->quality, 50);
    }

    public function testSulfurasNeverChanges(): void
    {
        $sulfuras = new Item("Sulfuras, Hand of Ragnaros", 0, 25);

        $giledRose = new GildedRose([$sulfuras]);
        $giledRose->updateQuality();

        assertEquals($sulfuras->quality, 25);
        assertEquals($sulfuras->sell_in, 0);
    }

    public function testBackstagePassIncreasesQualityByOneIfSellByGreaterThanTen(): void
    {
        $backstagePasses = new Item("Backstage passes to a TAFKAL80ETC concert", 11, 20);

        $giledRose = new GildedRose([$backstagePasses]);
        $giledRose->updateQuality();

        assertEquals($backstagePasses->quality, 21);
    }

    public function testBackstagPassIncreasesQualityByTwoIfSellBySmallerThanTen(): void
    {
        $backstagePasses = new Item("Backstage passes to a TAFKAL80ETC concert", 6, 20);

        $giledRose = new GildedRose([$backstagePasses]);
        $giledRose->updateQuality();

        assertEquals($backstagePasses->quality, 22);
    }

    public function testBackstagePassIncresesQualityByThreeIfSellBySmallerThanFive(): void
    {
        $backstagePasses = new Item("Backstage passes to a TAFKAL80ETC concert", 5, 20);

        $giledRose = new GildedRose([$backstagePasses]);
        $giledRose->updateQuality();

        assertEquals($backstagePasses->quality, 23);
    }

    public function testBackstagePassLosesValueAfterSellByPasses(): void
    {
        $backstagePasses = new Item("Backstage passes to a TAFKAL80ETC concert", 0, 20);

        $giledRose = new GildedRose([$backstagePasses]);
        $giledRose->updateQuality();

        assertEquals($backstagePasses->quality, 0);
    }
}