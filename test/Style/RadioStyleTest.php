<?php

declare(strict_types=1);

namespace PhpSchool\CliMenuTest\Style;

use PhpSchool\CliMenu\Style\RadioStyle;
use PHPUnit\Framework\TestCase;

class RadioStyleTest extends TestCase
{
    public function testHasChangedFromDefaultsWhenNoStylesChanged() : void
    {
        self::assertFalse((new RadioStyle())->hasChangedFromDefaults());
    }

    public function testGetMarker() : void
    {
        $style = new RadioStyle;

        self::assertSame('[●] ', $style->getMarker(true));
        self::assertSame('[○] ', $style->getMarker(false));
    }

    public function testGetSetMarkerOn() : void
    {
        $style = new RadioStyle;

        self::assertSame('[●] ', $style->getCheckedMarker());

        $style->setCheckedMarker('[x] ');

        self::assertSame('[x] ', $style->getCheckedMarker());
        self::assertTrue($style->hasChangedFromDefaults());
    }

    public function testGetSetMarkerOff() : void
    {
        $style = new RadioStyle;

        self::assertSame('[○] ', $style->getUncheckedMarker());

        $style->setUncheckedMarker('( ) ');

        self::assertSame('( ) ', $style->getUncheckedMarker());
        self::assertTrue($style->hasChangedFromDefaults());
    }

    public function testGetSetItemExtra() : void
    {
        $style = new RadioStyle;

        self::assertSame('✔', $style->getItemExtra());

        $style->setItemExtra('[!EXTRA]!');

        self::assertSame('[!EXTRA]!', $style->getItemExtra());
        self::assertTrue($style->hasChangedFromDefaults());
    }

    public function testModifyingItemExtraForcesExtraToBeDisplayedWhenNoItemsDisplayExtra() : void
    {
        $style = new RadioStyle;
        self::assertFalse($style->getDisplaysExtra());

        $style->setItemExtra('[!EXTRA]!');
        self::assertTrue($style->getDisplaysExtra());
    }

    public function testGetSetDisplayExtra() : void
    {
        $style = new RadioStyle;

        self::assertFalse($style->getDisplaysExtra());

        $style->setDisplaysExtra(true);

        self::assertTrue($style->getDisplaysExtra());
        self::assertTrue($style->hasChangedFromDefaults());
    }
}
