<?php

namespace GildedRose\Items;

/**
 * Sulfuras, Hand of Ragnaros
 */
class Sulfras extends ItemProxy
{
    public function updateQuality(): void
    {
        $this->item->quality = 80;
    }

    protected function changeQuality(): void
    {
    }
}
