<?php


namespace App;


class Sulfuras extends Item
{
    public function __construct(ItemName $name, ItemSellIn $sell_in, ItemQuality $quality)
    {
        parent::__construct($name, $sell_in, $quality);
    }

    public function update(): void {
    }
}