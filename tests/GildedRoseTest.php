<?php

namespace App;

use PHPUnit\Framework\TestCase;
use function PHPUnit\Framework\assertEquals;

class GildedRoseTest extends TestCase {

    public function testThatSellInValueIsDecreased(): void
    {
        $whateverItem = ItemFactory::basedOn("whatever", 10, 0);
        $gildedRose = new GildedRose();
        $gildedRose->updateQuality([$whateverItem]);

        $expectedSellIn = new ItemSellIn(9);
        assertEquals($expectedSellIn, $whateverItem->sellIn());
    }

    public function testThatQualityValueIsDecreased(): void
    {
        $whateverItem = ItemFactory::basedOn("whatever", 1, 10);

        $gildedRose = new GildedRose();
        $gildedRose->updateQuality([$whateverItem]);

        $expectedQuality = new ItemQuality(9);
        assertEquals($expectedQuality, $whateverItem->quality());
    }

    public function testThatQualityDecreasesTwiceAsMuchWhenSellByPassed(): void
    {
        $whateverItem = ItemFactory::basedOn("whatever", 0, 10);

        $gildedRose = new GildedRose();
        $gildedRose->updateQuality([$whateverItem]);

        $expectedQuality = new ItemQuality(8);
        assertEquals($expectedQuality, $whateverItem->quality());
    }

    public function testThatQualityIsNeverNegative(): void
    {
        $whateverItem = ItemFactory::basedOn("whatever", 0, 0);

        $gildedRose = new GildedRose();
        $gildedRose->updateQuality([$whateverItem]);

        $expectedQuality = new ItemQuality(0);
        assertEquals($expectedQuality, $whateverItem->quality());
    }

    public function testAgedBrieIncreasesQualityWithAge(): void
    {
        $agedBrie = ItemFactory::basedOn("Aged Brie", 5, 1);

        $gildedRose = new GildedRose();
        $gildedRose->updateQuality([$agedBrie]);

        $expectedQuality = new ItemQuality(2);
        assertEquals($expectedQuality, $agedBrie->quality());
    }

    public function testQualityNeverIncreasesPastFifty(): void
    {
        $agedBrie = ItemFactory::basedOn("Aged Brie", 5, 50);

        $giledRose = new GildedRose();
        $giledRose->updateQuality([$agedBrie]);

        $expectedQuality = new ItemQuality(50);
        assertEquals($expectedQuality, $agedBrie->quality());
    }

    public function testSulfurasNeverChanges(): void
    {
        $sulfuras = ItemFactory::basedOn("Sulfuras, Hand of Ragnaros", 0, 25);

        $giledRose = new GildedRose();
        $giledRose->updateQuality([$sulfuras]);

        $expectedQuality = new ItemQuality(25);
        assertEquals($expectedQuality, $sulfuras->quality());

        $expectedSellIn = new ItemSellIn(0);
        assertEquals($expectedSellIn, $sulfuras->sellIn());
    }

    public function testBackstagePassIncreasesQualityByOneIfSellByGreaterThanTen(): void
    {
        $backstagePasses = ItemFactory::basedOn("Backstage passes to a TAFKAL80ETC concert", 11, 20);

        $giledRose = new GildedRose();
        $giledRose->updateQuality([$backstagePasses]);

        $expectedQuality = new ItemQuality(21);
        assertEquals($expectedQuality, $backstagePasses->quality());
    }

    public function testBackstagPassIncreasesQualityByTwoIfSellBySmallerThanTen(): void
    {
        $backstagePasses = ItemFactory::basedOn("Backstage passes to a TAFKAL80ETC concert", 6, 20);

        $giledRose = new GildedRose();
        $giledRose->updateQuality([$backstagePasses]);

        $expectedQuality = new ItemQuality(22);
        assertEquals($expectedQuality, $backstagePasses->quality());
    }

    public function testBackstagePassIncresesQualityByThreeIfSellBySmallerThanFive(): void
    {
        $backstagePasses = ItemFactory::basedOn("Backstage passes to a TAFKAL80ETC concert", 5, 20);

        $giledRose = new GildedRose();
        $giledRose->updateQuality([$backstagePasses]);

        $expectedQuality = new ItemQuality(23);
        assertEquals($expectedQuality, $backstagePasses->quality());
    }

    public function testBackstagePassLosesValueAfterSellByPasses(): void
    {
        $backstagePasses = ItemFactory::basedOn("Backstage passes to a TAFKAL80ETC concert", 0, 20);

        $giledRose = new GildedRose();
        $giledRose->updateQuality([$backstagePasses]);

        $expectedQuality = new ItemQuality(0);
        assertEquals($expectedQuality, $backstagePasses->quality());
    }
}