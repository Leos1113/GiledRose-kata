<?php

namespace App;

abstract class Item {

    /**
     * @var ItemName
     */
    public $name;

    /**
     * @var ItemSellIn
     */
    public $sell_in;

    /**
     * @var ItemQuality
     */
    public $quality;

    /**
     * Item constructor.
     * @param ItemName $name
     * @param ItemSellIn $sell_in
     * @param ItemQuality $quality
     */
    function __construct(ItemName $name, ItemSellIn $sell_in, ItemQuality $quality) {
        $this->name    = $name;
        $this->sell_in = $sell_in;
        $this->quality = $quality;
    }

    abstract function update(): void;

    /**
     * @return ItemSellIn
     */
    public function sellIn(): ItemSellIn {
        return $this->sell_in;
     }

    /**
     * @return ItemQuality
     */
    public function quality(): ItemQuality {
        return $this->quality;
     }

     public function decreaseSellIn(): void {
        $this->sell_in = $this->sell_in->decrease();
     }

    /**
     * @param int $days
     * @return bool
     */
    public function hasToBeSoldInLessThan(int $days): bool {
        return $this->sell_in->isLessThan($days);
    }

    public function increaseQuality(): void {
        $this->quality = $this->quality->increase();
    }

    public function decreaseQuality(): void {
        $this->quality = $this->quality->decrease();
    }

    public function resetQuality(): void {
        $this->quality = $this->quality->reset();
    }
}
