<?php

namespace GildedRose\Items;

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
