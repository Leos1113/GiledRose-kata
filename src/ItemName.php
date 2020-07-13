<?php


namespace App;


class ItemName
{
    private const AGED_BRIE = "Aged Brie";
    private const BACKSTAGE_PASSES = "Backstage passes to a TAFKAL80ETC concert";
    private const SULFURAS = "Sulfuras, Hand of Ragnaros";

    private $value;

    public function __construct(string $value) {
        $this->value = $value;
    }

    public function isAgedBrie(): bool {
        return self::AGED_BRIE === $this->value;
    }

    public function isBackstagePasses(): bool {
        return self::BACKSTAGE_PASSES ===  $this->value;
    }

    public function isSulfuras(): bool {
        return self::SULFURAS === $this->value;
    }
}