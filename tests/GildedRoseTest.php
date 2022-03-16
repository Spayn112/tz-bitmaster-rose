<?php

declare(strict_types=1);

namespace Tests;

use GildedRose\GildedRose;
use GildedRose\Item;
use PHPUnit\Framework\TestCase;

class GildedRoseTest extends TestCase
{
    public function testStandard(): void
    {
        $items = [
            new Item('+5 Dexterity Vest', 1, 10),
            new Item('Elixir of the Mongoose', 1, 10),
        ];
        $gildedRose = new GildedRose($items);

        $gildedRose->updateQuality();
        $this->assertSame(0, $items[0]->sell_in);
        $this->assertSame(9, $items[0]->quality);
        $this->assertSame(0, $items[1]->sell_in);
        $this->assertSame(9, $items[1]->quality);

        $gildedRose->updateQuality();
        $this->assertSame(-1, $items[0]->sell_in);
        $this->assertSame(7, $items[0]->quality);
        $this->assertSame(-1, $items[1]->sell_in);
        $this->assertSame(7, $items[1]->quality);
    }

    public function testSulfuras(): void
    {
        $items = [
            new Item('Sulfuras, Hand of Ragnaros', 0, 80),
            new Item('Sulfuras, Hand of Ragnaros', -1, 50),
        ];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame(0, $items[0]->sell_in);
        $this->assertSame(80, $items[0]->quality);
        $this->assertSame(-1, $items[1]->sell_in);
        $this->assertSame(80, $items[1]->quality);
    }

    public function testAgedBrie(): void
    {
        $items = [
            new Item('Aged Brie', 1, 1),
            new Item('Aged Brie', -1, 49),
        ];
        $gildedRose = new GildedRose($items);

        $gildedRose->updateQuality();
        $this->assertSame(0, $items[0]->sell_in);
        $this->assertSame(2, $items[0]->quality);
        $this->assertSame(-2, $items[1]->sell_in);
        $this->assertSame(50, $items[1]->quality);

        $gildedRose->updateQuality();
        $this->assertSame(-1, $items[0]->sell_in);
        $this->assertSame(4, $items[0]->quality);
        $this->assertSame(-3, $items[1]->sell_in);
        $this->assertSame(50, $items[1]->quality);
    }

    public function testBackstagePasses(): void
    {
        $items = [
            new Item('Backstage passes to a TAFKAL80ETC concert', 11, 24),
            new Item('Backstage passes to a TAFKAL80ETC concert', 1, 49),
        ];
        $gildedRose = new GildedRose($items);

        $gildedRose->updateQuality();
        $this->assertSame(10, $items[0]->sell_in);
        $this->assertSame(25, $items[0]->quality);
        $this->assertSame(0, $items[1]->sell_in);
        $this->assertSame(50, $items[1]->quality);

        $gildedRose->updateQuality();
        $this->assertSame(9, $items[0]->sell_in);
        $this->assertSame(27, $items[0]->quality);
        $this->assertSame(-1, $items[1]->sell_in);
        $this->assertSame(0, $items[1]->quality);
    }

    public function testConjured(): void
    {
        $items = [
            new Item('Conjured Mana Cake', 3, 6),
            new Item('Conjured Mana Cake', 0, 3),
        ];
        $gildedRose = new GildedRose($items);

        $gildedRose->updateQuality();
        $this->assertSame(2, $items[0]->sell_in);
        $this->assertSame(4, $items[0]->quality);
        $this->assertSame(-1, $items[1]->sell_in);
        $this->assertSame(0, $items[1]->quality);

        $gildedRose->updateQuality();
        $this->assertSame(1, $items[0]->sell_in);
        $this->assertSame(2, $items[0]->quality);
        $this->assertSame(-2, $items[1]->sell_in);
        $this->assertSame(0, $items[1]->quality);
    }
}
