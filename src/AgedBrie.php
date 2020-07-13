<?php


namespace App;


class AgedBrie extends Item
{
    private const DOUBLE_QUALITY_DECREMENT_SELL_IN_THRESHOLD = 0;

    /**
     * AgedBrie constructor.
     * @param $name
     * @param $sell_in
     * @param $quality
     */
    public function __construct($name, $sell_in, $quality)
    {
        parent::__construct($name, $sell_in, $quality);
    }

    function update(): void
    {
        $this->decreaseSellIn();

        $this->increaseQuality();

        if ($this->hasToBeSoldInLessThan(self::DOUBLE_QUALITY_DECREMENT_SELL_IN_THRESHOLD)) {
            $this->increaseQuality();
        }
    }
}