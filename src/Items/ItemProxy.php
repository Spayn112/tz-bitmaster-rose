<?php

namespace GildedRose\Items;

use GildedRose\Item;

/**
 * Обобщенный класс для вынесения повторяющийся логики
 */
abstract class ItemProxy
{
    protected Item $item;

    public function __construct(Item $item)
    {
        $this->item = $item;
    }

    public function updateQuality(): void
    {
        $this->changeQuality();

        if ($this->item->quality <= 0) {
            $this->item->quality = 0;
        }
        if ($this->item->quality >= 50) {
            $this->item->quality = 50;
        }

        $this->item->sell_in--;
    }

    abstract protected function changeQuality(): void;
}
