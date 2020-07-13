<?php


namespace App;


class ItemSellIn
{
    /**
     * @var int
     */
    private $value;

    /**
     * ItemSellIn constructor.
     * @param int $value
     */
    public function __construct(int $value)
    {
        $this->value = $value;
    }

    /**
     * @return ItemSellIn
     */
    public function decrease(): ItemSellIn
    {
        return new ItemSellIn($this->value - 1);
    }

    /**
     * @param int $days
     * @return bool
     */
    public function isLessThan(int $days): bool
    {
        return $this->value < $days;
    }
}