<?php

namespace GildedRose\Items;

/**
 * Conjured Mana Cake
 */
class Conjured extends ItemProxy
{
    protected function changeQuality(): void
    {
        if ($this->item->sell_in <= 0) {
            // Уменьшаем качество в 2 раза
            $this->item->quality -= 4;
            return;
        }

        $this->item->quality -= 2;
    }
}
