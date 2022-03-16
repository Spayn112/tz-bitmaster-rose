<?php

namespace GildedRose\Items;

class Conjured extends ItemProxy
{
    protected function changeQuality(): void
    {
        if ($this->item->sell_in <= 0) {
            $this->item->quality -= 4;
            return;
        }

        $this->item->quality -= 2;
    }
}
