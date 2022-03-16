<?php

namespace GildedRose\Items;

/**
 * Standard
 */
class Standard extends ItemProxy
{
    protected function changeQuality(): void
    {
        if ($this->item->sell_in <= 0) {
            $this->item->quality -= 2;
            return;
        }

        $this->item->quality--;
    }
}
