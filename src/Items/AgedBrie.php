<?php

namespace GildedRose\Items;

class AgedBrie extends ItemProxy
{
    protected function changeQuality(): void
    {
        if ($this->item->sell_in <= 0) {
            $this->item->quality += 2;
            if ($this->item->quality >= 50) {
                $this->item->quality = 50;
            }
            return;
        }

        $this->item->quality++;
    }
}
