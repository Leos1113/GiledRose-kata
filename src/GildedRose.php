<?php

namespace App;

final class GildedRose {

    private const AGED_BRIE_ITEM_NAME = "Aged Brie";
    private const BACKSTAGE_ITEM_NAME = "Backstage passes to a TAFKAL80ETC concert";
    private const SULFURAS_ITEM_NAME = "Sulfuras, Hand of Ragnaros";

    private const MINIMUM_QUALITY_FOR_ITEM = 0;
    private const MAXIMUM_QUALITY_FOR_ITEM = 50;

    private $items = [];

    public function __construct($items) {
        $this->items = $items;
    }

    public function updateQuality() {
        foreach ($this->items as $item) {
            if ($item->name != self::AGED_BRIE_ITEM_NAME && $item->name != self::BACKSTAGE_ITEM_NAME) {
                if ($item->quality > self::MINIMUM_QUALITY_FOR_ITEM) {
                    if ($item->name != self::SULFURAS_ITEM_NAME) {
                        $item->quality = $item->quality - 1;
                    }
                }
            } else {
                if ($item->quality < self::MAXIMUM_QUALITY_FOR_ITEM) {
                    $item->quality = $item->quality + 1;
                    if ($item->name == self::BACKSTAGE_ITEM_NAME) {
                        if ($item->sell_in < 11) {
                            if ($item->quality < self::MAXIMUM_QUALITY_FOR_ITEM) {
                                $item->quality = $item->quality + 1;
                            }
                        }
                        if ($item->sell_in < 6) {
                            if ($item->quality < self::MAXIMUM_QUALITY_FOR_ITEM) {
                                $item->quality = $item->quality + 1;
                            }
                        }
                    }
                }
            }

            if ($item->name != self::SULFURAS_ITEM_NAME) {
                $item->sell_in = $item->sell_in - 1;
            }

            if ($item->sell_in < self::MINIMUM_QUALITY_FOR_ITEM) {
                if ($item->name != self::AGED_BRIE_ITEM_NAME) {
                    if ($item->name != self::BACKSTAGE_ITEM_NAME) {
                        if ($item->quality > self::MINIMUM_QUALITY_FOR_ITEM) {
                            if ($item->name != self::SULFURAS_ITEM_NAME) {
                                $item->quality = $item->quality - 1;
                            }
                        }
                    } else {
                        $item->quality = $item->quality - $item->quality;
                    }
                } else {
                    if ($item->quality < self::MAXIMUM_QUALITY_FOR_ITEM) {
                        $item->quality = $item->quality + 1;
                    }
                }
            }
        }
    }

    private function decreaseQuality(Item $item): void
    {
        if ($item->quality > self::MINIMUM_QUALITY_FOR_ITEM) {
            $item->quality -= 1;
        }
    }

    private function increaseQuality(Item $item): void
    {
        if ($item->quality < self::MAXIMUM_QUALITY_FOR_ITEM) {
            $item->quality += 1;
        }
    }
}
