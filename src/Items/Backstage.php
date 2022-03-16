<?php

namespace GildedRose\Items;

/**
 * Backstage passes to a TAFKAL80ETC concert
 */
class Backstage extends ItemProxy
{
    protected function changeQuality(): void
    {
        if ($this->item->sell_in <= 0) {
            $this->item->quality = 0;
            return;
        }

        if ($this->item->sell_in <= 10) {
            $this->item->quality += 2;
            return;
        }

        $this->item->quality++;
    }
}
