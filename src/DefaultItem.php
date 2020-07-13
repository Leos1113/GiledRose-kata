<?php


namespace App;


class DefaultItem extends Item
{
    private const DOUBLE_QUALITY_DECREASE_SELL_IN_THRESHOLD = 0;

    public function __construct(ItemName $name, ItemSellIn $sell_in, ItemQuality $quality)
    {
        parent::__construct($name, $sell_in, $quality);
    }

    function update(): void
    {
        $this->decreaseSellIn();
        $this->decreaseQuality();

        if ($this->hasToBeSoldInLessThan(self::DOUBLE_QUALITY_DECREASE_SELL_IN_THRESHOLD)) {
            $this->decreaseQuality();
        }
    }
}