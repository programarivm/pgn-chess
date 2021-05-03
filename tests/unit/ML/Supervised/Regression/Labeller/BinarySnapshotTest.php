<?php

namespace Chess\Tests\Unit\ML\Supervised\Regression\Labeller;

use Chess\Board;
use Chess\ML\Supervised\Regression\Labeller\BinarySnapshot;
use Chess\PGN\Symbol;
use Chess\Tests\AbstractUnitTestCase;
use Chess\Tests\Sample\Opening\Sicilian\Open as OpenSicilian;

class BinarySnapshotTest extends AbstractUnitTestCase
{
    /**
     * @test
     */
    public function open_sicilian()
    {
        $movetext = (new OpenSicilian(new Board))
                        ->play()
                        ->getMovetext();

        $snapshot = (new BinarySnapshot($movetext))->take();

        $expected = [
            [
                Symbol::WHITE => 0.01,
                Symbol::BLACK => 0,
            ],
            [
                Symbol::WHITE => 0.07,
                Symbol::BLACK => 0,
            ],
            [
                Symbol::WHITE => 0.01,
                Symbol::BLACK => 1,
            ],
            [
                Symbol::WHITE => 0.95,
                Symbol::BLACK => 0,
            ],
            [
                Symbol::WHITE => 0.03,
                Symbol::BLACK => 0,
            ],
        ];

        $this->assertEquals($expected, $snapshot);
    }
}
