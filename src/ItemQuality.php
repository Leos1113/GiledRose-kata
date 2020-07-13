<?php


namespace App;


class ItemQuality
{
    private const MAX_VALUE = 50;
    private const MIN_VALUE = 0;

    /**
     * @var int
     */
    private $value;

    /**
     * ItemQuality constructor.
     * @param int $value
     */
    public function __construct(int $value)
    {
        if ($value < self::MIN_VALUE || $value > self::MAX_VALUE) throw new \Error($value . ' is out of range');

        $this->value = $value;
    }

    /**
     * @return $this
     */
    public function increase(): ItemQuality
    {
        if ($this->value === self::MAX_VALUE) {
            return $this;
        }

        return new ItemQuality($this->value + 1);
    }

    /**
     * @return $this
     */
    public function decrease(): ItemQuality
    {
        if ($this->value === self::MIN_VALUE) {
            return $this;
        }

        return new ItemQuality($this->value - 1);
    }

    /**
     * @return ItemQuality
     */
    public function reset(): ItemQuality
    {
        return new ItemQuality(self::MIN_VALUE);
    }
}