<?php

declare(strict_types=1);

namespace GildedRose;

use GildedRose\Items\AgedBrie;
use GildedRose\Items\Backstage;
use GildedRose\Items\Conjured;
use GildedRose\Items\Standard;
use GildedRose\Items\Sulfras;

final class GildedRose
{
    /**
     * @var Item[]
     */
    private $items;

    public function __construct(array $items)
    {
        $this->items = $items;
    }

    public function updateQuality(): void
    {
        foreach ($this->items as $item) {
            $item = match ($item->name) {
                'Aged Brie'                                 => new AgedBrie($item),
                'Sulfuras, Hand of Ragnaros'                => new Sulfras($item),
                'Backstage passes to a TAFKAL80ETC concert' => new Backstage($item),
                'Conjured Mana Cake'                        => new Conjured($item),
                default                                     => new Standard($item),
            };
            $item->updateQuality();
        }
    }
}
