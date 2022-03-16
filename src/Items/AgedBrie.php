<?php

namespace GildedRose\Items;

/**
 * Aged Brie
 */
class AgedBrie extends ItemProxy
{
    protected function changeQuality(): void
    {
        if ($this->item->sell_in <= 0) {
            $this->item->quality += 2;
            return;
        }

        $this->item->quality++;
    }
}
