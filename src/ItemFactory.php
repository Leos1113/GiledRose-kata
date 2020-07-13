<?php


namespace App;


final class ItemFactory
{
    /**
     * ItemFactory constructor.
     * @param string $rawName
     * @param int $rawSellIn
     * @param int $rawQuality
     */
    public function basedOn(string $rawName, int $rawSellIn, int $rawQuality): Item
    {

        $name = new ItemName($rawName);
        $sellIn = new ItemSellIn($rawSellIn);
        $quality = new ItemQuality($rawQuality);

        if ($name->isAgedBrie()) return new AgedBrie($name, $sellIn, $quality);
        if ($name->isBackstagePasses()) return new BackstagePasses($name, $sellIn, $quality);
        if ($name->isSulfuras()) return new Sulfuras($name, $sellIn, $quality);

        return new DefaultItem($name, $sellIn, $quality);
    }
}