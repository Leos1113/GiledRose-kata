<?php


namespace App;


class BackstagePasses extends Item
{

    private const DOUBLE_QUALITY_INCREASE_SELL_IN_THRESHOLD = 10;
    private const TRIPLE_QUALITY_INCREASE_SELL_IN_THRESHOLD = 5;
    private const QUALITY_RESET_SELL_IN_THRESHOLD = 0;

    /**
     * BackstagePasses constructor.
     * @param ItemName $name
     * @param ItemSellIn $sell_in
     * @param ItemQuality $quality
     */
    public function __construct(ItemName $name, ItemSellIn $sell_in, ItemQuality $quality)
    {
        parent::__construct($name, $sell_in, $quality);
    }

    public function update(): void
    {
        $this->decreaseSellIn();

        $this->increaseQuality();

        if ($this->hasToBeSoldInLessThan(self::DOUBLE_QUALITY_INCREASE_SELL_IN_THRESHOLD)) {
            $this->increaseQuality();
        }

        if ($this->hasToBeSoldInLessThan(self::TRIPLE_QUALITY_INCREASE_SELL_IN_THRESHOLD)) {
            $this->increaseQuality();
        }

        if ($this->hasToBeSoldInLessThan(self::QUALITY_RESET_SELL_IN_THRESHOLD)) {
            $this->resetQuality();
        }
    }
}